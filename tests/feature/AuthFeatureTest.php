<?php

namespace Tests\Feature;

require_once __DIR__ . '/../Support/FeatureTestCase.php';

use Tests\Support\FeatureTestCase;

class AuthFeatureTest extends FeatureTestCase
{
    public function testLoginPageLoads()
    {
        $result = $this->get('/login');

        $result->assertStatus(200);
    }

    public function testLogoutRouteLoads()
    {
        $result = $this->get('/logout');

        $result->assertStatus(302);
    }

    public function testLoginProcess()
    {
        $result = $this->post('/login/process', [
            'username' => 'admin',
            'password' => '1234'
        ]);

        $result->assertStatus(302);
    }

    public function testLoginWithWrongPassword()
    {
        $result = $this->post('/login/process', [
            'username' => 'admin',
            'password' => 'salah'
        ]);

        $result->assertStatus(302);
    }

    public function testLoginWithEmptyData()
    {
        $result = $this->post('/login/process', [
            'username' => '',
            'password' => ''
        ]);

        $result->assertStatus(302);
    }

    public function testAdminPageRedirectWithoutSession()
    {
        $result = $this->get('/admin/products');

        $result->assertStatus(302);
    }
}