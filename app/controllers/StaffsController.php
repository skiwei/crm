<?php

use CRM\Repositories\AgencyRepository;
use CRM\Validators\StaffsValidator;

class StaffsController extends \BaseController {

	private $agencyRepo, $validator;
	
	public function __construct(AgencyRepository $agencyRepo, StaffsValidator $validator)
	{
		$this->agencyRepo = $agencyRepo;
		$this->validator = $validator;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($agencyId)
	{
		return View::make('staffs.create', compact('agencyId'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('agency_id', 'firstname', 'lastname');
		$this->validator->validate($input);
		
		$staff = $this->execute('CRM\Agencies\CreateStaffCommand', $input);
		
		return Redirect::route('agencies.show', $staff->agency_id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$staff = $this->agencyRepo->getStaffById($id);
		$agencyId = $staff->agency_id;
		
		return View::make('staffs.edit', compact('staff', 'agencyId'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::only('agency_id', 'firstname', 'lastname');
		$input['id'] = $id;
		
		$this->validator->validate($input);
		
		$staff = $this->execute('CRM\Agencies\UpdateStaffCommand', $input);
		
		return Redirect::route('agencies.show', $staff->agency_id);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$staff = $this->agencyRepo->deleteStaff($id);
		
		return Redirect::route('agencies.show', $staff->agency_id);
	}


}
