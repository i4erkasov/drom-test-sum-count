<?php

namespace App\Services\Cli;

abstract class Command
{
    protected array $argv;

    private int $argc;

    /**
     * Command constructor.
     *
     * @param int   $argc
     * @param array $argv
     */
    public function __construct(int $argc, array $argv)
    {
        $this->argv = $argv;
        $this->argc = $argc;
    }

    /**
     * Метод возращает список всех параметров
     *
     * @return array
     */
    protected function getParams(): array
    {
        if($this->argc > 2){
            parse_str(implode('&', array_slice($this->argv, 2)), $params);
        }

        return $params ?? [];
    }

    /**
     * Метод возвращает значение параметра по имени
     *
     * @param string $name
     *
     * @return string|null
     */
    protected function getParam(string $name): ?string
    {
        return $this->getParams()[$name] ?? null;
    }

    abstract public function execute();
}