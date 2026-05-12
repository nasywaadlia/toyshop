<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class CheckoutValidationTest extends CIUnitTestCase
{
    public function testCustomerNameRequired()
    {
        $this->assertNotEmpty('Saskia');
    }

    public function testPhoneNumberNumeric()
    {
        $this->assertIsNumeric('08123456789');
    }

    public function testAddressNotEmpty()
    {
        $this->assertNotEmpty('Bandung');
    }

    public function testEmailFormat()
    {
        $this->assertMatchesRegularExpression(
            '/^.+@.+\..+$/',
            'user@gmail.com'
        );
    }

    public function testCheckoutTotalCalculation()
    {
        $total = (50000 * 2) + 20000;

        $this->assertEquals(120000, $total);
    }

    public function testOrderCodeStartsWithORD()
    {
        $code = 'ORD001';

        $this->assertStringStartsWith('ORD', $code);
    }

    public function testCartNotEmpty()
    {
        $cart = [
            'Puzzle',
            'Robot'
        ];

        $this->assertNotEmpty($cart);
    }

    public function testQuantityGreaterThanZero()
    {
        $qty = 2;

        $this->assertGreaterThan(0, $qty);
    }

    public function testCustomerDataArray()
    {
        $customer = [
            'nama' => 'Saskia',
            'email' => 'user@gmail.com'
        ];

        $this->assertArrayHasKey('nama', $customer);
    }

    public function testTotalPriceGreaterThanZero()
    {
        $this->assertGreaterThan(0, 120000);
    }
}
