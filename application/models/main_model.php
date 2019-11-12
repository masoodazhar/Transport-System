<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH."models/base_model.php";
class main_model extends CI_Model
{

	function __construct()
  {
        parent::__construct();
  }

    private  $table_name ="transport_tdriver";

    protected function getTableName()
    {
        return $this->table_name;
    }

    public function getremainingamountfromalltable(){

    	$data = $this->db->query("SELECT (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip WHERE tdailytrip.tdremainingamount>0)+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail WHERE ttdremainingamount>0)+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial WHERE tothermaterial.tomremainingamount>0)+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip WHERE treturntrip.trremainingamount>0)+
        (SELECT IFNULL(SUM(tremainingamount),0) FROM ttruck  WHERE ttruck.tbuysale=1) totalremaining  FROM DUAL");

    	return $data->row('totalremaining');
    }
    // public function getremainingamountfromalltable(){

    //     	$data = $this->db->query("SELECT (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail WHERE ttdremainingamount>0) + (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial WHERE tomremainingamount>0)+(SELECT IFNULL(SUM(tremainingamount),0) FROM ttruck  WHERE ttruck.tbuysale=1) - (SELECT IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) FROM tremainingamountpersondetailclosed INNER JOIN tremainingamountpersondetail INNER JOIN ttruck WHERE tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid and tremainingamountpersondetailclosed.trapdctruckbuysale=1) as totalremaining  FROM DUAL");

    //     	return $data->row('totalremaining');
    //     }


public function getpendingamountfromalltable(){

        $data = $this->db->query(" SELECT (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip WHERE tdailytrip.tdremainingamount<0)+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail WHERE ttdremainingamount<0)+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial WHERE tothermaterial.tomremainingamount<0)+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip WHERE treturntrip.trremainingamount<0)-
        (SELECT IFNULL(SUM(tremainingamount),0) FROM ttruck  WHERE ttruck.tbuysale=0) totalpending  FROM DUAL");

        return $data->row('totalpending');
    }



    public function get_remaining_from_all_table_on_truck_and_station_id($stationid, $truckid){
        $data = $this->db->query("SELECT
        (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip INNER JOIN tstation ON tstation.tstid=tdailytrip.tstid WHERE tdailytrip.tdremainingamount>0 AND tstation.tstid=".$stationid." AND tdailytrip.tid=".$truckid.")+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail INNER JOIN tstation ON tstation.tstid=ttripdetail.ttdstation  WHERE ttdremainingamount>0 AND tstation.tstid=".$stationid."  AND ttripdetail.tid=".$truckid." )+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial INNER JOIN tstation ON tstation.tstid=tothermaterial.tomtransporter WHERE tothermaterial.tomremainingamount>0 AND tstation.tstid=".$stationid."  AND tothermaterial.tid=".$truckid.")+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip INNER JOIN tstation ON tstation.tstid=treturntrip.tstid WHERE treturntrip.trremainingamount>0 AND tstation.tstid=".$stationid."  AND treturntrip.tid=".$truckid." ) as total_remaining FROM DUAL");

        return $data->row('total_remaining');
    }

    public function get_payable_from_all_table_on_truck_and_station_id($stationid, $truckid){
        $data = $this->db->query("SELECT
        (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip INNER JOIN tstation ON tstation.tstid=tdailytrip.tstid WHERE tdailytrip.tdremainingamount<0 AND tstation.tstid=".$stationid." AND tdailytrip.tid=".$truckid.")+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail INNER JOIN tstation ON tstation.tstid=ttripdetail.ttdstation  WHERE ttdremainingamount<0 AND tstation.tstid=".$stationid."  AND ttripdetail.tid=".$truckid." )+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial INNER JOIN tstation ON tstation.tstid=tothermaterial.tomtransporter WHERE tothermaterial.tomremainingamount<0 AND tstation.tstid=".$stationid."  AND tothermaterial.tid=".$truckid.")+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip INNER JOIN tstation ON tstation.tstid=treturntrip.tstid WHERE treturntrip.trremainingamount<0 AND tstation.tstid=".$stationid."  AND treturntrip.tid=".$truckid." ) as total_payable FROM DUAL");

        return $data->row('total_payable');
    }

    public function get_sum_of_all_table_closed_amount_by_truck_and_station_id($stationid,$truckid){

        $data = $this->db->query("SELECT IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) as get_sumof_closed_amount_by_personid  FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdid=".$stationid." AND tremainingamountpersondetailclosed.tableid='".$truckid."'  AND tabletype='r'");
        return $data->row('get_sumof_closed_amount_by_personid');

    }







    public function get_sumof_all_table_closed_amount(){

        $data = $this->db->query("SELECT SUM(tremainingamountpersondetailclosed.trapdcamount) as get_sumof_closed_amount  FROM tremainingamountpersondetailclosed WHERE tabletype='r' or tabletype='tr'");
        return $data->row('get_sumof_closed_amount');

    }
    public function get_sumof_all_table_closed_amount_payable(){

        $data = $this->db->query("SELECT SUM(tremainingamountpersondetailclosed.trapdcamount) as get_sumof_closed_amount  FROM tremainingamountpersondetailclosed WHERE tabletype='p' or tabletype='tp'");
        return $data->row('get_sumof_closed_amount');

    }

    public function get_all_details_from_one_table_on_stationid($stationid,$tablename,$remain_columname ,$station_columname){
        $data = $this->db->query("select * from ".$tablename." where ".$tablename.".".$remain_columname.">0 and  ".$station_columname."=".$stationid." ");
        return $data->result();
    }

    public function get_name_of_remaining_of_sold_truck(){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname FROM tremainingamountpersondetail INNER JOIN ttruck ON ttruck.tid=tremainingamountpersondetail.trapdformid AND tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=1 ");
        return $data->result();
    }
    public function get_name_of_remaining_of_bought_truck(){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname FROM tremainingamountpersondetail INNER JOIN ttruck ON ttruck.tid=tremainingamountpersondetail.trapdformid AND tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=0 ");
        return $data->result();
    }
    // START DAILYTRIP getting remaining amount from remainingclsed table for remaining page DAILYTRIP

    public function getallremainingamountfrom_dailytrip_commission(){
        $data = $this->db->query("SELECT  ttruck.tnumber, SUM(tdailytrip.tdremainingamount) as tdremainingamount, tstation.tstname,tdailytrip.tdcurrentdate,tstation.tstid, tdailytrip.tddeparturedate, tdailytrip.tdid from tdailytrip INNER JOIN ttruck on ttruck.tid=tdailytrip.tid INNER JOIN tstation ON tstation.tstid=tdailytrip.tstid AND tdailytrip.tdremainingamount>0 GROUP BY tstation.tstid");
        return $data->result();
    }


    public function get_dailytrip_commission_remaining_after_paid_amount($stationid){
        $this->db->where(array('trapdid'=>$stationid));
        $data = $this->db->get("tremainingamountpersondetailclosed");
        return $data->result();
    }

    public function get_all_remaining_amount_from_dailytrip_view($id){
        $data = $this->db->query("SELECT  ttruck.tnumber, tstation.tstcontact, tstation.tstname,tstation.tstid, tdailytrip.* from tdailytrip INNER JOIN ttruck on ttruck.tid=tdailytrip.tid INNER JOIN tstation ON tstation.tstid=tdailytrip.tstid AND tdailytrip.tdremainingamount>0 AND tdailytrip.tdid=".$id." GROUP BY tstation.tstid");
        return $data->row();
    }

    public function get_dailytrip_remaining_after_paid_amount_view_list($stationid){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.trapdid=".$stationid."");

        return $data->result();
    }

    // END DAILYTRIP getting remaining amount from remainingclsed table for remaining page DAILYTRIP




    // START TRIPDETAIL getting remaining amount from remainingclsed table for remaining page TRIPDETAIL as SUMMARY

    public function get_all_remaining_amount_from_ttripsummary_as_tripDetail(){

        $data = $this->db->query("SELECT  ttruck.tnumber, SUM(ttripdetail.ttdremainingamount) as ttdremainingamount, tstation.tstname,ttripdetail.crnt_date,tstation.tstid, ttripdetail.ttdid from ttripdetail INNER JOIN ttruck on ttruck.tid=ttripdetail.tid INNER JOIN tstation ON tstation.tstid=ttripdetail.ttdstation AND ttripdetail.ttdremainingamount>0 GROUP BY tstation.tstid");
        return $data->result();

    }

    public function get_tripdetil_remaining_after_paid_amount($stationid){
        $this->db->where(array('trapdid'=>$stationid));
        $data = $this->db->get("tremainingamountpersondetailclosed");
        return $data->result();
    }

    public function get_tripdetil_remaining_after_paid_amount_view($id){
        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, ttripdetail.ttdstation, ttripdetail.ttddeparturedate from tremainingamountpersondetail LEFT JOIN ttripdetail on ttripdetail.ttdid=tremainingamountpersondetail.trapdformid LEFT JOIN ttruck on ttruck.tid=ttripdetail.tid WHERE tremainingamountpersondetail.trapdtypeid='voucher-0' AND tremainingamountpersondetail.trapdamount>0 AND tremainingamountpersondetail.trapdid=".$id."");

        return $data->row();
    }

    public function get_tripdetail_remaining_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }
    // END TRIPDETAIL getting remaining amount from remainingclsed table for remaining page TRIPDETAIL as SUMMARY





    // START OTHER MATERIAL getting remaining amount from remainingclsed table for remaining page OTHER MATERIAL as SUMMARY

    public function get_all_remaining_amount_from_tothermaterial(){

        $data = $this->db->query("SELECT  ttruck.tnumber, SUM(tothermaterial.tomremainingamount) as tomremainingamount, tstation.tstname,tothermaterial.tomcurrentdate,tstation.tstid, tothermaterial.tomid from tothermaterial INNER JOIN ttruck on ttruck.tid=tothermaterial.tid INNER JOIN tstation ON tstation.tstid=tothermaterial.tomtransporter AND tothermaterial.tomremainingamount>0 GROUP BY tstation.tstid");
        return $data->result();
    }

    public function get_otheramount_remaining_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->row('nextremaining');
    }

    public function get_othermaterial_remaining_after_paid_amount_view($id){
        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tothermaterial.tomremainingcommission, tothermaterial.tompaymentdate, tothermaterial.tomremainingamount, tothermaterial.tomlocation, tothermaterial.tomtransporter FROM tothermaterial INNER JOIN ttruck on ttruck.tid=tothermaterial.tid INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdformid=tothermaterial.tomid AND tremainingamountpersondetail.trapdtypeid='parchoon-0' AND tremainingamountpersondetail.trapdamount>0 AND tremainingamountpersondetail.trapdid=".$id."");
        return $data->row();
    }
    public function get_othermaterial_remaining_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }
    // END OTHER MATERIAL getting remaining amount from remainingclsed table for remaining page OTHER MATERIAL as SUMMARY


    // START TRUCK getting remaining amount from remainingclsed table for remaining page TRUCK as SUMMARY

    public function get_all_remaining_amount_from_ttruck(){

        $data = $this->db->query("SELECT ttruck.tnumber,ttruck.tid, ttruck.tprice, ttruck.tremainingamount, ttruck.tinstallmethod, tremainingamountpersondetail.* from tremainingamountpersondetail INNER JOIN ttruck on ttruck.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=1");

        return $data->result();
    }

    public function get_truck_remaining_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) as paidafter,tremainingamountpersondetail.trapdamount-IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id." AND tremainingamountpersondetailclosed.tableid='ttruck'");

        return $data->row('nextremaining');
    }

    public function get_truck_remaining_after_paid_amount_view($id){
        $data = $this->db->query("SELECT ttruck.*, tremainingamountpersondetail.* from tremainingamountpersondetail INNER JOIN ttruck on ttruck.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=1 AND tremainingamountpersondetail.trapdid=".$id."");
        return $data->row();
    }
    public function get_truck_remaining_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.tableid='ttruck' and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }

    // END TRUCK getting remaining amount from remainingclsed table for remaining page TRUCK as SUMMARY

     // START RETURN TRIP getting remaining amount from remainingclsed table for remaining page RETURN TRIP

     public function get_all_remaining_amount_from_returntrip(){

        $data = $this->db->query("SELECT  ttruck.tnumber, SUM(treturntrip.trremainingamount) as trremainingamount, tstation.tstname,treturntrip.trcurrentdate,tstation.tstid, treturntrip.trid from treturntrip INNER JOIN ttruck on ttruck.tid=treturntrip.tid INNER JOIN tstation ON tstation.tstid=treturntrip.tstid AND treturntrip.trremainingamount>0 GROUP BY tstation.tstid");

        return $data->result();
    }

    public function get_returntrip_remaining_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->row('nextremaining');
    }

    public function get_return_remaining_after_paid_amount_view($id){
        $data = $this->db->query("SELECT ttruck.*, treturntrip.*, tremainingamountpersondetail.* from tremainingamountpersondetail  INNER JOIN treturntrip on treturntrip.trid=tremainingamountpersondetail.trapdformid INNER JOIN ttruck ON ttruck.tid=treturntrip.tid AND tremainingamountpersondetail.trapdtypeid='return-0' AND tremainingamountpersondetail.trapdid=".$id."");
        return $data->row();
    }
    public function get_return_remaining_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }


    // END RETURN TRIP getting remaining amount from remainingclsed table for remaining page RETURN TRIP









    //START OF HAJI JANI

        public function sum_of_have_haji_jani(){
            $data = $this->db->query("SELECT (SELECT IFNULL(SUM(tdailytrip.tdhjani),0) FROM tdailytrip WHERE tdhjani>0)+
            (SELECT IFNULL(SUM(ttripdetail.ttdhohajijani),0) FROM ttripdetail WHERE ttdhohajijani>0)+
            (SELECT IFNULL(SUM(treturntrip.trhajijani),0) FROM treturntrip WHERE trhajijani>0)+
            (SELECT IFNULL(SUM(officeexpence.oeamount),0) FROM officeexpence WHERE officeexpence.oetaken>0)+
            (SELECT IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctakenfrom=2)+
            (SELECT IFNULL(SUM(tothermaterial.tomhjani),0) FROM tothermaterial WHERE tomhjani>0) as sumofhajijani FROM DUAL");
            return $data->row('sumofhajijani');
        }

        public function get_haji_amount_from_tdailytrip(){
            $data = $this->db->query('SELECT ttruck.tnumber, tdailytrip.tdhjani, tdailytrip.tddeparturedate, tdailytrip.tdpaymetndate, tdailytrip.tdid  FROM tdailytrip INNER JOIN ttruck ON ttruck.tid=tdailytrip.tid AND tdailytrip.tdhjani>0');
            return $data->result();
        }
        public function get_haji_amount_from_ttripdetaail(){
            $data = $this->db->query('SELECT ttruck.tnumber, ttripdetail.ttdhohajijani, ttripdetail.ttdid, ttripdetail.ttddeparturedate, ttripdetail.ttdarrivaldate, ttripdetail.ttdtakenhajijani FROM ttripdetail INNER JOIN ttruck ON ttruck.tid=ttripdetail.tid AND ttripdetail.ttdhohajijani>0');
            return $data->result();
        }
        public function get_haji_amount_from_treturntrip(){
            $data = $this->db->query('SELECT ttruck.tnumber, treturntrip.trid, treturntrip.trhajijani, treturntrip.trarrivingdate, treturntrip.trdateofpay FROM treturntrip INNER JOIN ttruck ON ttruck.tid=treturntrip.tid AND treturntrip.trhajijani>0');
            return $data->result();
        }
        public function get_haji_amount_from_tothermaterial(){
            $data = $this->db->query('SELECT ttruck.tnumber, tothermaterial.tomid, tothermaterial.tomhjani, tothermaterial.tompaymentdate FROM tothermaterial INNER JOIN ttruck ON ttruck.tid=tothermaterial.tid AND tothermaterial.tomhjani>0');
            return $data->result();
        }
        public function get_haji_amount_from_remaining_closed(){
            $data = $this->db->query('SELECT tremainingamountpersondetail.trapdname, tremainingamountpersondetail.trapdid, tremainingamountpersondetailclosed.trapdcdate, tremainingamountpersondetailclosed.trapdcamount, tremainingamountpersondetailclosed.trapdcdescription FROM tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed ON tremainingamountpersondetailclosed.trapdid=tremainingamountpersondetail.trapdid AND tremainingamountpersondetailclosed.trapdctakenfrom=2');
            return $data->result();
        }

        public function addhajijani($hjamount, $hjdate, $hjdetails){
            $data = array(
                'hjamount'=>$hjamount,
                'hjdate'=>$hjdate,
                'hjdetails'=>$hjdetails
            );

            $this->db->insert('hajijani_returned', $data);
        }

        public function get_sum_all_returened_from_hajijani(){
            $data = $this->db->query('SELECT SUM(hajijani_returned.hjamount) as totalreturned FROM hajijani_returned');
            return $data->row('totalreturned');
        }

        public function get_all_returened_from_hajijani_list(){
            $data = $this->db->get('hajijani_returned');
            return $data->result();

        }

        public function hajijani_taken_from_others(){
            $data = $this->db->query('SELECT * FROM officeexpence WHERE officeexpence.oetaken>0');
            return $data->result();
        }
    //END OF HAJI JANI





    //   public function getallremainingamountfromtotherview($id){

    //       $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tothermaterial.tomremainingcommission, tothermaterial.tompaymentdate, tothermaterial.tomremainingamount, tothermaterial.tomlocation, tothermaterial.tomtransporter, ttripdetail.ttddeparturedate, ttripdetail.ttdarrivaldate from tremainingamountpersondetail LEFT JOIN tothermaterial on tothermaterial.tomid=tremainingamountpersondetail.trapdformid LEFT JOIN ttripdetail on ttripdetail.tid=tothermaterial.tid LEFT JOIN ttruck on ttruck.tid=ttripdetail.tid WHERE tremainingamountpersondetail.trapdtypeid='omaterial-0' AND tremainingamountpersondetail.trapdamount>0 AND tremainingamountpersondetail.trapdid=".$id."");

    //     return $data->row();

    // }



    //  public function getallremainingamountfromttruckview($id){

    //     $data = $this->db->query("SELECT ttruck.*, tremainingamountpersondetail.* from tremainingamountpersondetail INNER JOIN ttruck on ttruck.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=1 AND tremainingamountpersondetail.trapdid=".$id."");

    //     return $data->row();

    // }
//===========================================NOTIFICATION AREA START FROM HERE=============================================
    public function get_station(){
        $data = $this->db->get('tstation');
        return $data->result();
    }
    public function get_truck_number(){
        $data = $this->db->get('ttruck');
        return $data->result();
    }

    public function get_total_trip_and_truck($stationid){
        $data =  $this->db->query("SELECT
        (SELECT IFNULL(COUNT( DISTINCT tdailytrip.tid),0) FROM tdailytrip WHERE tdailytrip.tstid=".$stationid." AND tdailytrip.tdremainingamount>0)+
        (SELECT IFNULL(COUNT(DISTINCT ttripdetail.tid),0) FROM ttripdetail WHERE ttripdetail.ttdstation=".$stationid." AND ttdremainingamount>0)+
        (SELECT IFNULL(COUNT(DISTINCT tothermaterial.tid),0) FROM tothermaterial WHERE tothermaterial.tomtransporter=".$stationid." AND tomremainingamount>0)+
        (SELECT IFNULL(COUNT(DISTINCT treturntrip.tid),0) FROM treturntrip WHERE treturntrip.tstid=".$stationid." AND trremainingamount>0) as totaltruck,
        (SELECT IFNULL(COUNT(  tdailytrip.tid),0) FROM tdailytrip WHERE tdailytrip.tstid=".$stationid." AND tdailytrip.tdremainingamount>0)+
        (SELECT IFNULL(COUNT( ttripdetail.tid),0) FROM ttripdetail WHERE  ttripdetail.ttdstation=".$stationid." AND ttdremainingamount>0)+
        (SELECT IFNULL(COUNT( tothermaterial.tid),0) FROM tothermaterial WHERE tothermaterial.tomtransporter=".$stationid." AND tomremainingamount>0)+
        (SELECT IFNULL(COUNT( treturntrip.tid),0) FROM treturntrip WHERE treturntrip.tstid=".$stationid." AND trremainingamount>0) as totaltrip
        FROM tstation WHERE tstation.tstid=".$stationid."");
        return $data->row();
    }

    public function get_total_trip_and_truck_payable($stationid){
        $data =  $this->db->query("SELECT
        (SELECT IFNULL(COUNT( DISTINCT tdailytrip.tid),0) FROM tdailytrip WHERE tdailytrip.tstid=".$stationid." AND tdailytrip.tdremainingamount<0)+
        (SELECT IFNULL(COUNT(DISTINCT ttripdetail.tid),0) FROM ttripdetail WHERE ttripdetail.ttdstation=".$stationid." AND ttdremainingamount<0)+
        (SELECT IFNULL(COUNT(DISTINCT tothermaterial.tid),0) FROM tothermaterial WHERE tothermaterial.tomtransporter=".$stationid." AND tomremainingamount<0)+
        (SELECT IFNULL(COUNT(DISTINCT treturntrip.tid),0) FROM treturntrip WHERE treturntrip.tstid=".$stationid." AND trremainingamount<0) as totaltruck,
        (SELECT IFNULL(COUNT(  tdailytrip.tid),0) FROM tdailytrip WHERE tdailytrip.tstid=".$stationid." AND tdailytrip.tdremainingamount<0)+
        (SELECT IFNULL(COUNT( ttripdetail.tid),0) FROM ttripdetail WHERE  ttripdetail.ttdstation=".$stationid." AND ttdremainingamount<0)+
        (SELECT IFNULL(COUNT( tothermaterial.tid),0) FROM tothermaterial WHERE tothermaterial.tomtransporter=".$stationid." AND tomremainingamount<0)+
        (SELECT IFNULL(COUNT( treturntrip.tid),0) FROM treturntrip WHERE treturntrip.tstid=".$stationid." AND trremainingamount<0) as totaltrip
        FROM tstation WHERE tstation.tstid=".$stationid."");
        return $data->row();
    }


    public function totalstationcountview(){
        $data =  $this->db->query("SELECT ttripdetail.tid, ttruck.tnumber, tremainingamountpersondetail.trapdname, tremainingamountpersondetail.trapdamount, tstation.tstname FROM ttripdetail INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdformid = ttripdetail.ttdid and tremainingamountpersondetail.trapdtypeid='tripsum-0' LEFT JOIN tstation ON tstation.tstname=ttripdetail.ttdstation LEFT JOIN ttruck ON ttruck.tid=ttripdetail.tid GROUP BY tremainingamountpersondetail.trapdname");
        return $data->result();
    }


    public function notificationindecator(){
        // $data =  $this->db->query("SELECT ttripdetail.tid, tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname,  tremainingamountpersondetail.trapdamount FROM ttripdetail INNER JOIN tremainingamountpersondetail ON ttripdetail.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='trip-0'");
        $data =  $this->db->query("SELECT count(tnid) as totalnoti  from tnotify where tnotify.tnstatus=0 ");
        return $data->row('totalnoti');
    }

    public function truck_notification(){
        $data =  $this->db->query("select * from trucknotification where tnstatus=1");
        return $data->result();
    }

    public function truck_notification_check_for_update_status(){
        $data =  $this->db->query("select * from trucknotification where tnstatus=0");
        return $data->result();
    }

    public function change_status_on_date_detected($notify_id){
        $this->db->query('update trucknotification set tnstatus=1 where tnid='.$notify_id.'');
    }
    public function truck_notification_rows(){
        $data =  $this->db->query("select * from trucknotification");
        return $data->result();
    }
    public function get_truck_notification_details_on_tnotify_id($tnid){
        $this->db->query("update trucknotification set tnstatus=0 where tnid=".$tnid." and tnstatus=1");
        $data =  $this->db->query("select * from trucknotification where tnid=".$tnid."");
        return $data->row();
    }
    public function get_notify_dates($tnid){
        return $this->db->get_where('trucknotification', array('tnid'=>$tnid))->row();
    }
    public function update_truck_dates($data, $id){
        $this->db->where(array('tnid'=>$id));
        $this->db->update('trucknotification',$data);
    }
    public function notificationindecatorseperatly(){
        $trip =  $this->db->query("SELECT COUNT(tnid) as tripindicator from tnotify WHERE tnotify.tnstatus=0 and tnotify.tncategory='trip' ");
        $truck =  $this->db->query("SELECT COUNT(tnid) as truckindicator from tnotify WHERE tnotify.tnstatus=0 and tnotify.tncategory='truck'");
        $other =  $this->db->query("SELECT COUNT(tnid) as otherindicator from tnotify WHERE tnotify.tnstatus=0 and tnotify.tncategory='othermaterial'");

        $data = array(
            'trip'=>$trip->row('tripindicator'),
            'truck'=>$truck->row('truckindicator'),
            'other'=>$other->row('otherindicator')
        );

        return $data;
    }

    public function tripnotification(){
        // $data =  $this->db->query("SELECT ttripdetail.tid, tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname,  tremainingamountpersondetail.trapdamount FROM ttripdetail INNER JOIN tremainingamountpersondetail ON ttripdetail.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='trip-0'");
        $data =  $this->db->query("SELECT tnotify.*, ttripdetail.* FROM tnotify INNER JOIN ttripdetail on ttripdetail.tid=tnotify.tnfromid and tnotify.tncategory='trip'");
        return $data->result();
    }

    public function othermaterialnotification(){
        // $data =  $this->db->query("SELECT ttripdetail.tid, tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname,  tremainingamountpersondetail.trapdamount FROM ttripdetail INNER JOIN tremainingamountpersondetail ON ttripdetail.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='trip-0'");
        $data =  $this->db->query("SELECT tnotify.*, tothermaterial.tomid, tothermaterial.tomremainingamount FROM tnotify INNER JOIN tothermaterial on tothermaterial.tomid=tnotify.tnfromid and tnotify.tncategory='othermaterial'");
        return $data->result();
    }

    public function trucknotification(){
        // $data =  $this->db->query("SELECT ttripdetail.tid, tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname,  tremainingamountpersondetail.trapdamount FROM ttripdetail INNER JOIN tremainingamountpersondetail ON ttripdetail.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='trip-0'");
        $data =  $this->db->query("SELECT tnotify.*, ttruck.* FROM tnotify INNER JOIN ttruck on ttruck.tid=tnotify.tnfromid and tnotify.tncategory='truck'");
        return $data->result();
    }

    public function tyrenotification(){
        // $data =  $this->db->query("SELECT ttripdetail.tid, tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname,  tremainingamountpersondetail.trapdamount FROM ttripdetail INNER JOIN tremainingamountpersondetail ON ttripdetail.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='trip-0'");
        $data =  $this->db->query("SELECT tnotify.*, ttyre.ttid FROM tnotify INNER JOIN ttyre on ttyre.ttid=tnotify.tnfromid and tnotify.tncategory='tyre'");
        return $data->result();
    }

    public function viewnotification($notifiyId, $category, $fromId, $tn, $tcolmn){
        // $data =  $this->db->query("SELECT ttripdetail.tid, tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname,  tremainingamountpersondetail.trapdamount FROM ttripdetail INNER JOIN tremainingamountpersondetail ON ttripdetail.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='trip-0'");
        $this->db->query("UPDATE tnotify SET tnotify.tnstatus=1 WHERE tnotify.tnid=".$notifiyId." AND tnotify.tncategory='".$category."' AND tnotify.tnfromid=".$fromId."");
        $data = $this->db->query("SELECT tnotify.*, ".$tn.".* FROM tnotify INNER JOIN ".$tn." ON ".$tn.".".$tcolmn."=tnotify.tnfromid WHERE tnotify.tnid=".$notifiyId." AND tnotify.tncategory='".$category."' AND tnotify.tnfromid=".$fromId."");

        return $data->result();
    }

    public function notification(){
       // $data =  $this->db->query("SELECT ttripdetail.tid, tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname,  tremainingamountpersondetail.trapdamount FROM ttripdetail INNER JOIN tremainingamountpersondetail ON ttripdetail.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='trip-0'");
        $data =  $this->db->query("SELECT tnotify.*, ttripdetail.* FROM tnotify INNER JOIN ttripdetail on ttripdetail.tid=tnotify.tnfromid and tnotify.tnstatus=0 and tnotify.tncategory='trip'");
        return $data->result();
    }

    public function notificationremainingamountfromtremaingingclose($id){
       $data =  $this->db->query("SELECT SUM(tremainingamountpersondetailclosed.trapdcamount) as total FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdid=".$id."");
        return $data->row('total');
    }

   //=======================================ALL PAYABLE AMOUNT REPORTS ARE GENERATING FROM HERE==========================//
    public function getallpayableamountfromttripdetail(){

        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, ttripdetail.ttddeparturedate, ttripdetail.ttdarrivaldate from tremainingamountpersondetail LEFT JOIN ttripdetail on ttripdetail.tid=tremainingamountpersondetail.trapdformid LEFT JOIN ttruck on ttruck.tid=ttripdetail.tid WHERE tremainingamountpersondetail.trapdtypeid='trip-0' AND tremainingamountpersondetail.trapdamount<0");

        return $data->result();

    }




    // START DAILYTRIP getting remaining amount from remainingclsed table for remaining page DAILYTRIP

    public function getallpayableamountfrom_dailytrip_commission(){
        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*,tdailytrip.tdremainingamount, tdailytrip.tddeparturedate from tremainingamountpersondetail LEFT JOIN tdailytrip on tdailytrip.tdid=tremainingamountpersondetail.trapdformid LEFT JOIN ttruck on ttruck.tid=tdailytrip.tid WHERE tremainingamountpersondetail.trapdtypeid='commission-0' AND tdailytrip.tdremainingamount<0 AND tremainingamountpersondetail.trapdamount<0 GROUP BY tdailytrip.tdid");
        return $data->result();
    }


    public function get_dailytrip_commission_payable_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount+SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE  tremainingamountpersondetailclosed.trapdctruckbuysale=0 and tremainingamountpersondetailclosed.trapdid=".$id."");
        return $data->row('nextremaining');
    }

    public function get_all_payable_amount_from_dailytrip_view($id){
        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tdailytrip.tddeparturedate from tremainingamountpersondetail LEFT JOIN tdailytrip on tdailytrip.tdid=tremainingamountpersondetail.trapdformid LEFT JOIN ttruck on ttruck.tid=tdailytrip.tid WHERE tremainingamountpersondetail.trapdtypeid='commission-0' AND tremainingamountpersondetail.trapdamount<0 AND tremainingamountpersondetail.trapdid=".$id."");
        return $data->row();
    }

    public function get_dailytrip_payable_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=0 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }

    // END DAILYTRIP getting remaining amount from remainingclsed table for remaining page DAILYTRIP




    // START TRIPDETAIL getting remaining amount from remainingclsed table for remaining page TRIPDETAIL as SUMMARY

    public function get_all_payable_amount_from_ttripsummary_as_tripDetail(){

        $data = $this->db->query("SELECT ttruck.tnumber, ttripdetail.ttdid, ttripdetail.ttdremainingamount, ttripdetail.ttddeparturedate, tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname, tremainingamountpersondetail.trapddate FROM ttripdetail INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdformid=ttripdetail.ttdid INNER JOIN ttruck ON ttruck.tid=ttripdetail.tid AND tremainingamountpersondetail.trapdtypeid='voucher-0'  AND ttripdetail.ttdremainingamount<0");
        return $data->result();

    }

    public function get_tripdetil_payable_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount+SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->row('nextremaining');
    }

    public function get_tripdetil_payable_after_paid_amount_view($id){
        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, ttripdetail.* from tremainingamountpersondetail LEFT JOIN ttripdetail on ttripdetail.ttdid=tremainingamountpersondetail.trapdformid LEFT JOIN ttruck on ttruck.tid=ttripdetail.tid WHERE tremainingamountpersondetail.trapdtypeid='voucher-0' AND tremainingamountpersondetail.trapdamount<0 AND tremainingamountpersondetail.trapdid=".$id."");

        return $data->row();
    }

    public function get_tripdetail_payable_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=0 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }
    // END TRIPDETAIL getting remaining amount from remainingclsed table for remaining page TRIPDETAIL as SUMMARY





    // START OTHER MATERIAL getting remaining amount from remainingclsed table for remaining page OTHER MATERIAL as SUMMARY

    public function get_all_payable_amount_from_tothermaterial(){

        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tothermaterial.tomremainingcommission, tothermaterial.tompaymentdate, tothermaterial.tomremainingamount, tothermaterial.tomlocation FROM tothermaterial INNER JOIN ttruck on ttruck.tid=tothermaterial.tid INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdformid=tothermaterial.tomid AND tremainingamountpersondetail.trapdtypeid='parchoon-0' AND tothermaterial.tomremainingamount<0");
        return $data->result();
    }

    public function get_otheramount_payable_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount+SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->row('nextremaining');
    }

    public function get_othermaterial_payable_after_paid_amount_view($id){
        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tothermaterial.* FROM tothermaterial INNER JOIN ttruck on ttruck.tid=tothermaterial.tid INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdformid=tothermaterial.tomid AND tremainingamountpersondetail.trapdtypeid='parchoon-0' AND tremainingamountpersondetail.trapdamount<0 AND tremainingamountpersondetail.trapdid=".$id."");
        return $data->row();
    }
    public function get_othermaterial_payable_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=0 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }
    // END OTHER MATERIAL getting remaining amount from remainingclsed table for remaining page OTHER MATERIAL as SUMMARY


    // START TRUCK getting PAYEBL amount from remainingclsed table for remaining page TRUCK as SUMMARY

    public function get_all_payable_amount_from_ttruck(){

        $data = $this->db->query("SELECT ttruck.tnumber, ttruck.tprice, ttruck.tremainingamount, ttruck.tinstallmethod, tremainingamountpersondetail.* from tremainingamountpersondetail INNER JOIN ttruck on ttruck.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=0");

        return $data->result();
    }

    public function get_truck_payable_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->row('nextremaining');
    }

    public function get_truck_payable_after_paid_amount_view($id){
        $data = $this->db->query("SELECT ttruck.*, tremainingamountpersondetail.* from tremainingamountpersondetail INNER JOIN ttruck on ttruck.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=0 AND tremainingamountpersondetail.trapdid=".$id."");
        return $data->row();
    }
    public function get_truck_payable_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=0 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }

    // END TRUCK getting remaining amount from remainingclsed table for remaining page TRUCK as SUMMARY

     // START RETURN TRIP getting remaining amount from remainingclsed table for remaining page RETURN TRIP

     public function get_all_payable_amount_from_returntrip(){

        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, treturntrip.trarrivingdate, treturntrip.trid, treturntrip.trremainingamount from tremainingamountpersondetail INNER JOIN treturntrip ON treturntrip.trid=tremainingamountpersondetail.trapdformid INNER JOIN ttruck on ttruck.tid=treturntrip.tid  AND tremainingamountpersondetail.trapdtypeid='return-0' AND tremainingamountpersondetail.trapdamount<0 AND treturntrip.trremainingamount<0 GROUP BY treturntrip.trid");

        return $data->result();
    }

    public function get_returntrip_payable_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount+SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->row('nextremaining');
    }

    public function get_return_payable_after_paid_amount_view($id){
        $data = $this->db->query("SELECT ttruck.*, treturntrip.*, tremainingamountpersondetail.* from tremainingamountpersondetail  INNER JOIN treturntrip on treturntrip.trid=tremainingamountpersondetail.trapdformid INNER JOIN ttruck ON ttruck.tid=treturntrip.tid AND tremainingamountpersondetail.trapdtypeid='return-0' AND tremainingamountpersondetail.trapdid=".$id."");
        return $data->row();
    }
    public function get_return_payable_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=0 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }


    // END RETURN TRIP getting remaining amount from remainingclsed table for remaining page RETURN TRIP

     // START PUMP DETAILS getting remaining amount from  for remaining page PAYABLE PUMP

     public function pump_payable_details(){

        $data = $this->db->query("SELECT ttruck.tnumber, tpumpstation.tpname,  tpumpdetail.*, tpumpdetail.tpdamount-tpumpdetail.tpdpaidamount as remaining FROM tpumpdetail INNER JOIN ttruck ON ttruck.tid=tpumpdetail.tid INNER JOIN tpumpstation ON tpumpstation.tpid=tpumpdetail.tpid  WHERE tpumpdetail.tpdpaymentstatus='pending' AND tpumpdetail.tpdamount-tpumpdetail.tpdpaidamount>0");

        return $data->result();
    }


    // public function get_pump_payable_after_paid_amount($id){
    //     $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id."");

    //     return $data->row('nextremaining');
    // }

    // public function get_pump_payable_after_paid_amount_view($id){
    //     $data = $this->db->query("SELECT ttruck.*, treturntrip.*, tremainingamountpersondetail.* from tremainingamountpersondetail  INNER JOIN treturntrip on treturntrip.trid=tremainingamountpersondetail.trapdformid INNER JOIN ttruck ON ttruck.tid=treturntrip.tid AND tremainingamountpersondetail.trapdtypeid='return-0' AND tremainingamountpersondetail.trapdid=".$id."");
    //     return $data->row();
    // }
    // public function get_pump_payable_after_paid_amount_view_list($id){
    //     $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=0 and tremainingamountpersondetailclosed.trapdid=".$id."");

    //     return $data->result();
    // }


    // END PUMP DETAILS getting remaining amount from  for remaining page PAYABLE PUMP


    // START GETTNG TRUCK MAINTAINANCE DATA
    public function get_all_truck_maintainance(){
        $data = $this->db->query('SELECT ttruck.tnumber, tdriver.tname, toil.toname, ttyre.ttname, tshop.tsname, ttmaintenance.* FROM ttmaintenance LEFT JOIN tdriver ON tdriver.did=ttmaintenance.tmdriver_id LEFT JOIN toil ON toil.toid=ttmaintenance.tmoil_id LEFT JOIN ttyre ON ttyre.ttid=ttmaintenance.tmtyre_id LEFT JOIN ttruck ON ttruck.tid=ttmaintenance.tmtruck_id LEFT JOIN tshop ON tshop.sid=ttmaintenance.tmshopid');
        return $data->result();
    }

    public function get_truck_maintainance($id){
        $data = $this->db->query('SELECT ttruck.tnumber, tdriver.tname, toil.toname, ttyre.ttname, tshop.tsname, ttmaintenance.* FROM ttmaintenance LEFT JOIN tdriver ON tdriver.did=ttmaintenance.tmdriver_id LEFT JOIN toil ON toil.toid=ttmaintenance.tmoil_id LEFT JOIN ttyre ON ttyre.ttid=ttmaintenance.tmtyre_id LEFT JOIN ttruck ON ttruck.tid=ttmaintenance.tmtruck_id LEFT JOIN tshop ON tshop.sid=ttmaintenance.tmshopid AND ttmaintenance.tmid='.$id.'');
        return $data->row();
    }

    public function getallpayableamountfromttruck(){

        $data = $this->db->query("SELECT ttruck.tnumber, ttruck.tprice, ttruck.tremainingamount, ttruck.tinstallmethod, tremainingamountpersondetail.* from tremainingamountpersondetail INNER JOIN ttruck on ttruck.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=0");

        return $data->result();
    }

    public function getallpayableamountfromtothermaterial(){

        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tothermaterial.tomremainingcommission, tothermaterial.tompaymentdate, tothermaterial.tomremainingamount, tothermaterial.tomlocation, ttripdetail.ttddeparturedate, ttripdetail.ttdarrivaldate from tremainingamountpersondetail LEFT JOIN ttripdetail on ttripdetail.tid=tremainingamountpersondetail.trapdformid LEFT JOIN ttruck on ttruck.tid=ttripdetail.tid LEFT JOIN tothermaterial on tothermaterial.tid=ttripdetail.tid WHERE tremainingamountpersondetail.trapdtypeid='omaterial-0' AND tremainingamountpersondetail.trapdamount<0");

        return $data->result();
    }
    public function getallpayableamountfromttripdetailview($id){

        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, ttripdetail.ttddeparturedate, ttripdetail.ttdarrivaldate from tremainingamountpersondetail LEFT JOIN ttripdetail on ttripdetail.tid=tremainingamountpersondetail.trapdformid LEFT JOIN ttruck on ttruck.tid=ttripdetail.tid WHERE tremainingamountpersondetail.trapdtypeid='trip-0' AND tremainingamountpersondetail.trapdamount<0 AND tremainingamountpersondetail.trapdid=".$id."");

        return $data->row();

    }

    public function getallpayableamountfromtotherview($id){

        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tothermaterial.tomremainingcommission, tothermaterial.tompaymentdate, tothermaterial.tomremainingamount, tothermaterial.tomlocation, tothermaterial.tomtransporter, ttripdetail.ttddeparturedate, ttripdetail.ttdarrivaldate from tremainingamountpersondetail LEFT JOIN tothermaterial on tothermaterial.tomid=tremainingamountpersondetail.trapdformid LEFT JOIN ttripdetail on ttripdetail.tid=tothermaterial.tid LEFT JOIN ttruck on ttruck.tid=ttripdetail.tid WHERE tremainingamountpersondetail.trapdtypeid='omaterial-0' AND tremainingamountpersondetail.trapdamount>0 AND tremainingamountpersondetail.trapdid=".$id."");

      return $data->row();

  }
    public function getallpayableamountfromttruckview($id){

        $data = $this->db->query("SELECT ttruck.*, tremainingamountpersondetail.* from tremainingamountpersondetail INNER JOIN ttruck on ttruck.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=0 AND tremainingamountpersondetail.trapdid=".$id."");

        return $data->row();

    }

    public function gettripdetilpayableafterpaidamountview($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->result();
    }

    // getting remaining amount from remainingclsed table for remaining page tripdetail and other and truck
      public function gettripdetilpayableafterpaidamount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE  tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.trapdid=".$id."");

        return $data->row('nextremaining');
    }


}

?>
