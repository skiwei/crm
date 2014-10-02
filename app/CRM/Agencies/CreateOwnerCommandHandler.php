<?php namespace CRM\Agencies;

use Laracasts\Commander\CommandHandler;
use CRM\Repositories\AgencyRepository;

class CreateOwnerCommandHandler implements CommandHandler {

    protected  $agencyRepo;
    
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
		$owner = $this->agencyRepo->createOwner((Array)$command);
		
		return $owner;
    }

}