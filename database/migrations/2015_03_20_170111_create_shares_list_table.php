<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSharesListTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shares_list', function(Blueprint $table)
		{
			$table->string('symbol', 10)->index('symbol');
			$table->string('c_id', 100)->index('c_id');
			$table->integer('quantity');
			$table->string('trigger', 100)->nullable();
			$table->decimal('bought_price', 10);
			$table->date('date_bought');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('shares_list');
	}

}
