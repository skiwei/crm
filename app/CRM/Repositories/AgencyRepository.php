<?php namespace CRM\Repositories;

use Agency;
use Owner;
use Staff;

class AgencyRepository {
	
	public function createAgency(Array $agency)
	{
		return Agency::create($agency);
	}
	
	public function deleteAll()
	{
		Agency::truncate();
	}
	
	public function getCities()
	{
		return Agency::groupBy('city')->orderBy('city')->get(array('city'));
	}
	
	public function getAgenciesByCity($city)
	{
		return Agency::whereCity($city)->whereState('California')->get();
	}
	
	public function getAgencyById($id)
	{
		return Agency::findOrFail($id);
	}
	
	public function getOwnerById($id)
	{
		return Owner::findOrFail($id);
	}
	
	public function getStaffById($id)
	{
		return Staff::findOrFail($id);
	}
	
	public function createOwner(Array $data)
	{
		return Owner::create($data);
	}
	
	public function updateOwner(Array $data)
	{
		$owner = Owner::findOrFail($data['id']);
		
		$owner->fill($data)->save();
		
		return $owner;
	}
	
	function createStaff(Array $data) 
	{
		return Staff::create($data);
	}
	
	function updateStaff(Array $data)
	{
		$staff = Staff::findOrFail($data['id']);
		
		$staff->fill($data)->save();
		
		return $staff;
	}
	
	function deleteStaff($id)
	{
		$staff = Staff::findOrFail($id);
		
		$staff->delete();
		
		return $staff;
	}
}