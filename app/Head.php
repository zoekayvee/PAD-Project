<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Head extends Model {

	protected $table = 'heads';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['position', 'user_id', 'comm_id', 'event_id'];

}
