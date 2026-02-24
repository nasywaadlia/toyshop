<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;

class ProductController extends BaseController
{
    protected $product;

    public function __construct()
    {
        $this->product = new Product();
        helper(['form']);
    }

    private function checkLogin()
{
    if (!session()->get('logged_in')) {
        return redirect()->to('/login');
    }
}

    public function index()
    {
        $data['products'] = $this->product->findAll();
        return view('products/index', $data);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $file = $this->request->getFile('image');

        $imageName = null;
        if ($file && $file->isValid()) {
            $imageName = $file->getRandomName();
            $file->move('image', $imageName);
        }

        $this->product->save([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'description' => $this->request->getPost('description'),
            'image' => $imageName
        ]);

        return redirect()->to('/admin/products');
    }
    public function edit($id)
{
    $data['product'] = $this->product->find($id);
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
