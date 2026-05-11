<?php

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Database;

class ProductFeatureTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected function setUp(): void
    {
        parent::setUp();

        $db = Database::connect();

        $db->query("
            CREATE TABLE IF NOT EXISTS db_products (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT,
                price INTEGER,
                description TEXT,
                image TEXT,
                category_id INTEGER
            )
        ");

        $db->query("
            INSERT INTO db_products
            (name, price, description, image, category_id)
            VALUES
            ('Toy', 10000, 'Desc', 'toy.jpg', 1)
        ");
    }

    public function testProductsPageLoads()
    {
        $this->get('/')->assertStatus(200);
    }

    public function testProductResponseOk()
    {
        $this->get('/')->assertOK();
    }

    public function testProductPageNot404()
    {
        $this->get('/')->assertStatus(200);
    }

    public function testProductRouteAccessible()
    {
        $this->get('/')->assertOK();
    }

    public function testProductViewLoads()
    {
        $this->get('/')->assertStatus(200);
    }
}