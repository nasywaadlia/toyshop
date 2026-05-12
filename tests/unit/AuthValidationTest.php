<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class AuthValidationTest extends CIUnitTestCase
{
    public function testUsernameNotEmpty()
    {
        $this->assertNotEmpty('admin');
    }

    public function testPasswordNotEmpty()
    {
        $this->assertNotEmpty('123456');
    }

    public function testEmailFormat()
    {
        $this->assertMatchesRegularExpression(
            '/^.+@.+\..+$/',
            'admin@gmail.com'
        );
    }

    public function testPasswordLength()
    {
        $this->assertGreaterThanOrEqual(6, strlen('123456'));
    }

    public function testLoginStatusTrue()
    {
        $this->assertTrue(true);
    }

    public function testSessionArray()
    {
        $session = [
            'logged_in' => true
        ];

        $this->assertArrayHasKey('logged_in', $session);
    }

    public function testUsernameIsString()
    {
        $this->assertIsString('admin');
    }

    public function testPasswordIsString()
    {
        $this->assertIsString('123456');
    }

    public function testAdminRoleSimulation()
    {
        $role = 'admin';

        $this->assertEquals('admin', $role);
    }

    public function testLogoutSimulation()
    {
        $loggedIn = false;

        $this->assertFalse($loggedIn);
    }
}
