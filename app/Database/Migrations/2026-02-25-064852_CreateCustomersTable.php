<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomersTable extends Migration
{
   public function up()
{
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            'auto_increment' => true,
        ],
        'nama' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
        ],
        'email' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
        ],
        'no_hp' => [
            'type' => 'VARCHAR',
            'constraint' => '20',
        ],
        'alamat' => [
            'type' => 'TEXT',
        ],
     'created_at' => [
    'type'    => 'DATETIME',
    'null'    => false,
    'default' => 'CURRENT_TIMESTAMP',
],
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('customers');
}

    public function down()
{
    $this->forge->dropTable('customers');
}
}
