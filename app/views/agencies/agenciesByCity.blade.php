@extends('layouts.crm') 

@section('content')
		
	<h1><a href="{{route('agencies.index')}}"><span class='glyphicon glyphicon-home'></span></a> Agencies in {{$city}}</h1>
	
	@include('layouts.partials.errors')
	
	{{Form::open(['route'=>['schedules.store']])}}
		<table class='table'>
			<tr>
				<th>&nbsp;</th>
				<th>ID</th>
				<th>Agency Name</th>
				<th>Address</th>
				<th>City</th>
				<th>State</th>
				<th>Zip Code</th>
				<th>Phone</th>
			</tr>
			@foreach ($agencies as $agency)
				<tr>
					<td>{{Form::checkbox('agencyIds[]', $agency->id)}}</td>
					<td>{{link_to_route('agencies.show', $agency->id, $agency->id)}}</td>
					<td>{{$agency->trade_name}}</td>
					<td>{{$agency->address}}</td>
					<td>{{$agency->city}}</td>
					<td>{{$agency->state}}</td>
					<td>{{$agency->zipcode}}</td>
					<td>{{$agency->phone}}</td>
				</tr>
			@endforeach
		</table>
		
		{{Form::text('schedule_date', null, ['class'=>'datepicker', 'required'])}} 
		
		{{Form::submit('Schedule', ['class'=>'btn btn-primary'])}}
	{{Form::close()}}
	
	<br>
	
	<div id='map'></div>
@stop

@section('js')
	@include('layouts.partials.jquery-ui')
	@include('layouts.partials.gmap3')
	
	<script>
		$(function()
		{
			$('.datepicker').datepicker({dateFormat: 'yy-mm-dd', minDate: 0});
			
			$('#map').gmap3({
				@include('layouts.partials.gmap3-markers', ['agencies'=>$agencies])
			});
		});	
	</script>
@stop
