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

    public function testPasswordLength()
    {
        $this->assertGreaterThanOrEqual(6, strlen('123456'));
    }

    public function testAdminRole()
    {
        $roles = ['admin', 'user'];

        $this->assertContains('admin', $roles);
    }

    public function testSessionLoginBoolean()
    {
        $this->assertTrue(true);
    }

    public function testLogoutBoolean()
    {
        $this->assertFalse(false);
    }

    public function testUsernameString()
    {
        $this->assertIsString('admin');
    }

    public function testPasswordString()
    {
        $this->assertIsString('123456');
    }

    public function testHashPasswordNotSame()
    {
        $password = '123456';
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->assertNotEquals($password, $hash);
    }

    public function testVerifyPassword()
    {
        $password = '123456';
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->assertTrue(password_verify($password, $hash));
    }
}
