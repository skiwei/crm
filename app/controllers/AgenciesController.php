<?php

use CRM\Validators\ImportAgenciesValidator;
use Laracasts\Commander\CommanderTrait;
use CRM\Agencies\ImportAgenciesCommand;

class AgenciesController extends \BaseController {

	use CommanderTrait;
	
	protected $importValidator, $importCommand;
	
	public function __construct(ImportAgenciesValidator $importValidator, ImportAgenciesCommand $importCommand)
	{
		$this->importValidator = $importValidator;
		$this->importCommand = $importCommand;
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('agencies.index');
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
		
		$error = $this->importValidator->validate($input);
		
		if ($error)
		{
			Flash::error($error);
			return Redirect::back()->withInput();
		}
		
		$this->execute('CRM\Agencies\ImportAgenciesCommand', $input);	
		
		return Redirect::route('crm');
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
		//
	}


}
