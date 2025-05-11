<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'Menu';
    protected $primaryKey = 'menu_id';
    protected $allowedFields = ['name', 'category', 'summary', 'price', 'image'];
    protected $returnType = 'array';
}