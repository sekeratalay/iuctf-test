<?php namespace App\Controllers\Admin;

use \App\Models\ChallengeModel;
use \App\Models\CategoryModel;

class Challenges extends \App\Controllers\BaseController
{
	protected $challenge_model;
	protected $category_model;

	public function __construct()
	{
		$this->challenge_model = new ChallengeModel();
		$this->category_model = new CategoryModel();
	}
	//--------------------------------------------------------------------

	public function index()
	{
		$view_data['title'] = 'challenges';
		$view_data['challenges'] = $this->challenge_model->findAll();
		$view_data['categories'] = $this->category_model->findAll();
		return view('admin/challenges', $view_data);
	}

	//--------------------------------------------------------------------

	public function store()
	{
		$data = [
			'category_id' => $this->request->getVar('category_id'),
			'name' => $this->request->getVar('name'),
			'description' => $this->request->getVar('description'),
			'point' => $this->request->getVar('point'),
			'max_attempts' => $this->request->getVar('max_attempts'),
			'type' => $this->request->getVar('type'),
			'is_active' => $this->request->getVar('is_active'),
		];
		$this->challenge_model->insert($data);

		return redirect()->to('/admin/challenges');
	}
}
