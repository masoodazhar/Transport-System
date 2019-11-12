<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class DailytripModel extends base_model
{
    private  $table_name ="tdailytrip";

    protected function getTableName()
    {
        return $this->table_name;
    }


    public function checkdateontruckatsamedate($id, $date){
        $data = $this->db->query('SELECT tdailytrip.tdcurrentdate as tdcurrentdate FROM tdailytrip WHERE tdailytrip.tid='.$id.'  AND tdailytrip.tdcurrentdate="'.$date.'"');
       if($data->num_rows()>0){
        return $data->row();
       }else{
        return array('tdcurrentdate'=>0);
       }
    }

    public function get_last_id($select = "tdid")
    {
      $this->db->select($select);
        $this->db->from('tdailytrip');
        $this->db->order_by("tdid", "desc");
        return $this->db->get()->row('tdid');
    }

    public function add_otherexpense($s, $d, $a)
    {
        $data = array('toeidentity' => $s, 'toedescription'=>$d , 'toeamount'=>$a);
        return $this->db->insert('totherexpense',$data);
    }

    public function show_data()
    {
        $data = $this->db->query('Select tdailytrip.* , ttruck.tnumber , tcity.tcname , tstation.tstname FROM tdailytrip INNER JOIN ttruck ON tdailytrip.tid = ttruck.tid INNER JOIN tcity ON tdailytrip.tcid = tcity.tcid INNER JOIN tstation ON tdailytrip.tstid = tstation.tstid');
        return $data->result();
    }
}   