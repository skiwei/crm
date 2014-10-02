<?php namespace CRM\Agencies;

use Laracasts\Commander\CommandHandler;
use CRM\Exceptions\ValidationException;
use CRM\Repositories\AgencyRepository;

class ImportAgenciesCommandHandler implements CommandHandler {

    protected $agencyRepository;
	
	public function __construct(AgencyRepository $agencyRepository)
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
    	
    	$file->move(storage_path(), 'agencies.csv');
    	
    	$agencies = $this->getAgencies();
    	
    	$this->agencyRepository->deleteAll();
    	
    	foreach ($agencies as $agency)
    	{
    		$this->agencyRepository->createAgency($agency);
    	}    	
    }
    
    protected function getAgencies()
    {
    	$agencies = [];
    	$errors = [];
    	$row = 1;
    	
    	if (($handle = fopen(storage_path('agencies.csv'), "r")) !== FALSE) 
    	{
    		while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
    		{
    			if ($row > 3) 
    			{
    				if (count($data) != 13)
    				{
    					$errors[] = 'Line '.$row.' has invalid data.';
    					throw new ValidationException($errors);
    				}
    				$agencies[] = $this->setAgency($data);
    			}
    			$row++;
    		}
    		fclose($handle);
    	}    	
    	return $agencies;
    }
    
    protected function setAgency($data)
    {
		return [
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
    }

}