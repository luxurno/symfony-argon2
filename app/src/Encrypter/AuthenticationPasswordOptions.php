<?php

namespace App\Encrypter;

class AuthenticationPasswordOptions
{
    private const MEMORY_COST = 1<<17;
    private const TIME_COST = 5;
    private const THREADS = 6;

    public static function getMemoryCost(): int
    {
        return self::MEMORY_COST;
    }

    public static function getTimeCost(): int
    {
        return self::TIME_COST;
    }

    public static function getThreads(): int
    {
        return self::THREADS;
    }

    public static function getOptions(): array
    {
        return [
            'memory_cost' => self::MEMORY_COST,
            'time_cost'   => self::TIME_COST,
            'threads'     => self::THREADS,
        ];
    }
}
