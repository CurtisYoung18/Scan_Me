<?php

namespace App\Models;

use CodeIgniter\Model;

class TablesModel extends Model
{
    protected $table = 'Tables';
    protected $primaryKey = 'table_id';
    protected $allowedFields = ['table_id', 'tableNumber', 'createdAt'];
    protected $returnType = 'array';
    protected $useTimestamps = false;
}