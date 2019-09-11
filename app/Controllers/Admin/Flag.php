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

	}

	//--------------------------------------------------------------------

	public function challenges()
	{

	}
}
