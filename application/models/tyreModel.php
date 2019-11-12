<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class TyreModel extends base_model
{
    private  $table_name ="ttyre";

    protected function getTableName()
    {
        return $this->table_name;
    }

    public function shop_remaining()
    {
    	$data = $this->db->query('Select ttyre.ttshopid , tshop.tsname , SUM(ttyre.tttyrepair) as tyre_pair ,  SUM(ttyre.tttotalprice) as total_amount , SUM(ttyre.ttpaid) as total_paid , SUM(ttyre.ttremaining) as total_remaining FROM ttyre INNER JOIN tshop ON ttyre.ttshopid = tshop.sid GROUP BY ttyre.ttshopid');
    	return $data->result();
    }

    public function shop_single_remaining($shop_id)
    {
    	$data = $this->db->query('Select ttyre.ttshopid , tshop.tsname , ttyre.* FROM ttyre INNER JOIN tshop ON ttyre.ttshopid = tshop.sid WHERE ttyre.ttshopid ='.$shop_id);
    	return $data->result();
    }


}