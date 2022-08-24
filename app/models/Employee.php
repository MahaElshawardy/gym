<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';

class Employee extends config implements operations{
    private $Employee_ID ;
    private $Email  ;
    private $Password ;
    private $Full_Name ;
    private $Personal_Image ;
    private $National_ID_Image ;
    private $Address ;
    private $Phone_Number  ;
    private $Phone_Number2  ;
    private $Gender ;
    private $Type ;
    private $Birthdate ;
    private $Hiring_Date ;
    private $Period ;
    private $Periodic_Working_Hours ;
    private $Periodic_Salary ;
    private $Certificates ;
    public function create()
    {
        // $query ="INSERT INTO `employees_attendance`(`Date`, `Attending`, `Leaving`, `Employee_ID`) 
        // VALUES ('$this->Date','$this->Attending','$this->Leaving','$this->Employee_ID')";
        if(empty($this->Phone_Number2 == '')){
        $query="INSERT INTO `employees`(
            `Email`,
            `Password`,
            `Full_Name`,
            `Personal_Image`,
            `National_ID_Image`,
            `Address`,
            `Phone_Number`,
            `Phone_Number2`,
            `Gender`,
            `Birthdate`,
            `Type`,
            `Hiring_Date`,
            `Periodic_Salary`,
            `Periodic_Working_Hours`,
            `Period`,
            `Certificates`
        )
        VALUES(
            '$this->Email',
            '$this->Password',
            '$this->Full_Name',
            '$this->Personal_Image',
            '$this->National_ID_Image',
            '$this->Address',
            '$this->Phone_Number',
            '$this->Phone_Number2',
            '$this->Gender',
            '$this->Birthdate',
            '$this->Type',
            '$this->Hiring_Date',
            '$this->Periodic_Salary',
            '$this->Periodic_Working_Hours',
            '$this->Period',
            '$this->Certificates'
        )";
        }else{
           $query="INSERT INTO `employees`(
            `Email`,
            `Password`,
            `Full_Name`,
            `Personal_Image`,
            `National_ID_Image`,
            `Address`,
            `Phone_Number`,
            `Gender`,
            `Birthdate`,
            `Type`,
            `Hiring_Date`,
            `Periodic_Salary`,
            `Periodic_Working_Hours`,
            `Period`,
            `Certificates`
        )
        VALUES(
            '$this->Email',
            '$this->Password',
            '$this->Full_Name',
            '$this->Personal_Image',
            '$this->National_ID_Image',
            '$this->Address',
            '$this->Phone_Number',
            '$this->Gender',
            '$this->Birthdate',
            '$this->Type',
            '$this->Hiring_Date',
            '$this->Periodic_Salary',
            '$this->Periodic_Working_Hours',
            '$this->Period',
            '$this->Certificates'
        )"; 
        }
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function read()
    {
        $query = "SELECT * FROM `employees` ORDER BY `Employee_ID` ASC";
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

    /**
     * Get the value of Employee_ID
     */ 
    public function getEmployee_ID()
    {
        return $this->Employee_ID;
    }

    /**
     * Set the value of Employee_ID
     *
     * @return  self
     */ 
    public function setEmployee_ID($Employee_ID)
    {
        $this->Employee_ID = $Employee_ID;

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
        $this->Password = $Password;

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
     * Get the value of Personal_Image
     */ 
    public function getPersonal_Image()
    {
        return $this->Personal_Image;
    }

    /**
     * Set the value of Personal_Image
     *
     * @return  self
     */ 
    public function setPersonal_Image($Personal_Image)
    {
        $this->Personal_Image = $Personal_Image;

        return $this;
    }

    /**
     * Get the value of National_ID_Image
     */ 
    public function getNational_ID_Image()
    {
        return $this->National_ID_Image;
    }

    /**
     * Set the value of National_ID_Image
     *
     * @return  self
     */ 
    public function setNational_ID_Image($National_ID_Image)
    {
        $this->National_ID_Image = $National_ID_Image;

        return $this;
    }

    /**
     * Get the value of Address
     */ 
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * Set the value of Address
     *
     * @return  self
     */ 
    public function setAddress($Address)
    {
        $this->Address = $Address;

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
     * Get the value of Type
     */ 
    public function getType()
    {
        return $this->Type;
    }

    /**
     * Set the value of Type
     *
     * @return  self
     */ 
    public function setType($Type)
    {
        $this->Type = $Type;

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
     * Get the value of Hiring_Date
     */ 
    public function getHiring_Date()
    {
        return $this->Hiring_Date;
    }

    /**
     * Set the value of Hiring_Date
     *
     * @return  self
     */ 
    public function setHiring_Date($Hiring_Date)
    {
        $this->Hiring_Date = $Hiring_Date;

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
     * Get the value of Periodic_Working_Hours
     */ 
    public function getPeriodic_Working_Hours()
    {
        return $this->Periodic_Working_Hours;
    }

    /**
     * Set the value of Periodic_Working_Hours
     *
     * @return  self
     */ 
    public function setPeriodic_Working_Hours($Periodic_Working_Hours)
    {
        $this->Periodic_Working_Hours = $Periodic_Working_Hours;

        return $this;
    }

    /**
     * Get the value of Periodic_Salary
     */ 
    public function getPeriodic_Salary()
    {
        return $this->Periodic_Salary;
    }

    /**
     * Set the value of Periodic_Salary
     *
     * @return  self
     */ 
    public function setPeriodic_Salary($Periodic_Salary)
    {
        $this->Periodic_Salary = $Periodic_Salary;

        return $this;
    }

    /**
     * Get the value of Certificates
     */ 
    public function getCertificates()
    {
        return $this->Certificates;
    }

    /**
     * Set the value of Certificates
     *
     * @return  self
     */ 
    public function setCertificates($Certificates)
    {
        $this->Certificates = $Certificates;

        return $this;
    }
    public function login()
    {
        $query = "SELECT * FROM employees WHERE Email = '$this->Email' AND Password = '$this->Password'";
        // print_r($query);die;
        return $this->runDQL($query);
    }
    public function getEmployeesByEmail()
    {
    $query = "SELECT * FROM `employees` WHERE `employees`.`Employee_ID`= '$this->Employee_ID' ";
    return $this->runDQL($query);
    }
    public function dataFoodSystem()
    {
        $query ="SELECT
        `foods_systems`.*,
        `members`.`Full_Name` AS `name_member`,
        `employees`.`Full_Name` AS `name_employee`,
        `employees`.`Employee_ID`
    FROM
        `foods_systems`
    LEFT JOIN `members` ON `members`.`Member_ID` = `foods_systems`.`Member_ID`
    LEFT JOIN `employees` ON `employees`.`Employee_ID` = `foods_systems`.`Trainer_ID`
    WHERE
        `employees`.`Employee_ID`='$this->Employee_ID'";
            // print_r($query);
        return $this->runDQL($query);
    }
    public function dataFoodystem()
    {
        $query ="SELECT
        `foods_systems`.*,
        `members`.`Full_Name` AS `members_name`,
        `members`.`Member_ID`,
        `employees`.`Full_Name` AS `name_employee`,
        `employees`.`Employee_ID`
        FROM
            `foods_systems`
        JOIN `members` ON `foods_systems`.`Member_ID` = `members`.`Member_ID`
        JOIN `employees` ON `employees`.`Employee_ID`= `foods_systems`.`Trainer_ID`
        WHERE
            `employees`.`Employee_ID`='$this->Employee_ID'
        ";
        return $this->runDQL($query);
    }
    public function getReviews()
    {
        $query = "SELECT
        `reviews`.*,
        `members`.`Full_Name`,
        `employees`.`Employee_ID`,
        `employees`.`Full_Name` AS `emp_name`
        FROM
            `reviews`
        LEFT JOIN `members` ON `members`.`Member_ID` = `reviews`.`Member_ID`
        LEFT JOIN `employees` ON `employees`.`Employee_ID` =`reviews`.`Trainer_ID`
        WHERE
            `employees`.`Employee_ID`='$this->Employee_ID'";
        return $this->runDQL($query);
    }
    public function searchOnId()
    {
        $query = " SELECT
        `employees`.*,
        COUNT(`reviews`.`Trainer_ID`) AS `reviews_count`,
        IF(
            ROUND(AVG(`reviews`.`Stars`)) IS NULL,
            0,
            ROUND(AVG(`reviews`.`Stars`))
        ) AS `reviews_avg`,
        `members`.`Full_Name` AS `members_name`
        FROM
            `employees`
        LEFT JOIN `reviews` ON `employees`.`Employee_ID` = `reviews`.`Trainer_ID`
        JOIN `members` ON `members`.`Member_ID` = `reviews`.`Member_ID`
        WHERE
            `employees`.`Employee_ID`='$this->Employee_ID'
        GROUP BY
            `employees`.`Employee_ID`";
        return $this->runDQL($query);
    }
    public function getEmployeeCount()
    {
        $query ="SELECT
        COUNT(`Employee_ID`) AS `employees_count`
        FROM
        `employees`";
        return $this->runDQL($query);
    }
    public function searcheOnId()
    {
        $query = "SELECT
        `employees`.`Employee_ID` AS `id_emp`, 
        `employees`.*,
        `employees_attendance`.*
    FROM
        `employees`
    LEFT JOIN `employees_attendance` ON `employees_attendance`.`Employee_ID` = `employees`.`Employee_ID`
    WHERE
        `employees`.`Employee_ID` ='$this->Employee_ID'"; //id_emp is retrive id form table employees
        return $this->runDQL($query);
    }
    public function getemployee()
    {
        $query ="SELECT
        `Employee_ID`,
        `Full_Name`
        FROM
            `employees`";
        return $this->runDQL($query);
    }
    public function getFEmployee()
    {
        $query ="SELECT
        *
    FROM
        `employees`
        WHERE
        `Type` = 'Trainer'";
        return $this->runDQL($query);
    }
    public function getReviewsUser()
    {
        $query = "SELECT
        `reviews`.*,
        `members`.`Full_Name`
    FROM
        `reviews`
    JOIN `members` ON `members`.`Member_ID` = `reviews`.`Member_ID`
    WHERE
        `reviews`.`Trainer_ID` = $this->Employee_ID";
        return $this->runDQL($query);           
    }
    public function getTrainer()
    {
        $query ="SELECT
        *
    FROM
        `employees`
        WHERE
        `Employee_ID` = '$this->Employee_ID'";
        return $this->runDQL($query);
    }
    public function getNameMemberFoodSystem()
   {
       $query = "SELECT 
       DISTINCT(`members`.`Member_ID`),
       `members`.`Full_Name`
   FROM
       `members`
       LEFT JOIN members_classes ON members_classes.Member_ID = members.Member_ID
       LEFT JOIN classes ON classes.Class_ID = members_classes.Class_ID
       LEFT JOIN classes_dates ON classes_dates.Class_ID = classes.Class_ID
   WHERE
       classes_dates.Trainer_ID =$this->Employee_ID";
    //    print_r($query);die;
       return $this->runDQL($query);
   }
   public function getNameMembers()
   {
       $query = "SELECT 
       DISTINCT(`members`.`Member_ID`),
       `members`.*
   FROM
       `members`
       LEFT JOIN members_classes ON members_classes.Member_ID = members.Member_ID
       LEFT JOIN classes ON classes.Class_ID = members_classes.Class_ID
       LEFT JOIN classes_dates ON classes_dates.Class_ID = classes.Class_ID
   WHERE
       classes_dates.Trainer_ID =$this->Employee_ID";
    //    print_r($query);die;
       return $this->runDQL($query);
   }
   public function updatePasswordByEmail()
    {
        $query = "UPDATE `employees` SET Password = '$this->Password' WHERE Employee_ID = '$this->Employee_ID' ";
        // print_r($query);die;
        return $this->runDML($query);
    }
}
