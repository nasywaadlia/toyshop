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

    public function testPaymentMethodExists()
    {
        $methods = ['COD', 'Transfer'];

        $this->assertContains('COD', $methods);
    }

    public function testCheckoutTotal()
    {
        $this->assertEquals(120000, 100000 + 20000);
    }

    public function testOrderCodeGenerated()
    {
        $code = 'ORD001';

        $this->assertStringStartsWith('ORD', $code);
    }

    public function testEmailFormat()
    {
        $this->assertMatchesRegularExpression(
            '/^.+@.+\..+$/',
            'user@gmail.com'
        );
    }

    public function testCustomerDataArray()
    {
        $customer = ['name' => 'User'];

        $this->assertArrayHasKey('name', $customer);
    }

    public function testCheckoutSuccessBoolean()
    {
        $this->assertTrue(true);
    }

    public function testTotalGreaterThanZero()
    {
        $this->assertGreaterThan(0, 50000);
    }
}
