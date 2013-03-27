<?php

class Create_Users {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		//
        Schema::create('users',function($table){
            $table->increments('id');
            $table->string('username', 32);
            $table->string('email', 255);
            $table->string('password', 64);

            $table->integer('role');

            $table->boolean('active');

            // created_at | updated_at DATETIME
            $table->timestamps();
        });

	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
		//
        Schema::drop('users');
	}

}