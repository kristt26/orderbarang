<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detail';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pesanan_id', 'barang_id', 'qty'];
}
