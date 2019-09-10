<?php namespace App\Controllers;

use \App\Models\ChallengeModel;
use \App\Models\CategoryModel;
use \App\Models\FlagModel;

class Home extends BaseController
{
	public function __construct()
	{
		$this->challengeModel = new ChallengeModel();
		$this->categoryModel = new CategoryModel();
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
		$view_data['categories'] = $categories;
		// var_dump($view_data['categories']);
		return view('challenges', $view_data);
	}
}
