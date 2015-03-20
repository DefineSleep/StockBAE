<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToSharesListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('shares_list', function(Blueprint $table)
		{
			$table->foreign('symbol', 'shares_list_ibfk_1')->references('symbol')->on('stocks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('c_id', 'shares_list_ibfk_2')->references('c_id')->on('client')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('shares_list', function(Blueprint $table)
		{
			$table->dropForeign('shares_list_ibfk_1');
			$table->dropForeign('shares_list_ibfk_2');
		});
	}

}
