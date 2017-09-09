<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateThreadsTable extends Migration {

	public function up()
	{
		Schema::create('threads', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title',100)->unique();
			$table->string('slug',100)->unique();
			$table->integer('channel_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->softDeletes();
			$table->integer('answer_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('threads');
	}
}