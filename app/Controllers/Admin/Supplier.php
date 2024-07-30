<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Supplier extends BaseController
{
    use ResponseTrait;
    protected $supplier;
    public function __construct()
    {
        $this->supplier = new \App\Models\SupplierModel();
    }
    public function index()
    {
        return view('admin/supplier');
    }
    public function read()
    {
        return $this->respond($this->supplier->findAll());
    }

    public function post()
    {
        try {
            $param = $this->request->getJSON();
            if ($this->supplier->insert($param)) {
                $param->id = $this->supplier->getInsertID();
                return $this->respondCreated($param);
            }
            throw new \Exception("Gagal menyimpan", 1);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function put()
    {
        try {
            $param = $this->request->getJSON();
            if ($this->supplier->update($param->id, $param)) {
                return $this->respondCreated(true);
            }
            throw new \Exception("Gagal menyimpan", 1);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function deleted($id=null)
    {
        $this->supplier->delete($id);
        return $this->respond(true);
    }
}
