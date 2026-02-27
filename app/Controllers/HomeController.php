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
        $data['products'] = $this->product
        ->select('products.*, categories.name as category_name')
        ->join('categories', 'categories.id = products.category_id', 'left')
        ->findAll();
        return view('home/index', $data); // view customer
    }
}