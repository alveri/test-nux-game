<?php

namespace App;

class LessNumberFinder
{
    private function prepareNumbersArray(array $array): array
    {
        return array_map([$this, 'convertToInt'], $array);
    }

    private function convertToInt(mixed $value): int
    {
        return (int) $value;
    }

    public function findUsingSortAndIndex(array $data, int $number): int
    {
        $prepareNumbersArray = $this->prepareNumbersArray($data);
        sort($prepareNumbersArray);
        $key = array_search($number, $prepareNumbersArray);
        if ($key === 0 || false === $key) {
            return -1;
        }

        return $prepareNumbersArray[$key - 1];
    }

    public function findUsingSimpleForeachIteration(array $data, int $number): int
    {
        $lessNumber = -1;
        foreach ($this->prepareNumbersArray($data) as $datum) {
            if( $datum <= $lessNumber || $datum >= $number) {
                continue;
            }
            $lessNumber = $datum;
        }

        return $lessNumber;
    }

    public function findFilterAndMax(array $data, int $number): int
    {
        $data = array_filter($data, function ($value) use ($number) {
            return $value < $number;
        });
        $data[] = -1;

        return max($data);
    }

    public function findBySplitting(array $data, int $number): int
    {
        sort($data);
        $split = array_search($number, $data);
        if (false === $split) {
            return -1;
        }
        $lessNumbers = array_slice($data, 0, $split);
        $lessNumbers[] = -1;

        return max($lessNumbers);
    }

}