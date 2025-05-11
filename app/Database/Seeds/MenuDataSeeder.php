<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MenuDataSeeder extends Seeder
{
    public function run()
    {
        $menu_data = [
            [
                'name' => 'Grilled Salmon with Lemon Butter Sauce',
                'category' => 'Main Course',
                'summary' => 'Freshly grilled salmon served with a tangy lemon butter sauce. Perfect for seafood lovers.',
                'price' => '25',
                'image' => 'https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fEdyaWxsZWQlMjBTYWxtb24lMjB3aXRoJTIwTGVtb24lMjBCdXR0ZXIlMjBTYXVjZXxlbnwwfDB8MHx8fDA%3D',

            ],
            [
                'name' => 'hocolate Lava Cake',
                'category' => 'Dessert',
                'summary' => 'Warm, rich chocolate cake with a molten chocolate center. A sweet ending to your meal.',
                'price' => '10',
                'image' => 'https://images.unsplash.com/photo-1588195542907-a0c0a2ac3312?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjh8fENob2NvbGF0ZSUyMExhdmElMjBDYWt8ZW58MHwwfDB8fHww',

            ],
            [
                'name' => 'Chicken Alfredo',
                'category' => 'Main Course',
                'summary' => 'Creamy and rich pasta with grilled chicken.',
                'price' => '12.99',
                'image' => 'https://images.unsplash.com/photo-1607116667981-ff148a14e975?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8Q2hpY2tlbiUyMHBhc3RhfGVufDB8MXwwfHx8MA%3D%3D',

            ],
            [
                'name' => 'Beef Taco',
                'category' => 'Main Course',
                'summary' => 'A delicious beef taco with all the fixings.',
                'price' => '8.99',
                'image' => 'https://images.unsplash.com/photo-1702119614572-b9f0b45b10a2?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGJlZWYlMjB0YWNvfGVufDB8fDB8fHww',

            ],
            [
                'name' => 'Vegetable Stir Fry',
                'category' => 'Main Course',
                'summary' => 'Fresh vegetables stir fried to perfection.',
                'price' => '9.99',
                'image' => 'https://www.onceuponachef.com/images/2017/02/Asian-Vegetable-Stir-Fry-3.jpg',

            ],
            [
                'name' => 'Bruschetta',
                'category' => 'Appetizer',
                'summary' => 'Toasted bread topped with fresh tomatoes, garlic, and basil. Drizzled with balsamic glaze.',
                'price' => '6.99',
                'image' => 'https://www.lifeasastrawberry.com/wp-content/uploads/2012/11/warm-bruschetta-1.jpg',

            ],
            [
                'name' => 'Shrimp Cocktail',
                'category' => 'Appetizer',
                'summary' => 'Chilled shrimp served with cocktail sauce and lemon wedges.',
                'price' => '8.99',
                'image' => 'https://www.thespruceeats.com/thmb/crW4qABMY_0571XWaiSFEsPOo3o=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/SES-shrimp-cocktail-8411108-hero-02-a25b049c4e014d5e9e7bcedcc63692d2.jpg',

            ],
            [
                'name' => 'Chef steak',
                'category' => 'Main Course',
                'summary' => 'A juicy steak cooked to perfection by our chef.',
                'price' => '19.99',
                'image' => 'https://loveincorporated.blob.core.windows.net/contentimages/main/ffc826a3-6f92-441d-91d7-999a9364cc02-chefs-tips-for-cooking-steak.jpg',

            ]
        ];

        $menuIds = [];

        foreach ($menu_data as $menu) {
            $this->db->table('Menu')->insert($menu);
            $menuIds[] = $this->db->insertID();
        }
            
    }
}

