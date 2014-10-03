<?php 
$owner = $agency->owner;
$staffs = $agency->staffs;
?>

@extends('layouts.crm')

@section('content')
	
	<p>{{link_to_route('agencies.index', 'Agencies')}}</p>
	
	<h1 class='text-center'>
		{{$agency->trade_name}}
	</h1>
	
	<div class='col-md-6'>
		<p><b>ID:</b> {{$agency->id}}</p>
		<p>
			<b>Address:</b><br>
			{{$agency->address}},<br>
			{{$agency->city}}, {{$agency->state}} {{$agency->zipcode}} 
			<a href="https://www.google.com/maps/place/{{urlencode($agency->address.','.$agency->city.','.$agency->state.' '.$agency->zipcode)}}">
				<span class='glyphicon glyphicon-map-marker text-danger'></span>
			</a>
		</p>
		<p><b>Phone:</b> {{$agency->phone}}</p>
		
	</div>
	
	<div class='col-md-6'>
		<p>
			Main Contact 
			@if ($owner)
				{{link_to_route('owners.edit', 'edit', $owner->id)}}
			@else
				{{link_to_route('createOwner', 'add', $agency->id)}}
			@endif
		</p>
		@if ($owner)
			<p><b>Name:</b> {{$owner->firstname}} {{$owner->lastname}}</p>
			<p><b>Phone:</b> {{$owner->phone}}</p>
			<p><b>Email:</b> {{$owner->email}}</p>
		@endif
		<hr>
		<p>Staffs {{link_to_route('createStaff', 'add', $agency->id)}}</p>
		@if ($staffs->count())
			<ul>
				@foreach ($staffs as $staff)
					<li>
					{{$staff->firstname}} {{$staff->lastname}} 
					{{link_to_route('staffs.edit', 'edit', $staff->id)}}
					</li>
				@endforeach
			</ul>
		@endif
	</div>
	
@stop

