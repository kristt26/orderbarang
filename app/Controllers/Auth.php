<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;

class Auth extends BaseController
{
    use ResponseTrait;
    protected $user;
    protected $pegawai;
    protected $customer;
    public function __construct()
    {
        $this->user = new \App\Models\UserModel();
        $this->pegawai = new \App\Models\PegawaiModel();
        $this->customer = new \App\Models\CustomerModel();
    }
    public function index()
    {
        if ($this->user->countAllResults() == 0) {
            $this->user->insert(['username' => 'Administrator', 'password' => password_hash('Administrator#1', PASSWORD_DEFAULT), 'role' => 'Admin']);
            $user_id = $this->user->getInsertID();
            $this->pegawai->insert(['user_id'=>$user_id, 'nama'=>'Administrator']);
        }
        if (session()->get('isLogin')) {
            return redirect()->to(base_url('home'));
        }
        return view('auth');
    }
    public function login()
    {
        $data = $this->request->getJSON();
        $user = $this->user->where('username', $data->username)->first();
        if ($user) {
            if (password_verify($data->password, $user['password'])) {
                if ($user['role'] == "Customer") {
                    $customer = $this->customer->where('user_id', $user['id'])->first();
                    $dataSession = [
                        'uid' => $user['id'],
                        'customer_id' => $customer['id'],
                        'nama' => $customer['nama_toko'],
                        'pemilik' => $customer['pemilik'],
                        'kontak' => $customer['telp'],
                        'email' => $customer['email'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'isLogin' => true
                    ];
                    session()->set($dataSession);
                    return $this->respond($dataSession);
                } else {
                    $pegawai = $this->pegawai->where('user_id', $user['id'])->first();
                    $dataSession = [
                        'uid' => $user['id'],
                        'nama' => $pegawai['nama'],
                        'username' => $user['username'],
                        'role' => $user['role'],
                        'isLogin' => true
                    ];
                    session()->set($dataSession);
                    return $this->respond($dataSession);
                }
            } else {
                return $this->failUnauthorized("Password yang anda masukkan tidak sesuai");
            }
        } else {
            return $this->failNotFound("User tidak ditemukan");
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url());
    }
}
