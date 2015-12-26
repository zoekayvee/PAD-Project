<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeadTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('head', function(Blueprint $table)
		{
			$table->string('position');

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
		Schema::drop('head');
	}
}