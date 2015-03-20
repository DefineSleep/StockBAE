<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToMeetingTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('meeting', function(Blueprint $table)
		{
			$table->foreign('fa_id', 'meeting_ibfk_1')->references('fa_id')->on('fa')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('c_id', 'meeting_ibfk_2')->references('c_id')->on('client')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('meeting', function(Blueprint $table)
		{
			$table->dropForeign('meeting_ibfk_1');
			$table->dropForeign('meeting_ibfk_2');
		});
	}

}
