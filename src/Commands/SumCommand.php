<?php

namespace App\Commands;

use App\Services\Cli\Command;

class SumCommand extends Command
{
    public function execute()
    {
         var_dump($this->getParams());
    }
}