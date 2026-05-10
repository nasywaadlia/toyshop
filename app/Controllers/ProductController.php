<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;
use App\Models\CategoryModel;

class ProductController extends BaseController
{
    protected $product;
    protected $category;

    public function __construct()
    {
        $this->product = new Product();
        $this->category = new CategoryModel();        helper(['form']);
    }

    private function checkLogin()
{
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }
}

    public function index()
    {
        $data['products'] = $this->product
        ->select('products.*, categories.name as category_name')
        ->join('categories', 'categories.id = products.category_id', 'left')            ->findAll();

        $data['categories'] = $this->category->findAll();
        return view('products/index', $data);
    }

    public function create()
    {
        $data['categories'] = $this->category->findAll();
        return view('products/create', $data);
    }

    public function store()
{
    $file = $this->request->getFile('image');

    $imageName = null;

    if ($file && $file->isValid()) {

        $imageName = $file->getRandomName();

        $file->move(
            FCPATH . 'image',
            $imageName
        );
    }

    $this->product->save([
        'name' => $this->request->getPost('name'),
        'price' => $this->request->getPost('price'),
        'description' => $this->request->getPost('description'),
        'category_id' => $this->request->getPost('category_id'),
        'image' => $imageName
    ]);

    return redirect()->to('/admin/products');
}
    public function edit($id)
{
    $data['product'] = $this->product->find($id);
    $data['categories'] = $this->category->findAll();
    return view('products/edit', $data);
}

public function update($id)
{
    $product = $this->product->find($id);

    $file = $this->request->getFile('image');
    $imageName = $product['image'];

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $imageName = $file->getRandomName();
        $file->move('image', $imageName);
    }

    $this->product->update($id, [
        'name' => $this->request->getPost('name'),
        'price' => $this->request->getPost('price'),
        'description' => $this->request->getPost('description'),
        'category_id' => $this->request->getPost('category_id'),
        'image' => $imageName
    ]);

    return redirect()->to('/admin/products');
}

public function delete($id)
{
    $product = $this->product->find($id);

    if ($product['image']) {
        unlink('image/' . $product['image']);
    }

    $this->product->delete($id);

    return redirect()->to('/admin/products');
}
}