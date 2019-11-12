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

    public function shop_remaining_oil()
    {
    	$data = $this->db->query('SELECT tshop.tsname , toil.toshopid , SUM(toil.toquantity) as quantity , SUM(toil.tototalprice) AS total_amount , SUM(toil.topaid) AS paid , SUM(toil.toremaining) AS remaining FROM toil INNER JOIN tshop ON toil.toshopid = tshop.sid GROUP BY tshop.tsname');
    	return $data->result();
    }

    public function get_single($shop_id)
    {
    	$data = $this->db->query('SELECT tshop.tsname , toil.toshopid , toil.toquantity ,toil.tototalprice , toil.topaid , toil.toremaining , toil.crnt_date FROM toil INNER JOIN tshop ON toil.toshopid = tshop.sid Where toil.toshopid ='.$shop_id);
    	return $data->result();
    }
}