<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialStatusesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('financial_statuses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('cash_in')->unsigned;
			$table->float('cash_out')->unsigned;
			$table->float('weekly_income')->unsigned;

			$table->float('cash_in_hand')->unsigned;
			$table->float('payables')->unsigned;
			$table->float('target_budget')->unsigned;

			//foreign key
			$table->integer('event_id')->unsigned();
			$table->foreign('event_id')->references('id')->on('events');

			$table->integer('head_id')->unsigned();
			$table->foreign('head_id')->references('id')->on('heads');

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
		Schema::drop('financial_statuses');
	}

}
