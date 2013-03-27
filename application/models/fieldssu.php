<?php

class FieldsSU {

    public $title = "Solar Universe";

    public $states = array(
        'CA' => 'California'
    );

    public $electric_utility = array(
        'California' => array(
            'CA - San Diego Gas Electric' => 'CA - San Diego Gas Electric',
            'CA - Southern California Edison' => 'CA - Southern California Edison'
        ),
        '(Other)' => 'Other (clarify in notes)'
    );
    public $cmp_rep = array(
        '' => '--None--',
        'Alex Valdez' => 'Alex Valdez',
        'Jake DiRe' => 'Jake DiRe',
        'Joey Bartuska' => 'Joey Bartuska',
    );
    public $lead_source = array(
        'Other' => array(
            'Door-to-Door' => 'Door-to-Door',
            'Self Gen' => 'Self Gen',
            'Other' => 'Other (add location in notes)'
        )
    );
}