<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('articles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('titre', 100);
			$table->integer('user_id');
			$table->longText('contenu');
			$table->longText('chapo');
			$table->integer('latitude');
			$table->integer('longitude');
			$table->string('slug');
			$table->mediumText('cover');
		    $table->string('soustitre');
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
		Schema::drop('articles');
	}

}
