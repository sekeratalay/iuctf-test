<?php namespace App\Controllers;

use \App\Models\ChallengeModel;
use \App\Models\CategoryModel;
use \App\Models\FlagModel;
use \App\Models\SolvesModel;


class Home extends BaseController
{
	public function __construct()
	{
		$this->challengeModel = new ChallengeModel();
		$this->categoryModel = new CategoryModel();
		$this->solvesModel = new SolvesModel();
	}

	public function index()
	{
		return view('welcome_message');
	}

	//--------------------------------------------------------------------

	public function challenges()
	{
		$categories = $this->categoryModel->findAll();
		$challenges = $this->challengeModel->findAll();

		foreach ($categories as $c_key => $c_val) {
			$arr = array_filter($challenges, function($challenge) use ($c_val) {
				return $challenge['category_id'] == $c_val['id'];
			});

			if(! empty($arr))
			{
				$categories[$c_key]['challenges'] = $arr;
			}
		}

		$team_id = 1;
		$view_data['solves'] = $this->solvesModel->where('team_id', 1)->findColumn('challenge_id');

		$view_data['categories'] = $categories;
		// var_dump($view_data['categories']);
		return view('challenges', $view_data);
	}

	public function flagSubmit()
	{
		$user_id = 2;
		$team_id = 1;
		$data = [
			'challenge_id' => $this->request->getPost('ch-id'),
			'user_id' => $user_id,
			'team_id' => $team_id,
		];
		// var_dump($data);
		$this->solvesModel->insert($data);
		return redirect()->to("/challenges");
	}
}
