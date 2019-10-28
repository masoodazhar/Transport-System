<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class ReturntripModel extends base_model
{
    private  $table_name ="treturntrip";

    protected function getTableName()
    {
        return $this->table_name;
    }

    public function add_otherexpense($s, $d, $a)
    {
        $data = array('toeidentity' => $s, 'toedescription'=>$d , 'toeamount'=>$a);
        return $this->db->insert('totherexpense',$data);
    }
    
    public function checkdateontruckatsamedate($id, $date){
        $data = $this->db->query('SELECT treturntrip.trcurrentdate as trcurrentdate FROM treturntrip WHERE treturntrip.tid='.$id.'  AND treturntrip.trcurrentdate="'.$date.'"');
       if($data->num_rows()>0){
        return $data->row();
       }else{
        return array('trcurrentdate'=>0);
       }
    }

    public function return_detail_show()
    {
      $data =  $this->db->query('SELECT treturntrip.* , ttruck.tnumber , tcity.tcname , tstation.tstname FROM treturntrip LEFT JOIN ttruck ON treturntrip.tid = ttruck.tid LEFT JOIN tcity ON treturntrip.tcid = tcity.tcid LEFT JOIN tstation ON treturntrip.tstid = tstation.tstid');
      return $data->result();
    }

     public function get_last_id($select = "trid")
    {
      $this->db->select($select);
        $this->db->from('treturntrip');
        $this->db->order_by("trid", "desc");
        return $this->db->get()->row('trid');
    }
}