#!/usr/bin/env php
<?php
declare(strict_types=1);

require __DIR__.'/vendor/autoload.php';

use Alu\AdventOfCode\Helpers\Bootstrap\Command\BootstrapCommand;
use Alu\AdventOfCode\Helpers\Runner\Command\RunnerCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->addCommands(
    [new BootstrapCommand(), new RunnerCommand()]
);
$application->run();
