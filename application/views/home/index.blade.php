@layout('template')
@section('title')
EcoMark Admin App
@endsection

@section('navigation')
@parent
    <li></li>
@endsection

@section('content')
    <h1>Welcome!</h1>
    <p>Fill in a lead for:</p>
    <ul>
        <li>{{ HTML::link_to_action('lead@sc', 'SolarCity'); }}</li>
        <li>{{ HTML::link_to_action('lead@rg', 'Real Goods'); }}</li>
        <li>{{ HTML::link_to_action('lead@salt', 'SALT'); }}</li>
        <li>{{ HTML::link_to_action('lead@su', 'Solar Universe'); }}</li>
        <li>{{ HTML::link_to_action('lead@ips', 'IPS'); }}</li>
        <li>{{ HTML::link_to_action('lead@sp', 'SunPower'); }}</li>
    </ul>
@endsection