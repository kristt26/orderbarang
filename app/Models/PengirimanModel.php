<?php

namespace App\Models;

use CodeIgniter\Model;

class PengirimanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pengiriman';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode', 'pesanan_id', 'penerima', 'tanggal_kirim'];
}
