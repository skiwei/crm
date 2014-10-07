<?php 
	$agencies = [];
?>

@extends('layouts.crm')

@section('content')
	<h1><a href="{{route('agencies.index')}}"><span class='glyphicon glyphicon-home'></span></a> Schedule {{$date}}</h1>
	<table class='table'>
		<tr>
			<th>ID</th>
			<th>Agency Name</th>
			<th>Address</th>
			<th>City</th>
			<th>State</th>
			<th>Zip Code</th>
			<th>Phone</th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		</tr>
		@foreach ($schedules as $schedule)
			<?php
				$agency = $schedule->agency;
				$agencies[] = $agency;
			?>
			<tr>
				<td>{{link_to_route('agencies.show', $agency->id, $agency->id)}}</td>
				<td>{{$agency->trade_name}}</td>
				<td>{{$agency->address}}</td>
				<td>{{$agency->city}}</td>
				<td>{{$agency->state}}</td>
				<td>{{$agency->zipcode}}</td>
				<td>{{$agency->phone}}</td>
				<td>
					{{Form::open(['route'=>['schedules.destroy', $schedule->id], 'method'=>'DELETE'])}}
						{{Form::submit('delete', ['class'=>'btn btn-danger', 'data-confirm'=>'Are you sure?'])}}
					{{Form::close()}}
				</td>
			</tr>
		@endforeach
	</table>
	
	<div id='map'></div>
@stop

@section('js')
	@include('layouts.partials.gmap3')
	
	<script>
		$(function()
		{
			@if (count($agencies) > 0)
				$('#map').gmap3({
					@include('layouts.partials.gmap3-markers', ['agencies'=>$agencies])
				});
			@endif
		});
	</script>
@stop
