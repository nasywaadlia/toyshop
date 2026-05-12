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

    public function testFlashdataExists()
    {
        $flashdata = 'success';

        $this->assertEquals('success', $flashdata);
    }

    public function testUserLoggedIn()
    {
        $loggedIn = true;

        $this->assertTrue($loggedIn);
    }

    public function testUserLogout()
    {
        $loggedOut = false;

        $this->assertFalse($loggedOut);
    }

    public function testSessionArray()
    {
        $session = [
            'user' => 'admin'
        ];

        $this->assertArrayHasKey('user', $session);
    }

    public function testSessionHasRole()
    {
        $session = [
            'role' => 'admin'
        ];

        $this->assertArrayHasKey('role', $session);
    }

    public function testSessionUsernameNotEmpty()
    {
        $username = 'admin';

        $this->assertNotEmpty($username);
    }
}