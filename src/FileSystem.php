<?php

namespace App;

class FileSystem
{
    private string $dir;

    private array $searchResults = [];

    /**
     * FileSystem constructor.
     *
     * @param string $dir
     */
    public function __construct($dir = '/')
    {
        if (!is_dir($dir)) {
            throw new \InvalidArgumentException('Path cannot be found or is not a directory');
        }

        $this->dir = $dir;
    }

    /**
     * Метод отвечат за поиск файла по имени
     *
     * @param string $fileName
     *
     * @return File[]
     */
    public function search(string $fileName): array
    {
        $files = $this->scan();

        /** @var $files \SplFileInfo[] */
        foreach ($files as $file) {
            if ($file->getFilename() === $fileName) {
                $this->searchResults[] = new File($file->getRealPath());
            }
        }

        return $this->searchResults ?? [];
    }

    /**
     * Метод отвечает за сканирования текущей директории
     *
     * @return \SplFileInfo[]|array
     */
    public function scan(): array
    {
        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator(
                $this->dir, \RecursiveDirectoryIterator::SKIP_DOTS
            ),
        );

        return iterator_to_array($iterator, false);
    }
}