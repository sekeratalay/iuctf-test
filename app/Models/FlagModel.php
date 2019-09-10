<?php namespace App\Models;

use CodeIgniter\Model;

class FlagModel extends Model
{
	protected $table      = 'flags';
	protected $primaryKey = 'id';
	protected $allowedFields = ['challenge_id', 'type', 'content'];

	protected $validationRules = [
        'challenge_id'  => 'required|numeric',
		'type'          => 'required',
		'content'	    => 'required|min_length[3]',
	];
}
