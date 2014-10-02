@extends('layouts.crm')

@section('content')

	@include('layouts.partials.errors')
	
	{{Form::open(['route'=>['owners.store']])}}
	
		@include('owners.partials.createEditForm')
	
	{{Form::close()}}
	
@stop
