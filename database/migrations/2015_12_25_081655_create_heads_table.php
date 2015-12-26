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

			//foreign key
			$table->integer('id')->unsigned();
			$table->integer('comm_id')->unsigned();

			$table->foreign('id')->references('id')->on('users');
			$table->foreign('comm_id')->references('comm_id')->on('committees');

			//primary key
			$table->primary(['id', 'comm_id']);

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