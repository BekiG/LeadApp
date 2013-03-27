@layout('template')
@section('title')
EcoMark Admin - Create New Lead
@endsection

@section('navigation')
@parent
@endsection

@section('content')

<?php

    switch($client) {

        case 'ips':
        $title = "IPS";
        break;

        case 'rg':
        $title = "Real Goods";
        break;

        case 'salt':
        $title = "SALT";
        break;

        case 'sc':
        $title = "SolarCity";
        break;

        case 'su':
        $title = "Solar Universe";
        break;

        case 'sp':
        $title = "SunPower";
        break;
    }
?>
    <h1>Thanks for filling out a {{ $title }} Lead</h1>
    <p>Return to the <a href="/lead/{{ $client }}">{{ $title }} form</a></p>
		
		
		
		
@endsection