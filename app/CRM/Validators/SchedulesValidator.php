<?php namespace CRM\Validators;

use Laracasts\Validation\FormValidator;

class SchedulesValidator extends FormValidator {

	protected  $rules = [
		'schedule_date' => 'required',
		'agencyIds' => 'required'
	];
}