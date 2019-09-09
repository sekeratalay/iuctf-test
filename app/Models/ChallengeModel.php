<?php namespace App\Models;

use CodeIgniter\Model;

class ChallengeModel extends Model
{
	protected $table      = 'challenges';
	protected $primaryKey = 'id';
	protected $allowedFields = ['category_id','name', 'description', 'max_attempts', 'type', 'is_active'];

	protected $validationRules = [
		'category_id'   => 'required|numeric',
		'name'			=> 'required|min_length[3]|alpha_numeric_space',
		// 'description'	=> '',
		// 'max_attempts'  => '',
		'type'          => 'required|in_list[static,dynamic]',
		'is_active'     => 'required|in_list[0,1]',
	];
}
