<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class Pegawai extends BaseController
{
    use ResponseTrait;
    protected $pegawai;
    protected $user;
    public function __construct()
    {
        $this->pegawai = new \App\Models\PegawaiModel();
        $this->user = new \App\Models\UserModel();
    }
    public function index()
    {
        return view('admin/pegawai');
    }
    public function read()
    {
        return $this->respond($this->pegawai->select("pegawai.*, user.username, user.role")->join('user', 'user.id=pegawai.user_id', 'left')->findAll());
    }

    public function post()
    {
        try {
            $param = $this->request->getJSON();
            $user = [
                'username'=>$param->username,
                'password'=>password_hash($param->password, PASSWORD_DEFAULT),
                'role'=>$param->role
            ];
            $this->user->insert($user);
            $param->user_id = $this->user->getInsertID();
            if ($this->pegawai->insert($param)) {
                $param->id = $this->pegawai->getInsertID();
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
            if ($this->pegawai->update($param->id, $param)) {
                return $this->respondCreated(true);
            }
            throw new \Exception("Gagal menyimpan", 1);
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function deleted($id=null)
    {
        $this->pegawai->delete($id);
        return $this->respond(true);
    }
}
