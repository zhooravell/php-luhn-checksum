<?php

namespace LuhnAlgorithm\Tests;

use PHPUnit\Framework\TestCase;

/**
 * Class IsValidLuhnChecksumTest.
 */
class IsValidLuhnChecksumTest extends TestCase
{
    public function testFunctionExists()
    {
        self::assertTrue(function_exists('isValidLuhnChecksum'));
    }

    /**
     * @dataProvider providerSuccessData
     *
     * @param int $number
     */
    public function testSuccess($number)
    {
        self::assertTrue(isValidLuhnChecksum($number));
    }

    /**
     * @return array
     */
    public function providerSuccessData()
    {
        return [
            'from wiki' => [79927398713],
            'visa 1' => [4532810043139816],
            'visa 2' => [4532537294350350],
            'mastercard 1' => [5542595348126957],
            'mastercard 2' => [5108876000375595],
            'discover 1' => [6011566893278055],
            'discover 2' => [6011987974418479],
            'american express 1' => [340532603190126],
            'american express 2' => [349827253680033],
            'IMEI=35-419002-389644-3' => [354190023896443],
            'IMEI=35-209900-176148-1' => [352099001761481],
            'ICCID=8991101200003204514' => [8991101200003204514],
        ];
    }

    /**
     * @dataProvider providerFailData
     *
     * @param int $number
     */
    public function testFail($number)
    {
        self::assertFalse(isValidLuhnChecksum($number));
    }

    /**
     * @return array
     */
    public function providerFailData()
    {
        return [
            [79927398710],
            [79927398712],
            [79927398714],
            [79927398715],
            [79927398716],
            [79927398719],
            [null],
        ];
    }
}
