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
			$table->increments('id');
			$table->string('name');
			$table->decimal('progress', 5, 2);
			$table->integer('weight')->unsigned();

			//foreign key
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');

/*			$table->integer('head_id')->unsigned();
			$table->foreign('head_id')->references('id')->on('users');
*/
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
