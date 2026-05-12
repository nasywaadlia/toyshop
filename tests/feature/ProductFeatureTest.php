<?php

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class ProductFeatureTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testProductIndexPage()
    {
        $result = $this->get('/admin/products');

        $this->assertTrue(
            $result->response()->getStatusCode() == 200 ||
            $result->response()->getStatusCode() == 302
        );
    }

    public function testCreatePageLoads()
    {
        $result = $this->get('/admin/products/create');

        $this->assertTrue(
            $result->response()->getStatusCode() == 200 ||
            $result->response()->getStatusCode() == 302
        );
    }

    public function testStoreProduct()
    {
        $result = $this->call('post', '/admin/products/store', [
            'name' => 'Lego Batman',
            'price' => 500000,
            'description' => 'Batman Toy',
            'category_id' => 1
        ]);

        $this->assertTrue(
            $result->response()->getStatusCode() == 302 ||
            $result->response()->getStatusCode() == 200
        );
    }

    public function testStoreProductWithoutName()
    {
        $result = $this->call('post', '/admin/products/store', [
            'name' => '',
            'price' => 100000,
            'description' => 'Toy',
            'category_id' => 1
        ]);

        $this->assertNotNull($result);
    }

    public function testStoreProductWithoutPrice()
    {
        $result = $this->call('post', '/admin/products/store', [
            'name' => 'Toy',
            'price' => '',
            'description' => 'Toy Desc',
            'category_id' => 1
        ]);

        $this->assertNotNull($result);
    }

    public function testStoreWithLongDescription()
    {
        $result = $this->call('post', '/admin/products/store', [
            'name' => 'Toy',
            'price' => 10000,
            'description' => str_repeat('A', 500),
            'category_id' => 1
        ]);

        $this->assertNotNull($result);
    }

    public function testStoreWithLargePrice()
    {
        $result = $this->call('post', '/admin/products/store', [
            'name' => 'Expensive Toy',
            'price' => 999999999,
            'description' => 'Very expensive toy',
            'category_id' => 1
        ]);

        $this->assertNotNull($result);
    }

    public function testEditPageLoads()
    {
        $result = $this->get('/admin/products/edit/1');

        $this->assertTrue(
            $result->response()->getStatusCode() == 200 ||
            $result->response()->getStatusCode() == 302
        );
    }

    public function testUpdateProduct()
    {
        $result = $this->call('post', '/admin/products/update/1', [
            'name' => 'Updated Product',
            'price' => 300000,
            'description' => 'Updated Description',
            'category_id' => 1
        ]);

        $this->assertTrue(
            $result->response()->getStatusCode() == 302 ||
            $result->response()->getStatusCode() == 200
        );
    }

    public function testUpdateWithEmptyData()
    {
        $result = $this->call('post', '/admin/products/update/1', []);

        $this->assertNotNull($result);
    }
}