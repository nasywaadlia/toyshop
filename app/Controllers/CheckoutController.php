<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\OrderDetailModel;

class CheckoutController extends BaseController
{
    public function index()
    {
        // tampilkan form checkout
        return view('home/checkout');
    }

    public function process()
    {
        $customerModel     = new CustomerModel();
        $orderModel        = new OrderModel();
        $orderDetailModel  = new OrderDetailModel();

        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->to('/cart');
        }

        // ==========================
        // 1️⃣ Simpan data customer
        // ==========================
        $customerId = $customerModel->insert([
            'nama'   => $this->request->getPost('nama'),
            'email'  => $this->request->getPost('email'),
            'no_hp'  => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ]);

        // ==========================
        // 2️⃣ Hitung total belanja
        // ==========================
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        // ==========================
        // 3️⃣ Simpan order
        // ==========================
        $orderId = $orderModel->insert([
            'customer_id' => $customerId,
            'total'       => $total,
        ]);

        // ==========================
        // 4️⃣ Simpan order details
        // ==========================
        foreach ($cart as $productId => $item) {
    $orderDetailModel->insert([
        'order_id'   => $orderId,
        'product_id' => $productId, // ✅ ambil dari key
        'qty'        => $item['qty'],
        'price'      => $item['price'],
    ]);
}

        // ==========================
        // 5️⃣ Kosongkan cart
        // ==========================
        session()->remove('cart');

        return redirect()->to('/')->with('success', 'Pesanan berhasil dibuat!');
    }
}