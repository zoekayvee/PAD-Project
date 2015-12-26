<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('member', function(Blueprint $table)
		{
			//foreign key
			$table->integer('acct_id')->unsigned();
			$table->integer('comm_id')->unsigned();

			$table->foreign('acct_id')->references('acct_id')->on('account');
			$table->foreign('comm_id')->references('comm_id')->on('committee');

			//primary key
			$table->primary(['acct_id', 'comm_id']);

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
		Schema::drop('member');
	}
}