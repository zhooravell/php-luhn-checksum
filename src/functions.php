<?php

if (!function_exists('isValidLuhnChecksum')) {
    /**
     * @param int $number
     *
     * @return bool
     *
     * @see https://en.wikipedia.org/wiki/Luhn_algorithm
     */
    function isValidLuhnChecksum($number)
    {
        $number = filter_var($number, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE);

        if (null === $number) {
            return false; // not a valid number
        }

        $sum = 0;
        $numDigits = strlen($number) - 1;
        $parity = $numDigits % 2;

        for ($i = $numDigits; $i >= 0; --$i) { // From the rightmost digit, which is the check digit, and moving left
            $digit = substr($number, $i, 1);

            if (!$parity == ($i % 2)) {
                $digit <<= 1;
            }

            if ($digit > 9) {
                $digit = $digit - 9;
            }

            $sum += $digit;
        }

        return 0 == ($sum % 10);
    }
}
