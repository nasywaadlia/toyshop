<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Product;

class CartController extends BaseController
{
    public function add()
    {
        $session = session();
        $productModel = new Product();

        $id = $this->request->getPost('id');
        $product = $productModel->find($id);

        $cart = $session->get('cart') ?? [];

        if (isset($cart[$id])) {
            $cart[$id]['qty'] += 1;
        } else {
            $cart[$id] = [
                'name'  => $product['name'],
                'price' => $product['price'],
                'image' => $product['image'],
                'qty'   => 1
            ];
        }

        $session->set('cart', $cart);

        return redirect()->to('/');
    }

    public function index()
    {
        $data['cart'] = session()->get('cart') ?? [];
        return view('home/cart', $data);
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        unset($cart[$id]);
        session()->set('cart', $cart);

        return redirect()->to('/cart');
    }
}