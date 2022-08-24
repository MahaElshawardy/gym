<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Member extends config implements operations {
    private $Member_ID ;
    private $Full_Name ;
    private $Email  ;
    private $Password ;
    private $Phone_Number ;
    private $Gender ;
    private $Phone_Number2 ;
    private $Birthdate ;
    private $Weight ;
    private $Height ;
    private $Health_Statue ;
    private $Mempership_ID ;
    private $Parent_ID ;
    private $Parent_Member_ID ;
    private $Statue ;
    private $code ;
    private $email_verified_at ;
    private $created_at ;
    private $updated_at ;

    

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
     * Get the value of Gender
     */ 
    public function getGender()
    {
        return $this->Gender;
    }

    /**
     * Set the value of Gender
     *
     * @return  self
     */ 
    public function setGender($Gender)
    {
        $this->Gender = $Gender;

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
     * Get the value of Birthdate
     */ 
    public function getBirthdate()
    {
        return $this->Birthdate;
    }

    /**
     * Set the value of Birthdate
     *
     * @return  self
     */ 
    public function setBirthdate($Birthdate)
    {
        $this->Birthdate = $Birthdate;

        return $this;
    }

    /**
     * Get the value of Weight
     */ 
    public function getWeight()
    {
        return $this->Weight;
    }

    /**
     * Set the value of Weight
     *
     * @return  self
     */ 
    public function setWeight($Weight)
    {
        $this->Weight = $Weight;

        return $this;
    }

    /**
     * Get the value of Height
     */ 
    public function getHeight()
    {
        return $this->Height;
    }

    /**
     * Set the value of Height
     *
     * @return  self
     */ 
    public function setHeight($Height)
    {
        $this->Height = $Height;

        return $this;
    }

    /**
     * Get the value of Health_Statue
     */ 
    public function getHealth_Statue()
    {
        return $this->Health_Statue;
    }

    /**
     * Set the value of Health_Statue
     *
     * @return  self
     */ 
    public function setHealth_Statue($Health_Statue)
    {
        $this->Health_Statue = $Health_Statue;

        return $this;
    }

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
     * Get the value of Parent_Member_ID
     */ 
    public function getParent_Member_ID()
    {
        return $this->Parent_Member_ID;
    }

    /**
     * Set the value of Parent_Member_ID
     *
     * @return  self
     */ 
    public function setParent_Member_ID($Parent_Member_ID)
    {
        $this->Parent_Member_ID = $Parent_Member_ID;

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
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of email_verified_at
     */ 
    public function getEmail_verified_at()
    {
        return $this->email_verified_at;
    }

    /**
     * Set the value of email_verified_at
     *
     * @return  self
     */ 
    public function setEmail_verified_at($email_verified_at)
    {
        $this->email_verified_at = $email_verified_at;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
    public function create()
    {
        if(empty($this->Phone_Number2 == '')){
            $query = "INSERT INTO `members`(
                `Full_Name`,
                `Email`,
                `Password`,
                `Phone_Number`,
                `Gender`,
                `Phone_Number2`,
                `Birthdate`,
                `Weight`,
                `Height`,
                `Health_Statue`,
                `Mempership_ID`,
                `Parent_ID`,
                `Parent_Member_ID`,
                `code`
            )
            VALUES(
                '$this->Full_Name',
                '$this->Email',
                '$this->Password',
                '$this->Phone_Number',
                '$this->Gender',
                '$this->Phone_Number2',
                '$this->Birthdate',
                '$this->Weight',
                '$this->Height',
                '$this->Health_Statue',
                '$this->Mempership_ID',
                '$this->Parent_ID',
                '$this->Parent_Member_ID',
                '$this->code'
            )";
        }else{
            $query = "INSERT INTO `members`(
                `Full_Name`,
                `Email`,
                `Password`,
                `Phone_Number`,
                `Gender`,
                `Birthdate`,
                `Weight`,
                `Height`,
                `Health_Statue`,
                `Mempership_ID`,
                `Parent_ID`,
                `Parent_Member_ID`,
                `code`
            )
            VALUES(
                '$this->Full_Name',
                '$this->Email',
                '$this->Password',
                '$this->Phone_Number',
                '$this->Gender',
                '$this->Birthdate',
                '$this->Weight',
                '$this->Height',
                '$this->Health_Statue',
                '$this->Mempership_ID',
                '$this->Parent_ID',
                '$this->Parent_Member_ID',
                '$this->code'
            )";
        }
        print_r($query);die;
        return $this->runDML($query);
    }
    public function read()
    {
        $query ="SELECT `members`.*,
        `members`.`Parent_Member_ID` AS `name`,
        (SELECT `members`.`Full_Name` FROM `members` WHERE `Member_ID` = `name`) AS `name_member`,
        (SELECT `members`.`Email` FROM `members` WHERE `Member_ID` = `name`) AS `email_member`,
        (SELECT `members`.`Phone_Number` FROM `members` WHERE `Member_ID` = `name`) AS `phone_member`,
        (SELECT `members`.`Phone_Number2` FROM `members` WHERE `Member_ID` = `name`) AS `phone2_member`,
        `memperships`.*,
        `not_member_parent`.`Parent_ID`,
        `not_member_parent`.`Full_Name` AS `name_parent`,
        `not_member_parent`.`Email` AS `email_parent`,
        `not_member_parent`.`Phone_Number` AS `phone_parent`,
        `not_member_parent`.`Phone_Nmber2` AS `phone2_parent`
        FROM `members`
        LEFT JOIN `memberships_subscription` ON `members`.`Member_ID` = `memberships_subscription`.`Member_ID`
        LEFT JOIN `memperships` ON `memperships`.`Mempership_ID` = `memberships_subscription`.`Membership_ID`
        LEFT JOIN `not_member_parent` ON `not_member_parent`.`Parent_ID` = `members`.`Parent_ID`";
        return $this->runDQL($query);
    }
    public function update()
    {
    if(empty($this->Phone_Number2 == '')){
            $query = "UPDATE
            `members`
        SET
            `Password` = '$this->Password',
            `Phone_Number` = '$this->Phone_Number',
            `Phone_Number2` = '$this->Phone_Number2'
        WHERE
            `Member_ID` = '$this->Member_ID'";
    }else{
            $query = "UPDATE
            `members`
        SET
            `Phone_Number` = '$this->Phone_Number',
            `Birthdate` = '$this->Birthdate',
            `Password` = '$this->Password'
        WHERE
            `Member_ID` = '$this->Member_ID'";
        }
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function delete()
    {
        
    }
    public function checkCode()
    {
        $query = "SELECT * FROM `members` WHERE Email = '$this->Email' AND code = $this->code";
        // print_r($query);die;
        return $this->runDQL($query);
    }

    public function makeUserVerified()
    {
        $query = "UPDATE `members` SET email_verified_at = '$this->email_verified_at',Statue = $this->Statue
        WHERE Email = '$this->Email' ";
        return $this->runDML($query);
    }
    public function login()
    {
        $query = "SELECT * FROM members WHERE Email = '$this->Email' AND Password = '$this->Password'";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function getUserByEmail()
    {
       $query = "SELECT * FROM members WHERE Email = '$this->Email' ";
       return $this->runDQL($query);
    }
    public function updateCodeByEmail()
    {
        $query = "UPDATE `members` SET code = $this->code WHERE Email = '$this->Email' ";
        return $this->runDML($query);
    }
    public function searchOnId()
    {
        $query="SELECT
        `members`.*,
        `memperships`.*,
        `not_member_parent`.`Parent_ID`,
        `not_member_parent`.`Full_Name` AS `name_parent`,
        `members_attendance`.`Attendance_ID`,
        `members_attendance`.*,
        `members_attendance`.`Member_ID` AS `id_attend`
        FROM
            `members`
        LEFT JOIN `memberships_subscription` ON `members`.`Member_ID` = `memberships_subscription`.`Member_ID`
        LEFT JOIN `memperships` ON `memperships`.`Mempership_ID` = `memberships_subscription`.`Membership_ID`
        LEFT JOIN `not_member_parent` ON `not_member_parent`.`Parent_ID` = `members`.`Parent_ID`
        LEFT JOIN `members_attendance` ON `members_attendance`.`Member_ID` = `members`.`Member_ID`
    WHERE 
    `members`.`Member_ID` ='$this->Member_ID'";
    // print_r($query);die;
        return $this->runDQL($query);
    }
    public function getMemberCount()
    {
        $query ="SELECT
        COUNT(`Member_ID`) AS `member_count`
        FROM
        `members`";
        return $this->runDQL($query);
    }
    public function getMembers()
    {
        $query ="SELECT
        *
        FROM
        `members`";
        return $this->runDQL($query);
    }
    public function reg()
    {
        if(empty($this->Phone_Number2 == '')){
            $query = "INSERT INTO `members`(
                `Full_Name`,
                `Email`,
                `Password`,
                `Phone_Number`,
                `Gender`,
                `Phone_Number2`,
                `Birthdate`,
                `code`
            )
            VALUES(
                '$this->Full_Name',
                '$this->Email',
                '$this->Password',
                '$this->Phone_Number',
                '$this->Gender',
                '$this->Phone_Number2',
                '$this->Birthdate',
                '$this->code'
            )";
        }else{
            $query = "INSERT INTO `members`(
                `Full_Name`,
                `Email`,
                `Password`,
                `Phone_Number`,
                `Gender`,
                `Birthdate`,
                `code`
            )
            VALUES(
                '$this->Full_Name',
                '$this->Email',
                '$this->Password',
                '$this->Phone_Number',
                '$this->Gender',
                '$this->Birthdate',
                '$this->code'
            )";
        }
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function updatePasswordByEmail()
    {
        $query = "UPDATE `members` SET Password = '$this->Password' WHERE Email = '$this->Email' ";
        return $this->runDML($query);
    }
    public function getId()
    {
        $query = "SELECT
        *
        FROM
        `members`
        WHERE
        `members`.`Member_ID` ='$this->Member_ID'";
        return $this->runDQL($query);
    }
    public function getMemberAttending()
    {
        $query ="SELECT
        COUNT(`Member_ID`) AS `member_count`
    FROM
        `members_attendance`
        WHERE
        `members_attendance`.`Leaving` IS NULL";
        return $this->runDQL($query);
    }
    public function updateMember()
    {
            $query = "UPDATE
            `members`
        SET
            `Weight` = '$this->Weight',
            `Height` = '$this->Height',
            `Health_Statue` = '$this->Health_Statue'
        WHERE
            `Member_ID` = '$this->Member_ID'";
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function employeeUpdateMember()
    {
        if(!empty($this->Parent_ID) ==''):
            $query = "UPDATE
            `members`
        SET
            `Parent_Member_ID` = '$this->Parent_Member_ID'
        WHERE
            `Member_ID` = '$this->Member_ID'";
        else :
            $query = "UPDATE
            `members`
        SET
            `Parent_ID` = '$this->Parent_ID'
        WHERE
            `Member_ID` = '$this->Member_ID'";
        
        endif;
        return $this->runDML($query);
    }
    public function employeeUpdateStatue()
    {
            $query = "UPDATE
            `members`
        SET
            `Statue` = '$this->Statue'
        WHERE
            `Member_ID` = '$this->Member_ID'";
        // print_r($query);die;
        return $this->runDML($query);
    }
}

