<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class TruckModel extends base_model
{
    private  $table_name ="ttruck";

    protected function getTableName()
    {
        return $this->table_name;
    }

    public function get_last_id($select = "tid")
    {
    	$this->db->select($select);
        $this->db->from('ttruck');
        $this->db->order_by("tid", "desc");
        return $this->db->get()->row('tid');
    }
    public function checktruck($tname){
        // $data = $this->db->where();
        $q = $this->db->get_where('ttruck', array('tnumber'=>$tname));
        if($q->num_rows()>0){
            return 1;
        }else{
            return 0;
        }
    }
}