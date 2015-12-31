<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('heads', function(Blueprint $table)
		{
			$table->string('position');
			$table->increments('head_id');

			//foreign key
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');

			$table->integer('comm_id')->unsigned();
			$table->foreign('comm_id')->references('comm_id')->on('committees');

			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('event_id')->on('events');

			//primary key
//			$table->primary(['head_id', 'comm_id']);
//			$table->primary('head_id');

			//$table->rememberToken();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('heads');
	}
}