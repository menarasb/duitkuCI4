<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class BulanModel extends Model {
 
    protected $table = 'bulan';
 
    public function getBulan($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id' => $id])->getRowArray();
        }  
    }
} 