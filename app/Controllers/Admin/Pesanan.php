<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Barang extends BaseController
{
    use ResponseTrait;
    protected $barang;
    public function __construct()
    {
        $this->barang = new \App\Models\BarangModel();
    }
    public function index()
    {
        return view('admin/barang');
    }
    public function read()
    {
        return $this->respond($this->barang->findAll());
    }

    public function post()
    {
        try {
            if ($this->barang->insert($this->request->getJSON())) {
                return $this->respondCreated($this->barang->getInsertID());
            }
            throw new \Exception("Gagal menyimpan", 1);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function put()
    {
        //
    }
    public function deleted()
    {
        //
    }
}
