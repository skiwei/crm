@extends('layouts.crm')

@section('content')

	@include('layouts.partials.errors')
	
	{{Form::model($staff, ['route'=>['staffs.update', $staff->id], 'method'=>'PUT'])}}
	
		@include('staffs.partials.createEditForm', ['submitText'=>'Update'])
	
	{{Form::close()}}
	
	{{Form::open(['route'=>['staffs.destroy', $staff->id], 'method'=>'DELETE'])}}
	
		{{Form::submit('Delete', ['class'=>'btn btn-danger', 'data-confirm'=>'Are you sure you want to delete this staff?'])}}	
	
	{{Form::close()}}
	
@stop

