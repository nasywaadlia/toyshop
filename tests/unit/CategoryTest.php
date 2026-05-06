<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class CategoryTest extends CIUnitTestCase
{
    public function testCategoryNotEmpty()
    {
        $categories = [
            ['id' => 1, 'name' => 'Boneka'],
            ['id' => 2, 'name' => 'Mobil'],
        ];

        $this->assertNotEmpty($categories);
    }

    public function testCategoryHasName()
    {
        $category = [
            'id' => 1,
            'name' => 'Boneka'
        ];

        $this->assertArrayHasKey('name', $category);
    }
}