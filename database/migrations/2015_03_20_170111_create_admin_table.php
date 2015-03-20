<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admin', function(Blueprint $table)
		{
			$table->string('admin_id', 100)->unique('admin_id');
			$table->string('password', 100);
			$table->string('name', 100);
			$table->date('dob');
			$table->integer('contact_no');
			$table->string('email', 100)->unique('email');
			$table->text('address');
			$table->date('start_date');
			$table->decimal('salary/hr', 10);
			$table->integer('ni_no')->unique('ni_no');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('admin');
	}

}
