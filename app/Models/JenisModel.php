<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class JenisModel extends Model {
 
    protected $table = 'jenis';
 
    public function getJenis($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }  
    }
} 