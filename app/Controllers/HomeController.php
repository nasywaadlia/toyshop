<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;

class HomeController extends BaseController
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $data['products'] = $this->product->findAll();
        return view('home/index', $data); // view customer
    }
}