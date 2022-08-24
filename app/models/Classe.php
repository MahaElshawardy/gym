<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Classe extends config implements operations{
    private $Class_ID ;
    private $Name ;
    private $Cost ;
    private $Info ;
    private $Duration_Per_Time_In_Minuts ;
    private $Period_In_Weeks ;
    private $Number_Of_Sessions ;

    /**
     * Get the value of Class_ID
     */ 
    public function getClass_ID()
    {
        return $this->Class_ID;
    }

    /**
     * Set the value of Class_ID
     *
     * @return  self
     */ 
    public function setClass_ID($Class_ID)
    {
        $this->Class_ID = $Class_ID;

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
     * Get the value of Cost
     */ 
    public function getCost()
    {
        return $this->Cost;
    }

    /**
     * Set the value of Cost
     *
     * @return  self
     */ 
    public function setCost($Cost)
    {
        $this->Cost = $Cost;

        return $this;
    }

    /**
     * Get the value of Info
     */ 
    public function getInfo()
    {
        return $this->Info;
    }

    /**
     * Set the value of Info
     *
     * @return  self
     */ 
    public function setInfo($Info)
    {
        $this->Info = $Info;

        return $this;
    }

    /**
     * Get the value of Duration_Per_Time_In_Minuts
     */ 
    public function getDuration_Per_Time_In_Minuts()
    {
        return $this->Duration_Per_Time_In_Minuts;
    }

    /**
     * Set the value of Duration_Per_Time_In_Minuts
     *
     * @return  self
     */ 
    public function setDuration_Per_Time_In_Minuts($Duration_Per_Time_In_Minuts)
    {
        $this->Duration_Per_Time_In_Minuts = $Duration_Per_Time_In_Minuts;

        return $this;
    }

    /**
     * Get the value of Period_In_Weeks
     */ 
    public function getPeriod_In_Weeks()
    {
        return $this->Period_In_Weeks;
    }

    /**
     * Set the value of Period_In_Weeks
     *
     * @return  self
     */ 
    public function setPeriod_In_Weeks($Period_In_Weeks)
    {
        $this->Period_In_Weeks = $Period_In_Weeks;

        return $this;
    }

    /**
     * Get the value of Number_Of_Sessions
     */ 
    public function getNumber_Of_Sessions()
    {
        return $this->Number_Of_Sessions;
    }

    /**
     * Set the value of Number_Of_Sessions
     *
     * @return  self
     */ 
    public function setNumber_Of_Sessions($Number_Of_Sessions)
    {
        $this->Number_Of_Sessions = $Number_Of_Sessions;

        return $this;
    }
    public function create()
    {
        $query="INSERT INTO `classes`(
            `Name`,
            `Cost`,
            `Info`,
            `Duration_Per_Time_In_Minuts`,
            `Period_In_Weeks`,
            `Number_Of_Sessions`
        )
        VALUES(
            '$this->Name',
            '$this->Cost',
            '$this->Info',
            '$this->Duration_Per_Time_In_Minuts',
            '$this->Period_In_Weeks',
            '$this->Number_Of_Sessions'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
        $query ="SELECT * FROM `classes`";
        return $this->runDQL($query);
    }
    public function update()
    {
        $query = "UPDATE
        `classes`
    SET
        `Name` = '$this->Name',
        `Cost` = '$this->Cost',
        `Info` = '$this->Info',
        `Duration_Per_Time_In_Minuts` = '$this->Duration_Per_Time_In_Minuts',
        `Period_In_Weeks` = '$this->Period_In_Weeks',
        `Number_Of_Sessions` = '$this->Number_Of_Sessions'
    WHERE
        `Class_ID`=$this->Class_ID";
        return $this->runDML($query);
    }
    public function delete()
    {
        $query ="DELETE
        FROM
            `classes`
        WHERE
            `Class_ID`='$this->Class_ID'";
            return $this->runDML($query);
    }
    // public function searchOnId()
    // {
    //     $query="SELECT * FROM `classes` WHERE `Class_ID`=$this->Class_ID";
    //     // print_r($query);die;
    //     return $this->runDQL($query);
    // }
    
}
