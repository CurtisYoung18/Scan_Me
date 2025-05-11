<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTablesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'table_id' => [
                'type' => 'INT',
                'constraint' => 30,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'tableNumber' => [
                'type' => 'INT',
                'constraint' => 30,
            ],
            'createdAt' => [
                'type' => 'DATE',
            ],
        ]);
        $this->forge->addKey('table_id', TRUE);
        $this->forge->createTable('Tables');
    }

    public function down()
    {
        $this->forge->dropTable('Tables');
    }
}
