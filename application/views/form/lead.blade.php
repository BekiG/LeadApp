@layout('template')
@section('title')
EcoMark Admin - Create New Lead
@endsection

@section('navigation')
@parent
@endsection

@section('content')
    <h1>Enter new {{ $client->title }} Lead</h1>
    {{ Form::open('lead', 'POST', array('id' => 'leadform')) }}
        <!-- check for login errors flash var -->
        @if (Session::has('login_errors'))
        <span class="error">Check your Errors!</span>
        @endif
        <fieldset>
        <legend>Contact Info</legend>
            <div>
                {{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', '', array('class' => 'required')) }}
            </div>
            <div>
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', '', array('class' => 'required')) }}
            </div>
			<div>
                {{ Form::label('relationship_status', 'Relationship Status') }}
                {{ Form::select('relationship_status', $fields->relationship_status, '', array('class' => 'required')) }}
            </div>
			<div>
                {{ Form::label('spouse_name', 'Spouse Name') }}
                {{ Form::text('spouse_name') }}
            </div>
            <div>
                {{ Form::label('phone1', 'Main Phone') }}
                {{ Form::text('phone1', '', array('class' => 'required')) }}
            </div>
            <div>
                {{ Form::label('phone2', 'Secondary Phone') }}
                {{ Form::text('phone2') }}
            </div>
            <div>
                {{ Form::label('email', 'Email') }}
                {{ Form::text('email') }}
                <p class="note">Leave blank if no email available, do not enter n/a</p>
            </div>
            <div>
                {{ Form::label('address', 'Address') }}
                {{ Form::text('address', '', array('class' => 'required')) }}
            </div>
            <div>
                {{ Form::label('city', 'City') }}
                {{ Form::text('city', '', array('class' => 'required')) }}
            </div>
            <div>
                {{ Form::label('state', 'State') }}
                {{ Form::select('state', $client->states) }}
            </div>
            <div>
                {{ Form::label('zip', 'Zip') }}
                {{ Form::text('zip', '', array('class' => 'required')) }}
                <p class="note">Five digits only</p>
            </div>
        </fieldset>
        <fieldset>
        <legend>Property Info</legend>
        <div>
            {{ Form::label('electric_utility', 'Electricity Provider') }}
            {{ Form::select('electric_utility', $client->electric_utility) }}
        </div>
        <div>
            {{ Form::label('electric_bill', 'Average Monthly Electric Bill') }}
            {{ Form::text('electric_bill', '', array('class' => 'required')) }}
            <p class="note"><strong>Do not include the dollar sign ($).</strong> (Ex: "150", not "$150")</p>
			<p class="note">Enter "Given on Appointment" if unknown at the time of lead creation</p>
	    </div>
        <div>
            {{ Form::label('roof_type', 'Roof Type') }}
            {{ Form::select('roof_type', $fields->roof_type, '', array('class' => 'required')) }}
        </div>
		<!-- Roof Slant is only for SunPower.  sf_sunpower.php has a line to always send the "inclined."
		<div>
            {{ Form::label('roof_slant', 'Roof Slant') }}
            {{ Form::select('roof_slant', $fields->roof_slant, '', array('class' => 'required')) }}
        </div>
		-->
        <div>
            {{ Form::label('roof_orientation', 'Roof Orientation') }}
            {{ Form::select('roof_orientation', $fields->roof_orientation, '', array('class' => 'required')) }}
        </div>
        <div>
            {{ Form::label('shading_issues', 'Shading Issues') }}
            {{ Form::select('shading_issues', $fields->shading_issues, '', array('class' => 'required')) }}
        </div>
        <div>
            {{ Form::label('credit_score', 'Credit Score 700+ ?') }}
            {{ Form::select('credit_score', $fields->credit_score, '', array('class' => 'required')) }}
        </div>
		<!--
		<div>
			{{ Form::label('motivation', 'Motivation for Solar') }}
            {{ Form::select('motivation', $fields->motivation, '', array('class' => 'required')) }}
		</div>
		-->
        </fieldset>
        <fieldset>
            <legend>Notes</legend>
            <div>
                {{ Form::label('buying_motives', 'Customers buying motives, notes') }}
                {{ Form::textarea('buying_motives') }}
            </div>

        </fieldset>
        <fieldset>
            <legend>Appointment Request</legend>
            <div>
                {{ Form::label('lead_request', 'Appointment Request') }}
                {{ Form::select('lead_request', $fields->lead_request, '', array('class' => 'required')) }}
                {{ Form::label('lead_request', 'Please select the type of Appointment Request.', array('class' => 'error')) }}
            </div>
            <div>
                {{ Form::label('lead_called', 'Was the appointment called in?') }}
                {{ Form::select('lead_called', $fields->lead_called, '', array('class' => 'required')) }}
                <p class="note">Only select "Yes" if the appointment request was called directly into our Solar Provider.</p>
            </div>
            <div>
                {{ Form::label('best_days', 'Best days to call') }}
                {{ Form::select('best_days', $fields->best_days, '', array('class' => 'required')) }}
            </div>
            <div>
                {{ Form::label('best_time', 'Best time to call') }}
                {{ Form::select('best_time', $fields->best_time, '', array('class' => 'required')) }}
            </div>
            <div>
                {{ Form::label('appointment_date', 'Requested Appointment Date') }}
                {{ Form::text('appointment_date') }}
                <p class="note">Must be entered in this format: xx/xx/xxxx<em>  (ex 02/15/2012)</em></p>
            </div>
            <div>
                {{ Form::label('appointment_time', 'Requested Appointment Time') }}
                {{ Form::text('appointment_time') }}
                <p class="note">Must be entered in this format: xx:xx (24 hour time)<em>(ex. 09:00, 15:30, etc.)</em></p>
            </div>
        </fieldset>
        <fieldset>
            <legend>EcoMark Info</legend>
            <div>
                {{ Form::label('cmp_rep', 'Rep Name') }}
                {{ Form::select('cmp_rep', $client->cmp_rep, '', array('class' => 'required')) }}
            </div>
            <div>
                {{ Form::label('lead_source', 'Lead Source') }}
                {{ Form::select('lead_source', $client->lead_source, '', array('class' => 'required')) }}
            </div>
		<fieldset>
				<strong>THIS FORM IS FOR {{ $client->title }} LEADS ONLY</strong>
		</fieldset>
            <div>
                {{ Form::hidden('lead_type', $client->title) }}
                {{ Form::submit('Submit Lead'); }}
            </div>
        </fieldset>
    {{ Form::close() }}

@endsection