<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guests', function(Blueprint $table)
		{
			$table->increments('id');
		    $table->string('firstname');
		    $table->string('lastname');
		    $table->string('email');
		    $table->boolean('isPaid');
		    $table->integer('categorie_id')->unsigned();
		    //$table->integer('guest_id')->unsigned()->nullable();
		    $table->timestamps();
		    $table->foreign('categorie_id')->references('id')->on('categories');
		    //$table->foreign('guest_id')->references('id')->on('guests');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("guests");
	}

}
