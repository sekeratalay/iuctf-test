<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
	protected $table      = 'categories';
	protected $primaryKey = 'id';
	protected $allowedFields = ['name', 'description'];

	protected $validationRules = [
		'name'			=> 'required|min_length[3]',
		// 'description'	=> '',
	];
}
