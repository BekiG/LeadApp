<?php

//application/controllers/salesforce.php
class SalesForce {
	
	// if $debug do not POST to SalesForce
	public $debug = FALSE;
	
	public $sfPrep = array();
	public $sfData = array();
	
	private $sfURL = "https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8";
	
	public function __construct() {
		//$this->debug == TRUE;
	}
	
	public function prepLead($lead) {
		// common to all SF accounts
		$this->sfPrep['lead_type']  = $lead->lead_type;

		$this->sfPrep['first_name'] = ucwords(strtolower($lead->first_name));
        $this->sfPrep['last_name']  = ucwords(strtolower($lead->last_name));

        $this->sfPrep['phone']      = $lead->phone1;
        $this->sfPrep['email']      = $lead->email;

        $this->sfPrep['street']     = ucwords(strtolower($lead->address));
        $this->sfPrep['city']       = ucwords(strtolower($lead->city));
        $this->sfPrep['state']      = $lead->state;
        $this->sfPrep['zip']        = $lead->zip;

		// each one gets its own prep
	}
	
	public function sendLead() {
		
		if($this->debug) {
			//$this->printResults($lead);
		} else {
			
			$ch = curl_init();

			if (curl_error($ch) != "") {
		        echo "Error: $error\n";
			}

			curl_setopt($ch, CURLOPT_URL,$this->sfURL);
			curl_setopt($ch, CURLOPT_POST,1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->sfData));
			curl_exec($ch);
			curl_close($ch);
			
		}
	}
	
	public function debugResults($lead) {
		//print "<h3>Sent to: " . $lead->lead_type . "</h3>";
		//print "<p>First Name: " . $this->sfPrep['first_name'] . "</p>";
		//print "<p>cmp_rep: " . $this->sfPrep['00NU0000001qUMI'] . "</p>";
        $data = "<h2>Preview SalesForce Submission</h2>";

		foreach($lead as $key => $value) {
		
			$data .= "<p><strong>" . $key . "</strong>: " . $value . "</p>";
		}
        return $data;
        //return $data;
	}
}