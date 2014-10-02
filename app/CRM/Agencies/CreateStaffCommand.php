<?php namespace CRM\Agencies;

class CreateStaffCommand {

    /**
     * @var string
     */
    public $agency_id;

    /**
     * @var string
     */
    public $firstname;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @param string agency_id
     * @param string firstname
     * @param string lastname
     */
    public function __construct($agency_id, $firstname, $lastname)
    {
        $this->agency_id = $agency_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

}