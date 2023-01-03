<?php

namespace app\RomanNumberConverter;

class RomanNumberConverter
{
    const ROMANOS = [
       "M" => 1000,
       "CM" => 900,
       "D" => 500,
       "CD" => 400,
       "C" => 100,
       "XC" => 90,
       "L" => 50,
       "XL" => 40,
       "X" => 10,
       "IX" => 9,
       "V" => 5,
       "IV" => 4,
       "I" => 1,
    ];

    private string $romanNumber;

    public function __construct(string $romanNumber)
    {
        $this->romanNumber = $romanNumber;
    }

    public function getInteger(): int
    {
        $array = str_split($this->romanNumber);
        $array = array_reverse($array);
        $number = 0;

        for ($i = 0; $i<count($array); $i++) {
            if (! isset($array[$i + 1])) {
               $number += self::ROMANOS[$array[$i]];
               continue;
            }

            $result = $this->getValue($array, $i);

            $number += $result['value'];

            if ($result['jump']) {
                $i++;
            }
        }

        return($number);
    }

    private function getValue(array $array, int $key): array
    {
        $digit = $array[$key];

        $newDigit = $array[$key + 1] . $array[$key];
        if (isset(self::ROMANOS[$newDigit])) {
            return [
                'value' => self::ROMANOS[$newDigit],
                'jump' => true
            ];
        }

        return [
            'value' => self::ROMANOS[$digit],
            'jump' => false
        ];
    }
}