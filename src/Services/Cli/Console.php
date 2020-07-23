<?php

namespace App\Services\Cli;

class Console
{
    public function run(int $argc, array $argv): void
    {
        $class = 'App\Commands\\' . ucfirst($argv[1]) . 'Command';

        if (class_exists($class)) {
            $command = new $class($argc, $argv);

            if ($command instanceof Command) {
                $command->execute();
            }
        }
    }
}