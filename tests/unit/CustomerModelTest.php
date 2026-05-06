<?php

namespace Tests\Unit;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\CustomerModel;
use Config\Database;

class CustomerModelTest extends CIUnitTestCase
{
    protected $db;

    protected function setUp(): void
    {
        parent::setUp();

        // connect ke database test (sqlite)
        $this->db = Database::connect();

        // bikin tabel manual (dan gak akan kehapus lagi)
        $this->db->query("
            CREATE TABLE customers (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                nama TEXT,
                email TEXT,
                no_hp TEXT,
                alamat TEXT,
                created_at TEXT,
                updated_at TEXT,
                deleted_at TEXT
            )
        ");
    }

    public function testInsertCustomer()
    {
        $model = new CustomerModel();

        $data = [
            'nama'   => 'Saskia',
            'email'  => 'saskia@mail.com',
            'no_hp'  => '08123456789',
            'alamat' => 'Jakarta',
        ];

        $insertId = $model->insert($data);

        $this->assertIsNumeric($insertId);

        $result = $this->db->table('customers')
                           ->where('email', 'saskia@mail.com')
                           ->get()
                           ->getRow();

        $this->assertNotNull($result);
    }
}