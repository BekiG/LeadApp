@layout('template')
@section('title')
EcoMark Admin - Login
@endsection

@section('navigation')
@parent
@endsection

@section('content')

    {{ Form::open('my/route'); }}
        <div>
            {{ Form::label('username', 'Username'); }}
            {{ Form::text('username'); }}
        </div>

        <div>
            {{ Form::label('password', 'Password'); }}
            {{ Form::password('password'); }}
        </div>

        {{ Form::submit('Login'); }}

    {{ Form::close(); }}

@endsection