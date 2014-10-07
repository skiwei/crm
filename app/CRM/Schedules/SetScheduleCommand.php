<?php namespace CRM\Schedules;

class SetScheduleCommand {

    public $schedule_date;
    
    public $agencyIds;
    
    /**
     */
    public function __construct($schedule_date, $agencyIds)
    {
    	$this->schedule_date = $schedule_date;
    	$this->agencyIds = $agencyIds;    	
    }

}