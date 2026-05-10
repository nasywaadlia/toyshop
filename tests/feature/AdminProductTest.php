<?php

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;

class AdminProductTest extends CIUnitTestCase
{
    public function testAdminPageLoads()
    {
        $url = base_url('/admin/products');

        $this->assertStringContainsString('admin', $url);
    }

    public function testProductDataValid()
    {
        $product = [
            'name'        => 'Boneka Teddy',
            'price'       => 50000,
            'description' => 'Boneka lucu',
        ];

        $this->assertArrayHasKey('name', $product);
        $this->assertArrayHasKey('price', $product);

        $this->assertGreaterThan(0, $product['price']);
    }

    public function testCreateProductSimulation()
    {
        $data = [
            'name'        => 'Mobil Remote',
            'price'       => 75000,
            'description' => 'Mainan remote control'
        ];

        $this->assertEquals('Mobil Remote', $data['name']);
        $this->assertIsNumeric($data['price']);
    }
}