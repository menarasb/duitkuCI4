<?php namespace App\Controllers;

class Home extends BaseController
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
		$this->data['page_title'] = 'Dashboard';
		echo view('pages/home', $this->data);
	}
}
