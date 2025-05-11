<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'tableNumber' => 1,
                'createdAt' => '2024-04-30',
            ],
            [
                'tableNumber' => 2,
                'createdAt' => '2024-04-30',
            ],
            [
                'tableNumber' => 3,
                'createdAt' => '2024-04-30',
            ],
            [
                'tableNumber' => 4,
                'createdAt' => '2024-04-30',
            ],
            [
                'tableNumber' => 5,
                'createdAt' => '2024-04-30',
            ],
        ];

        // Using Query Builder
        $this->db->table('Tables')->insertBatch($data);
    }
}