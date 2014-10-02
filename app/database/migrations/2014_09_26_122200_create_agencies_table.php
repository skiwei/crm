<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgenciesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('agencies', function(Blueprint $table)
		{
			$table->string('agency_id', 20)->primary();
			$table->string('home_office')->nullable();
			$table->string('name');
			$table->string('trade_name');
			$table->string('location_type');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zipcode');
			$table->string('country');
			$table->string('global_region');
			$table->string('phone');
			$table->string('last_activity')->nullable();			
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('agencies');
	}

}
