<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Database\Exceptions\DatabaseException;

class Customer extends BaseController
{
    use ResponseTrait;
    protected $customer;
    protected $user;
    protected $conn;
    public function __construct() {
        $this->customer = new \App\Models\CustomerModel();
        $this->user = new \App\Models\UserModel();
        $this->conn = \Config\Database::connect();
    }
    public function index()
    {
        return view('admin/customer');
    }
    public function read()
    {
        return $this->respond($this->customer->select("customer.*, user.username, user.role")
        ->join("user", "user.id=customer.user_id", "LEFT")
        ->findAll());
    }
    
    public function post()
    {
        $data = $this->request->getJSON();
        try {
            $this->conn->transException(true)->transStart();
            $this->user->insert(['username'=>$data->username, 'password'=>password_hash($data->password, PASSWORD_DEFAULT)]);
            $data->user_id = $this->user->getInsertID();
            $this->customer->insert($data);
            $data->id = $this->customer->getInsertID();
            $this->conn->transComplete();
            return $this->respond($data);
        } catch (DatabaseException $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function put()
    {
        $data = $this->request->getJSON();
        try {
            if($this->customer->update($data->id, $data)){
                return $this->respondUpdated(true);
            }
            throw new \Exception("Gagal mengubah data", 1);
            
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
    public function deleted($id = null)
    {
        try {
            if($this->customer->delete($id));
            {
                return $this->respondDeleted(true);
            }
            throw new \Exception("Gagal menghapus data", 1);
            
        } catch (\Throwable $th) {
            return $this->fail($th->getMessage());
        }
    }
}
