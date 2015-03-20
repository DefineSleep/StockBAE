<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client', function(Blueprint $table)
		{
			$table->string('c_id', 100)->unique('c_id');
			$table->string('password', 100)->default('0000');
			$table->string('name', 100);
			$table->string('email', 100);
			$table->text('address');
			$table->date('dob');
			$table->integer('account_no')->unique('account_no');
			$table->integer('ni_no')->unique('ni_no');
			$table->integer('contact_no');
			$table->integer('networth')->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('client');
	}

}
