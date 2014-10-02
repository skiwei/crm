<?php namespace CRM\Validators;

use CRM\Exceptions\ValidationException;

class ImportAgenciesValidator {
	
	public function validate($input)
	{
		$errors = [];
		$file = $input['agencies_file'];
		$filename = ($file->getClientOriginalName());
		
		if (substr($filename, -4) != '.csv')
		{
			$errors[] = 'File must be .csv';			
			throw new ValidationException($errors);
		}
	}
}
