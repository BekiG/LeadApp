<?php

class Create_Leads_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('leads', function($table)
        {
            $table->increments('id');

            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('spouse_name', 50);
            $table->string('phone1', 20);
            $table->string('phone2', 20);
            $table->string('email', 90);

            $table->string('address', 255);
            $table->string('city', 100);
            $table->string('state', 8);
            $table->string('zip', 20);

            $table->string('electric_utility', 50);
            $table->string('electric_bill', 30);
            $table->string('roof_type', 50);
            $table->string('roof_orientation', 20);
            $table->string('shading_issues', 20);
            $table->string('credit_score', 20);

            $table->text('buying_motives');

            $table->string('lead_request', 20);
            $table->boolean('lead_called');
            $table->string('best_days', 50);
            $table->string('best_time', 50);
            $table->string('appointment_date', 20);
            $table->string('appointment_time', 20);

            $table->string('cmp_rep', 50);
            $table->string('lead_source', 128);

            // Mark when a lead has been sent off
            $table->boolean('sent');

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
        Schema::drop('users');
	}

}