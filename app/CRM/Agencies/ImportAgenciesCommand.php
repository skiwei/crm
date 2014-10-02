<?php namespace CRM\Agencies;

class ImportAgenciesCommand {

	public $agencies_file;
	
	/**
     */
    public function __construct($agencies_file)
    {
    	$this->agencies_file = $agencies_file;
    }

}