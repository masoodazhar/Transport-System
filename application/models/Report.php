<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH."models/base_model.php";
class main_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    private  $table_name ="transport_tdriver";

    protected function getTableName()
    {
        return $this->table_name;
    }



    
}

?>