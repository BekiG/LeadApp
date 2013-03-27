<?php
/*
 * CLIENT SalesForce Fields
 */

//application/controllers/sf_CLIENT.php
class SFCLIENT extends SalesForce {
	
	// match the database schema to what SalesForce expects
	private $client = array(
		'oid'              => "",
		
		'spouse_name'      => "",	  
		'phone2'           => "",

	  'electric_utility' => "",
	  'electric_bill'    => "",
	  'roof_type'        => "",
	  'roof_orientation' => "",
	  'shading_issues'   => "",
	  'credit_score'     => "",

	  'buying_motives'   => "",
	
	  'best_time'        => "",

	  'lead_source'      => "",
	);
	

  
	
	
	public function __construct() {
		parent::__construct();
		
		// merge common fields with client fields
		
	}
	
}