<?php namespace App\Controllers\Admin;

use \App\Models\ChallengeModel;
use \App\Models\CategoryModel;
use \App\Models\FlagModel;

class Challenges extends \App\Controllers\BaseController
{
	protected $challenge_model;
	protected $category_model;
	protected $flag_model;

	public function __construct()
	{
		$this->challenge_model = new ChallengeModel();
		$this->category_model = new CategoryModel();
		$this->flag_model = new FlagModel();
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

	public function show($id)
	{
		$challenge = $this->challenge_model->find($id);
		$view_data['categories'] = $this->category_model->findAll();
		$view_data['challenge'] = $challenge;
		$view_data['flags'] = $this->flag_model->where('challenge_id', $id)->findAll();
		return view('admin/challenge_detail', $view_data);
	}

	public function update($id = null)
	{
		$data = [
			'name'			=> $this->request->getPost('name'),
			'description'	=> $this->request->getPost('description'),
			'point'			=> $this->request->getPost('point'),
			'max_attempts'	=> $this->request->getPost('max_attempts'),
			'type'			=> $this->request->getPost('type'),
			'is_active'		=> $this->request->getPost('is_active'),
		];

		$result = $this->challenge_model->update($id, $data);
		return redirect()->to("/admin/challenges/$id");
	}

	public function addFlag($challenge_id = null)
	{
		$data = [
			'challenge_id'	=> $challenge_id,
			'type'			=> $this->request->getPost('type'),
			'content'		=> $this->request->getPost('content'),
		];

		$this->flag_model->insert($data);
		return redirect()->to("/admin/challenges/$challenge_id");
	}
}
