<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class PumpdetailModel extends base_model
{
    private  $table_name ="tpumpdetail";

    protected function getTableName()
    {
        return $this->table_name;
    }

    public function station_remaining()
    {
    	$data = $this->db->query('SELECT tpumpstation.tpname , tpumpdetail.tpid , SUM(tpumpdetail.tpdliter) AS liter , SUM(tpumpdetail.tpdamount) AS total_amount , SUM(tpumpdetail.tpdpaidamount) AS paid , (SUM(tpumpdetail.tpdamount) -SUM( tpumpdetail.tpdpaidamount)) AS remaining FROM tpumpdetail INNER JOIN tpumpstation ON tpumpdetail.tpid = tpumpstation.tpid GROUP BY tpumpstation.tpname');
    	return $data->result();
    }

    public function get_single($station_id)
    {
    	$data = $this->db->query('SELECT tpumpstation.tpname , tpumpdetail.tpid , tpumpdetail.tpdliter AS liter , tpumpdetail.tpdamount AS total_amount , tpumpdetail.tpdpaidamount AS paid , (tpumpdetail.tpdamount - tpumpdetail.tpdpaidamount) AS remaining ,  tpumpdetail.crnt_date  FROM tpumpdetail INNER JOIN tpumpstation ON tpumpdetail.tpid = tpumpstation.tpid WHERE tpumpdetail.tpid ='.$station_id);
    	return $data->result();
    }
}