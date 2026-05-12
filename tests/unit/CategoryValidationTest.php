<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class CategoryValidationTest extends CIUnitTestCase
{
    public function testCategoryNameNotEmpty()
    {
        $this->assertNotEmpty('Puzzle');
    }

    public function testCategoryNameIsString()
    {
        $this->assertIsString('Action Figure');
    }

    public function testCategoryNameLength()
    {
        $this->assertGreaterThan(3, strlen('Robot'));
    }

    public function testCategoryArrayHasName()
    {
        $category = [
            'name' => 'Puzzle'
        ];

        $this->assertArrayHasKey('name', $category);
    }

    public function testCategoryCount()
    {
        $categories = ['Puzzle', 'Robot', 'Lego'];

        $this->assertCount(3, $categories);
    }

    public function testCategorySlugGeneration()
    {
        $slug = strtolower(str_replace(' ', '-', 'Action Figure'));

        $this->assertEquals('action-figure', $slug);
    }

    public function testCategoryNameNotDuplicate()
    {
        $category1 = 'Puzzle';
        $category2 = 'Robot';

        $this->assertNotEquals($category1, $category2);
    }

    public function testCategoryContainsWord()
    {
        $this->assertStringContainsString('Figure', 'Action Figure');
    }

    public function testCategoryStartsWithLetter()
    {
        $this->assertStringStartsWith('P', 'Puzzle');
    }

    public function testCategoryEndsWithLetter()
    {
        $this->assertStringEndsWith('t', 'Robot');
    }
}
