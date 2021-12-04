#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';

use Alu\AdventOfCode\Helpers\Bootstrap\Command\BootstrapCommand;
use Alu\AdventOfCode\Helpers\Runner\Command\RunnerCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(command: new BootstrapCommand());
$application->add(command: new RunnerCommand());
$application->run();
