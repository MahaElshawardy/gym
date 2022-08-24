<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Not_Member_Parent extends config implements operations {
    private $Parent_ID ;
    private $Email  ;
    private $Phone_Number  ;
    private $Phone_Nmber2  ;
    private $Full_Name ;

    /**
     * Get the value of Parent_ID
     */ 
    public function getParent_ID()
    {
        return $this->Parent_ID;
    }

    /**
     * Set the value of Parent_ID
     *
     * @return  self
     */ 
    public function setParent_ID($Parent_ID)
    {
        $this->Parent_ID = $Parent_ID;

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
     * Get the value of Phone_Nmber2
     */ 
    public function getPhone_Nmber2()
    {
        return $this->Phone_Nmber2;
    }

    /**
     * Set the value of Phone_Nmber2
     *
     * @return  self
     */ 
    public function setPhone_Nmber2($Phone_Nmber2)
    {
        $this->Phone_Nmber2 = $Phone_Nmber2;

        return $this;
    }

    /**
     * Get the value of Full_Name
     */ 
    public function getFull_Name()
    {
        return $this->Full_Name;
    }

    /**
     * Set the value of Full_Name
     *
     * @return  self
     */ 
    public function setFull_Name($Full_Name)
    {
        $this->Full_Name = $Full_Name;

        return $this;
    }
    public function create()
    {
        if(empty($this->Phone_Nmber2 == '')):
            $query = "INSERT INTO `not_member_parent`(
                `Email`,
                `Phone_Number`,
                `Phone_Nmber2`,
                `Full_Name`
            )
            VALUES(
                '$this->Email',
                '$this->Phone_Number',
                '$this->Phone_Nmber2',
                '$this->Full_Name'
            )";
        else:
            $query = "INSERT INTO `not_member_parent`(
                `Email`,
                `Phone_Number`,
                `Full_Name`
            )
            VALUES(
                '$this->Email',
                '$this->Phone_Number',
                '$this->Full_Name'
            )";
        endif;
        return $this->runDML($query);
    }
    public function read()
    {
        $query ="SELECT * FROM `not_member_parent`";
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