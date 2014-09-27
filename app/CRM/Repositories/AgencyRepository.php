<?php

use Agency;

class AgencyRepository {
	
	public function createAgency(Array $agency)
	{
		return Agency::create($agency);
	}
}