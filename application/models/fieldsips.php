<?php

class FieldsIPS {

    public $title = "IPS";

    public $states = array(
        'CO' => 'Colorado',
        /*
	'AZ' => 'Arizona',
        'CA' => 'California',
        'TX' => 'Texas'
	*/
    );

    public $electric_utility = array(
        'Colorado' => array(
            'CO - Xcel Energy' => 'CO - Xcel Energy',
            'CO - United Power' => 'CO - United Power',
            'CO - IREA' => 'CO - IREA',
            'CO - City of Longmont' => 'CO - City of Longmont',
            'CO - Fort Collins' => 'CO - Fort Collins',
            'CO - Colorado Springs' => 'CO - Colorado Springs'
        ),
        '(Other)' => 'Other (clarify in notes)'
    );
    public $cmp_rep = array(
		'' => '--None--',
        'Alex Valdez' => 'Alex Valdez',
        // 'Bethany Garcia' => 'Bethany Garcia',
        // 'Blake Eden' => 'Blake Eden',
		'CJ McLaughlin' => 'CJ McLaughlin',
    	'Collin McGann' => 'Collin McGann',
        'Dakotah McGinlay' => 'Dakotah McGinlay',
        'Ian Melchior' => 'Ian Melchior',
        'Jake DiRe' => 'Jake DiRe',
        // 'Jenna Manchego' => 'Jenna Manchego',
        // 'Joey Bartuska' => 'Joey Bartuska',
        'Johnny Morris' => 'Johnny Morris',
        // 'Martin Sare' => 'Martin Sare',
		// 'Nicholas Lefevre' => 'Nicholas Lefevre',
	'Mohamed Idris' => 'Mohamed Idris',	
	'Nolan Shockey' => 'Nolan Shockey',
		// 'Sonya Etnier' => 'Sonya Etnier',
		'Trevor Woessner' => 'Trevor Woessner',
        'Zachary McGinlay' => 'Zachary McGinlay'
    );

    public $lead_source = array(
        '' => '--None--',
		'Door-to-Door' => 'Door-to-Door',
		'Self Gen' => 'Self Gen',
		'Other' => 'Other (add location in notes)',
		/*
		'Arizona' => array(
            'Gun Show' => 'Gun Show',
            'Sunflower Market - Phoenix' => 'Sunflower Market - Phoenix',
            'Sunflower Market - Scottsdale' => 'Sunflower Market - Scottsdale'
        ),
		*/
        'Colorado' => array(
            'Alanola Health Care Event' => 'Alanola Health Care Event',
            'Ace Hardware - Highlands Ranch' => 'Ace Hardware - Highlands Ranch',
            'Ace Hardware - Lakewood' => 'Ace Hardware - Lakewood',
            'Ace Hardware - Westminster' => 'Ace Hardware - Westminster',
            /*
			'Sunflower Market - Arvada' => 'Sunflower Market - Arvada',
            'Sunflower Market - Aurora' => 'Sunflower Market - Aurora',
            'Sunflower Market - Boulder' => 'Sunflower Market - Boulder',
            'Sunflower Market - Denver Highlands' => 'Sunflower Market - Denver Highlands',
            'Sunflower Market - Greenwood Village' => 'Sunflower Market - Greenwood Village',
            'Sunflower Market - Highlands Ranch' => 'Sunflower Market - Highlands Ranch',
            'Sunflower Market - Lafayette' => 'Sunflower Market - Lafayette',
            'Sunflower Market - Littleton' => 'Sunflower Market - Littleton',
            'Sunflower Market - Thornton' => 'Sunflower Market - Thornton',
            'Sunflower Market - Univ Hills' => 'Sunflower Market - Univ Hills'
			*/
        ),
	/*
        'Texas' => array(
            'Sunflower Market - Dallas' => 'Sunflower Market - Dallas',
            'Rosemeads Gardens' => 'Rosemeads Gardens',
            'Strongs Nursery' => 'Strongs Nursery',
            'Rubials Garden Store' => 'Rubials Garden Store'
        ),
	*/
    );
}
