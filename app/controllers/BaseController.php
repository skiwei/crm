<?php

use Laracasts\Commander\CommanderTrait;

class BaseController extends Controller {

	use CommanderTrait;
	
	public function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>['post', 'put', 'patch']));
	}
	
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
