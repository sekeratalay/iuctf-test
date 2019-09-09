<?php namespace App\Controllers;

use \App\Models\CategoryModel;

class Admin extends BaseController
{
	public function index()
	{
		return view("admin/dashboard");
	}

	//--------------------------------------------------------------------

	public function categories()
	{
		$view_data['title'] = 'kategoriler';

		$category_model = new CategoryModel();
		$categories = $category_model->findAll();
		$view_data['categories'] = $categories;
		// var_dump($view_data['categories']);

		return view("admin/categories", $view_data);
	}

	//--------------------------------------------------------------------

	public function challenges()
	{
		return view("admin/challenges");
	}

	//--------------------------------------------------------------------

	public function categoryadd()
	{
		$category_model = new CategoryModel();
		$data = [
			'name' => $this->request->getVar('name'),
			'description' => $this->request->getVar('description'),
		];
		$category_model->insert($data);

		return redirect()->to('/admin/categories');
	}

}
