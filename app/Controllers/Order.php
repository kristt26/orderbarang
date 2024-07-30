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
    protected $pembayaran;
    protected $db;
    public function __construct()
    {
        $this->barang = new \App\Models\BarangModel();
        $this->pesanan = new \App\Models\PesananModel();
        $this->detail = new \App\Models\DetailModel();
        $this->pengiriman = new \App\Models\PengirimanModel();
        $this->pembayaran = new \App\Models\BayarModel();
        $this->db = \Config\Database::connect();
        helper("find");
    }
    public function index()
    {
        return view('order');
    }
    public function read()
    {
        $order = $this->pesanan->asObject()->where('customer_id', session()->get('customer_id'))->findAll();
        foreach ($order as $key => $value) {
            $value->detail = $this->detail->select("detail.*, barang.nama, barang.harga")->join("barang", "detail.barang_id=barang.id", 'left')->where('detail.pesanan_id', $value->id)->findAll();
            $value->pengiriman = $this->pengiriman->where('pesanan_id', $value->id)->first();
            $value->pembayaran = $this->pembayaran->where('pesanan_id', $value->id)->first();
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
        $data->kode_pesan = random_string();
        try {
            $data->customer_id = session()->get('customer_id');
            $data->status = "Order";
            $this->db->transException(true)->transStart();
            $this->pesanan->insert($data);
            $data->id = $this->pesanan->getInsertID();
            foreach ($data->detail as $key => $value) {
                $value->pesanan_id = $data->id;
                $this->detail->insert($value);
                $value->id = $this->detail->getInsertID();
                $barang = $this->barang->where('id', $value->barang_id)->first();
                $this->barang->update($barang->id, ['stok'=>$barang->stok - $value->qty]);
            }
            $this->db->transComplete();
            return $this->respond($data);
        } catch (\Exception $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function bayar()
    {
        $dec = new \App\Libraries\Decode();
        $data = $this->request->getJSON();
        try {
            $data->kode_bayar = $dec->random_strings();
            $data->file = $dec->decodebase64($data->berkas->base64);
            $object = new \App\Models\BayarModel();
            $object->insert($data);
            $data->id = $object->getInsertID();
            return $this->respond($data);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }

    }
    public function deleted()
    {
        //
    }
}
