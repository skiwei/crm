<?php

class Schedule extends \Eloquent {
	
	protected $fillable = ['schedule_date', 'agency_id'];
	
	public function agency()
	{
		return $this->belongsTo('Agency');
	}
}