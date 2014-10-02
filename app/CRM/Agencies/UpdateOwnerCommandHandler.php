<?php namespace CRM\Agencies;

use Laracasts\Commander\CommandHandler;
use CRM\Repositories\AgencyRepository;

class UpdateOwnerCommandHandler implements CommandHandler {

    protected $agencyRepo;
	
	public function __construct(AgencyRepository $agencyRepo)
    {
    	$this->agencyRepo = $agencyRepo;
    }
    
    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
		$owner = $this->agencyRepo->updateOwner((Array)$command);
    	
		return $owner;
    }

}