<?php namespace CRM\Repositories;

use Schedule;

class ScheduleRepository {
	
	public function getSchedulesByDate($date) 
	{
		return Schedule::with('agency')->where('schedule_date', '=', $date)->get();
	}
	
	public function getScheduleById($id)
	{
		return Schedule::findOrFail($id);
	}
	
	public function setSchedules($scheduleDate, Array $agencyIds)
	{
		foreach ($agencyIds as $agencyId)
		{
			Schedule::create(['schedule_date'=>$scheduleDate, 'agency_id'=>$agencyId]);
		}			
	}
	
	public function updateSchedule(Array $data)
	{
		$schedule = $this->getScheduleById($data['id']);
		$schedule->fill($data)->save();
		return $schedule;	
	}
	
	public function deleteSchedule($id)
	{
		$schedule = $this->getScheduleById($id);
		$schedule->delete();
	}
}
