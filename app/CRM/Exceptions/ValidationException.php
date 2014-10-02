<?php namespace CRM\Exceptions;

class ValidationException extends \Exception {

	/**
	 * @var mixed
	 */
	protected $errors;

	/**
	 * @param string $message
	 * @param mixed  $errors
	 */
	function __construct($errors)
	{
		$this->errors = $errors;

		//parent::__construct($message);
	}

	/**
	 * Get form validation errors
	 *
	 * @return mixed
	 */
	public function getErrors()
	{
		return $this->errors;
	}

}
