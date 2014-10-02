@extends('layouts.crm')

@section('content')

	<h1>Agencies in {{$city}}</h1>
	<table class='table'>
		<tr>
			<th>ID</th><th>Agency Name</th><th>Address</th><th>City</th><th>State</th><th>Zip Code</th><th>Phone</th>
		</tr>
		@foreach ($agencies as $agency)
			<tr>
				<td>{{link_to_route('agencies.show', $agency->id, $agency->id)}}</td>
				<td>{{$agency->trade_name}}</td><td>{{$agency->address}}</td><td>{{$agency->city}}</td>
				<td>{{$agency->state}}</td><td>{{$agency->zipcode}}</td><td>{{$agency->phone}}</td>
			</tr>		
		@endforeach
	</table>
@stop
