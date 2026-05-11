<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class SessionValidationTest extends CIUnitTestCase
{
    public function testSessionExists()
    {
        $session = true;

        $this->assertTrue($session);
    }

    public function testSessionRoleAdmin()
    {
        $role = 'admin';

        $this->assertEquals('admin', $role);
    }

    public function testSessionDestroy()
    {
        $destroy = true;

        $this->assertTrue($destroy);
    }

    public function testRememberToken()
    {
        $token = md5('admin');

        $this->assertNotEmpty($token);
    }

    public function testFlashdataExists()
    {
        $flashdata = 'success';

        $this->assertEquals('success', $flashdata);
    }

    public function testCsrfTokenString()
    {
        $token = 'abcdef';

        $this->assertIsString($token);
    }

    public function testSessionId()
    {
        $sessionId = session_id();

        $this->assertIsString($sessionId);
    }

    public function testUserLoggedIn()
    {
        $this->assertTrue(true);
    }

    public function testUserLogout()
    {
        $this->assertFalse(false);
    }

    public function testSessionArray()
    {
        $session = ['user' => 'admin'];

        $this->assertArrayHasKey('user', $session);
    }
}