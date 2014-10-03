@extends('layouts.crm') @section('content')

@include('layouts.partials.gmap3')

<h1>Agencies in {{$city}}</h1>
<table class='table'>
	<tr>
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
<div id='map'></div>

<script>
	$(function()
	{
		$('#map').gmap3({
			marker: {
				values:[
					@foreach ($agencies as $agency)
						{address: "{{$agency->address}}, {{$agency->city}}, {{$agency->state}} {{$agency->zipcode}}", data: "{{$agency->trade_name}}"},
					@endforeach
				],
				events:{
		      		click: function(marker, event, context) {
				        var map = $(this).gmap3("get"),
				          infowindow = $(this).gmap3({get:{name:"infowindow"}});
				        if (infowindow){
				          infowindow.open(map, marker);
				          infowindow.setContent(context.data);
				        } else {
				          $(this).gmap3({
				            infowindow:{
				              anchor:marker, 
				              options:{content: context.data}
				            }
				          });
				        }
					}
				}
			},
			map: {
				options:{
					zoom: 12,
					streetViewControl: false,
					zoomControl: true,
				    zoomControlOptions: {
				      style: google.maps.ZoomControlStyle.SMALL,
				      position: google.maps.ControlPosition.RIGHT_BOTTOM
				    },						
				   	scrollwheel:false
				}	
			}
		});
	});	
</script>

@stop
