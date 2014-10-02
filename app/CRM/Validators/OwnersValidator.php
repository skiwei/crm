<?php namespace CRM\Validators;

use Laracasts\Validation\FormValidator;

class OwnersValidator extends FormValidator {
	
	protected $rules = [
		'agency_id' => 'required|max:10',
		'firstname' => 'required|max:100',
		'lastname' => 'required|max:100',
		'phone' => 'required|max:20',
		'email' => 'required|email'
	];
}