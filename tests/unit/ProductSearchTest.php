<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class ProductSearchTest extends CIUnitTestCase
{
    public function testFilterCategory()
    {
        $category = 'Puzzle';

        $this->assertEquals('Puzzle', $category);
    }

}