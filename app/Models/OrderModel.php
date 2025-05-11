<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'Order';
    protected $primaryKey = 'order_id';
    protected $allowedFields = ['table_id', 'tableNumber', 'createdAt', 'order_status'];
    protected $returnType = 'array';

    public function getOrderById($orderId)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('Order');
        $builder->where('order_id', $orderId);
        $query = $builder->get();
        return $query->getRowArray();
    }
}