<?php namespace CRM\Schedules;

use Laracasts\Commander\CommandHandler;
use CRM\Repositories\ScheduleRepository;

class SetScheduleCommandHandler implements CommandHandler {

    protected $scheduleRepo;
	
	public function __construct(ScheduleRepository $scheduleRepo)
    {
    	$this->scheduleRepo = $scheduleRepo;
    }
    
    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
		$agencyIds = $command->agencyIds;
		$schedule_date = $command->schedule_date;
		
		$this->scheduleRepo->setSchedules($schedule_date, $agencyIds);
		
    }

}