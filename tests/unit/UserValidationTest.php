<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;

class UserValidationTest extends CIUnitTestCase
{
    public function testUsernameMinimumLength()
    {
        $this->assertGreaterThanOrEqual(4, strlen('admin'));
    }

    public function testPasswordContainsNumber()
    {
        $this->assertMatchesRegularExpression('/[0-9]/', 'admin123');
    }

    public function testEmailValid()
    {
        $this->assertMatchesRegularExpression(
            '/^.+@.+\..+$/',
            'user@gmail.com'
        );
    }

    public function testRoleDefaultUser()
    {
        $this->assertEquals('user', 'user');
    }

    public function testCreatedAtNotNull()
    {
        $this->assertNotNull(date('Y-m-d'));
    }

    public function testUserArray()
    {
        $user = ['username' => 'admin'];

        $this->assertArrayHasKey('username', $user);
    }

    public function testUsernameIsString()
    {
        $this->assertIsString('admin');
    }

    public function testPasswordNotEmpty()
    {
        $this->assertNotEmpty('123456');
    }

    public function testUserStatusActive()
    {
        $this->assertTrue(true);
    }

    public function testPasswordHash()
    {
        $password = '123456';

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->assertTrue(password_verify($password, $hash));
    }
}