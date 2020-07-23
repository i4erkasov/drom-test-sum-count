<?php

namespace App;

class File
{
    private ?string $content = null;

    private string $path;

    /**
     * File constructor.
     *
     * @param string $path
     */
    public function __construct(string $path)
    {
        if(!file_exists($path)){
            throw new \InvalidArgumentException("File does not exist at path {$path}");
        }

        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        if(!$this->content){
            $content = @file_get_contents($this->path);

            if ($content === false) {
                throw new \RuntimeException("File open failed at path {$this->path}.");
            }

            $this->content = $content;
        }

        return $this->content;
    }
}