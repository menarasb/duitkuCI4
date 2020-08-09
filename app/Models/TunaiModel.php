<?php namespace App\Models;

use CodeIgniter\Model;

class TunaiModel extends Model
{
    protected $table = 'tunai';
    protected $useTimestamps = true;
    protected $allowedFields = ['date', 'id_rekening' ,'pemasukan', 'pengeluaran', 'keterangan','jenis', 'file'];

    public function getTunai($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }
        return $this->getWhere(['id' => $id]);
    }
    
}