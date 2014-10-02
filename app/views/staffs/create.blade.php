@extends('layouts.crm')

@section('content')

	@include('layouts.partials.errors')
	
	{{Form::open(['route'=>['staffs.store']])}}
	
		@include('staffs.partials.createEditForm')
	
	{{Form::close()}}
	
@stop