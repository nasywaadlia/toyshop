<?php

namespace Tests\Feature;

use CodeIgniter\Test\CIUnitTestCase;
use Config\Services;

class CheckoutTest extends CIUnitTestCase
{
    public function testCheckoutPageLoads()
    {
        $request = Services::request();

        $this->assertNotNull($request);
    }

    public function testCartSessionExists()
    {
        session()->set('cart', [
            1 => [
                'price' => 10000,
                'qty'   => 2
            ]
        ]);

        $cart = session()->get('cart');

        $this->assertNotEmpty($cart);
    }

    public function testCheckoutData()
    {
        $data = [
            'nama'   => 'Saskia',
            'email'  => 'saskia@mail.com',
            'no_hp'  => '08123',
            'alamat' => 'Jakarta'
        ];

        $this->assertArrayHasKey('nama', $data);
        $this->assertEquals('Saskia', $data['nama']);
    }
}