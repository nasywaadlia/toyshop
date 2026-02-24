<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProducts extends Migration
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
        'name' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
        ],
        'price' => [
            'type' => 'INT',
        ],
        'description' => [
            'type' => 'TEXT',
            'null' => true,
        ],
        'image' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
            'null' => true,
        ],
        'created_at DATETIME default current_timestamp',
        'updated_at DATETIME default current_timestamp on update current_timestamp'
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('products');
}

    public function down()
    {
        //
    }
}
