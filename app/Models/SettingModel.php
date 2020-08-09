<?php namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
    protected $table = 'settings';
    protected $useTimestamps = true;

    public function getSetting($id = false)
    {
        if($id == false) {
            return $this->findAll();
        }
        return $this->getWhere(['id' => $id])->getRow();
    }
    
}