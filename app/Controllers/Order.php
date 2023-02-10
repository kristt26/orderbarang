<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Order extends BaseController
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
        return view('order');
    }
    public function read()
    {
        $order = $this->pesanan->asObject()->where('customer_id', session()->get('customer_id'))->findAll();
        foreach ($order as $key => $value) {
            $value->detail = $this->detail->select("detail.*, barang.nama")->join("barang", "detail.barang_id=barang.id", 'left')->where('detail.pesanan_id', $value->id)->findAll();
            $value->pengiriman = $this->pengiriman->where('pesanan_id', $value->id)->first();
        }
        $data = [
            'barang' => $this->barang->findAll(),
            'pesanan' => $order
        ];
        return $this->respond($data);
    }

    public function post()
    {
        $data = $this->request->getJSON();
        $data->customer_id = session()->get('customer_id');
        $data->status = "Order";
        try {
            $this->db->transException(true)->transStart();
            $this->pesanan->insert($data);
            $data->id = $this->pesanan->getInsertID();
            foreach ($data->detail as $key => $value) {
                $value->pesanan_id = $data->id;
                $this->detail->insert($value);
                $value->id = $this->detail->getInsertID();
            }
            $this->db->transComplete();
            return $this->respond($data);
        } catch (DatabaseException $th) {
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
