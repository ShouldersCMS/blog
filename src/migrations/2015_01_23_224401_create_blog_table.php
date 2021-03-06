<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('blog', function($table)
		{
			$table->increments('id');
			$table->string('title', 70);
			$table->longtext('content');
			$table->string('description');
			$table->integer('user_id');
			$table->string('slug')->unique();
			$table->integer('meta_id')->unsigned();
			$table->foreign('meta_id')->references('id')->on('meta')->onDelete('cascade');
			$table->softDeletes();
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
		Schema::drop('blog');
	}

}
	