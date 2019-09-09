<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $table      = 'users';
	protected $primaryKey = 'id';
	protected $allowedFields = ['team_id','username', 'password', 'name', 'email', 'auth_code', 'is_banned',
								'is_verified'];

	protected $validationRules = [
		// 'team_id'       => 'required|numeric',
		'username'      => 'required|min_length[3]|alpha_numeric',
		'password'      => 'required|min_length[8]',
		'name'			=> 'required|min_length[3]|alpha_numeric_space',
		'email'         => 'required|valid_email',
		'auth_code'     => 'required',
		'category_id'   => 'required|numeric',
		'is_banned'     => 'required',
		'is_verified'	=> 'required',
	];
}
