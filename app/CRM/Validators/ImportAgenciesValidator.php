<?php namespace CRM\Validators;

use Laracasts\Validation\FormValidationException;

class ImportAgenciesValidator {
	
	public function validate($input)
	{
		$file = $input['agencies_file'];
		$filename = ($file->getClientOriginalName());
		if (substr($filename, -4) != '.csv')
		{
			return 'File must be .csv';
		}
		return null;
	}
}
