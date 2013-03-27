<?php

class Create_Leads_Table {

	/**
	 * Make changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::table('leads', function($table)
        {
            $table->string('lead_type', 20);

        });
	}

	/**
	 * Revert the changes to the database.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::table('leads', function($table)
        {
            $table->drop_column('lead_type');
        });
	}

}