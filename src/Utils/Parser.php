<?php

namespace App\Utils;

class Parser
{
    /**
     * Метод возвращает массив чисел как положительных
     * так и отрицательных
     *
     * @param string $input
     *
     * @return array
     */
    public static function getNumbersFromString(string $input): array
    {
        preg_match_all("/-?\d+/", $input, $result);

        return $result[0];
    }
}