<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChannelsTable extends Migration {

	public function up()
	{
		Schema::create('channels', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('slug', 150)->unique();
			$table->string('color', 16)->unique()->nullable();
			$table->string('icon', 25)->unique()->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('channels');
	}
}