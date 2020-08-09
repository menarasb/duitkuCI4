<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use App\Models\JenisModel;
 
class Jenis extends ResourceController
{
    protected $format       = 'json';
    protected $jenisModel;
 
    public function data()
    {
        $this->jenisModel = new JenisModel();
        $data =  $this->jenisModel->getJenis();
        $result = [
            "data" => $data
        ];
        return $this->respond($result);
    }
}