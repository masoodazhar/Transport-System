<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class DriverModel extends base_model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    private  $table_name ="tdriver";

    protected function getTableName()
    {
        return $this->table_name;
    }
}