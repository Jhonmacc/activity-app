<?php

class RomanToArabicConverter extends ArabicToRomanConverter {
    private $romanToArabicMap = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1
    ];

    public function convert($roman) {
        $number = 0;
        $length = strlen($roman);
        $index = 0;
        
        while ($index < $length) {
            $current = $roman[$index];
            $next = $index + 1 < $length ? $roman[$index + 1] : '';
            $pair = $current . $next;
            
            if (isset($this->romanToArabicMap[$pair])) {
                $number += $this->romanToArabicMap[$pair];
                $index += 2;
            } else if (isset($this->romanToArabicMap[$current])) {
                $number += $this->romanToArabicMap[$current];
                $index++;
            } else {
                return null;
            }
        }
        
        return $number;
    }
}
