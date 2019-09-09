<?php namespace App\Controllers\Admin;

use \App\Models\CategoryModel;

class Categories extends \App\Controllers\BaseController
{
	//--------------------------------------------------------------------

	public function index()
	{
		$view_data['title'] = 'kategoriler';

		$category_model = new CategoryModel();
		$categories = $category_model->findAll();
		$view_data['categories'] = $categories;
		// var_dump($view_data['categories']);

		return view("admin/categories", $view_data);
	}

	//--------------------------------------------------------------------

	public function create()
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
