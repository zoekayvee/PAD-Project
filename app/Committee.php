<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Committee extends Model {

	protected $table = 'committees';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','weight','event_id'];

}
