<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

	protected $table = 'members';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'comm_id'];

}
