<?php

namespace Tests\Feature;

require_once __DIR__ . '/../Support/FeatureTestCase.php';

use Tests\Support\FeatureTestCase;

class ProductFeatureTest extends FeatureTestCase
{
    public function testLoginPageLoads()
    {
        $result = $this->get('/login');

        $result->assertStatus(200);
    }

    public function testCheckoutPageLoads()
    {
        $result = $this->get('/checkout');

        $result->assertStatus(200);
    }

    public function testLoginPost()
    {
        $result = $this->post('/login/process', [
            'username' => 'admin',
            'password' => '1234'
        ]);

        $result->assertStatus(302);
    }
}