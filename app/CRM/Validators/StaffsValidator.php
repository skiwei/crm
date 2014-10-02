<?php namespace CRM\Validators;

use Laracasts\Validation\FormValidator;

class StaffsValidator extends FormValidator {
	
	protected $rules = [
		'firstname' => 'required|max:100',
		'lastname' => 'required|max:100'	
	];
}