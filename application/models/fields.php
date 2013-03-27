<?php

// To add a new field for all client forms:

// 		public $<variable_name> = array(
//			'<submit value>' => '<display value>',
//			'<submit value>' => '<display value>',
// 		);

class Fields {

    public $best_days = array(
        '' => '--None--',
        'Weekdays' => 'Weekdays',
        'Weekends' => 'Weekends',
        'Other' => 'Other (Clarify in Notes)'
    );

    public $best_time = array(
        '' => '--None--',
        'Morning' => 'Morning',
        'Midday' => 'Afternoon',
        'Evening' => 'Evening',
        'Other' => 'Other (Clarify in Notes)'
    );
	
    public $credit_score = array(
        '' => '--None--',
        'Yes' => 'Yes',
        'No' => 'No',
        'Not Sure' => 'Not Sure',
    );

    public $lead_request = array(
        '' => '--None--',
        'Phone Follow Up' => 'Phone Follow Up',
        'Site Evaluation' => 'Site Evaluation',
    );
	
    public $lead_called = array(
        '' => '--None--',
        'No' => 'No',
        'Yes' => 'Yes'
    );
	
	public $motivation = array(
        'Save money' => 'Save Money',
        'Environment' => 'Environment',
        'Rebates' => 'Rebates',
		'Other' => 'Other'
    );
	
	public $relationship_status = array(
		'' => '--None--',
		'Single' => 'Single',
		'Married' => 'Married',
		'Significant Other' => 'Significant Other'
	);
	
	public $roof_orientation = array(
        '' => '--None--',
        'S' => 'South',
        'E' => 'East',
        'W' => 'West',
        'SE' => 'South East',
        'SW' => 'South West',
        'EW' => 'East West',
        'Flat' => 'Flat',
        'Not Sure' => 'Not Sure',
    );

    public $roof_slant = array(
        '' => '--None--',
        'Flat' => 'Flat',
        'Inclined' => 'Inclined'
    );
	
    public $roof_type = array(
        '' => '--None--',
        'Composite' => 'Composite Shingle',
        'Tile - Concrete' => 'Concrete Tile',
        'Tile - Spanish' => 'Spanish Tile',
        'Ground Mount' => 'Ground Mount',
        'Metal' => 'Metal',
        'Other' => 'Other (clarify in notes)'
    );

    public $shading_issues = array(
        '' => '--None--',
		'None' => 'None',
        'A Little' => 'Minor',
        'A Lot' => 'Major',
        'Not Sure' => 'Not Sure',
    );



}
