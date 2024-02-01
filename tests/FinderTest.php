<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\LessNumberFinder;

class FinderTest extends TestCase
{
    private LessNumberFinder $finder;

    protected function setUp(): void
    {
        $this->finder = new LessNumberFinder();
    }

    /**
     * @covers \App\LessNumberFinder
     */
    public function testMethods(): void
    {
        $array = [
            21,
            4,
            6,
            9,
            14,
            12,
            10,
            15,
            17,
            19,
            3
        ];

        self::assertEquals(4, $this->finder->findUsingSortAndIndex($array, 6));
        self::assertEquals(4, $this->finder->findUsingSimpleForeachIteration($array, 6));
        self::assertEquals(4, $this->finder->findFilterAndMax($array, 6));
        self::assertEquals(4, $this->finder->findBySplitting($array, 6));

        self::assertEquals(19, $this->finder->findUsingSortAndIndex($array, 21));
        self::assertEquals(19, $this->finder->findUsingSimpleForeachIteration($array, 21));
        self::assertEquals(19, $this->finder->findFilterAndMax($array, 21));
        self::assertEquals(19, $this->finder->findBySplitting($array, 21));
    }
}