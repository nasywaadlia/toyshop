<?php

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;
use Config\Database;

class HomePageTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    protected $db;

    protected function setUp(): void
{
    parent::setUp();

    $this->db = \Config\Database::connect();

    // categories
    $this->db->query("
        CREATE TABLE IF NOT EXISTS db_categories (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            created_at TEXT,
            updated_at TEXT
        )
    ");

    // products
    $this->db->query("
        CREATE TABLE IF NOT EXISTS db_products (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT,
            price INTEGER,
            description TEXT,
            image TEXT,
            category_id INTEGER,
            created_at TEXT,
            updated_at TEXT
        )
    ");

    // insert category
    $this->db->query("
        INSERT INTO db_categories (name)
        VALUES ('Action Figure')
    ");

    // insert product
    $this->db->query("
        INSERT INTO db_products
        (name, price, description, image, category_id)
        VALUES
        (
            'Toy Car',
            50000,
            'Hot Wheels',
            'toy.jpg',
            1
        )
    ");
}

    public function testHomePageLoads()
    {
        $result = $this->get('/');
        $result->assertStatus(200);
    }

    public function testHomeResponseOk()
    {
        $result = $this->get('/');
        $result->assertOK();
    }

    public function testHomeNot404()
    {
        $result = $this->get('/');
        $result->assertStatus(200);
    }
}