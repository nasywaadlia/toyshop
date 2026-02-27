<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderDetailsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'order_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'product_id' => [
                'type'     => 'INT',
                'unsigned' => true,
            ],
            'qty' => [
                'type' => 'INT',
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '12,2',
            ],
        ]);

        $this->forge->addKey('id', true);

        // foreign key ke orders
        $this->forge->addForeignKey(
            'order_id',
            'orders',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('order_details');
    }

    public function down()
    {
        $this->forge->dropTable('order_details');
    }
}