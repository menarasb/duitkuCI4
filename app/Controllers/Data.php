<?php namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use App\Models\JenisModel;
use App\Models\RekeningModel;
 
class Data extends ResourceController
{
    protected $format       = 'json';
    protected $jenisModel;
    protected $rekeningModel;
 
    public function dataJenis()
    {
        $this->jenisModel = new JenisModel();
        $data =  $this->jenisModel->getJenis();
        $result = [
            "results" => $data
        ];
        return $this->respond($result);
    }

    public function dataRekening()
    {
        $this->rekeningModel = new RekeningModel();
        $data =  $this->rekeningModel->getRekening();
        $result = [
            "data" => $data
        ];
        return $this->respond($result);
    }

}