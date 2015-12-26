<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventShoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('event_shouts', function(Blueprint $table)
		{
			$table->string('shout');

			//foreign key
			$table->integer('events_id')->unsigned();
			$table->foreign('events_id')->references('events_id')->on('events');
	
			//primary key
			$table->primary(['events_id', 'shout']);

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
		Schema::drop('event_shouts');
	}
}