<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class ClosedModel extends base_model
{
    private  $table_name ="tremainingamountpersondetailclosed";

    protected function getTableName()
    {
        return $this->table_name;
    }

    public function remainingnameids(){

        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname  FROM tremainingamountpersondetail");
        
        return $data->result();

    }

    public function get_all_closed_amount_by_personid($trapdid){

        $data = $this->db->query("SELECT tremainingamountpersondetailclosed.trapdcamount ,  tremainingamountpersondetail.trapdamount,tremainingamountpersondetail.trapdamount-tremainingamountpersondetailclosed.trapdcamount AS remainingamount, tremainingamountpersondetailclosed.trapdcdate, tremainingamountpersondetail.trapdid,tremainingamountpersondetailclosed.trapdcdescription, tremainingamountpersondetail.trapdname FROM tremainingamountpersondetailclosed INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid AND tremainingamountpersondetail.trapdid=".$trapdid."");
        
        return $data->result();

    }

    public function get_sumof_closed_amount_by_personid($trapdid){

        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount as totalamount, SUM(tremainingamountpersondetailclosed.trapdcamount) AS paidamount, tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) AS remainingamount , tremainingamountpersondetail.trapdid,  tremainingamountpersondetail.trapdname, tremainingamountpersondetail.trapdamount FROM tremainingamountpersondetailclosed INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid AND tremainingamountpersondetail.trapdamount>0 AND tremainingamountpersondetail.trapdid=".$trapdid."");
        return $data->row();

    }

}