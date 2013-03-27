@layout('template')
@section('title')
EcoMark Admin - Debugging Lead
@endsection

@section('navigation')
@parent
@endsection

@section('content')
<div class="crumb">{{HTML::link('admin/active', 'Back to Active Leads') }}</div>
    <h1>Debugging sends:</h1>
    {{ $data }}
		
@endsection