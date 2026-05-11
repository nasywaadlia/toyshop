<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class OrderDetailSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'order_id'   => 1,
                'product_id' => 1,
                'qty'        => 2,
                'price'      => 75000.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'order_id'   => 2,
                'product_id' => 2,
                'qty'        => 1,
                'price'      => 50000.00,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ];

        $this->db->table('order_details')->insertBatch($data);
    }
}