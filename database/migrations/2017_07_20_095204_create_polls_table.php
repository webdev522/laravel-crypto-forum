<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePollsTable extends Migration {

	public function up()
	{
		Schema::create('polls', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->softDeletes();
			$table->integer('user_id')->unsigned();
			$table->integer('post_id')->unsigned();
			$table->enum('type', array('like', 'award'));
		});
	}

	public function down()
	{
		Schema::drop('polls');
	}
}