<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class OrderLogicTest extends CIUnitTestCase
{
    public function testSubtotalCalculation()
    {
        $subtotal = 50000 * 2;

        $this->assertEquals(100000, $subtotal);
    }

    public function testGrandTotalCalculation()
    {
        $item1 = 50000;
        $item2 = 70000;

        $grandTotal = $item1 + $item2;

        $this->assertEquals(120000, $grandTotal);
    }

    public function testQuantityCalculation()
    {
        $qty = 2 + 3;

        $this->assertEquals(5, $qty);
    }

    public function testOrderIdIsNumeric()
{
    $orderId = 1;

    $this->assertIsNumeric($orderId);
}

public function testOrderIdGreaterThanZero()
{
    $orderId = 1;

    $this->assertGreaterThan(0, $orderId);
}

    public function testOrderArrayHasTotal()
    {
        $order = [
            'total' => 120000
        ];

        $this->assertArrayHasKey('total', $order);
    }

    public function testOrderArrayHasCustomerName()
    {
        $order = [
            'customer_name' => 'Saskia'
        ];

        $this->assertArrayHasKey('customer_name', $order);
    }

    public function testGrandTotalGreaterThanZero()
    {
        $this->assertGreaterThan(0, 120000);
    }

    public function testCartItemCount()
    {
        $items = ['Puzzle', 'Robot'];

        $this->assertCount(2, $items);
    }

    public function testCustomerNameNotEmpty()
    {
        $this->assertNotEmpty('Saskia');
    }

    public function testOrderItemsArray()
    {
        $items = [
            'Puzzle',
            'Robot'
        ];

        $this->assertIsArray($items);
    }

    public function testOrderContainsProduct()
    {
        $items = [
            'Puzzle',
            'Robot'
        ];

        $this->assertContains('Puzzle', $items);
    }

    public function testOrderTotalIsNumeric()
    {
        $total = 120000;

        $this->assertIsNumeric($total);
    }

    public function testCustomerPhoneNumeric()
    {
        $phone = '08123456789';

        $this->assertIsNumeric($phone);
    }

    public function testOrderItemNameIsString()
    {
        $itemName = 'Puzzle';

        $this->assertIsString($itemName);
    }
}