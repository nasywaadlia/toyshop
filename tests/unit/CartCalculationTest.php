<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class CartCalculationTest extends CIUnitTestCase
{
    public function testTotalCart()
    {
        $cart = [
            ['price' => 10000, 'qty' => 2],
            ['price' => 5000, 'qty' => 1],
        ];

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $this->assertEquals(25000, $total);
    }

    public function testEmptyCart()
    {
        $cart = [];

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $this->assertEquals(0, $total);
    }
}