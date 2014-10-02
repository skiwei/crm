<?php namespace CRM\Agencies;

class UpdateOwnerCommand {

    /**
     * @var string
     */
    public $firstname;

    /**
     * @var string
     */
    public $lastname;

    /**
     * @var string
     */
    public $phone;

    /**
     * @var string
     */
    public $email;
    
    /**
     * @var string
     */
    public $agency_id;
    
    /**
     * @var integer
     */
    public $id;

    /**
     * @param string agency_id
     * @param string firstname
     * @param string lastname
     * @param string phone
     * @param string email
     */
    public function __construct($id, $agency_id, $firstname, $lastname, $phone, $email)
    {
        $this->id = $id;
    	$this->agency_id = $agency_id;
    	$this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->phone = $phone;
        $this->email = $email;
    }

}