<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Equipment extends config implements operations {
    private $Equipment_ID;
    private $Price;
    private $Name;
    private $ArrivalDate;
    private $Subblier_ID;

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

    /**
     * Get the value of Price
     */ 
    public function getPrice()
    {
        return $this->Price;
    }

    /**
     * Set the value of Price
     *
     * @return  self
     */ 
    public function setPrice($Price)
    {
        $this->Price = $Price;

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
     * Get the value of ArrivalDate
     */ 
    public function getArrivalDate()
    {
        return $this->ArrivalDate;
    }

    /**
     * Set the value of ArrivalDate
     *
     * @return  self
     */ 
    public function setArrivalDate($ArrivalDate)
    {
        $this->ArrivalDate = $ArrivalDate;

        return $this;
    }

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
    public function create()
    {
        $query ="INSERT INTO `equipments`(
            `Price`,
            `Name`,
            `ArrivalDate`,
            `Subblier_ID`
        )
        VALUES(
            '$this->Price',
            '$this->Name',
            '$this->ArrivalDate',
            '$this->Subblier_ID'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
            $query ="SELECT
            `subbliers`.*,
            `maintenance_record`.*,
            `equipments`.`Equipment_ID`,
            `equipments`.`Name` AS `name_equipment`,
            `equipments`.`Price`,
            `equipments`.`ArrivalDate`
            FROM
                `equipments`
            LEFT JOIN `subbliers` ON `subbliers`.`Subblier_ID` = `equipments`.`Subblier_ID`
            LEFT JOIN `maintenance_record` ON `maintenance_record`.`Equipment_ID` = `equipments`.`Equipment_ID`
            GROUP BY
            `equipments`.`Equipment_ID` ";
            return $this->runDQL($query);
    }
    public function update()
    {
        
    }
    public function delete()
    {
        
    }
    public function getmaintenance()
    {
        $query = "SELECT `maintenance_record`.*,`equipments`.`Name`
        FROM `maintenance_record` 
        LEFT JOIN `equipments` ON `equipments`.`Equipment_ID` = `maintenance_record`.`Equipment_ID`";
        return $this->runDQL($query);
    }
    public function searchOnId()
    {
        $query="SELECT `maintenance_record`.*,`equipments`.`Name`
        FROM `maintenance_record` 
        LEFT JOIN `equipments` ON `equipments`.`Equipment_ID` = `maintenance_record`.`Equipment_ID`
        WHERE
            `equipments`.`Equipment_ID` = '$this->Equipment_ID'";
            // print_r($query);die;
        return $this->runDQL($query);
    }
    public function getEquipmentCount()
    {
        $query ="SELECT
        COUNT(`Equipment_ID`) AS `equipments_count`
        FROM
        `equipments`";
        return $this->runDQL($query);
    }
}