<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table = 'Role'; // Set to your actual table name
    protected $primaryKey = 'work_id';
    protected $allowedFields = ['user_id', 'name', 'position', 'startDate', 'endDate', 'summary'];
    protected $returnType = 'array';
    protected $useTimestamps = false; // Modify as needed
}
