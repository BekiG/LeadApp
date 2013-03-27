<?php
    /*
    * Real Goods SalesForce Fields
    */

//application/controllers/sf_realgoods.php
class SFRealGoods extends SalesForce {

    // include static values
	private $client = array(
        'oid'             => '00D300000001RbL',
        'lead_source'     => 'Paid Leads',
        'Campaign_ID'     => '70160000000XUhE',
        '00N60000001V4ZL' => 'Residential',
        '00N60000002V3mm' => 'Yes',
        '00N600000029FiK' => 'EcoMark'
    );

    public function __construct() {
        parent::__construct();
    }

    public function prepLead($lead) {

        parent::prepLead($lead);

        // client specific
        $this->sfPrep['00N60000001bEwa'] = $lead->spouse_name;
        $this->sfPrep['mobile']          = $lead->phone2;
        $this->sfPrep['00N60000001bEw2'] = $lead->electric_utility;
        $this->sfPrep['00N600000026yjM'] = $lead->best_time;
		$this->sfPrep['lead_type']       = $lead->lead_type;

        // Custom transforms
        $this->sfPrep['00N60000001Zn9o'] = $this->_roofType($lead->roof_type);
        $this->sfPrep['00N60000001bEwG'] = $this->_shadingIssues($lead->shading_issues);
        $this->sfPrep['00N60000002V7pV'] = $this->_goodCredit($lead->credit_score);
        $this->sfPrep['00N60000001WdAN'] = $this->_notes($lead);

        $this->sfData = array_merge($this->client, $this->sfPrep);

        //parent::sendLead($this->sfData);

    }


    private function _formatField($field) {
        $field = str_replace('_', ' ', mb_convert_case($field, MB_CASE_TITLE));
        return $field;
    }


	
    private function _roofType($rt) {
        switch($rt) {

            case "Composite":
                $rd = "Composition";
                break;

            case "Tile - Concrete":
            case "Tile - Spanish":
                $rd  = "Concrete tile (includes S tile)";
                break;

            case "Ground Mount":
            case "Other":
                $rd = "Other";
                break;

            case "":
            default:
                $rd = "";
                break;
        }
        return $rd;
    }

    private function _shadingIssues($si) {
        $sd = "";

        switch($si) {
            case "A Little":
                $sd = "Some";
            break;

            case "A Lot":
                $sd = "Too much";
            break;

            case "Not Sure":
                $sd = "Not Sure";
            break;

            case "None":
            case "":
                $sd = "";
            break;
        }
        return $sd;
    }

    private function _goodCredit($gc) {
        switch($gc) {
            case "Yes":
                $gd = "Good (>700)";
                break;

            case "No":
                $gd = "Bad (<700)";
                break;

            case "Not sure":
                $gd = "Unsure";
                break;

            case "":
            default:
                $gd = "";
            break;
        }
        return $gd;
    }

    private function _notes($lead) {
        $sep = '; ';
        $bd  =                                         $lead->buying_motives;
        $bd .= $sep . "Electric Provider: "          . $lead->electric_utility;
        $bd .= $sep . "Roof Orientation: "           . $lead->roof_orientation;
        $bd .= $sep . "Best Days to Call: "          . $lead->best_days;
        $bd .= $sep . "Lead Request: "               . $lead->lead_request;
        $bd .= $sep . "Requested Appointment Date: " . $lead->appointment_date;
        $bd .= $sep . "Requested Appointment Time: " . $lead->appointment_time;
		$bd .= $sep . "Relationship Status: " 		 . $lead->relationship_status;
		
        return $bd;
    }
}