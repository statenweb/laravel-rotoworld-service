<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			
			$table->string('name', 50);
	        $table->integer('date');
	        $table->string('position');
	        $table->string('team');
	        $table->integer('id');
	        $table->string('nameDashDelimited');
	        $table->longText('report');
	        $table->longText('impact');
	        $table->longText('related')->nullable();
	        $table->string('sourceURL')->nullable();
	        $table->string('sourceName')->nullable();
	        $table->integer('user_id');
			$table->primary(array('name', 'date'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('rotoworld_news', function(Blueprint $table)
		{
			//
		});
	}

}