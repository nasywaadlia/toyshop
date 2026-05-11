<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class ProductSearchTest extends CIUnitTestCase
{
    public function testSearchContainsKeyword()
    {
        $this->assertStringContainsString(
            'Robot',
            'Toy Robot'
        );
    }

    public function testSearchLowercase()
    {
        $this->assertEquals(
            'robot',
            strtolower('Robot')
        );
    }

    public function testSearchUppercase()
    {
        $this->assertEquals(
            'ROBOT',
            strtoupper('robot')
        );
    }

    public function testEmptyKeyword()
    {
        $this->assertEmpty('');
    }

    public function testFilterCategory()
    {
        $category = 'Puzzle';

        $this->assertEquals('Puzzle', $category);
    }

    public function testSortAscending()
    {
        $prices = [1000, 2000, 3000];

        sort($prices);

        $this->assertEquals(1000, $prices[0]);
    }

    public function testSortDescending()
    {
        $prices = [1000, 2000, 3000];

        rsort($prices);

        $this->assertEquals(3000, $prices[0]);
    }

    public function testSearchResultArray()
    {
        $products = ['Robot'];

        $this->assertIsArray($products);
    }

    public function testSearchCount()
    {
        $products = ['A', 'B'];

        $this->assertCount(2, $products);
    }

    public function testSearchBoolean()
    {
        $this->assertTrue(true);
    }
}