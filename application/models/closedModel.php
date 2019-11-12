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

        $data = $this->db->query("SELECT tstation.tstid, tstation.tstname FROM tstation");
        
        return $data->result();

    }
    public function get_truck_name_and_number(){
        $data = $this->db->query("SELECT tstation.tstid, tstation.tstname FROM tstation");        
        return $data->result();
    }
    public function get_all_remaining_from_all_table_on_station_id($stationid){
        $data = $this->db->query("SELECT (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip INNER JOIN tstation ON tstation.tstid=tdailytrip.tstid WHERE tdailytrip.tdremainingamount>0 AND tstation.tstid=".$stationid." )+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail INNER JOIN tstation ON tstation.tstid=ttripdetail.ttdstation  WHERE ttdremainingamount>0 AND tstation.tstid=".$stationid." )+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial INNER JOIN tstation ON tstation.tstid=tothermaterial.tomtransporter WHERE tothermaterial.tomremainingamount>0 AND tstation.tstid=".$stationid.")+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip INNER JOIN tstation ON tstation.tstid=treturntrip.tstid WHERE treturntrip.trremainingamount>0 AND tstation.tstid=".$stationid.") as total_remaining_from_all_table_on_station_id FROM DUAL");
        
        return $data->row('total_remaining_from_all_table_on_station_id');
    }

    public function get_all_payable_from_all_table_on_station_id($stationid){
        $data = $this->db->query("SELECT (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip INNER JOIN tstation ON tstation.tstid=tdailytrip.tstid WHERE tdailytrip.tdremainingamount<0 AND tstation.tstid=".$stationid." )+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail INNER JOIN tstation ON tstation.tstid=ttripdetail.ttdstation  WHERE ttdremainingamount<0 AND tstation.tstid=".$stationid." )+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial INNER JOIN tstation ON tstation.tstid=tothermaterial.tomtransporter WHERE tothermaterial.tomremainingamount<0 AND tstation.tstid=".$stationid.")+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip INNER JOIN tstation ON tstation.tstid=treturntrip.tstid WHERE treturntrip.trremainingamount<0 AND tstation.tstid=".$stationid.") as total_remaining_from_all_table_on_station_id FROM DUAL");
        
        return $data->row('total_remaining_from_all_table_on_station_id');
    }
    public function get_trip_on_truck($stationid, $truckid){

        $data = $this->db->query("SELECT 
            (SELECT IFNULL(COUNT(ttripdetail.tid),0) FROM ttripdetail WHERE ttripdetail.ttdstation=".$stationid." AND ttripdetail.tid=".$truckid." AND ttripdetail.ttdremainingamount>0)+
            (SELECT IFNULL(COUNT(tdailytrip.tid),0)  FROM tdailytrip WHERE tdailytrip.tstid=".$stationid." AND tdailytrip.tid=".$truckid." AND tdailytrip.tdremainingamount>0)+
            (SELECT IFNULL(COUNT(tothermaterial.tid),0)  FROM tothermaterial WHERE tothermaterial.tomtransporter=".$stationid." AND tothermaterial.tid=".$truckid." AND tothermaterial.tomremainingamount>0)+
            (SELECT IFNULL(COUNT(treturntrip.tid),0)  FROM treturntrip WHERE treturntrip.tstid=".$stationid." AND treturntrip.tid=".$truckid." AND treturntrip.trremainingamount>0) as totaltrip
            FROM DUAL");
            return $data->row('totaltrip');
    }

    public function get_remaining_on_truck($stationid, $truckid){

        $data = $this->db->query("SELECT 
        (SELECT IFNULL(SUM(ttripdetail.ttdremainingamount),0) FROM ttripdetail WHERE ttripdetail.ttdstation=".$stationid." AND ttripdetail.tid=".$truckid." AND ttripdetail.ttdremainingamount>0)+
        (SELECT IFNULL(SUM(tdailytrip.tdremainingamount),0)  FROM tdailytrip WHERE tdailytrip.tstid=".$stationid." AND tdailytrip.tid=".$truckid." AND tdailytrip.tdremainingamount>0)+
        (SELECT IFNULL(SUM(tothermaterial.tomremainingamount),0)  FROM tothermaterial WHERE tothermaterial.tomtransporter=".$stationid." AND tothermaterial.tid=".$truckid." AND tothermaterial.tomremainingamount>0)+
        (SELECT IFNULL(SUM(treturntrip.trremainingamount),0)  FROM treturntrip WHERE treturntrip.tstid=".$stationid." AND treturntrip.tid=".$truckid." AND treturntrip.trremainingamount>0) as totalremaining
        FROM DUAL");
            return $data->row('totalremaining');
    }

    public function get_remaining_from_all_table_on_truck_id($stationid, $truckid){
        $data = $this->db->query("SELECT
        (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip INNER JOIN tstation ON tstation.tstid=tdailytrip.tstid WHERE tdailytrip.tdremainingamount>0 AND tstation.tstid=".$stationid." AND tdailytrip.tid=".$truckid.")+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail INNER JOIN tstation ON tstation.tstid=ttripdetail.ttdstation  WHERE ttdremainingamount>0 AND tstation.tstid=".$stationid."  AND ttripdetail.tid=".$truckid." )+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial INNER JOIN tstation ON tstation.tstid=tothermaterial.tomtransporter WHERE tothermaterial.tomremainingamount>0 AND tstation.tstid=".$stationid."  AND tothermaterial.tid=".$truckid.")+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip INNER JOIN tstation ON tstation.tstid=treturntrip.tstid WHERE treturntrip.trremainingamount>0 AND tstation.tstid=".$stationid."  AND treturntrip.tid=".$truckid." ) as total_remaining_from_all_table_on_truck_id FROM DUAL");
        
        return $data->row('total_remaining_from_all_table_on_truck_id');
    }
    public function get_sumof_all_table_closed_amount_by_truck_and_station_id($stationid,$truckid){

        $data = $this->db->query("SELECT IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) as get_sumof_closed_amount_by_personid  FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdid=".$stationid." AND tremainingamountpersondetailclosed.tableid='".$truckid."'  AND tabletype='r'");
        return $data->row('get_sumof_closed_amount_by_personid');

    }
    public function get_remaining_from_one_table_on_station_id($stationid, $tablename, $remaining_comun, $column){
        $data = $this->db->query("SELECT IFNULL(SUM(".$remaining_comun."),0) as total_remaining_from_all_table_on_station_id FROM ".$tablename." INNER JOIN tstation ON tstation.tstid=".$tablename.".".$column." WHERE ".$tablename.".".$remaining_comun.">0 AND tstation.tstid=".$stationid."");
        
        return $data->row('total_remaining_from_all_table_on_station_id');
    }
    public function get_sumof_all_table_closed_amount_by_personid($stationid){

        $data = $this->db->query("SELECT IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) as get_sumof_closed_amount_by_personid  FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdid=".$stationid."  AND tabletype='r'");
        return $data->row('get_sumof_closed_amount_by_personid');

    }
   
    public function get_sumof_all_table_closed_amount_by_personid_payable($stationid){

        $data = $this->db->query("SELECT IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) as get_sumof_closed_amount_by_personid  FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdid=".$stationid."  AND tabletype='p'");
        return $data->row('get_sumof_closed_amount_by_personid');

    }
    public function get_all_closed_amount_by_station_full_details($stationid){

        $data = $this->db->query("SELECT
        (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip WHERE tdailytrip.tdremainingamount>0 AND tdailytrip.tstid=".$stationid.")+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail WHERE ttdremainingamount>0 AND ttripdetail.ttdstation=".$stationid.")+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial WHERE tothermaterial.tomremainingamount>0 AND tothermaterial.tomtransporter=".$stationid.")+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip WHERE treturntrip.trremainingamount>0 AND treturntrip.tstid=".$stationid.") as totalamount,
        sum(tremainingamountpersondetailclosed.trapdcamount)   as sumofpaidamount,
        (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip WHERE tdailytrip.tdremainingamount>0 AND tdailytrip.tstid=".$stationid.")+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail WHERE ttdremainingamount>0 AND ttripdetail.ttdstation=".$stationid.")+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial WHERE tothermaterial.tomremainingamount>0 AND tothermaterial.tomtransporter=".$stationid.")+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip WHERE treturntrip.trremainingamount>0 AND treturntrip.tstid=".$stationid.") - sum(tremainingamountpersondetailclosed.trapdcamount)   as remainingamount , tremainingamountpersondetailclosed.trapdcdate,
        tremainingamountpersondetailclosed.trapdcdescription FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.tableid<>'ttruck' and tremainingamountpersondetailclosed.tabletype='r' AND tremainingamountpersondetailclosed.trapdid=".$stationid."");
        
        return $data->result();

    }

    public function get_truck_name($stationid){
        $data = $this->db->query('SELECT ttruck.tid, ttruck.tnumber from ttruck WHERE ttruck.tid IN
        (select tid from tdailytrip WHERE tdailytrip.tstid='.$stationid.'
        union 
        select tid from ttripdetail WHERE ttripdetail.ttdstation='.$stationid.'
        union 
        select tid from tothermaterial WHERE tothermaterial.tomtransporter='.$stationid.'
        union 
        select tid from treturntrip WHERE treturntrip.tstid='.$stationid.')');
        return $data->result();
    }

    public function get_only_truck_number($truckid){
        $data = $this->db->get_where('ttruck', array('tid'=>$truckid));
        return $data->row('tnumber');
    }

    public function get_station_name($stationid){
        $data = $this->db->where(array('tstid'=>$stationid));
        $data = $this->db->get('tstation', $data);
        return $data->row('tstname');
    }
    public function get_one_closed_amount_by_station_full_details($stationid,$tablename, $remaining_comun, $column ){

        $data = $this->db->query("SELECT
        (SELECT IFNULL(SUM(".$remaining_comun."),0) FROM ".$tablename." WHERE ".$tablename.".".$remaining_comun.">0 and ".$column."=".$stationid.") as totalamount,
        sum(tremainingamountpersondetailclosed.trapdcamount)   as sumofpaidamount,
        (SELECT IFNULL(SUM(".$remaining_comun."),0) FROM ".$tablename." WHERE ".$tablename.".".$remaining_comun.">0  and ".$column."=".$stationid.") - sum(tremainingamountpersondetailclosed.trapdcamount)   as remainingamount , tremainingamountpersondetailclosed.trapdcdate,
        tremainingamountpersondetailclosed.trapdcdescription FROM tremainingamountpersondetailclosed WHERE tabletype='r' AND tableid='".$tablename."' AND tremainingamountpersondetailclosed.trapdid=".$stationid."");
        
        return $data->result();

    }

   
}