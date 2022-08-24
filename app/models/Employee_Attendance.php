<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';

class Employee_Attendance extends config implements operations{
    private $Attendance_ID ;
    private $Date ;
    private $Attending ;
    private $Leaving ;
    private $Employee_ID ;

    /**
     * Get the value of Attendance_ID
     */ 
    public function getAttendance_ID()
    {
        return $this->Attendance_ID;
    }

    /**
     * Set the value of Attendance_ID
     *
     * @return  self
     */ 
    public function setAttendance_ID($Attendance_ID)
    {
        $this->Attendance_ID = $Attendance_ID;

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
     * Get the value of Attending
     */ 
    public function getAttending()
    {
        return $this->Attending;
    }

    /**
     * Set the value of Attending
     *
     * @return  self
     */ 
    public function setAttending($Attending)
    {
        $this->Attending = $Attending;

        return $this;
    }

    /**
     * Get the value of Leaving
     */ 
    public function getLeaving()
    {
        return $this->Leaving;
    }

    /**
     * Set the value of Leaving
     *
     * @return  self
     */ 
    public function setLeaving($Leaving)
    {
        $this->Leaving = $Leaving;

        return $this;
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
    public function create()
    {
        $query ="INSERT INTO `employees_attendance`(
            `Attending`,
            `Employee_ID`
        )
        VALUES(
            '$this->Attending',
            '$this->Employee_ID'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
       
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
    }
    public function leaving()
    {
        $query="SELECT
        `Attendance_ID`
    FROM
        `employees_attendance`
    WHERE
        `Employee_ID`='$this->Employee_ID' 
        ORDER BY
        `Attendance_ID` DESC LIMIT 1";
        return $this->runDQL($query);
    }
    public function saveLeaving()
    {
        $query ="UPDATE
        `employees_attendance`
    SET
        `Leaving` = '$this->Leaving'
    WHERE
        `Employee_ID` = '$this->Employee_ID'
    ORDER BY
        `Attendance_ID`
    DESC
    LIMIT 1";
        // print_r($query);die;
        return $this->runDML($query);
    }
}