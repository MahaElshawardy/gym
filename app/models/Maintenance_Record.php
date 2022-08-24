<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';

class Maintenance_Record extends config implements operations{
    private $Maintenance_ID ;
    private $Date ;
    private $info ;
    private $Equipment_ID  ;

    /**
     * Get the value of Maintenance_ID
     */ 
    public function getMaintenance_ID()
    {
        return $this->Maintenance_ID;
    }

    /**
     * Set the value of Maintenance_ID
     *
     * @return  self
     */ 
    public function setMaintenance_ID($Maintenance_ID)
    {
        $this->Maintenance_ID = $Maintenance_ID;

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
     * Get the value of info
     */ 
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Set the value of info
     *
     * @return  self
     */ 
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get the value of Equipment_ID
     */ 
    public function getEquipment_ID()
    {
        return $this->Equipment_ID;
    }

    /**
     * Set the value of Equipment_ID
     *
     * @return  self
     */ 
    public function setEquipment_ID($Equipment_ID)
    {
        $this->Equipment_ID = $Equipment_ID;

        return $this;
    }
    public function create()
    {
        $query ="INSERT INTO `maintenance_record`(`Date`, `info`, `Equipment_ID`)
        VALUES(
            '$this->Date',
            '$this->info',
            '$this->Equipment_ID'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
       $query="SELECT
       `maintenance_record`.*,
       `equipments`.`Name`
        FROM
       `maintenance_record`
       LEFT JOIN `equipments` ON `equipments`.`Equipment_ID` = `maintenance_record`.`Equipment_ID` ";
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
    public function searchOnId()
    {
        $query = "SELECT
        `equipments`.`Equipment_ID`
        FROM
            `equipments`
        WHERE
            `equipments`.`Equipment_ID` = '$this->Equipment_ID'";
            return $this -> runDQL($query);
    }
}