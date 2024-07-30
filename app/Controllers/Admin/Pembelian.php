<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Pembelian extends BaseController
{
    use ResponseTrait;
    protected $pembelian;
    protected $supplier;
    protected $barang;
    public function __construct()
    {
        $this->supplier = new \App\Models\SupplierModel();
        $this->pembelian = new \App\Models\PembelianModel();
        $this->barang = new \App\Models\BarangModel();
    }
    public function index()
    {
        return view('admin/pembelian');
    }
    public function read()
    {
        $data['supplier'] = $this->supplier->findAll();
        $data['pembelian'] = $this->pembelian->select("pembelian.*, barang.nama, suplier.nama_supplier")
        ->join('suplier', 'suplier.id=pembelian.supplier_id', 'left')
        ->join('barang', 'barang.id=pembelian.barang_id', 'left')->findAll();
        $data['barang'] = $this->barang->findAll();
        return $this->respond($data);
    }

    public function post()
    {
        try {
            $param = $this->request->getJSON();
            if ($this->pembelian->insert($param)) {
                $param->id = $this->supplier->getInsertID();
                $barang = $this->barang->where('id', $param->barang_id)->first();
                $this->barang->update($barang['id'], ['stok'=>($barang['stok']+$param->jumlah)]);
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
