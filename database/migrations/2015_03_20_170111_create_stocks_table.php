<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks', function(Blueprint $table)
		{
			$table->string('symbol', 10)->primary();
			$table->string('name', 100)->unique('company_name');
			$table->decimal('last_trade_price', 10);
			$table->string('last_trade_date', 10);
			$table->string('last_trade_time', 10);
			$table->decimal('change_price', 10);
			$table->string('change_percentage', 10);
			$table->decimal('days_high', 10);
			$table->decimal('days_low', 10);
			$table->integer('volume');
			$table->string('stock_exchange', 100);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('stocks');
	}

}
