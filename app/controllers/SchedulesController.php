<?php

use CRM\Repositories\ScheduleRepository;
use CRM\Validators\SchedulesValidator;

class SchedulesController extends \BaseController {

	protected $scheduleRepo;
	protected $validator;
	
	public function __construct(ScheduleRepository $scheduleRepo, SchedulesValidator $validator)
	{
		$this->scheduleRepo = $scheduleRepo;
		$this->validator = $validator;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function schedulesByDate()
	{
		$date = Input::get('date');
		
		$schedules = $this->scheduleRepo->getSchedulesByDate($date);
		
		return View::make('schedules.schedulesByDate', compact('date', 'schedules'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::only('schedule_date', 'agencyIds');
		$input['agencyIds'] = isset($input['agencyIds'])? $input['agencyIds'] : null;
		
		$this->validator->validate($input); 
		
		$this->execute('CRM\Schedules\SetScheduleCommand', $input);
		
		Flash::success('Schedule has been set.');
		
		return Redirect::route('home');
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


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->scheduleRepo->deleteSchedule($id);
		
		return Redirect::back();
	}


}
