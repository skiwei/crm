<?php namespace CRM\Agencies;

class UpdateStaffCommand {

    /**
     * @var string
     */
    public $id;

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
     * @param string id
     * @param string agency_id
     * @param string firstname
     * @param string lastname
     */
    public function __construct($id, $agency_id, $firstname, $lastname)
    {
        $this->id = $id;
        $this->agency_id = $agency_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

}