<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('theme');
			$table->string('title');
			$table->string('year', 4);
			$table->string('sem');
			$table->integer('weight')->unsigned();

			//foreign key
			$table->integer('oah_id')->unsigned();
			$table->foreign('oah_id')->references('id')->on('users');

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
		Schema::drop('events');
	}

}
