<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

	protected $table = 'tasks';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['title', 'description', 'progress', 'weight', 'deadline', 'remark', 'createdby_id', 'assigned_to', 'comm_id', 'event_id'];

}
