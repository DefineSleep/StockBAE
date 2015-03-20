<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fa', function(Blueprint $table)
		{
			$table->string('fa_id', 100)->primary();
			$table->string('password', 100);
			$table->string('name', 100);
			$table->string('email', 100);
			$table->text('address');
			$table->date('dob');
			$table->integer('contact_no');
			$table->date('start_date');
			$table->decimal('salary/hr', 10);
			$table->integer('ni_no')->unique('ni_no');
			$table->string('admin_id', 100)->index('admin_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('fa');
	}

}
