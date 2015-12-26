<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
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
		Schema::drop('members');
	}
}