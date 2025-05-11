<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuTable extends Migration
{
    public function up()
    {
        // Define the User table
        $this->forge->addField([
            'menu_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'summary' => [
                'type' => 'TEXT',
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => '20',
            ], 
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
        
        $this->forge->addKey('menu_id', TRUE);
        $this->forge->createTable('Menu');
    }

    public function down()
    {
        $this->forge->dropTable('Menu');
    }
}
