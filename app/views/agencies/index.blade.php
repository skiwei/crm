@extends('layouts.crm')

@section('content')

	<h1>CRM</h1>
	
	@include('layouts.partials.errors')
	
	<p>{{link_to_route('agencies.create', 'Upload File')}}</p>
	
	{{Form::open(['route'=>'agenciesByCity', 'method'=>'GET'])}}
	
		<div class='form-group'>
			{{Form::label('city', 'City:')}}<br>
			{{Form::select('city', $cityOptions)}} 
			{{Form::submit('Search', ['class'=>'btn btn-primary'])}}
		</div>
		
	{{Form::close()}}
	
	{{Form::open(['route'=>'schedulesByDate', 'method'=>'GET'])}}
	
		<div class='form-group'>	
			{{Form::label('date', 'Date:')}}<br>
			{{Form::text('date', null, ['class'=>'datepicker'])}} 
			{{Form::submit('Search', ['class'=>'btn btn-primary'])}}
		</div>
		
	{{Form::close()}}
	
@stop

@section('js')
	@include('layouts.partials.jquery-ui')
	
	<script>
		$(function()
		{
			$('.datepicker').datepicker({dateFormat: 'yy-mm-dd'});
		});
	</script>	
@stop
