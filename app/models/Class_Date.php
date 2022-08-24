<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Class_Date extends config implements operations{
    private $Class_Date_ID ;
    private $Class_ID ;
    private $Trainer_ID  ;
    private $Day;
    private $Start_Time ;
    private $End_Time ;
    private $Round ;
    private $Room ;

    
    /**
     * Get the value of Class_Date_ID
     */ 
    public function getClass_Date_ID()
    {
        return $this->Class_Date_ID;
    }

    /**
     * Set the value of Class_Date_ID
     *
     * @return  self
     */ 
    public function setClass_Date_ID($Class_Date_ID)
    {
        $this->Class_Date_ID = $Class_Date_ID;

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

    /**
     * Get the value of Trainer_ID
     */ 
    public function getTrainer_ID()
    {
        return $this->Trainer_ID;
    }

    /**
     * Set the value of Trainer_ID
     *
     * @return  self
     */ 
    public function setTrainer_ID($Trainer_ID)
    {
        $this->Trainer_ID = $Trainer_ID;

        return $this;
    }

    /**
     * Get the value of Day
     */ 
    public function getDay()
    {
        return $this->Day;
    }

    /**
     * Set the value of Day
     *
     * @return  self
     */ 
    public function setDay($Day)
    {
        $this->Day = $Day;

        return $this;
    }

    /**
     * Get the value of Start_Time
     */ 
    public function getStart_Time()
    {
        return $this->Start_Time;
    }

    /**
     * Set the value of Start_Time
     *
     * @return  self
     */ 
    public function setStart_Time($Start_Time)
    {
        $this->Start_Time = $Start_Time;

        return $this;
    }

    /**
     * Get the value of End_Time
     */ 
    public function getEnd_Time()
    {
        return $this->End_Time;
    }

    /**
     * Set the value of End_Time
     *
     * @return  self
     */ 
    public function setEnd_Time($End_Time)
    {
        $this->End_Time = $End_Time;

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
     * Get the value of Room
     */ 
    public function getRoom()
    {
        return $this->Room;
    }

    /**
     * Set the value of Room
     *
     * @return  self
     */ 
    public function setRoom($Room)
    {
        $this->Room = $Room;

        return $this;
    }
    public function create()
    {
        $query = "INSERT INTO `classes_dates`(
            `Day`,
            `Start_Time`,
            `Room`,
            `Round`,
            `End_Time`,
            `Class_ID`,
            `Trainer_ID`
        )
        VALUES(
            '$this->Day',
            '$this->Start_Time',
            '$this->Room',
            '$this->Round',
            '$this->End_Time',
            '$this->Class_ID',
            '$this->Trainer_ID'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
            $query = " SELECT
            `classes_dates`.*,
            `classes`.`Name`,
            `employees`.`Full_Name`
        FROM
            `classes_dates`
        LEFT JOIN `classes` ON `classes_dates`.`Class_ID` =`classes`.`Class_ID`
        LEFT JOIN `employees` ON `employees`.`Employee_ID` = `classes_dates`.`Trainer_ID`";
            return $this->runDQL($query);
    }
    public function update()
    {
        $query ="UPDATE
        `classes_dates`
    SET
        `Day` = '$this->Day',
        `Start_Time` = '$this->Start_Time',
        `Room` = '$this->Room',
        `Round` = '$this->Round',
        `End_Time` = '$this->End_Time',
        `Class_ID` = '$this->Class_ID',
        `Trainer_ID` = '$this->Trainer_ID'
    WHERE
        `Class_Date_ID`= '$this->Class_Date_ID' ";
    print_r($query);die;

        return $this->runDML($query);
    }
    public function delete()
    {
        
    }
    public function searchOnId()
    {
            $query ="SELECT
            `classes_dates`.*,
            `classes`.`Name`,
            `employees`.`Full_Name`
        FROM
            `classes_dates`
        LEFT JOIN `classes` ON `classes_dates`.`Class_ID` =`classes`.`Class_ID`
        LEFT JOIN `employees` ON `employees`.`Employee_ID` = `classes_dates`.`Trainer_ID`
            WHERE
            `Class_Date_ID`='$this->Class_Date_ID'"; 
            // print_r($query);die;
        return $this->runDQL($query);
    }
    public function getRounds()
    {
        $query = "SELECT COUNT(DISTINCT `Round`) AS `numOfRounds`
        FROM 
        `classes_dates`
        WHERE 
        `Class_ID` = '$this->Class_ID'";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function getDays()
    {
        $query = "SELECT 
         `classes_dates`.*,
        `employees`.`Full_Name`
    FROM
        `classes_dates`
        LEFT JOIN `employees`ON `employees`.`Employee_ID` = `classes_dates`.`Trainer_ID`
    WHERE
        `Class_ID` = '$this->Class_ID'
    ORDER BY
        ROUND";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function classesName()
    {
        $query="SELECT * FROM `classes` WHERE `Class_ID`=$this->Class_ID";
        // print_r($query);die;
        return $this->runDQL($query);
    }
   
}
