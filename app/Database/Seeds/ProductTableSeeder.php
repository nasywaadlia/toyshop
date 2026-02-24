<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Jellycat Bashful Bunny',
                'price' => 425000,
                'description' => 'Boneka kelinci super lembut dan premium, cocok untuk koleksi atau hadiah',
                'image' => 'jellycat.jpg',
            ],
            [
                'name' => 'Sonny Angel Animal Series',
                'price' => 185000,
                'description' => 'Mini figure lucu dengan berbagai karakter hewan, dijual dalam blind box',
                'image' => 'sonnyangel.jpg',
            ],
            [
                'name' => 'Labubu The Monsters',
                'price' => 350000,
                'description' => 'Figure koleksi karakter Labubu dengan desain unik dan detail tinggi',
                'image' => 'labubu.jpg',
            ],
            [
                'name' => 'Hacipupu Fairy Series',
                'price' => 299000,
                'description' => 'Blind box karakter Hacipupu tema peri dengan desain imut dan aesthetic',
                'image' => 'hacipupu.jpg',
            ],
        ];

        // Insert multiple data
        $this->db->table('products')->insertBatch($data);
    }
}