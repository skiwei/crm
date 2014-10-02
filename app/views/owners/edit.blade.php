@extends('layouts.crm')

@section('content')

	@include('layouts.partials.errors')
	
	{{Form::model($owner, ['route'=>['owners.update', $owner->id], 'method'=>'PUT'])}}
	
		@include('owners.partials.createEditForm', ['submitText'=>'Update'])
	
	{{Form::close()}}
	
@stop
