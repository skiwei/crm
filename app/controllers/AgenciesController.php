<?php

use CRM\Validators\ImportAgenciesValidator;
use Laracasts\Commander\CommanderTrait;
use CRM\Repositories\AgencyRepository;
use CRM\Libraries\Helper;

class AgenciesController extends \BaseController {

	use CommanderTrait;
	
	protected $importValidator, $agencyRepository;
	
	public function __construct(ImportAgenciesValidator $importValidator, AgencyRepository $agencyRepository)
	{
		$this->importValidator = $importValidator;
		$this->agencyRepository = $agencyRepository;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$cities = $this->agencyRepository->getCities();
		
		$cityOptions = Helper::cityOptions($cities);
		
		return View::make('agencies.index', compact('cityOptions'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		return View::make('agencies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::file();
		
		$this->importValidator->validate($input);
		
		$this->execute('CRM\Agencies\ImportAgenciesCommand', $input);

		Flash::success('Data was imported successfully.');
		
		return Redirect::route('agencies.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$agency = $this->agencyRepository->getAgencyById($id);
		
		return View::make('agencies.show', compact('agency'));		
	}	
	
	public function agenciesByCity()
	{
		$city = Input::get('city');
		
		$agencies = $this->agencyRepository->getAgenciesByCity($city);
		
		return View::make('agencies.agenciesByCity', compact('agencies', 'city'));
	}


}
