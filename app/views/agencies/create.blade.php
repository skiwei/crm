@extends('layouts.crm')

@section('content')

	<h1>Import Agencies</h1>
	
	@include('layouts.partials.errors')
	
	{{Form::open(['route'=>'agencies.store', 'files'=>true])}}
	
		<div class='form-group'>
			{{Form::file('agencies_file')}}
		</div>
		
		<div class='form-group'>
			{{Form::submit('Upload', ['class'=>'btn btn-primary'])}}
		</div>
	
	{{Form::close()}}
	
@stop
