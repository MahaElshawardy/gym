<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';

class Food_System extends config implements operations{
    private $Food_System_ID;
    private $Data;
    private $Date;
    private $Trainer_ID;
    private $Member_ID;

    /**
     * Get the value of Food_System_ID
     */ 
    public function getFood_System_ID()
    {
        return $this->Food_System_ID;
    }

    /**
     * Set the value of Food_System_ID
     *
     * @return  self
     */ 
    public function setFood_System_ID($Food_System_ID)
    {
        $this->Food_System_ID = $Food_System_ID;

        return $this;
    }

    /**
     * Get the value of Data
     */ 
    public function getData()
    {
        return $this->Data;
    }

    /**
     * Set the value of Data
     *
     * @return  self
     */ 
    public function setData($Data)
    {
        $this->Data = $Data;

        return $this;
    }

    /**
     * Get the value of Date
     */ 
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * Set the value of Date
     *
     * @return  self
     */ 
    public function setDate($Date)
    {
        $this->Date = $Date;

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
    public function create()
    {
        $query="INSERT INTO `foods_systems`(
            `Data`,
            `Trainer_ID`,
            `Member_ID`
        )
        VALUES(
            '$this->Data',
            '$this->Trainer_ID',
            '$this->Member_ID'
        )";
        // print_r($query);
            return $this->runDML($query);
    }
    public function read()
    {
        $query = "SELECT
        `foods_systems`.*,
        `employees`.`Full_Name`  
    FROM
        `foods_systems`
    LEFT JOIN `employees` ON `employees`.`Employee_ID` = `foods_systems`.`Trainer_ID`
    WHERE
        `foods_systems`.`Member_ID` = '$this->Member_ID'";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function update()
    {
       $query="UPDATE
       `foods_systems`
   SET
       `Data` = '$this->Data'
   WHERE
       `Food_System_ID`='$this->Food_System_ID'";
    // print_r($query);die;
    return $this->runDML($query);
    }
    public function delete()
    {
        $query ="DELETE
        FROM
            `foods_systems`
        WHERE
            `Food_System_ID` = '$this->Food_System_ID'";
    return $this->runDML($query);

    }
    public function searchOnId()
    {
        $query="SELECT
        *
    FROM
        `foods_systems`
    WHERE
        `Food_System_ID`='$this->Food_System_ID'";
        return $this->runDQL($query);
    }
    
}