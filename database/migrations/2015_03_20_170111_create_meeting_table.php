<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMeetingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('meeting', function(Blueprint $table)
		{
			$table->integer('meeting_no', true);
			$table->string('fa_id', 100)->index('fa_id');
			$table->string('c_id', 100)->index('c_id');
			$table->date('date');
			$table->time('time');
			$table->text('notes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('meeting');
	}

}
