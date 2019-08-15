<?php namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		return view('index');
	}

	public function welcome_message()
	{
		return view("welcome_message");
	}

	//--------------------------------------------------------------------

}
