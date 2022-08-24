<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Mempership extends config implements operations {
    private $Mempership_ID ;
    private $Category ;
    private $Price ;
    private $Period ;
    private $Discount_Percentage ;


    /**
     * Get the value of Mempership_ID
     */ 
    public function getMempership_ID()
    {
        return $this->Mempership_ID;
    }

    /**
     * Set the value of Mempership_ID
     *
     * @return  self
     */ 
    public function setMempership_ID($Mempership_ID)
    {
        $this->Mempership_ID = $Mempership_ID;

        return $this;
    }

    /**
     * Get the value of Category
     */ 
    public function getCategory()
    {
        return $this->Category;
    }

    /**
     * Set the value of Category
     *
     * @return  self
     */ 
    public function setCategory($Category)
    {
        $this->Category = $Category;

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
     * Get the value of Period
     */ 
    public function getPeriod()
    {
        return $this->Period;
    }

    /**
     * Set the value of Period
     *
     * @return  self
     */ 
    public function setPeriod($Period)
    {
        $this->Period = $Period;

        return $this;
    }

    /**
     * Get the value of Discount_Percentage
     */ 
    public function getDiscount_Percentage()
    {
        return $this->Discount_Percentage;
    }

    /**
     * Set the value of Discount_Percentage
     *
     * @return  self
     */ 
    public function setDiscount_Percentage($Discount_Percentage)
    {
        $this->Discount_Percentage = $Discount_Percentage;

        return $this;
    }

    public function create()
    {
        $query = "INSERT INTO `memperships`(
            `Category`,
            `Price`,
            `Period`,
            `Discount_Percentage`
        )
        VALUES(
            '$this->Category',
            '$this->Price',
            '$this->Period',
            '$this->Discount_Percentage'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
        $query ="SELECT * FROM `memperships`";
        return $this->runDQL($query);
    }
    public function update()
    {
        $query = "UPDATE
        `memperships`
    SET
        `Category` = '$this->Category',
        `Price` = '$this->Price',
        `Period` = '$this->Period',
        `Discount_Percentage` = '$this->Discount_Percentage'
    WHERE
        `Mempership_ID`='$this->Mempership_ID'";
        return $this->runDML($query);
    }
    public function delete()
    {
        $query ="DELETE
        FROM
            `memperships`
        WHERE
            `memberships`.`Membership_ID`='$this->Membership_ID'";
            return $this->runDML($query);
    }
    public function searchOnId()
    {
        $query= "SELECT
        *
        FROM
        `memperships`
        WHERE
        `Mempership_ID`='$this->Mempership_ID'";       
        return $this->runDQL($query);
    }
    public function totalIncome()
    {
        $query = "SELECT
        SUM(`Price`) AS price
    FROM
        `memperships`
    RIGHT JOIN `memberships_subscription` ON `memberships_subscription`.`Membership_ID` =`memperships`.`Mempership_ID`";
    return $this->runDQL($query);
    }
}