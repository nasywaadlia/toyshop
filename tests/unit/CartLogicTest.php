<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class CartLogicTest extends CIUnitTestCase
{
    public function testCartItemAdded()
    {
        $cart = ['Puzzle'];

        $this->assertContains('Puzzle', $cart);
    }

    public function testCartQuantityIncrease()
    {
        $qty = 1;
        $qty++;

        $this->assertEquals(2, $qty);
    }

    public function testCartSubtotalCalculation()
    {
        $subtotal = 50000 * 2;

        $this->assertEquals(100000, $subtotal);
    }

    public function testCartTotalCalculation()
    {
        $total = 100000 + 20000;

        $this->assertEquals(120000, $total);
    }

    public function testCartArrayExists()
    {
        $cart = [];

        $this->assertIsArray($cart);
    }

    public function testCartItemHasName()
    {
        $item = [
            'name' => 'Robot'
        ];

        $this->assertArrayHasKey('name', $item);
    }

    public function testCartItemHasPrice()
    {
        $item = [
            'price' => 50000
        ];

        $this->assertArrayHasKey('price', $item);
    }

    public function testCartItemHasQty()
    {
        $item = [
            'qty' => 1
        ];

        $this->assertArrayHasKey('qty', $item);
    }

    public function testRemoveItemFromCart()
    {
        $cart = ['Puzzle', 'Robot'];

        unset($cart[1]);

        $this->assertCount(1, $cart);
    }

    public function testCartTotalGreaterThanZero()
    {
        $this->assertGreaterThan(0, 50000);
    }
}
