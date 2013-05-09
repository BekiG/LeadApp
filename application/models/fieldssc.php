<?php

class FieldsSC {

    public $title = "SolarCity Channel Partner";

    public $states = array(
    	'AZ' => 'Arizona',
   		'CA' => 'California',
   		'CO' => 'Colorado',
    	'NY' => 'New York'
		/*   	
        'TX' => 'Texas'
        */
    );

    public $electric_utility = array(
    	/*
        'Arizona' => array(
            'AZ - Arizona Public Service' => 'AZ - Arizona Public Service',
            'AZ - Salt River Project' => 'AZ - Salt River Project'
        ),
        'California' => array(
            'CA - San Diego Gas Electric' => 'CA - San Diego Gas Electric',
            'CA - Southern California Edison' => 'CA - Southern California Edison'
        ),
        */
		'Arizona' => array(
			'AZ - Arizona Public Service' => 'AZ - Arizona Public Service',
			'AZ - Salt River Project' => 'AZ - Salt River Project'
		),
			
        'Colorado' => array(
            'CO - Xcel Energy' => 'CO - Xcel Energy',
            'CO - United Power' => 'CO - United Power',
            'CO - IREA' => 'CO - IREA',
            'CO - City of Longmont' => 'CO - City of Longmont',
            'CO - Fort Collins' => 'CO - Fort Collins',
            'CO - Colorado Springs' => 'CO - Colorado Springs'
        ),
    	/*
        'Texas' => array(
            'TX - TXU' => 'TX - TXU',
            'TX - Reliant' => 'TX - Reliant',
            'TX - Kenetic' => 'TX - Kenetic',
            'TX - Cirro Energy' => 'TX - Cirro Energy',
            'TX - Champion' => 'TX - Champion',
            'TX - Ambit' => 'TX - Ambit',
            'TX - Direct Energy' => 'TX - Direct Energy',
            'TX - Tri County' => 'TX - Tri County'
        ),
       	*/
        '(Other)' => 'Other (clarify in notes)'
    );
    public $cmp_rep = array(
        '' => '--None--',
    	// 'Aaron Kinzig' => 'Aaron Kinzig',
	// 'Alante Thalley' => 'Alante Thalley',
    	'Alex Valdez' => 'Alex Valdez',
	// 'CJ McLaughlin' => 'CJ McLaughlin',
	'Brian Shintaku' => 'Brian Shintaku',
    	'Chad Gerek' => 'Chad Gerek',
    	// 'Colin Corbin' => 'Colin Corbin',
        'Collin McGann' => 'Collin McGann',
        'Dakotah McGinlay' => 'Dakotah McGinlay',
	'Dustin Traphagan' => 'Dustin Traphagan',
	'Helen Ragan' => 'Helen Ragan',
        'Ian Melchior' => 'Ian Melchior',
        'Jake DiRe' => 'Jake DiRe',
        // 'Jenna Manchego' => 'Jenna Manchego',
	'Jeremy Janis' => 'Jeremy Janis',
        'Johnny Morris' => 'Johnny Morris',
		'Josh Anderson' => 'Josh Anderson',
	'Justin Cook' => 'Justin Cook',
	'Lawrence Mendez' => 'Lawrence Mendez',
	'Kelley Law' => 'Kelley Law',
	// 'Khafre Buxton' => 'Khafre Buxton',
	'Maria Johnsen' => 'Maria Johnsen',
	// 'Marshall Andrew' => 'Marshall Andrew',
	'Mohamed Idris' => 'Mohamed Idris',
	'Nathan Brown' => 'Nathan Brown',
	'Nolan Shockey' => 'Nolan Shockey',
	'Rachel Burris' => 'Rachel Burris',
	'Raoul Vehill' => 'Raoul Vehill',
	'Samantha Casebolt' => 'Samantha Casebolt',
    	'Scott Wilde' => 'Scott Wilde',
	'Taylor Duncan' => 'Taylor Duncan',
	'Trevor Woessner' => 'Trevor Woessner',
	'Tyler Ward' => 'Tyler Ward',
        'Zachary McGinlay' => 'Zachary McGinlay',
	// 'Zack Judish' => 'Zack Judish'
    );
    public $lead_source = array(
        /*
		'Arizona' => array(
            'Gun Show' => 'Gun Show',
            'Sunflower Market - Phoenix' => 'Sunflower Market - Phoenix',
            'Sunflower Market - Scottsdale' => 'Sunflower Market - Scottsdale'
        ),
		*/
        'Colorado' => array(
            'Alanola Health Care Event' => 'Alanola Health Care Event',
            /*
        	'Ace Hardware - Highlands Ranch' => 'Ace Hardware - Highlands Ranch',
            'Ace Hardware - Lakewood' => 'Ace Hardware - Lakewood',
            'Ace Hardware - Westminster' => 'Ace Hardware - Westminster',
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
        'Other' => array(
            'Door-to-Door' => 'Door-to-Door',
			'Retail Venue' => 'Retail Venue',
			'Trade Show' => 'Trade Show',
			'Referral' => 'Referral',
            'Self Gen' => 'Self Gen',
            'Other' => 'Other (add location in notes)'
        )
    );
}
