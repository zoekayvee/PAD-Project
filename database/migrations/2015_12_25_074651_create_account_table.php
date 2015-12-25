<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('account', function(Blueprint $table)
		{
			$table->increments('acct_id');
			$table->string('fname');
			$table->string('mname');
			$table->string('lname');
			$table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 30);
			$table->string('studno', 10)->unique();
			$table->string('department');
			$table->string('batch_univ', 4);
			$table->string('batch_name');

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
		Schema::drop('account');
	}

}
