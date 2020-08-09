<?php namespace App\Controllers;

class Templates extends BaseController
{
	public function index()
	{
		echo view('templates/cork/blankpage');
	}
}
