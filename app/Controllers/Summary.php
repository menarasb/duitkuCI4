<?php namespace App\Controllers;

use App\Models\SummaryModel;
class Summary extends BaseController
{
    protected $summaryModel;
    public function __construct()
    {
        $this->summaryModel = new SummaryModel();
    }
 
	public function perMonth()
	{
        $query = $this->summaryModel->resultPerMonth()->getResult();
        return json_encode($query);

    }
}
