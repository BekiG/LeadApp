<?php

//application/controllers/lead.php
class Lead_Controller extends Base_Controller {

    public $restful = true;

    public function action_index() {
        // This form has no client...
        // Should kick back to login form
        return View::make('form.lead');
    }
    public function post_index() {
        // post to the db
        $newLead = Input::get();

        // grab lead_called value and convert to boolean
        switch($newLead['lead_called']) {
            case 'Yes':
            $newLead['lead_called'] = TRUE;
            break;

            case '':
            case 'No':
            default:
            $newLead['lead_called'] = FALSE;
            break;
        }

        $lead = new Lead($newLead);
        $lead->save();

		// send lead to EcoMark
		$sf = new SFEcoMark();
		$sf->prepLead($lead);
        $sf->sendLead();
        // probly should do this by posting from each function?
        $route = '';
				
        switch($lead->lead_type) {
						
            case 'IPS';
                $route = 'ips';
            break;

            case 'Real Goods':
                $route = 'rg';
                //$sfRealGoods = new SFRealGoods();
                //$sfRealGoods->prepLead($lead);
            break;

            case 'SALT':
                $route = 'salt';
            break;
			
            case 'SolarCity Channel Partner':
            case 'Solar City':
	    	case 'SolarCity':
                $route = 'sc';
                //$sfSolarCity = new SFSolarCity();
                //$sfSolarCity->prepLead($lead);
            break;

            case 'Solar Universe':
                $route = 'su';
            break;

            case 'SunPower':
                $route = 'sp';
            break;
        }

        return Redirect::to_route('thanks', $route);
    }

    public function get_ips() {

        $fields = new Fields();
        $client = new FieldsIPS();

        return View::make('form.lead')
            ->with('fields', $fields)
            ->with('client', $client);
    }
    public function get_rg() {

        $fields = new Fields();
        $client = new FieldsRG();

        return View::make('form.lead')
            ->with('fields', $fields)
            ->with('client', $client);
    }
    public function get_salt() {

        $fields = new Fields();
        $client = new FieldsSALT();

        return View::make('form.lead')
            ->with('fields', $fields)
            ->with('client', $client);
    }
    public function get_sc() {

        $fields = new Fields();
        $client = new FieldsSC();

        return View::make('form.lead')
            ->with('fields', $fields)
            ->with('client', $client);
    }
    public function get_su() {

        $fields = new Fields();
        $client = new FieldsSU();

        return View::make('form.lead')
            ->with('fields', $fields)
            ->with('client', $client);
    }
    public function get_sp() {

        $fields = new Fields();
        $client = new FieldsSP();

        return View::make('form.lead')
            ->with('fields', $fields)
            ->with('client', $client);
    }
}
