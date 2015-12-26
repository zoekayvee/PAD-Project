<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitteesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('committees', function(Blueprint $table)
		{
			$table->increments('comm_id');
			$table->string('name');

			//foreign key
			$table->integer('events_id')->unsigned();
			$table->foreign('events_id')->references('events_id')->on('events');

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
		Schema::drop('committees');
	}
}
