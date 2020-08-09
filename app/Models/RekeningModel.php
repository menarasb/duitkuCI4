<?php namespace App\Models;

use CodeIgniter\Model;

class RekeningModel extends Model
{
    protected $table = 'rekening';
    protected $useTimestamps = true;
    protected $allowedFields = ['date', 'pemasukan', 'pengeluaran', 'keterangan','jenis', 'file'];

    public function getRekening($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }
        return $this->getWhere(['id' => $id]);
    }
    
}