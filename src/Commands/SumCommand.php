<?php

namespace App\Commands;

use App\File;
use App\FileSystem;
use App\Services\Cli\Command;
use App\Utils\Parser;

class SumCommand extends Command
{
    public function execute()
    {
        $path = $this->getParam('path');
        $file = $this->getParam('file');

        try {
            $fileSystem = new FileSystem($path);

            /** @var $searchResults File[] */
            $searchResults = $fileSystem->search($file);

            foreach ($searchResults as $file) {
                $numbers = array_merge($numbers ?? [], Parser::getNumbersFromString($file->getContent()));
            }

            $sum = array_reduce($numbers ?? [], fn($sum, $item) => bcadd($sum, $item));

            echo "\e[34mSumCount = {$sum}\e[0m" . PHP_EOL;
        } catch (\Throwable $ex) {
            echo "\e[31mError: {$ex->getMessage()}\e[0m" . PHP_EOL;
        }
    }
}