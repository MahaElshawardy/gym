<?php
include_once __DIR__ . "\..\database\config.php";
class Validation
{
    private $name;
    private $value;

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
    public function required(): string
    {
        return (empty($this->value)) ? "$this->name Is Required" : "";
    }
    public function regex($pattern): string
    {
        return (preg_match($pattern, $this->value)) ? "" : " $this->name Is Invalid";
    }
    public function unique($table): string
    {
        // $query = "SELECT * FROM `$table` WHERE `$this->name` = '$this->value'";
        $query = "SELECT * FROM `$table` WHERE `$this->name` = '$this->value'";
        // print_r($query);
        // die;
        $config = new config;
        $result = $config->runDQL($query);
        // print_r($result);die;
        return (empty($result)) ? "" : "This $this->name is already exists";
    }
    public function confirmed($valueConfirmation) : string
    {
        return ($this->value == $valueConfirmation) ? "" : "$this->name Not Confirmed";
    }
}
