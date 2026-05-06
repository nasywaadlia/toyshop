<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class ProductTest extends CIUnitTestCase
{
    public function testProductHasPrice()
    {
        $product = [
            'name' => 'Boneka Teddy',
            'price' => 50000
        ];

        $this->assertArrayHasKey('price', $product);
    }

    public function testPriceGreaterThanZero()
    {
        $price = 50000;

        $this->assertGreaterThan(0, $price);
    }
}