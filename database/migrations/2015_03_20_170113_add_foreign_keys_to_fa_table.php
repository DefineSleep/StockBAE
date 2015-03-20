<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToFaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('fa', function(Blueprint $table)
		{
			$table->foreign('admin_id', 'fa_ibfk_1')->references('admin_id')->on('admin')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('fa', function(Blueprint $table)
		{
			$table->dropForeign('fa_ibfk_1');
		});
	}

}
