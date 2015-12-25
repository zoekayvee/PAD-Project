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
			$table->increments('events_id');
			$table->string('theme');
			$table->string('title');
			$table->string('year', 4);
			$table->string('sem'); 

			//foreign key
			$table->integer('oah_id')->unsigned();
			$table->foreign('oah_id')->references('acct_id')->on('account');

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
