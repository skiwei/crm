<?php

use CRM\Repositories\AgencyRepository;
use CRM\Validators\OwnersValidator;

class OwnersController extends \BaseController {

	private $agencyRepo, $validator;
	
	public function __construct(AgencyRepository $agencyRepo, OwnersValidator $validator)
	{
		$this->agencyRepo = $agencyRepo;
		$this->validator = $validator;
	}
	
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}
	
	public function create($agencyId)
	{
		return View::make('owners.create', compact('agencyId'));
	}
	
	public function store()
	{
		$input = Input::only('agency_id', 'firstname', 'lastname', 'phone', 'email');
		$this->validator->validate($input);
		
		$owner = $this->execute('CRM\Agencies\CreateOwnerCommand', $input);
		
		return Redirect::route('agencies.show', $owner->agency_id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$owner = $this->agencyRepo->getOwnerById($id);
		$agencyId = $owner->agency_id;
		
		return View::make('owners.edit', compact('owner', 'agencyId'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::only('agency_id', 'firstname', 'lastname', 'phone', 'email');
		$input['id'] = $id;
		
		$this->validator->validate($input);
		
		$owner = $this->execute('CRM\Agencies\UpdateOwnerCommand', $input);
		
		return Redirect::route('agencies.show', $owner->agency_id);
	}

}
