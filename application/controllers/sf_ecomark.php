<?php
/*
 * EcoMark SalesForce Fields
 
 * To 
 
 
 */

//application/controllers/sf_ecomark.php
class SFEcoMark extends SalesForce {

	// include static values
	private $client = array(
		'oid'              => '00DU0000000KrjO',
		'00NU0000001qUoQ'  => 'New lead, screening needed',
		'00NU0000002o5CO'  => 'EcoMark',
		'00NU0000001qUoG'  => 'Full Price',
		'00NU0000001q72v'  => 'Own',
		'00NU0000001q72q'  => 'Single Home',
	);
	
	public function __construct() {
		parent::__construct();
	}
	
	public function prepLead($lead) {
		//$this->sfPrep = array_merge($this->common, $this->client);
		parent::prepLead($lead);
		
		// client specific
		$this->sfPrep['00NU0000001q72W'] = $lead->spouse_name;
		$this->sfPrep['00NU0000001q72R'] = $lead->phone2;
		$this->sfPrep['00NU0000001q735'] = $lead->electric_utility;
		$this->sfPrep['00NU0000001q73A'] = $lead->electric_bill;
		$this->sfPrep['00NU0000001q72g'] = $lead->roof_type;
		$this->sfPrep['00NU0000001q71g'] = $lead->roof_orientation;
		$this->sfPrep['00NU0000001q710'] = $this->_shadingIssues($lead->shading_issues);
		$this->sfPrep['00NU0000002q666'] = $this->_goodCredit($lead->credit_score);
		$this->sfPrep['00NU0000001q72b'] = $lead->buying_motives;
		$this->sfPrep['00NU0000001q73K'] = $lead->best_time;
		$this->sfPrep['00NU0000002rJRe'] = $lead->relationship_status;
		$this->sfPrep['00NU0000002reMw'] = $lead->motivation;
		$this->sfPrep['00NU0000002pbhC'] = $lead->lead_request;
		$this->sfPrep['00NU0000002qBgZ'] = $lead->lead_called;
		$this->sfPrep['00NU0000001q6z6'] = $lead->best_days;
		$this->sfPrep['00NU0000002pI5V'] = $lead->appointment_date;
		$this->sfPrep['00NU0000002pI5a'] = $lead->appointment_time;
		$this->sfPrep['00NU0000001qUMI'] = $lead->cmp_rep;
		$this->sfPrep['00NU0000001qVFC'] = $lead->lead_source;
		$this->sfPrep['00NU0000001qVFW'] = $lead->lead_type;

        $this->sfData = array_merge($this->client, $this->sfPrep);

		//parent::sendLead($this->sfData);
	}
	
    private function _shadingIssues($si) {
        $sd = "";

        switch($si) {
            case "A Little":
                $sd = "Minor";
            break;

            case "Major":
                $sd = "Too much";
            break;

            case "Not Sure":
                $sd = "Not Sure";
            break;

            case "None":
            case "":
                $sd = "None";
            break;
        }

        return $sd;
    }

    private function _goodCredit($gc) {
        switch($gc) {
            case "Yes":
                $gd = "Yes";
                break;

            case "No":
                $gd = "No";
                break;

            case "Not sure":
                $gd = "Given on appointment";
                break;

            case "":
            default:
                $gd = "";
                break;
        }
        return $gd;
    }
}