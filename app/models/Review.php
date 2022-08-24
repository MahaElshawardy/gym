<?php
include_once __DIR__ . '\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';

class Review extends config implements operations{
    private $Review_ID ;
    private $Stars ;
    private $Comment ;
    private $Date ;
    private $Member_ID ;
    private $Trainer_ID ;

    /**
     * Get the value of Review_ID
     */ 
    public function getReview_ID()
    {
        return $this->Review_ID;
    }

    /**
     * Set the value of Review_ID
     *
     * @return  self
     */ 
    public function setReview_ID($Review_ID)
    {
        $this->Review_ID = $Review_ID;

        return $this;
    }

    /**
     * Get the value of Stars
     */ 
    public function getStars()
    {
        return $this->Stars;
    }

    /**
     * Set the value of Stars
     *
     * @return  self
     */ 
    public function setStars($Stars)
    {
        $this->Stars = $Stars;

        return $this;
    }

    /**
     * Get the value of Comment
     */ 
    public function getComment()
    {
        return $this->Comment;
    }

    /**
     * Set the value of Comment
     *
     * @return  self
     */ 
    public function setComment($Comment)
    {
        $this->Comment = $Comment;

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
    public function create()
    {
        $query ="INSERT INTO `reviews`(
            `Comment`,
            `Member_ID`,
            `Trainer_ID`
        )
        VALUES(
            '$this->Comment',
            '$this->Member_ID',
            '$this->Trainer_ID'
        )";
        return $this->runDML($query);
    }
    public function read()
    {
        # code...
    }
    public function update()
    {
        # code...
    }
    public function delete()
    {
        # code...
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
            `employees`.`Trainer_ID`='$this->Trainer_ID'";
        return $this->runDQL($query);
    }
}