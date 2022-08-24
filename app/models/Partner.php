<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Partner extends config implements operations{
    private $Partner_ID ;
    private $Name ;
    private $Founded_Date ;
    private $Certifcations ;
    private $Website ;
    private $Government_Record ;
    private $Address ;
    private $Phone_Number ;
    private $Phone_Number2 ;
    private $Other_Contacts ;
    private $Email  ;
    private $Password ;
    

    /**
     * Get the value of Partner_ID
     */ 
    public function getPartner_ID()
    {
        return $this->Partner_ID;
    }

    /**
     * Set the value of Partner_ID
     *
     * @return  self
     */ 
    public function setPartner_ID($Partner_ID)
    {
        $this->Partner_ID = $Partner_ID;

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
     * Get the value of Founded_Date
     */ 
    public function getFounded_Date()
    {
        return $this->Founded_Date;
    }

    /**
     * Set the value of Founded_Date
     *
     * @return  self
     */ 
    public function setFounded_Date($Founded_Date)
    {
        $this->Founded_Date = $Founded_Date;

        return $this;
    }

    /**
     * Get the value of Certifcations
     */ 
    public function getCertifcations()
    {
        return $this->Certifcations;
    }

    /**
     * Set the value of Certifcations
     *
     * @return  self
     */ 
    public function setCertifcations($Certifcations)
    {
        $this->Certifcations = $Certifcations;

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
     * Get the value of Government_Record
     */ 
    public function getGovernment_Record()
    {
        return $this->Government_Record;
    }

    /**
     * Set the value of Government_Record
     *
     * @return  self
     */ 
    public function setGovernment_Record($Government_Record)
    {
        $this->Government_Record = $Government_Record;

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
     * Get the value of Phone_Number2
     */ 
    public function getPhone_Number2()
    {
        return $this->Phone_Number2;
    }

    /**
     * Set the value of Phone_Number2
     *
     * @return  self
     */ 
    public function setPhone_Number2($Phone_Number2)
    {
        $this->Phone_Number2 = $Phone_Number2;

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

    /**
     * Get the value of Password
     */ 
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * Set the value of Password
     *
     * @return  self
     */ 
    public function setPassword($Password)
    {
        $this->Password = sha1($Password);

        return $this;
    }
    public function create()
    {
        if(empty($this->Phone_Number2 == '')){
        $query= "INSERT INTO `partners`(
            `Name`,
            `Founded_Date`,
            `Certifcations`,
            `Website`,
            `Government_Record`,
            `Address`,
            `Phone_Number`,
            `Phone_Number2`,
            `Other_Contacts`,
            `Email`,
            `Password`
        )
        VALUES(
        
            '$this->Name',
            '$this->Founded_Date',
            '$this->Certifcations',
            '$this->Website',
            '$this->Government_Record',
            '$this->Address',
            '$this->Phone_Number',
            '$this->Phone_Number2',
            '$this->Other_Contacts',
            '$this->Email',
            '$this->Password'
        )";
        }else{
            $query= "INSERT INTO `partners`(
                `Name`,
                `Founded_Date`,
                `Certifcations`,
                `Website`,
                `Government_Record`,
                `Address`,
                `Phone_Number`,
                `Other_Contacts`,
                `Email`,
                `Password`
            )
            VALUES(
            
                '$this->Name',
                '$this->Founded_Date',
                '$this->Certifcations',
                '$this->Website',
                '$this->Government_Record',
                '$this->Address',
                '$this->Phone_Number',
                '$this->Other_Contacts',
                '$this->Email',
                '$this->Password'
            )";
        }
        return $this->runDML($query);
    }
    public function read()
    {
        $query ="SELECT * FROM `partners`";
        return $this->runDQL($query);
    }
    public function update()
    {
        
    }
    public function delete()
    {
        $query ="DELETE FROM `partners` WHERE `Partner_ID` =$this->Partner_ID";
        return $this->runDML($query);
    }
    public function loginPartner()
    {
        $query = "SELECT * FROM partners WHERE Email = '$this->Email' AND Password = '$this->Password'";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function getUserByEmail()
    {
       $query = "SELECT * FROM partners WHERE Email = '$this->Email' ";
       return $this->runDQL($query);
    }
    public function updatePasswordByEmail()
    {
        $query = "UPDATE `partners` SET Password = '$this->Password' WHERE Partner_ID  = '$this->Partner_ID ' ";
        // print_r($query);die;
        return $this->runDML($query);
    }
}