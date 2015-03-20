<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransactionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('transactions', function(Blueprint $table)
		{
			$table->integer('trans_id', true);
			$table->enum('trans_type',['Buy','Sell','AutoSell']);
			$table->date('date');
			$table->time('time');
			$table->string('symbol', 10)->index('symbol');
			$table->integer('quantity');
			$table->integer('meeting_no')->index('meeting_no');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('transactions');
	}

}
