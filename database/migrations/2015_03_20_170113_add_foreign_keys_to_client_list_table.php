<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToClientListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('client_list', function(Blueprint $table)
		{
			$table->foreign('fa_id', 'client_list_ibfk_1')->references('fa_id')->on('fa')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('c_id', 'client_list_ibfk_2')->references('c_id')->on('client')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('client_list', function(Blueprint $table)
		{
			$table->dropForeign('client_list_ibfk_1');
			$table->dropForeign('client_list_ibfk_2');
		});
	}

}
