<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('threads', function(Blueprint $table) {
			$table->foreign('channel_id')->references('id')->on('channels')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('threads', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('threads', function(Blueprint $table) {
			$table->foreign('answer_id')->references('id')->on('posts')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('thread_id')->references('id')->on('threads')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('no action')
						->onUpdate('cascade');
		});
		Schema::table('polls', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('polls', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('thread_id')->references('id')->on('threads')
						->onDelete('restrict')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('threads', function(Blueprint $table) {
			$table->dropForeign('threads_channel_id_foreign');
		});
		Schema::table('threads', function(Blueprint $table) {
			$table->dropForeign('threads_user_id_foreign');
		});
		Schema::table('threads', function(Blueprint $table) {
			$table->dropForeign('threads_answer_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_thread_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_user_id_foreign');
		});
		Schema::table('polls', function(Blueprint $table) {
			$table->dropForeign('polls_user_id_foreign');
		});
		Schema::table('polls', function(Blueprint $table) {
			$table->dropForeign('polls_post_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_user_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_thread_id_foreign');
		});
	}
}