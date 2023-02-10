<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\Exceptions\DatabaseException;
use CodeIgniter\Database\Exceptions\DataException;

class Pesanan extends BaseController
{
    use ResponseTrait;
    protected $barang;
    protected $pesanan;
    protected $detail;
    protected $pengiriman;
    protected $db;
    public function __construct()
    {
        $this->barang = new \App\Models\BarangModel();
        $this->pesanan = new \App\Models\PesananModel();
        $this->detail = new \App\Models\DetailModel();
        $this->pengiriman = new \App\Models\PengirimanModel();
        $this->db = \Config\Database::connect();
        
    }

    public function index()
    {
        return view('admin/pesanan');
    }
    public function read()
    {
        $pesanan = $this->pesanan->asObject()
        ->select('customer.nama_toko, customer.pemilik, pesanan.*')
        ->join('customer', 'customer.id=pesanan.customer_id', 'left')
        ->findAll();
        foreach ($pesanan as $key => $value) {
            $value->detail = $this->detail->select('barang.nama, detail.*')->join('barang','barang.id=detail.barang_id', 'left')->where('pesanan_id', $value->id)->findAll();
            $value->pengiriman = $this->pengiriman->where('pesanan_id', $value->id)->first();
        }
        return $this->respond($pesanan);
    }

    public function post()
    {
        $data = $this->request->getJSON();
        $data->pengiriman->pesanan_id = $data->id;
        try {
            $this->db->transException(true)->transStart();
            $this->pengiriman->insert($data->pengiriman);
            $data->pengiriman->id = $this->pengiriman->getInsertID();
            $this->pesanan->update($data->id, ['status'=>$data->status]);
            $this->db->transComplete();
            return $this->respondCreated($data);
        } catch (DataException $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function put()
    {
        $data = $this->request->getJSON();
        try {
            $this->db->transException(true)->transStart();
            $this->pesanan->update($data->id, ['status'=>$data->status]);
            $this->db->transComplete();
            return $this->respondUpdated(true);
        } catch (DataException $th) {
            return $this->fail($th->getMessage());
        }
    }

    public function cetak_manifest($id = null)
    {
        $pesanan = $this->pesanan->asObject()
        ->select('customer.nama_toko, customer.telp, customer.alamat, customer.pemilik, pesanan.*')
        ->join('customer', 'customer.id=pesanan.customer_id', 'left')
        ->where('pesanan.id', $id)
        ->first();
        $pesanan->detail = $this->detail->select('barang.nama, detail.*')->join('barang','barang.id=detail.barang_id', 'left')->where('pesanan_id', $pesanan->id)->findAll();
        $pesanan->pengiriman = $this->pengiriman->where('pesanan_id', $pesanan->id)->first();
        $data = (array) $pesanan;
        return view("admin/cetak_manifest", $data);
    }

    public function deleted()
    {
        //
    }
}
