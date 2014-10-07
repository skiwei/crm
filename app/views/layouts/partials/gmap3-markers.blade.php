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
