<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('title');
			$table->text('description');
			$table->integer('progress');
			$table->integer('weight')->unsigned();
			$table->date('deadline');
			$table->string('remark')->nullable();	//completed/late/etc...
			$table->date('created_date');

			//foreign key
			$table->integer('createdby_id')->unsigned();
			$table->foreign('createdby_id')->references('id')->on('users');

			$table->integer('assigned_to')->references('id')->on('users');

			$table->integer('comm_id')->unsigned();
			$table->foreign('comm_id')->references('id')->on('committees');

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
		Schema::drop('tasks');
	}
}