<?php
declare(strict_types=1);

namespace App\Tests;

class HelpersForTest
{
    /**
     * Calculate strength
     * @param float $value
     * @return float
     */
    public static function calcStrength(float $value): float
    {
        return 5 - ($value * 0.08);
    }

    /**
     * Calculate speed
     * @param float $value
     * @return float
     */
    public static function calcSpeed(float $value): float
    {
        return 5 + $value;
    }

    /**
     * Calculate endurance
     * @param float $value
     * @return float
     */
    public static function calcEndurance(float $value): float
    {
        return $value * 100;
    }

    /**
     * @return float
     */
    public static function getGenerateStat(): float
    {
        $value = (float) mt_rand(0, 10);
        if ($value === 0.0) {
            return self::getGenerateStat();
        }

        return $value;
    }

    /**
     * @param float $calcEndurance
     * @param float $calcSpeed
     * @param float $calcStrength
     * @return float
     */
    public static function getTimeCalculated(float $calcEndurance, float $calcSpeed, float $calcStrength): float
    {
        $timeFullPower = $calcEndurance / $calcSpeed;
        $normalTime = (1500 - $calcEndurance) / $calcStrength;

        return $timeFullPower + $normalTime;
    }
}
