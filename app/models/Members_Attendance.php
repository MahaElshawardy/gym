<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';
class Members_Attendance extends config implements operations {
    private $Attendance_ID;
    private $Date;
    private $Attending;
    private $Leaving;
    private $Member_ID;

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
        $query ="INSERT INTO `members_attendance`(
            `Attending`,
            `Member_ID`
        )
        VALUES(
            '$this->Attending',
            '$this->Member_ID'
        )";
        // print_r($query);die;
        return $this->runDML($query);
    }
    public function read()
    {
            $query = "SELECT
            *
            FROM
            `members_attendance`
            WHERE
            `members_attendance`.`Member_ID` ='$this->Member_ID'";
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
    public function leaving()
    {
        $query="SELECT
        `Attendance_ID`
    FROM
        `members_attendance`
    WHERE
        `Member_ID`='$this->Member_ID' 
        ORDER BY
        `Attendance_ID` DESC LIMIT 1";
        return $this->runDQL($query);
    }
    public function saveLeaving()
    {
        $query ="UPDATE
        `members_attendance`
    SET
        `Leaving` = '$this->Leaving'
    WHERE
        `Member_ID` = '$this->Member_ID'
    ORDER BY
        `Attendance_ID`
    DESC
    LIMIT 1";
        // print_r($query);die;
        return $this->runDML($query);
    }
}