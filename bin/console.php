#! /usr/local/bin/php -q
<?php

declare(strict_types=1);

use App\Services\Cli\Console;

if (false === in_array(\PHP_SAPI, ['cli'], true)) {
    echo 'Warning: Консоль должна вызываться через CLI-версию PHP, а не через '.\PHP_SAPI.' SAPI'.\PHP_EOL;
}

set_time_limit(0);

require_once dirname(__DIR__) . '/vendor/autoload.php';

$console = new Console();

$console->run($argc, $argv);
