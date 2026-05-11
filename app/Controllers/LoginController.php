<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }

    public function process()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        if ($username === 'admin' && $password === '1234') {

            session()->set('logged_in', true);

            return redirect()->to('/admin/products');
        }

        session()->setFlashdata(
            'error',
            'Username atau password salah'
        );

        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/');
    }
}