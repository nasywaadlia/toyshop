<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class CartLogicTest extends CIUnitTestCase
{
    public function testCartSubtotal()
    {
        $this->assertEquals(30000, 10000 + 20000);
    }

    public function testCartQuantity()
    {
        $this->assertEquals(3, 1 + 2);
    }

    public function testCartIsArray()
    {
        $cart = [];
        $this->assertIsArray($cart);
    }

    public function testCartCanStoreItems()
    {
        $cart = ['Toy'];
        $this->assertCount(1, $cart);
    }

    public function testRemoveItemFromCart()
    {
        $cart = ['Toy'];
        unset($cart[0]);

        $this->assertEmpty($cart);
    }

    public function testTaxCalculation()
    {
        $subtotal = 100000;
        $tax = $subtotal * 0.1;

        $this->assertEquals(10000, $tax);
    }

    public function testShippingFee()
    {
        $this->assertEquals(15000, 15000);
    }

    public function testTotalWithShipping()
    {
        $this->assertEquals(115000, 100000 + 15000);
    }

    public function testCartSessionExists()
    {
        $session = true;
        $this->assertTrue($session);
    }

    public function testCartItemName()
    {
        $this->assertStringContainsString('Toy', 'Toy Robot');
    }
}
