@layout('template')
@section('title')
EcoMark Active Leads
@endsection

@section('navigation')
@parent
@endsection

@section('content')
<div class="crumb">{{HTML::link('admin/active', 'Back to Active Leads') }}</div>
<h1>View/Edit Single Lead</h1>
{{ Form::open() }}
<fieldset>
    <legend>Contact Info</legend>
    <div>
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', $lead->first_name) }}
    </div>
    <div>
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', $lead->last_name) }}
    </div>
    <div>
        {{ Form::label('relationship_status', 'Relationship Status') }}
        {{ Form::select('relationship_status', $fields->relationship_status) }}
    </div>
	<div>
        {{ Form::label('spouse_name', 'Spouse Name') }}
        {{ Form::text('spouse_name', $lead->spouse_name) }}
    </div>
    <div>
        {{ Form::label('phone1', 'Main Phone') }}
        {{ Form::text('phone1', $lead->phone1) }}
    </div>
    <div>
        {{ Form::label('phone2', 'Secondary Phone') }}
        {{ Form::text('phone2', $lead->phone2) }}
    </div>
    <div>
        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', $lead->email) }}
    </div>
    <div>
        {{ Form::label('address', 'Address') }}
        {{ Form::text('address', $lead->address) }}
    </div>
    <div>
        {{ Form::label('city', 'City') }}
        {{ Form::text('city', $lead->city) }}
    </div>
    <div>
        {{ Form::label('state', 'State') }}
        {{ Form::text('state', $lead->state) }}
    </div>
    <div>
        {{ Form::label('zip', 'Zip') }}
        {{ Form::text('zip', $lead->zip) }}
    </div>
</fieldset>
<fieldset>
    <legend>Property Info</legend>
    <div>
        {{ Form::label('electric_utility', 'Electricity Provider') }}
        {{ Form::text('electric_utility', $lead->electric_utility) }}
    </div>
    <div>
        {{ Form::label('electric_bill', 'Average Monthly Electric Bill') }}
        {{ Form::text('electric_bill', $lead->electric_bill) }}
    </div>
    <div>
        {{ Form::label('roof_type', 'Roof Type') }}
        {{ Form::select('roof_type', $fields->roof_type, $lead->roof_type) }}
    </div>
    <div>
        {{ Form::label('roof_orientation', 'Roof Orientation') }}
        {{ Form::select('roof_orientation', $fields->roof_orientation, $lead->roof_orientation) }}
    </div>
    <div>
        {{ Form::label('shading_issues', 'Shading Issues') }}
        {{ Form::select('shading_issues', $fields->shading_issues, $lead->shading_issues) }}
    </div>
    <div>
        {{ Form::label('credit_score', 'Credit Score 700+ ?') }}
        {{ Form::select('credit_score', $fields->credit_score, $lead->credit_score) }}
    </div>
</fieldset>
<fieldset>
    <legend>Notes</legend>
    <div>
        {{ Form::label('buying_motives', 'Customers buying motives, notes') }}
        {{ Form::textarea('buying_motives', $lead->buying_motives) }}
    </div>
</fieldset>
<fieldset>
    <legend>Appointment Request</legend>
    <div>
        {{ Form::label('lead_request', 'Appointment Request') }}
        {{ Form::select('lead_request', $fields->lead_request, $lead->lead_request) }}
    </div>
    <div>
        {{ Form::label('best_days', 'Best days to call') }}
        {{ Form::select('best_days', $fields->best_days, $lead->best_days) }}
    </div>
    <div>
        {{ Form::label('best_time', 'Best time to call') }}
        {{ Form::select('best_time', $fields->best_time, $lead->best_time) }}
    </div>
    <div>
        {{ Form::label('appointment_date', 'Requested Appointment Date') }}
        {{ Form::text('appointment_date', $lead->appointment_date) }}
        <p class="note">Must be entered in this format: xx/xx/xxxx<em>(ex 02/15/2012)</em></p>
    </div>
    <div>
        {{ Form::label('appointment_time', 'Requested Appointment Time') }}
        {{ Form::text('appointment_time', $lead->appointment_time) }}
        <p class="note">Must be entered in this format: xx:xx __ <em>(ex. 06:00 pm)</em></p>
    </div>
</fieldset>
<div>
    @if($status == 'active')
    {{ Form::submit('Save Lead') }}
    @else
    <p>Lead already sent, {{ HTML::link('admin/active','View active Leads') }}</p>
    @endif
</div>
{{ Form::close() }}
@endsection