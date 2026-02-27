<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama' => 'Nasywa',
                'email' => 'nasywa@email.com',
                'no_hp' => '08123456789',
                'alamat' => 'Depok',
                'created_at' => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('customers')->insertBatch($data);
    }
}