<?php namespace App\Controllers;

class Table extends BaseController
{
	public function __construct()
	{	
		$this->data = [
			'separator' => '|',
			'coba' => 'tes'
		];
	}
	public function index()
	{
		$this->data['page_title'] = 'Uji Table';
		return view('templates/table', $this->data);
    }
    public function data()
    {
        return view('templates/data');
    }
}
