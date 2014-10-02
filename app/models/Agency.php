<?php

class Agency extends Eloquent {
	
	protected $guarded = ['created_on', 'updated_on'];
	
	public function owner() 
	{
		return $this->hasOne('Owner');
	}
	
	public function staffs()
	{
		return $this->hasMany('Staff');
	}
}