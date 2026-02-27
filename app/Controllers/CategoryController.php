<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    protected $category;

    public function __construct()
    {
        $this->category = new CategoryModel();
        helper(['form']);
    }

     public function index()
    {
        $data['categories'] = $this->category->findAll();
        return view('categories/index', $data);
    }

    public function create()
    {
        return view('categories/create');
    }

    public function store()
    {
        $this->category->save([
            'name' => $this->request->getPost('name')
        ]);

        return redirect()->to('/admin/categories');
    }
    public function edit($id)
    {
        $data['category'] = $this->category->find($id);
        return view('categories/edit', $data);
    }

    public function update($id)
    {
        $this->category->update($id, [
            'name' => $this->request->getPost('name')
        ]);

        return redirect()->to('/admin/categories');
    }

    public function delete($id)
    {
        $this->category->delete($id);
        return redirect()->to('/admin/categories');
    }
}