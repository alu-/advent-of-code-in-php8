<?php

namespace Alu\AdventOfCode\Year2022\Day7;

use Exception;
use IteratorAggregate;
use RecursiveIteratorIterator;
use Traversable;

class Filesystem implements IteratorAggregate
{
    private string $currentPath;
    private Directory $root;

    public function __construct()
    {
        $this->root = new Directory("/");
    }

    public function getIterator(): Traversable
    {
        return new RecursiveIteratorIterator($this->root, RecursiveIteratorIterator::SELF_FIRST);
    }

    private static function isAbsolutePath(string $path): bool
    {
        return str_starts_with('/', $path) && !str_contains($path, '.');
    }

    /**
     * @throws Exception
     */
    public function traverseTo(string $path): void
    {
        $this->setCurrentPath($path);

        $directories = $this->getDirectoriesFromPath($this->currentPath);
        foreach ($directories as $directory) {
            if ($directory === "/") {
                continue;
            }

            $parent = $this->root->findParent(dirname($directory));
            if (!$parent->hasDirectory($directory)) {
                $parent->addDirectory(new Directory($directory));
            }
        }
    }

    /**
     * @return string[]
     */
    private function getDirectoriesFromPath($path): array
    {
        $directories = [$path];
        while (($path = dirname($path)) != "/") {
            $directories[] = $path;
        }
        if (!in_array('/', $directories)) {
            $directories[] = "/";
        }

        return array_reverse($directories);
    }

    /**
     * @param string $path
     * @return void
     * @throws Exception
     */
    private function setCurrentPath(string $path): void
    {
        if (self::isAbsolutePath($path)) {
            $this->currentPath = $path;
        } else {
            // Relative path
            if (str_contains($path, '.')) {
                if ($path === "..") {
                    $this->currentPath = dirname($this->currentPath);
                } else {
                    throw new Exception("Path to advanced.");
                }
            } else {
                $this->currentPath .= (str_ends_with('/', $this->currentPath) ? '' : '/') . $path;
            }
        }
    }

    public function addFilesAndDirectories(array $paths)
    {
        $parent = $this->root->findParent($this->currentPath);
        foreach ($paths as $path) {
            if (str_starts_with($path, "dir ")) {
                $path = $this->currentPath . (str_ends_with($this->currentPath, '/') ? '' : '/') . substr($path, 4);
                $parent->addDirectory(new Directory($path));
            } else {
                preg_match("/^(\d*)\s+(.*)$/", $path, $file);
                $path = $this->currentPath . (str_ends_with($this->currentPath, '/') ? '' : '/') . $file[2];
                $parent->addFile(new File($path, $file[1]));
            }
        }
    }

    public function calculateSizes(): void
    {
        $this->root->calculateSizes();
    }

    /**
     * @return Directory
     */
    public function getRoot(): Directory
    {
        return $this->root;
    }
}
