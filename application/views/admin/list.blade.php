@layout('template')
@section('title')
EcoMark Active Leads
@endsection

@section('navigation')
@parent
<?php
    $c1 = URI::is( 'admin/active') ? 'active' : '';
    $c2 = URI::is( 'admin/sent') ? 'active' : '';
?>
<li>{{ HTML::link('admin/active', 'Active Leads', array('class' => $c1)) }}</li>
<li>{{ HTML::link('admin/sent', 'Sent Leads', array('class' => $c2)) }}</li>
@endsection

@section('content')
<h1>{{ $status }} Leads</h1>
{{ Form::open() }}
<table id="leadList" class="tablesorter">
    <thead>
    <tr>
        <th></th>
        <th>Date Lead Received</th>
		<th>Last Name</th>
		<th>Street</th>
		<th>Phone</th>
        <th>Email</th>
		<th>Lead Type</th>
        <!--<th>Notes</th>-->
		<th>Called In</th>
		<th>Preview</th>
        @if ($status == 'Active')
        <th></th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach ($leads as $lead)
    @if($lead->lead_called)
    <tr class="low">
    @else
    <tr>
    @endif
        <?php $name = 'lid' . $lead->id ?>
        <td>{{ Form::checkbox($name, $lead->id ) }}</td >
        <td>{{ $lead->created_at }}</td>
		<td>{{ $lead->last_name }}</td>
		<td>{{ $lead->address }}</td>
		<td>{{ $lead->phone1 }}</td>
        <td>{{ $lead->email }}</td>
		
        <td>{{ $lead->lead_type }}</td>
		<!-- <td>{{ $lead->buying_motives }}</td> -->
        @if($lead->lead_called)
        <td class="stop">Yes</td>
        @else
        <td class="go">No</td>
        @endif
        <td>{{ HTML::link_to_route('preview', 'preview', array(strtolower($status),$lead->id)) }}</td>
        @if ($status == 'Active')
        <td>{{ HTML::link_to_route('single', 'edit', array(strtolower($status),$lead->id)) }}</td>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>

<div>
    @if ($status == 'Active')
    {{ Form::submit('Send Selected Leads', array('name' => 'send')) }}
	{{ Form::submit('Dismiss Leads', array('name' => 'dismiss')) }}		
    @endif
	@if ($status == 'Sent')
	{{ Form::submit('Make Selected Leads Active', array('name' => 'makeActive')) }}
	@endif
    {{ Form::submit('Resend to EcoMark', array('name' => 'resend')) }}
</div>

{{ Form::close() }}
@endsection