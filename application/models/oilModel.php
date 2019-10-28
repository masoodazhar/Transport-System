<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class OilModel extends base_model
{
    private  $table_name ="toil";

    protected function getTableName()
    {
        return $this->table_name;
    }
}