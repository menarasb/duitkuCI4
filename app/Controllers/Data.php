<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\JenisModel;
use App\Models\RekeningModel;
use App\Models\BulanModel;
use App\Models\TahunModel;

class Data extends ResourceController
{
    protected $format       = 'json';
    protected $jenisModel;
    protected $rekeningModel;
    protected $bulanModel;
    protected $tahunModel;

    public function __construct()
    {
        $this->session = session();
    }

    public function dataJenis()
    {
        $this->jenisModel = new JenisModel();
        $data =  $this->jenisModel->getJenis();
        $result = [
            "results" => $data
        ];
        return $this->respond($result);
    }
    public function sessionBulanTahun()
    {
        $this->bulanModel = new bulanModel();

        $tahun = $this->session->get('tahun');
        $bulan = $this->session->get('bulan');
        $data = $this->bulanModel->where('angka', $bulan)->first();
        $result = [
            "bulan" => $data['bulan'],
            "angka" => $data['angka'],
            "tahun" => $tahun
        ];
        return $this->respond($result);
    }
    public function dataRekening()
    {
        $this->rekeningModel = new RekeningModel();
        $tahun = $this->session->get('tahun');
        $bulan = $this->session->get('bulan');
        $where = [
            'substr(date,6,2)' => $bulan,
            'substr(date,1,4)' => $tahun
        ];
        $data =  $this->rekeningModel->getWhere($where)->getResult();
        $sumPengeluaran = $this->rekeningModel->selectSum('pengeluaran')->getWhere($where)->getRow(); 
        $sumPemasukan =  $this->rekeningModel->selectSum('pemasukan')->getWhere($where)->getRow(); 
        $sisaSaldo = $this->rekeningModel->select('SUM(pemasukan)-SUM(pengeluaran) as sisaSaldo')->getWhere($where)->getRow();
        $result = [
            'data' => $data,
            'sumPengeluaran' => $sumPengeluaran->pengeluaran,
            'sumPemasukan' => $sumPemasukan->pemasukan,
            'sisaSaldo' => $sisaSaldo->sisaSaldo
        ];
        echo json_encode($result);
        // foreach ($data->getUnbufferedRow('object') as $d) {
        //     $result = [
        //         "pengeluaran" => $d->pengeluaran,
        //         "pemasukan" => $d->pemasukan,
        //     ];
        //     return $this->respond($result);
        // }
    }

    public function sumRekeningBulan()
    {
        $this->rekeningModel = new RekeningModel();
    }
    public function dataBulan()
    {
        $this->bulanModel = new BulanModel();
        $data = $this->bulanModel->findAll();
        return $this->respond($data);
    }

    public function dataTahun()
    {
        $this->tahunModel = new TahunModel();
        $data = $this->tahunModel->findAll();
        return $this->respond($data);
    }
}
