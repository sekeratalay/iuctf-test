<?php namespace App\Controllers\Admin;

use \App\Models\TeamModel;

class Teams extends \App\Controllers\BaseController
{
	public function __construct()
	{
		$this->teamModel = new TeamModel();
	}

	//--------------------------------------------------------------------

	public function index()
	{
		$view_data['teams'] = $this->teamModel->findAll();

		return view('admin/teams', $view_data);
	}

	//--------------------------------------------------------------------
	
	public function new()
	{
		
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
