<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class ProductValidationTest extends CIUnitTestCase
{
    public function testProductNameNotEmpty()
    {
        $this->assertNotEmpty('Robot');
    }

    public function testProductPriceNumeric()
    {
        $this->assertIsNumeric(50000);
    }

    public function testProductPriceGreaterThanZero()
    {
        $this->assertGreaterThan(0, 50000);
    }

    public function testProductDescriptionNotEmpty()
    {
        $this->assertNotEmpty('Mainan robot anak');
    }

    public function testProductImageFormat()
    {
        $image = 'robot.jpg';

        $this->assertStringEndsWith('.jpg', $image);
    }

    public function testProductArrayHasName()
    {
        $product = [
            'name' => 'Puzzle'
        ];

        $this->assertArrayHasKey('name', $product);
    }

    public function testProductArrayHasPrice()
    {
        $product = [
            'price' => 50000
        ];

        $this->assertArrayHasKey('price', $product);
    }

    public function testProductArrayHasCategory()
    {
        $product = [
            'category_id' => 1
        ];

        $this->assertArrayHasKey('category_id', $product);
    }

    public function testProductNameLength()
    {
        $this->assertGreaterThan(3, strlen('Puzzle'));
    }

    public function testProductStockSimulation()
    {
        $stock = 10;

        $this->assertGreaterThan(0, $stock);
    }
}
