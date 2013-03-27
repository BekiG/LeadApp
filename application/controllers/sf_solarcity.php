<?php
    /*
    * CLIENT SalesForce Fields
    */

//application/controllers/sf_solarcity.php
class SFSolarCity extends SalesForce {


    // match the database schema to what SalesForce expects
	private $client = array(
        'oid' => '00D300000006bL2',
        'recordType' => '01230000000GD3G',
        'lead_source' => 'Partner',
        '00N30000001lwWI' => 'EcoMark Reseller',
        // 'Campaign_ID' => '70130000000cfH7',
    );

    public function __construct() {
        parent::__construct();
    }

	// merge common fields with client fields

    public function prepLead($lead) {
        //$this->sfPrep = array_merge($this->common, $this->client);
        parent::prepLead($lead);
		// Commenting out fields not requested for Channel Partner Portal
        // $this->sfPrep['00N30000001muLA'] = $lead->spouse_name;
        $this->sfPrep['mobile']          = $lead->phone2;
        // $this->sfPrep['00N30000001lHMW'] = $lead->electric_utility;
        $this->sfPrep['00N30000001RIJb'] = $lead->electric_bill;
		$this->sfPrep['description'] 	 = $lead->buying_motives;
        // $this->sfPrep['00N30000001RU4p'] = $lead->roof_type;
        // $this->sfPrep['00N30000001RU2a'] = $lead->roof_orientation;
        // $this->sfPrep['00N30000001RU4z'] = $lead->shading_issues;
        // $this->sfPrep['00N30000001n02O'] = $lead->buying_motives;
        // $this->sfPrep['00N300000024UcH'] = $lead->best_time;
		// $this->sfPrep['lead_type']       = $lead->lead_type;

        // Custom transforms
        $this->sfPrep['00N30000001khOR'] = $this->_dateTime($lead->appointment_date, $lead->appointment_time);
        $this->sfPrep['company'] = $this->_companyFirstLast($lead->first_name, $lead->last_name);

        $this->sfData = array_merge($this->client, $this->sfPrep);

        //parent::sendLead($this->sfData);
    }
    
    	// Make company name = first name + last name for required portal field
		private function _companyFirstLast($fn, $ln) {
			$companyName = ucwords(strtolower($fn)) . " " . ucwords(strtolower($ln));
			return $companyName;
		}
    
	    private function _dateTime($ad, $at) {
        $datetimestr = $ad . " " . $at;
        $dateTime = date('Y-m-d\TH:i:s', strtotime($datetimestr));

        return $dateTime;
    }
	
}
