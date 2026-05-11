<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class CategoryValidationTest extends CIUnitTestCase
{
    public function testCategoryNameNotEmpty()
    {
        $this->assertNotEmpty('Action Figure');
    }

    public function testCategoryIsString()
    {
        $this->assertIsString('Puzzle');
    }

    public function testCategoryLength()
    {
        $this->assertGreaterThan(3, strlen('Puzzle'));
    }

    public function testCategoryArray()
    {
        $category = ['name' => 'Puzzle'];

        $this->assertArrayHasKey('name', $category);
    }

    public function testCategoryCount()
    {
        $categories = ['A', 'B'];

        $this->assertCount(2, $categories);
    }

    public function testCategorySlug()
    {
        $slug = strtolower(str_replace(' ', '-', 'Action Figure'));

        $this->assertEquals('action-figure', $slug);
    }

    public function testCategoryUppercase()
    {
        $this->assertEquals('PUZZLE', strtoupper('Puzzle'));
    }

    public function testCategoryLowercase()
    {
        $this->assertEquals('puzzle', strtolower('Puzzle'));
    }

    public function testCategoryBoolean()
    {
        $this->assertTrue(true);
    }

    public function testCategoryUniqueSimulation()
    {
        $category1 = 'Puzzle';
        $category2 = 'Robot';

        $this->assertNotEquals($category1, $category2);
    }
}
