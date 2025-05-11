<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderItemTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'order_item_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'order_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
        ]);
        
        $this->forge->addKey('order_item_id', TRUE); // Set primary key
        $this->forge->addForeignKey('order_id', 'Order', 'order_id'); // Set foreign key
        $this->forge->addForeignKey('menu_id', 'Menu', 'menu_id'); // Set foreign key
        $this->forge->createTable('OrderItem');
    }

    public function down()
    {
        $this->forge->dropTable('OrderItem');
    }
}
