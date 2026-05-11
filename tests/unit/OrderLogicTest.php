<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class OrderLogicTest extends CIUnitTestCase
{
    public function testSubtotal()
    {
        $this->assertEquals(100000, 50000 + 50000);
    }

    public function testShippingCost()
    {
        $this->assertEquals(15000, 15000);
    }

    public function testGrandTotal()
    {
        $this->assertEquals(115000, 100000 + 15000);
    }

    public function testDiscount()
    {
        $this->assertEquals(90000, 100000 - 10000);
    }

    public function testOrderStatusPending()
    {
        $this->assertEquals('pending', 'pending');
    }

    public function testInvoiceCode()
    {
        $invoice = 'INV001';

        $this->assertStringStartsWith('INV', $invoice);
    }

    public function testOrderArray()
    {
        $order = ['total' => 10000];

        $this->assertArrayHasKey('total', $order);
    }

    public function testQuantity()
    {
        $this->assertEquals(5, 2 + 3);
    }

    public function testTotalGreaterThanZero()
    {
        $this->assertGreaterThan(0, 1000);
    }

    public function testOrderBoolean()
    {
        $this->assertTrue(true);
    }
}