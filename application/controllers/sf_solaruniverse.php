<?php
/*
 * EcoMark SalesForce Fields
 */

//application/controllers/sf_solaruniverse.php
class SFSolarUniverse extends SalesForce {

    // set mailto values
    private $msg = "";
    private $w = array('<p>', '</p>');
    private $h = array('<strong>', '</strong>: ');
    private $br = '<br />';

    //private $to = 'ian@ecomarkusa.com,jake@ecomarkusa.com,leila@ecomarkusa.com';
    private $to = 'ian@ecomarkusa.com';
    private $from = 'ecomarkleads@gmail.com';
    private $subject = "Lead Submitted - ";
    private $headers = "From: leads@ecomarkusa.com\r\nReply-To: leads@ecomarkusa.com\nContent-type: text/html; charset=UTF-8;";

	// include static values
	private $client = array(

	);
	
	public function __construct() {
		parent::__construct();
	}
	
	public function prepLead($lead) {
		//$this->sfPrep = array_merge($this->common, $this->client);
		parent::prepLead($lead);
		
		// client specific
		$this->sfPrep['spouse_name']      = $lead->spouse_name;
		$this->sfPrep['phone2']           = $lead->phone2;
		$this->sfPrep['electric_utility'] = $lead->electric_utility;
		$this->sfPrep['electric_bill']    = $lead->electric_bill;
		$this->sfPrep['roof_type']        = $lead->roof_type;
		$this->sfPrep['roof_orientation'] = $lead->roof_orientation;
		$this->sfPrep['shading_issues']   = $lead->shading_issues;
		$this->sfPrep['credit_score']     = $lead->credit_score;
		$this->sfPrep['buying_motives']   = $lead->buying_motives;
		$this->sfPrep['lead_request']     = $lead->lead_request;
		$this->sfPrep['lead_called']      = $lead->lead_called;
		$this->sfPrep['best_days']        = $lead->best_days;
        $this->sfPrep['best_time']        = $lead->best_time;
		$this->sfPrep['appointment_date'] = $lead->appointment_date;
		$this->sfPrep['appointment_time'] = $lead->appointment_time;
		$this->sfPrep['cmp_rep']          = $lead->cmp_rep;
		$this->sfPrep['lead_source']      = $lead->lead_source;
		$this->sfPrep['lead_type']        = $lead->lead_type;

        $this->sfData = array_merge($this->client, $this->sfPrep);

		//parent::sendLead($this->sfData);
        $this->_buildMsg();
	}

    private function _buildMsg() {

        if($this->sfData['lead_source'] == 'Self Gen') {
            $this->subject .= 'Self Gen, ';
        }
        $this->subject .= $this->sfData['lead_type'];

        $this->msg = $this->w[0];
        foreach($this->sfData as $key => $value) {
            $this->msg .= $this->h[0] . $this->_formatField($key) . $this->h[1] . $value . $this->br;
        }
        $this->msg .= $this->w[1];
    }

    private function _formatField($field) {
        $field = str_replace('_', ' ', mb_convert_case($field, MB_CASE_TITLE));
        return $field;
    }

    public function sendLead() {
        if($this->debug) {
            // dont send
        } else {
            //mail($this->to, $this->subject, $this->msg, $this->headers);
            $message = Message::to($this->to)
                ->from($this->from, 'EcoMark')
                ->subject($this->subject)
                ->body($this->msg)
                ->html(TRUE)
                ->send();

            if($message->was_sent($this->to))
            {
                echo 'Sweet, the email went thru!!';
            } else {
                echo 'Fuuck, something went wrong...';
            }
        }
    }

    public function debugResults($lead) {

        $data = "<h2>Preview Email</h2>";
        $data .= "<p>Sending to: " . $this->to . "</p>";
        $data .= "<h3>" . $this->subject . "</h3>";
        $data .= "<p>" . $this->headers . "</p>";
        $data .= $this->msg;

        return $data;
    }
}