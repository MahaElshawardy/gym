<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Member_Class extends config implements operations{
    private $Member_Class_ID ;
    private $Statue ;
    private $Start_Date ;
    private $Round ;
    private $Member_ID ;
    private $Class_ID ;

    /**
     * Get the value of Member_Class_ID
     */ 
    public function getMember_Class_ID()
    {
        return $this->Member_Class_ID;
    }

    /**
     * Set the value of Member_Class_ID
     *
     * @return  self
     */ 
    public function setMember_Class_ID($Member_Class_ID)
    {
        $this->Member_Class_ID = $Member_Class_ID;

        return $this;
    }

    /**
     * Get the value of Statue
     */ 
    public function getStatue()
    {
        return $this->Statue;
    }

    /**
     * Set the value of Statue
     *
     * @return  self
     */ 
    public function setStatue($Statue)
    {
        $this->Statue = $Statue;

        return $this;
    }

    /**
     * Get the value of Start_Date
     */ 
    public function getStart_Date()
    {
        return $this->Start_Date;
    }

    /**
     * Set the value of Start_Date
     *
     * @return  self
     */ 
    public function setStart_Date($Start_Date)
    {
        $this->Start_Date = $Start_Date;

        return $this;
    }

    /**
     * Get the value of Round
     */ 
    public function getRound()
    {
        return $this->Round;
    }

    /**
     * Set the value of Round
     *
     * @return  self
     */ 
    public function setRound($Round)
    {
        $this->Round = $Round;

        return $this;
    }

    /**
     * Get the value of Member_ID
     */ 
    public function getMember_ID()
    {
        return $this->Member_ID;
    }

    /**
     * Set the value of Member_ID
     *
     * @return  self
     */ 
    public function setMember_ID($Member_ID)
    {
        $this->Member_ID = $Member_ID;

        return $this;
    }

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
    public function create()
    {
        $query ="INSERT INTO `members_classes`(
            `Round`,
            `Member_ID`,
            `Class_ID`
        )
        VALUES(
            '$this->Round',
            '$this->Member_ID',
            '$this->Class_ID'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
        $query ="SELECT
        `members_classes`.*,
        `members`.`Full_Name`,
        `classes`.`Name`
    FROM
        `members_classes`
        LEFT JOIN `members` ON `members`.`Member_ID` = `members_classes`.`Member_ID`
        LEFT JOIN `classes` ON `classes`.`Class_ID` = `members_classes`.`Class_ID`";
        return $this->runDQL($query);
    }
    public function update()
    {
        $query = "UPDATE
        `members_classes`
    SET
        `Start_Date` = '$this->Start_Date',
        `Statue` = '$this->Statue'
    WHERE
        `Member_Class_ID`= '$this->Member_Class_ID'";
        return $this->runDML($query);
    }
    public function delete()
    {
        # code...
    }
    public function getDays()
    {
        $query="SELECT 
        DISTINCT classes_dates.Day AS Days FROM classes_dates
        LEFT JOIN Classes ON Classes_Dates.Class_ID = Classes.Class_ID
        LEFT JOIN Members_Classes ON Members_Classes.Class_ID = Classes.Class_ID
        WHERE Member_ID = '$this->Member_ID' AND members_classes.`Statue` =$this->Statue";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function classesInfo()
    {
        $query="SELECT
        Classes_Dates.*,
        Classes.Name,
        Employees.Full_Name As 'Trainer'
        From
        Classes_Dates
        LEFT JOIN Classes ON Classes_Dates.Class_ID = Classes.Class_ID
        LEFT JOIN Employees ON Classes_Dates.Trainer_ID = Employees.Employee_ID
        LEFT JOIN Members_Classes ON Members_Classes.Class_ID = Classes.Class_ID
        WHERE Member_ID = '$this->Member_ID' AND members_classes.`Statue` = $this->Statue";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function searchOnId()
    {
        $query = "SELECT
        `Member_Class_ID`,
        `Statue`,
        `Start_Date`,
        `Round`,
        `Member_ID`,
        `Class_ID`
    FROM
        `members_classes`
    WHERE
    `Member_Class_ID` = '$this->Member_Class_ID'";
    // print_r($query);
        return $this->runDQL($query);
    }
}