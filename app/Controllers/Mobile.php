<?php namespace App\Controllers;

class Mobile extends BaseController
{
	public function __construct()
	{	
        
	}
	public function index()
	{
		$this->data['page_title'] = 'Uji Table';
		return view('layout/mobile/homesplash', $this->data);
    }
    public function login()
    {
        $this->data['page_title'] = 'Login';
        return view('layout/mobile/login',$this->data);
    }
    public function register()
    {
        $this->data['page_title'] = 'Register';
        return view('layout/mobile/register',$this->data);
    }
}
