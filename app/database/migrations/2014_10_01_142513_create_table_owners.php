<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOwners extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('owners', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('agency_id', 20)->unique();
			$table->string('firstname');
			$table->string('lastname');
			$table->string('phone');
			$table->string('email');
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
		Schema::drop('owners');
	}

}
