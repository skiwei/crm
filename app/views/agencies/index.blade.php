@extends('layouts.crm')

@section('content')

	<h1>CRM</h1>
	
	@include('layouts.partials.errors')
	
	<p>{{link_to_route('agencies.create', 'Upload File')}}</p>
	
	{{Form::open(['route'=>'agenciesByCity'])}}
	
		{{Form::select('city', $cityOptions)}} 
		{{Form::submit('Search', ['class'=>'btn btn-primary'])}}
		
	{{Form::close()}}
	
@stop
