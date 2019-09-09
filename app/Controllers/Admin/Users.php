<?php namespace App\Controllers\Admin;

use \App\Models\UserModel;
use \App\Models\TeamModel;

class Users extends \App\Controllers\BaseController
{
	public function __construct()
	{
		$this->userModel = new UserModel();
	}

	//--------------------------------------------------------------------

	public function index()
	{
		$view_data['users'] = $this->userModel->findAll();
		return view('admin/users', $view_data);
	}

	//--------------------------------------------------------------------
	
	public function new()
	{
		$teamModel = new TeamModel();
		$view_data['teams'] = $teamModel->findAll();
		return view('admin/users_new', $view_data);
	}

	//--------------------------------------------------------------------
	
	public function edit($id = null)
	{
		
	}

	//--------------------------------------------------------------------
	
	public function show($id = null)
	{
		
	}

	//--------------------------------------------------------------------
	
	public function create()
	{
		$data = [
			'team_id'		=> $this->request->getPost('team_id'),
			'username'		=> $this->request->getPost('username'),
			'password'		=> $this->request->getPost('password'),
			'name'			=> $this->request->getPost('name'),
			'email'			=> $this->request->getPost('email'),
			'auth_code'		=> $this->request->getPost('auth_code') ?? '2', 
			'is_banned'		=> $this->request->getPost('is_banned') ?? '0',
			'is_verified'	=> $this->request->getPost('is_verified') ?? '0',
		];
		$this->userModel->insert($data);

		return redirect()->to('/admin/users');
	}

	//--------------------------------------------------------------------
	
	public function delete($id = null)
	{
		
	}

	//--------------------------------------------------------------------
	
	public function update($id = null)
	{
		
	}

	//--------------------------------------------------------------------
}
