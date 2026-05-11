<?php

namespace Tests\Feature;

require_once __DIR__ . '/../Support/FeatureTestCase.php';

use Tests\Support\FeatureTestCase;

class CheckoutFeatureTest extends FeatureTestCase
{
    public function testCheckoutPageLoads()
    {
        $result = $this->get('/checkout');

        $result->assertStatus(200);
    }

    public function testCartPageLoads()
    {
        $result = $this->get('/cart');

        $result->assertStatus(200);
    }

    public function testCheckoutProcess()
    {
        $result = $this->post('/checkout/process', [
            'nama'   => 'Saskia',
            'email'  => 'saskia@mail.com',
            'no_hp'  => '08123456789',
            'alamat' => 'Bandung'
        ]);

        $result->assertStatus(302);
    }

    public function testCheckoutEmptyData()
    {
        $result = $this->post('/checkout/process', [
            'nama'   => '',
            'email'  => '',
            'no_hp'  => '',
            'alamat' => ''
        ]);

        $result->assertStatus(302);
    }

    public function testCheckoutInvalidEmail()
    {
        $result = $this->post('/checkout/process', [
            'nama'   => 'Saskia',
            'email'  => 'email-salah',
            'no_hp'  => '08123456789',
            'alamat' => 'Bandung'
        ]);

        $result->assertStatus(302);
    }
}