<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;
use App\Models\CategoryModel;

class HomeController extends BaseController
{
    protected $product;
    protected $category;


    public function __construct()
    {
        $this->product = new Product();
        $this->category = new CategoryModel();
    }

    public function index()
    {
        $categoryId = $this->request->getGet('category_id');
        $builder = $this->product
        ->select('products.*, categories.name as category_name')
        ->join('categories', 'categories.id = products.category_id', 'left');

    if ($categoryId) {
        $builder->where('products.category_id', $categoryId);
    }

    $data['products'] = $builder->findAll();
    $data['categories'] = $this->category->findAll();

    return view('home/index', $data);
}
}