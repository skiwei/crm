<?php namespace CRM\Agencies;

use Laracasts\Commander\CommandHandler;

class ImportAgenciesCommandHandler implements CommandHandler {

    protected $agencyRepository;
	
	public function __construct(\AgencyRepository $agencyRepository)
    {
    	$this->agencyRepository = $agencyRepository;
    }
    
    /**
     * Handle the command.
     *
     * @param object $command
     * @return void
     */
    public function handle($command)
    {
    	$file = $command->agencies_file;
    	
    	$agencies = $this->parseAgencies($file);
    	
    	foreach ($agencies as $agency)
    	{
    		$this->agencyRepository->createAgency($agency);
    	}
    	
    }
    
    protected function parseAgencies($file)
    {
    	$agencies = [];
    	
    	foreach (file($file) as $num=>$line)
    	{
    		$data = explode(',', $line);
    		
    		if (count($data) != 13)
    		{
    			$num++;
    			throw new Exception('Line '.$num.' has invalid data.');
    		}
    		
    		$agency = [
				'id' => $data[0],
				'home_office' => $data[1],
				'name' => $data[2],
				'trade_name' => $data[3],
				'location_type' => $data[4],
				'address' => $data[5],
				'city' => $data[6],
				'state' => $data[7],
				'zipcode' => $data[8],
				'country' => $data[9],
				'global_region' => $data[10],
				'phone' => $data[11],
				'last_activity' => $data[12]    		
    		];
    		
    		$agencies[] = $agency;
    	}
    	
    	return $agencies;
    }

}