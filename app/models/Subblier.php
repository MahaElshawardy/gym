<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';

class Subblier extends config implements operations{
    private $Subblier_ID ;
    private $Name ;
    private $Address ;
    private $Website ;
    private $Phone_Number  ;
    private $phone_Number2 ;
    private $Other_Contacts ;
    private $Email  ;

    /**
     * Get the value of Subblier_ID
     */ 
    public function getSubblier_ID()
    {
        return $this->Subblier_ID;
    }

    /**
     * Set the value of Subblier_ID
     *
     * @return  self
     */ 
    public function setSubblier_ID($Subblier_ID)
    {
        $this->Subblier_ID = $Subblier_ID;

        return $this;
    }

    /**
     * Get the value of Name
     */ 
    public function getName()
    {
        return $this->Name;
    }

    /**
     * Set the value of Name
     *
     * @return  self
     */ 
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * Get the value of Address
     */ 
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * Set the value of Address
     *
     * @return  self
     */ 
    public function setAddress($Address)
    {
        $this->Address = $Address;

        return $this;
    }

    /**
     * Get the value of Website
     */ 
    public function getWebsite()
    {
        return $this->Website;
    }

    /**
     * Set the value of Website
     *
     * @return  self
     */ 
    public function setWebsite($Website)
    {
        $this->Website = $Website;

        return $this;
    }

    /**
     * Get the value of Phone_Number
     */ 
    public function getPhone_Number()
    {
        return $this->Phone_Number;
    }

    /**
     * Set the value of Phone_Number
     *
     * @return  self
     */ 
    public function setPhone_Number($Phone_Number)
    {
        $this->Phone_Number = $Phone_Number;

        return $this;
    }

    /**
     * Get the value of phone_Number2
     */ 
    public function getPhone_Number2()
    {
        return $this->phone_Number2;
    }

    /**
     * Set the value of phone_Number2
     *
     * @return  self
     */ 
    public function setPhone_Number2($phone_Number2)
    {
        $this->phone_Number2 = $phone_Number2;

        return $this;
    }

    /**
     * Get the value of Other_Contacts
     */ 
    public function getOther_Contacts()
    {
        return $this->Other_Contacts;
    }

    /**
     * Set the value of Other_Contacts
     *
     * @return  self
     */ 
    public function setOther_Contacts($Other_Contacts)
    {
        $this->Other_Contacts = $Other_Contacts;

        return $this;
    }

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */ 
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }
    public function create()
    {
        
    }
    public function read()
    {
       $query="SELECT * FROM `subbliers` ";
       return $this->runDQL($query);
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }
}