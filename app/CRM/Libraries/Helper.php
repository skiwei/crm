<?php namespace CRM\Libraries;

class Helper {
	
	public static function cityOptions($cities)	
	{
		$options = [];
		
		foreach ($cities as $city) 
		{
			$options[$city->city] = $city->city;
		}		
		return $options;
	}
}