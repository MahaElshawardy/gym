<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Membership_Subscription extends config implements operations {
    private $Membership_Subscription_ID ;
    private $Membership_ID  ;
    private $Member_ID  ;
    private $Start_Date ;
    private $End_Date ;

    /**
     * Get the value of Membership_Subscription_ID
     */ 
    public function getMembership_Subscription_ID()
    {
        return $this->Membership_Subscription_ID;
    }

    /**
     * Set the value of Membership_Subscription_ID
     *
     * @return  self
     */ 
    public function setMembership_Subscription_ID($Membership_Subscription_ID)
    {
        $this->Membership_Subscription_ID = $Membership_Subscription_ID;

        return $this;
    }

    /**
     * Get the value of Membership_ID
     */ 
    public function getMembership_ID()
    {
        return $this->Membership_ID;
    }

    /**
     * Set the value of Membership_ID
     *
     * @return  self
     */ 
    public function setMembership_ID($Membership_ID)
    {
        $this->Membership_ID = $Membership_ID;

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
     * Get the value of End_Date
     */ 
    public function getEnd_Date()
    {
        return $this->End_Date;
    }

    /**
     * Set the value of End_Date
     *
     * @return  self
     */ 
    public function setEnd_Date($End_Date)
    {
        $this->End_Date = $End_Date;

        return $this;
    }
    public function create()
    {
        $query = "INSERT INTO `memberships_subscription`(
            `Membership_ID`,
            `Member_ID`
        )
        VALUES(
            '$this->Membership_ID',
            '$this->Member_ID'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
        $query="SELECT
        `memberships_subscription`.*,
        `memperships`.`Category`,
        `members`.`Full_Name`
    FROM
        `memberships_subscription`
        LEFT JOIN `memperships` ON `memperships`.`Mempership_ID` = `memberships_subscription`.`Membership_ID`
        LEFT JOIN `members` ON `members`.`Member_ID` = `memberships_subscription`.`Member_ID`";
        return $this->runDQL($query);
    }
    public function update()
    {
        $query = "UPDATE
        `memberships_subscription`
    SET
        `Start_Date` = '$this->Start_Date',
        `End_Date` = '$this->End_Date'
    WHERE
        `Membership_Subscription_ID` = '$this->Membership_Subscription_ID'";
        return $this->runDML($query);
    }
    public function delete()
    {
        $query = "DELETE
        FROM
            `memberships_subscription`
        WHERE
            `Membership_Subscription_ID` = $this->Membership_Subscription_ID";
            return $this->runDML($query);
    }
    public function searchOnId()
    {
        $query = "SELECT
        *
    FROM
        `memberships_subscription`
    WHERE
        `Membership_Subscription_ID`= '$this->Membership_Subscription_ID'";
        return $this->runDQL($query);
    }
    public function getMembershipSub()
    {
        $query= "SELECT
        `memperships`.`Category`,
        `memberships_subscription`.`Membership_ID`
    FROM
        `memperships`
        LEFT JOIN `memberships_subscription` ON `memberships_subscription`.`Membership_ID` = `memperships`.`Mempership_ID`
        LEFT JOIN `members` ON `members`.`Member_ID` = `memberships_subscription`.`Member_ID`
        WHERE 
        `members`.`Member_ID` = $this->Member_ID";
    // print_r($query);die;
    return $this->runDQL($query);
    }
}