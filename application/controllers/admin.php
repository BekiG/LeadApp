<?php

//application/controllers/admin.php
class Admin_Controller extends Base_Controller {

    public $restful = true;

    public function get_index() {

        // Should kick back to login form
        //return View::make('form.lead');
        echo "admin area...";
    }

    public function get_list($status) {
        $leadsInfo = $this->_getStatus($status);
        //if($leadsInfo['title'] != 'Sent' && $leadsInfo['title'] != 'Active') { return Response::error('404'); }
        $leads = Lead::where('sent', '=', $leadsInfo['status'])->order_by('created_at', 'desc')->get();
        return View::make('admin.list')
            ->with('status', $leadsInfo['title'])
            ->with('leads', $leads);
    }

    public function post_list() {
        $selected = Input::get();

        $dest = array_pop($selected);

        $leads = array();

        foreach($selected as $lid) {
            $leads[] = Lead::find($lid);
        }

        if($dest == 'Resend to EcoMark') {
            $this->_resendLeads($leads);
		} else if ($dest == 'Dismiss Leads') {
        	$this-> _dismissLeads($leads);
        } else if ($dest == 'Make Selected Leads Active') {
        		$this-> _makeActive($leads);
        } else {
            $this->_sendLeads($leads);
        }
        return Redirect::to('admin/active');
    }

    public function get_lead($status, $lid) {
        // passed a specific leadID
        $leadsInfo = $this->_getStatus($status);
        $fields = new Fields();
        $lead = Lead::find($lid);

        return View::make('admin.single')
            ->with('status', $status)
            ->with('fields', $fields)
            ->with('lead', $lead);
    }

    public function post_lead($lid) {
        $lead = Input::get();

        $single = DB::table('leads')
            ->where('id', '=', $lid)
            ->update(array(
                'first_name'       => $lead['first_name'],
                'last_name'        => $lead['last_name'],
                'spouse_name'      => $lead['spouse_name'],
                'phone1'           => $lead['phone1'],
                'phone2'           => $lead['phone2'],
                'email'            => $lead['email'],
                'address'          => $lead['address'],
                'city'             => $lead['city'],
                'state'            => $lead['state'],
                'zip'              => $lead['zip'],
                'electric_utility' => $lead['electric_utility'],
                'electric_bill'    => $lead['electric_bill'],
                'roof_type'        => $lead['roof_type'],
                'roof_orientation' => $lead['roof_orientation'],
                'shading_issues'   => $lead['shading_issues'],
                'credit_score'     => $lead['credit_score'],
                'buying_motives'   => $lead['buying_motives'],
                'lead_request'     => $lead['lead_request'],
                'best_days'        => $lead['best_days'],
                'best_time'        => $lead['best_time'],
                'appointment_date' => $lead['appointment_date'],
                'appointment_time' => $lead['appointment_time'],

            ));

        return Redirect::to('admin/active');
    }

    public function get_preview($status, $lid) {
        // passed a specific leadID
        $lead = Lead::find($lid);

        $sf = $this->_buildSF($lead);

        // $sf->debug = FALSE;
        $sf->prepLead($lead);
        $data = $sf->debugResults($sf->sfData); // when debugging, returns html

        return View::make('form.debug')
            ->with('data', $data)
            ->with('lead', $lead);
    }

    private function _getStatus($status) {
       $leadsInfo = array();
        switch($status) {
            case "sent":
                $leadsInfo['title']  = "Sent";
                $leadsInfo['status'] = true;
                return $leadsInfo;
            break;

            case "active":
                $leadsInfo['title']  = "Active";
                $leadsInfo['status'] = false;
                return $leadsInfo;
            break;

            default:
                // not a valid url
                //return Response::error('404');
            break;
        }
    }

    private function _buildSF($lead) {

        switch($lead->lead_type) {

            case "IPS":
                $sf = new SFIPS($lead);
            break;

            case "Real Goods":
                $sf = new SFRealGoods($lead);
            break;

            case "SALT":
                $sf = new SFSALT($lead);
            break;

            case "SolarCity Channel Partner":
            case "SolarCity":
			case "Solar City":
                $sf = new SFSolarCity($lead);
            break;

            case "Solar Universe":
                $sf = new SFSolarUniverse($lead);
            break;

            case "SunPower":
            case "Sun Power":
                $sf = new SFSunPower($lead);
            break;
        }
        if(isset($sf)) {
            return $sf;
        }
    }

    private function _sendLeads($leads) {

        foreach($leads as $lead) {

            $sf = $this->_buildSF($lead);
            $sf->prepLead($lead);

            // Send to client
            $sf->sendLead();

            // leads need to get marked "sent" in salesforce.php
            DB::table('leads')
                ->where('id', '=',$lead->id)
                ->update(array('sent' => TRUE));
        }
    }
    private function _resendLeads($leads) {
        // send to EcoMark
        foreach($leads as $lead) {
            $sf = new SFEcoMark($lead);
            $sf->prepLead($lead);
            $sf->sendLead();
        }
    }
	private function _dismissLeads($leads) {
		// makes active leads sent
		foreach ($leads as $lead) {
			DB::table('leads')
				->where ('id', '=',$lead->id)
				->update(array('sent' => TRUE));
		}
	}
private function _makeActive($leads) {
		// makes sent leads active
		foreach ($leads as $lead) {
			DB::table('leads')
				->where ('id', '=',$lead->id)
				->update(array('sent' => FALSE));
		}
	}
}