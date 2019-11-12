<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class TripModel extends base_model
{
    private  $table_name ="ttripdetail";

    protected function getTableName()
    {
        return $this->table_name;
    }

    public function get_daily_trip($id)
    {
      $data = $this->db->query("select tdailytrip.tid , tdailytrip.tcid , tdailytrip.tddehari , tstation.tstname, tstation.tstid , tdailytrip.tdvfrieght , sum(tdailytrip.tdweight+tothermaterial.tomweight) as totalweight , tdailytrip.tdweight , tcity.tcname FROM tdailytrip LEFT JOIN tcity on tdailytrip.tcid = tcity.tcid LEFT JOIN ttruck on tdailytrip.tid = ttruck.tid LEFT JOIN tothermaterial on tdailytrip.tid = tothermaterial.tid LEFT JOIN tstation ON tdailytrip.tstid = tstation.tstid where tdailytrip.tid =".$id);
          return $data->row();
    }

    public function add_otherexpense($s, $d, $a)
    {
        $data = array('toeidentity' => $s, 'toedescription'=>$d , 'toeamount'=>$a);
        return $this->db->insert('totherexpense',$data);
    }
    
    public function add_pumpdetail($a, $b, $c , $d  , $f)
    {
        $data = array('tid' => $a, 'tpid'=>$b , 'tpdliter'=>$c , 'tpdamount'=>$d  , 'tpdpaidamount'=>$f);
        return $this->db->insert('tpumpdetail',$data);
    }

    public function add_remainvoucher($a, $b, $c , $d  , $f, $g, $h)
    {
        $data = array('trapdtypeid' => $a, 'trapdname'=>$b , 'trapdcontact'=>$c , 'trapdamount'=>$d  , 'trapdformid'=>$f , 'trapddate' =>$g , 'trapddescription'=>$h);
        return $this->db->insert('tremainingamountpersondetail',$data);
    }

    public function trip_index()
    {
       $data =  $this->db->query("select ttripdetail.*, tcity.tcname , ttruck.tnumber, tstation.tstname, tpumpstation.tpname from ttripdetail LEFT JOIN tcity on ttripdetail.ttdfromtcid=tcity.tcid LEFT JOIN ttruck on ttripdetail.ttdtid=ttruck.tid LEFT JOIN tstation ON ttripdetail.ttdtstid=tstation.tstid LEFT JOIN tpumpstation ON ttripdetail.ttdtpid=tpumpstation.tpid GROUP BY ttripdetail.ttdsno");

        return $data->result();
    }

    public function tripdetail($id,$serial)
    {
       $data =  $this->db->query("select ttripdetail.*, tcity.tcname , ttruck.tnumber, tstation.tstname, tpumpstation.tpname from ttripdetail LEFT JOIN tcity on ttripdetail.ttdfromtcid=tcity.tcid LEFT JOIN ttruck on ttripdetail.ttdtid=ttruck.tid LEFT JOIN tstation ON ttripdetail.ttdtstid=tstation.tstid LEFT JOIN tpumpstation ON ttripdetail.ttdtpid=tpumpstation.tpid GROUP BY ttripdetail.ttdsno HAVING ttripdetail.ttdid=".$id." AND ttripdetail.ttdsno='".$serial."'");

        return $data->row();
    }

    public function otherexpense($serial)
    {
       $data = $this->db->query("SELECT totherexpense.* FROM totherexpense LEFT JOIN ttripdetail on totherexpense.ttdsno=ttripdetail.ttdsno WHERE totherexpense.ttdsno=".$serial."");

        return $data->result();
    }

    public function get_last_id($select = "ttdid")
    {
        $this->db->select($select);
        $this->db->from('ttripdetail');
        $this->db->order_by("ttdid", "desc");
        return $this->db->get()->row('ttdid');
    }

    public function get_truck()
    {
        $data = $this->db->query('SELECT ttruck.tnumber , tdailytrip.tid FROM ttruck INNER JOIN tdailytrip on ttruck.tid = tdailytrip.tid GROUP by ttruck.tid');
        return $data->result();
    }
}