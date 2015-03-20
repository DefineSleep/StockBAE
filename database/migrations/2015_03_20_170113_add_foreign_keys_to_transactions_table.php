<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('transactions', function(Blueprint $table)
		{
			$table->foreign('meeting_no', 'transactions_ibfk_2')->references('meeting_no')->on('meeting')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('symbol', 'transactions_ibfk_3')->references('symbol')->on('stocks')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('transactions', function(Blueprint $table)
		{
			$table->dropForeign('transactions_ibfk_2');
			$table->dropForeign('transactions_ibfk_3');
		});
	}

}
