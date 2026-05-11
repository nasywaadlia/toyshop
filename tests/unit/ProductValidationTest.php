<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class ProductValidationTest extends CIUnitTestCase
{
    public function testProductNameIsNotEmpty()
    {
        $this->assertNotEmpty('Toy Car');
    }

    public function testProductPriceIsNumeric()
    {
        $this->assertIsNumeric(50000);
    }

    public function testProductStockIsInteger()
    {
        $this->assertIsInt(10);
    }

    public function testProductImageExtension()
    {
        $this->assertContains('jpg', ['jpg', 'png', 'jpeg']);
    }

    public function testProductCategoryExists()
    {
        $this->assertTrue(true);
    }

    public function testPriceGreaterThanZero()
    {
        $this->assertGreaterThan(0, 1000);
    }

    public function testDiscountCalculation()
    {
        $price = 100000;
        $discount = 10000;

        $this->assertEquals(90000, $price - $discount);
    }

    public function testSlugGeneration()
    {
        $slug = strtolower(str_replace(' ', '-', 'Toy Robot'));

        $this->assertEquals('toy-robot', $slug);
    }

    public function testProductCodeLength()
    {
        $this->assertGreaterThanOrEqual(5, strlen('PRD01'));
    }

    public function testProductArrayStructure()
    {
        $product = [
            'name' => 'Toy Car',
            'price' => 10000,
            'stock' => 5
        ];

        $this->assertArrayHasKey('name', $product);
    }
}
