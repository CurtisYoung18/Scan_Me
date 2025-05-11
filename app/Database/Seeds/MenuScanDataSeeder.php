<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuScanDataSeeder extends Seeder
{
    public function run()
    {
        // Insert sample data into the User table for multiple users
        $user_data = [
            [
                'name' => 'Leanne Graham',
                'email' => '123456@example.com',
                'phone' => '123-456-2232',
                'summary' => 'Experienced Staff Accountant...',
            ],
            [
                'name' => 'John Doe',
                'email' => '654321@example.com',
                'phone' => '321-456-2311',
                'summary' => 'New Graduate with a degree in Marketing...'
            ],
            [
                'name' => 'Katie Smith',
                'email' => '12341213@example.com',
                'phone' => '123-546-0000',
                'summary' => 'Senior Marketing Manager with 10+ years of experience...'
            ]
            // Add more users as needed
        ];

        $userIds = [];

        foreach ($user_data as $user) {
            $this->db->table('User')->insert($user);
            $userIds[] = $this->db->insertID();
        }

        foreach ($userIds as $userId) {
            // Insert sample data into the Address table for each user
            $this->db->table('Address')->insert([
                'user_id' => $userId,
                'address' => "User $userId Address",
                'postalCode' => '00000',
                'city' => "City $userId",
                'countryCode' => 'AU',
                'state' => "QLD"
            ]);

            // Insert 2 sample records into the Role table for each user
            $role_data = [
                [
                    'user_id' => $userId,
                    'name' => "Company $userId",
                    'position' => "Position $userId",
                    'startDate' => '2024-04-18',
                    'endDate' => '2024-05-29',
                    'summary' => "Worked as Position $userId at Company $userId"
                ],
                [
                    'user_id' => $userId,
                    'name' => "Previous Company $userId",
                    'position' => "Previous Position $userId",
                    'startDate' => '2018-01-01',
                    'endDate' => '2019-12-31',
                    'summary' => "Worked as Previous Position $userId at Previous Company $userId"
                ]
            ];
            $this->db->table('Role')->insertBatch($role_data);
        }
    }
}