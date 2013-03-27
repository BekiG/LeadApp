<?php

class FieldsSP {

    public $title = "SunPower";

    public $states = array(
        'CA' => 'California',
    	'CO' => 'Colorado'
    );

    public $electric_utility = array(

        'California' => array(
            'CA - PG&E' => 'CA - PG&E',
        ),
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
	// 'Adriell Fields' => 'Adriell Fields',
	'Alex Munoz' => 'Alex Munoz',
    'Alex Valdez' => 'Alex Valdez',
	'Austin Carpenter' => 'Austin Carpenter',
	'Belinda Jung' => 'Belinda Jung',
	'Brandon Burnette' => 'Brandon Burnette',
    // 'Bailey Rowe' => 'Bailey Rowe',
    // 'Dakotah McGinlay' => 'Dakotah McGinlay',
	// 'Daniel Walsh' => 'Daniel Walsh',
	//'Danielle Finley' => 'Danielle Finley',
	'Dakotah McGinlay' => 'Dakotah McGinlay',
	'Darren Brannan' => 'Darren Brannan',
	'Eduard Farfan' => 'Eduard Farfan',
	// 'Finn Oyen' => 'Finn Oyen',
	//'Gergory Holt' => 'Gregory Holt',
	'Ian Melchior' => 'Ian Melchior',
	'Jake DiRe' => 'Jake DiRe',
	'Jake Leininger' => 'Jake Leininger',
   	'Johnny Morris' => 'Johnny Morris',
	'Kat Newell' => 'Kat Newell',
	'Khafre Buxton' => 'Khafre Buxton',
	'Kinsey Carlson' => 'Kinsey Carlson',
	// 'Joey Bartuska' => 'Joey Bartuska',
	'Jonathan Galindo' => 'Jonathan Galindo',
	// 'Jordan Ingersoll' => 'Jordan Ingersoll',
	// 'Kathy Koch' => 'Kathy Koch',
	// 'Keith Workman' => 'Keith Workman',
	'Maria Johnsen' => 'Maria Johnsen',
    'Mohamed Idris' => 'Mohamed Idris',
    'Nolan Shockey' => 'Nolan Shockey',
	'Paul Benschine' => 'Paul Benschine',
	'Pete Grgurevic' => 'Pete Grgurevic',
	'Raoul Vehill' => 'Raoul Vehill',
	'Trevor Woessner' => 'Trevor Woessner',
	'Tyler Ward' => 'Tyler Ward',
	// 'Tyler Peters' => 'Tyler Peters'
    //'Sarah Sherlock' => 'Sarah Sherlock',
	//'Scotty Roberts' => 'Scotty Roberts'
    );

    public $lead_source = array(
    'Door-to-Door' => 'Door-to-Door',
	// 'Nob Hill Foods' => 'Nob Hill Foods',
	// '5K Race' =>'5K Race',
	// 'School Sporting Event' => 'School Sporting Event',
	// 'School Staff Event' => 'School Staff Event',
	// 'Networking Event' => 'Networking Event',
	'OSH - Dublin' => 'OSH - Dublin',
	'OSH - Figarden' => 'OSH - Figarden',
	'OSH - Livermore' => 'OSH - Livermore',
	'OSH - NE Fresno' => 'OSH - NE Fresno',
	'OSH - San Ramon' => 'OSH - San Ramon',
	'OSH - San Leandro' => 'OSH - San Leandro',
	'OSH - San Lorenzo' => 'OSH - San Lorenzo',
	'Self-Gen' => 'Self-Gen',
	'Other' => 'Other'
    );
}
