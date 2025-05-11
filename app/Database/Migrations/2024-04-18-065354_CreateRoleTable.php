<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRoleTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'role_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'startDate' => [
                'type' => 'DATE',
            ],
            'endDate' => [
                'type' => 'DATE',
            ],
            'summary' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('role_id', TRUE);
        $this->forge->addForeignKey('user_id', 'User', 'user_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('Role');
    }

    public function down()
    {
        $this->forge->dropTable('Role');
    }
}