{{Form::hidden('agency_id', $agencyId)}}
		
<div class='form-group'>
	{{Form::label('firstname', 'First Name:')}}
	{{Form::text('firstname', null, ['class'=>'form-control', 'required'])}}
</div>
<div class='form-group'>
	{{Form::label('lastname', 'Last Name:')}}
	{{Form::text('lastname', null, ['class'=>'form-control', 'required'])}}
</div>
<div class='form-group'>
	{{Form::submit(isset($submitText)? $submitText : 'Create', ['class'=>'btn btn-primary'])}}
</div>
