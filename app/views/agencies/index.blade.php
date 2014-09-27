@extends('layouts.crm')

@section('content')

	<h1>CRM</h1>
	
	@include('layouts.errors')
	
	<p>{{link_to_route('agencies.create', 'Import File')}}</p>

@stop
