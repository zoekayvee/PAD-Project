<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class EventShout extends Model {

	protected $table = 'event_shouts';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'shout', 'event_id', 'user_id'];

}
