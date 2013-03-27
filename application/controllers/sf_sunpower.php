<?php
/*
 * CLIENT SalesForce Fields
 */

//application/controllers/sf_sunpower.php
class SFSunPower extends SalesForce {
	

	// match the database schema to what SalesForce expects
	private $client = array(
	    'oid'                => '00D80000000ZF1L',
	    'lead_source'		 =>	'Canvassing',
		'member_status'		 => 'Responded',
	    '00N80000004Y6Ns'	 =>	'Own', // Own/Lease
	    'recordType'	 	 =>	'0128000000037AK', // Lead Record Type
	    '00N80000003bQpA'	 => 'SunPower', // Lead Manufacturer
		'country'			 =>	'United States', // Country
	    '00N80000003bQpa'	 =>	'North America', // Theater
        '00N800000044kJ4'	 =>	'RLC',
        '00N80000004Y7nc'	 => 'Residential',
		'00N80000003bQpW'	 => 'Inclined'
	);
	
	public function __construct() {
		parent::__construct();
    }
		// merge common fields with client fields
    public function prepLead($lead) {

        parent::prepLead($lead);

        // client specific
        //$this->sfPrep[''] = $lead->spouse_name;
        $this->sfPrep['mobile']          = $lead->phone2;
        $this->sfPrep['00N80000004ajWO'] = $lead->electric_utility;
        $this->sfPrep['00N80000004ZZN4'] = $lead->roof_orientation;	
		// $this->sfPrep['00N80000004Wwdv'] = $lead->motivation;  // No Longer Used
		
        // Custom transforms
        $this->sfPrep['company'] = $lead->first_name . " " . $lead->last_name; // company = first name + last name
		
		// New transforms
		  // Campaign ID - field id "Campaign_ID"
		$this->sfPrep['Campaign_ID'] = $this->_campaignNameID($lead->city, $lead->state, $lead->lead_source, "ID");
		  // Campaign ID (Campaign Name) - field id "00N80000004Y7nh"
		$this->sfPrep['00N80000004Y7nh'] = $this->_campaignNameID($lead->city, $lead->state, $lead->lead_source, "Name");
		
		// End new transforms
		
		$this->sfPrep['00N80000003bQom'] = $this->_electricBill($lead->electric_bill);
        $this->sfPrep['00N80000003bQpV'] = $this->_roofType($lead->roof_type);
		$this->sfPrep['00N80000004YWEN'] = "Relationship Status: " . $lead->relationship_status . "; " . "Significant Other's Name: " . $lead->spouse_name . ";  " . "Credit Score Above 700: " . $lead->credit_score . ";  " . "Best Time to Call: " . $lead->best_days . " " . $lead->best_time . "; " . "Shading Issues: " . $lead->shading_issues . "; " . "Other Notes: " . $lead->buying_motives . "  " . "Requested Appointment Date and Time: " . $lead->appointment_date . ' ' . $lead->appointment_time;
		// $this->sfPrep['00N80000004ajWY'] = $lead->appointment_date . ' ' . $lead->appointment_time; // = appointment date + appointment time
        
		$this->sfData = array_merge($this->client, $this->sfPrep);

        //parent::sendLead($this->sfData);
}
		
    private function _electricBill($eb) {
        // first check that the value isn't something like "given on appointment"

        $pattern = "#app#i";
        if(preg_match($pattern, $eb)) {
            $ed = "Given on Appointment";
        } else {
            $eb = intval(preg_replace('/[\$,]/', '', $eb));

            if($eb < 75) {
                $ed = "< $75";
            } elseif($eb >= 75 && $eb < 150) {
                $ed = "> $75";
            } elseif($eb >= 150 && $eb < 300) {
                $ed = "> $150";
            } elseif($eb >= 300) {
                $ed = "> $300";
            }
        }
        return $ed;
    }
	
	// Assign to campaign based on lead source or city
	private function _campaignNameID($leadCity, $leadState, $leadSource, $nameOrID) {
	
		//  TO ADD NEW OSH STORES, REFER TO:	
		//  https://docs.google.com/a/ecomarkusa.com/spreadsheet/
		//  ccc?key=0ArurXyFGKDjvdFVrMndWWVliTW81OVNxeDM3aUFHT2c&hl=en#gid=0
		// Declare the pattern of OSH leads
		$OSHpatt = '/^OSH.*/';
		// Assign leads from Colorado to IPS Campaign
		if ($leadState == 'CO') {
			$campid = '70180000000j1um';
			$campname = '2013_NA_RLC_Canvassing_Denver';
		}
		// If the lead source is "OSH - ...", assign to OSH campaign
		elseif (preg_match($OSHpatt, $leadSource)) {
			switch($leadSource){
				//Dublin
				case 'OSH - Dublin':
					$campid = '701800000010WRa';
					$campname = '2013_NA_RLC_OSH_Dublin';
				break;
				// Figarden
				case 'OSH - Figarden':
					$campid = '701800000010WSY';
					$campname = '2013_NA_RLC_OSH_Figarden';
				break;
				// Livermore
				case 'OSH - Livermore':
					$campid = '701800000010WS4';
					$campname = '2013_NA_RLC_OSH_Livermore';
				break;
				// NE Fresno
				case 'OSH - NE Fresno':
					$campid = '701800000010WSx';
					$campname = '2013_NA_RLC_OSH_Fresno (North East)';
				break;
				// San Leandro
				case 'OSH - San Leandro':
					$campid = '701800000010WST';
					$campname = '2013_NA_RLC_OSH_San Leandro';
				break;
				// San Lorenzo
				case 'OSH - San Lorenzo':
					$campid = '701800000010WST';
					$campname = '2013_NA_RLC_OSH_San Leandro';
				break;
				// San Ramon
				case 'OSH - San Ramon':
					$campid = '701800000010WSO';
					$campname = '2013_NA_RLC_OSH_San Ramon';
				break;
				}
			}
		// If any other lead source, assign to campaign based on city
		else {
			switch(ucwords($leadCity)) {
				case 'Acalanes Ridge':
				case 'Alameda':
				case 'Alamo':
				case 'Albany':
				case 'Alhambra Valley':
				case 'Antioch':
				case 'Ashland':
				case 'Bay Point':
				case 'Bayview':
				case 'Berkeley':
				case 'Bethel Island':
				case 'Blackhawk':
				case 'Brentwood':
				case 'Byron':
				case 'Camino Tassajara':
				case 'Canyon':
				case 'Castle Hill':
				case 'Castro Valley':
				case 'Cherryland':
				case 'Clayton':
				case 'Clyde':
				case 'Concord':
				case 'Contra Costa Centre':
				case 'Crockett':
				case 'Danville':
				case 'Diablo':
				case 'Discovery Bay':
				case 'Dublin':
				case 'East Richmond Heights':
				case 'El Cerrito':
				case 'El Sobrante':
				case 'Emeryville':
				case 'Fairview':
				case 'Fremont':
				case 'Hayward':
				case 'Hercules':
				case 'Kensington':
				case 'Knightsen':
				case 'Lafayette':
				case 'Livermore':
				case 'Martinez':
				case 'Montalvin Manor':
				case 'Moraga':
				case 'Mountain View':
				case 'Newark':
				case 'Norris Canyon':
				case 'North Gate':
				case 'North Richmond':
				case 'Oakland':
				case 'Oakley':
				case 'Orinda':
				case 'Pacheco':
				case 'Piedmont':
				case 'Pittsburg':
				case 'Pinole':
				case 'Pleasant Hill':
				case 'Pleasanton':
				case 'Port Costa':
				case 'Reliez Valley':
				case 'Richmond':
				case 'Rodeo':
				case 'Rollingwood':
				case 'San Leandro':
				case 'San Lorenzo':
				case 'San Miguel':
				case 'San Pablo':
				case 'San Ramon':
				case 'Saranap':
				case 'Shell Ridge':
				case 'Sunol':
				case 'Tara Hills':
				case 'Union City':
				case 'Vine Hill':
				case 'Walnut Creek':
					$campid = '701800000010QJn';
					$campname = '2013_NA_RLC_Canvassing_East Bay';
				break;
				
				case 'Clovis':
				case 'Fresno':
				case 'Madera':
				case 'San Joaquin':
				case 'Auberry':
				case 'Big Creek':
				case 'Biola':
				case 'Bowles':
				case 'Calwa':
				case 'Cantua Creek':
				case 'Caruthers':
				case 'Centerville':
				case 'Clovis':
				case 'Coalinga':
				case 'Del Rey':
				case 'Dunlap':
				case 'Easton':
				case 'Firebaugh':
				case 'Fort Washington':
				case 'Fowler':
				case 'Fresno':
				case 'Friant':
				case 'Highway City':
				case 'Huron':
				case 'Kerman':
				case 'Kingsburg':
				case 'Lanare':
				case 'Laton':
				case 'Malaga':
				case 'Mayfair':
				case 'Mendota':
				case 'Mercey Hot Springs':
				case 'Minkler':
				case 'Monmouth':
				case 'Old Fig Garden':
				case 'Orange Cove':
				case 'Parlier':
				case 'Prather':
				case 'Raisin City':
				case 'Reedley':
				case 'Riverdale':
				case 'Rolinda':
				case 'San Joaquin':
				case 'Sanger':
				case 'Selma':
				case 'Shaver Lake':
				case 'Squaw Valley':
				case 'Sunnyside':
				case 'Tarpey Village':
				case 'Three Rocks':
				case 'Tollhouse':
				case 'Tranquillity':
				case 'West Park':
					$campid = '701800000010QJx';
					$campname = '2013_NA_RLC_Canvassing_Fresno';
				break;
			
				default:
					$campid = '701800000010QJn';
					$campname = '2013_NA_RLC_Canvassing_East Bay';
				break;
			}
		}
		
		if ($nameOrID == "ID") {
			return $campid;
			}
		elseif ($nameOrID == "Name") {
			return $campname;
			}
	}
	
    private function _roofType($rt) {

        switch($rt) {
            case 'Tile - Concrete':
            case 'Tile - Spanish':
                $rd = 'Tiles';
            break;

            case 'Composite':
                $rd = 'Asphalt Shingle';
            break;

            case 'Metal':
                $rd = 'Corrugated Metal';
            break;

            case 'Membrane':
                $rd = 'Membrane';
            break;

            case 'Ground Mount':
            case 'Other':
            case "":
            default:
                $rd = "";
            break;

            /*
            "Metal Standing"
            */
        }
        return $rd;
    }


}