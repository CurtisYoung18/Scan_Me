<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderTable extends Migration
{
    public function up()
{
    $this->forge->addField([
        'order_id' => [
            'type' => 'INT',
            'constraint' => 5,
            'unsigned' => true,
            'auto_increment' => true
        ],
        'table_id' => [
            'type' => 'INT',
            'constraint' => 30,
            'unsigned' => TRUE,
        ],
        'tableNumber' => [
            'type' => 'INT',
            'constraint' => 30,
        ],
        'createdAt' => [
            'type' => 'DATETIME',
        ]
    ]);
    
    $this->forge->addKey('order_id', TRUE); // Set primary key
    $this->forge->addForeignKey('table_id', 'Tables', 'table_id'); // Set foreign key
    $this->forge->createTable('Order');
}

    public function down()
    {
        $this->forge->dropTable('Order');
    }
}