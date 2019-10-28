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
        (SELECT IFNULL(SUM(tremainingamount),0) FROM ttruck  WHERE ttruck.tbuysale=1) - (SELECT IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) FROM tremainingamountpersondetailclosed INNER JOIN tremainingamountpersondetail on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=1) as totalremaining  FROM DUAL");
    
    	return $data->row('totalremaining');    
    }
    // public function getremainingamountfromalltable(){

    //     	$data = $this->db->query("SELECT (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail WHERE ttdremainingamount>0) + (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial WHERE tomremainingamount>0)+(SELECT IFNULL(SUM(tremainingamount),0) FROM ttruck  WHERE ttruck.tbuysale=1) - (SELECT IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) FROM tremainingamountpersondetailclosed INNER JOIN tremainingamountpersondetail INNER JOIN ttruck WHERE tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid and tremainingamountpersondetailclosed.trapdctruckbuysale=1) as totalremaining  FROM DUAL");
        
    //     	return $data->row('totalremaining');    
    //     }

public function getpendingamountfromalltable(){

        $data = $this->db->query(" SELECT (SELECT IFNULL(SUM(tdremainingamount),0) FROM tdailytrip WHERE tdailytrip.tdremainingamount<0)+
        (SELECT IFNULL(SUM(ttdremainingamount),0) FROM ttripdetail WHERE ttdremainingamount<0)+
        (SELECT IFNULL(SUM(tomremainingamount),0) FROM tothermaterial WHERE tothermaterial.tomremainingamount<0)-
        (SELECT IFNULL(SUM(tpdprliteramount),0) FROM tpumpdetail  WHERE tpumpdetail.tpdpaymentstatus='pending')-
        (SELECT IFNULL(SUM(tremainingamount),0) FROM ttruck  WHERE ttruck.tbuysale=0)+
        (SELECT IFNULL(SUM(trremainingamount),0) FROM treturntrip WHERE treturntrip.trremainingamount<0)-(SELECT IFNULL(SUM(tremainingamountpersondetailclosed.trapdcamount),0) FROM tremainingamountpersondetailclosed INNER JOIN tremainingamountpersondetail INNER JOIN ttruck WHERE tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid AND ttruck.tbuysale=0 and tremainingamountpersondetailclosed.trapdctruckbuysale=0) as totalpending  FROM DUAL");
    
        return $data->row('totalpending');
    }

    
    // START DAILYTRIP getting remaining amount from remainingclsed table for remaining page DAILYTRIP 

    public function getallremainingamountfrom_dailytrip_commission(){
        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tdailytrip.tddeparturedate from tremainingamountpersondetail LEFT JOIN tdailytrip on tdailytrip.tdid=tremainingamountpersondetail.trapdformid LEFT JOIN ttruck on ttruck.tid=tdailytrip.tdid WHERE tremainingamountpersondetail.trapdtypeid='commission-0' AND tremainingamountpersondetail.trapdamount>0 GROUP BY tdailytrip.tdid");
        return $data->result();
    }

    
    public function get_dailytrip_commission_remaining_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE  tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.trapdid=".$id."");
        return $data->row('nextremaining');
    }

    public function get_all_remaining_amount_from_dailytrip_view($id){
        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tdailytrip.tddeparturedate from tremainingamountpersondetail LEFT JOIN tdailytrip on tdailytrip.tdid=tremainingamountpersondetail.trapdformid LEFT JOIN ttruck on ttruck.tid=tdailytrip.tid WHERE tremainingamountpersondetail.trapdtypeid='commission-0' AND tremainingamountpersondetail.trapdamount>0 AND tremainingamountpersondetail.trapdid=".$id."");
        return $data->row();
    }

    public function get_dailytrip_remaining_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.trapdid=".$id."");
        
        return $data->result();
    }

    // END DAILYTRIP getting remaining amount from remainingclsed table for remaining page DAILYTRIP 




    // START TRIPDETAIL getting remaining amount from remainingclsed table for remaining page TRIPDETAIL as SUMMARY 

    public function get_all_remaining_amount_from_ttripsummary_as_tripDetail(){

        $data = $this->db->query("SELECT ttruck.tnumber, ttripdetail.ttdid, ttripdetail.ttdremainingamount, ttripdetail.ttddeparturedate, tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname, tremainingamountpersondetail.trapddate FROM ttripdetail INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdformid=ttripdetail.ttdid INNER JOIN ttruck ON ttruck.tid=ttripdetail.tid AND tremainingamountpersondetail.trapdtypeid='voucher-0'");
        return $data->result();

    }
    
    public function get_tripdetil_remaining_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id."");
        
        return $data->row('nextremaining');
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

        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, tothermaterial.tomremainingcommission, tothermaterial.tompaymentdate, tothermaterial.tomremainingamount, tothermaterial.tomlocation FROM tothermaterial INNER JOIN ttruck on ttruck.tid=tothermaterial.tid INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdformid=tothermaterial.tomid AND tremainingamountpersondetail.trapdtypeid='parchoon-0' AND tremainingamountpersondetail.trapdamount>0");
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

        $data = $this->db->query("SELECT ttruck.tnumber, ttruck.tprice, ttruck.tremainingamount, ttruck.tinstallmethod, tremainingamountpersondetail.* from tremainingamountpersondetail INNER JOIN ttruck on ttruck.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=1");
        
        return $data->result();
    }

    public function get_truck_remaining_after_paid_amount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE tremainingamountpersondetailclosed.trapdid=".$id."");
        
        return $data->row('nextremaining');
    }

    public function get_truck_remaining_after_paid_amount_view($id){
        $data = $this->db->query("SELECT ttruck.*, tremainingamountpersondetail.* from tremainingamountpersondetail INNER JOIN ttruck on ttruck.tid=tremainingamountpersondetail.trapdformid WHERE tremainingamountpersondetail.trapdtypeid='truck-0' and ttruck.tbuysale=1 AND tremainingamountpersondetail.trapdid=".$id."");
        return $data->row();
    }
    public function get_truck_remaining_after_paid_amount_view_list($id){
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=1 and tremainingamountpersondetailclosed.trapdid=".$id."");
        
        return $data->result();
    }
    
    // END TRUCK getting remaining amount from remainingclsed table for remaining page TRUCK as SUMMARY 

     // START RETURN TRIP getting remaining amount from remainingclsed table for remaining page RETURN TRIP 
   
     public function get_all_remaining_amount_from_returntrip(){

        $data = $this->db->query("SELECT ttruck.tnumber, tremainingamountpersondetail.*, treturntrip.trarrivingdate, treturntrip.trid, treturntrip.trremainingamount from tremainingamountpersondetail INNER JOIN treturntrip ON treturntrip.trid=tremainingamountpersondetail.trapdformid INNER JOIN ttruck on ttruck.tid=treturntrip.tid  AND tremainingamountpersondetail.trapdtypeid='return-0' AND tremainingamountpersondetail.trapdamount>0 GROUP BY treturntrip.trid");
        
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

    public function totaltrip(){
        $data =  $this->db->query("SELECT COUNT(ttripdetail.ttdstation) as numberofstation, ttripdetail.tid, ttruck.tnumber, tremainingamountpersondetail.trapdname, SUM(tremainingamountpersondetail.trapdamount) as total, tstation.tstname FROM ttripdetail INNER JOIN tremainingamountpersondetail ON tremainingamountpersondetail.trapdformid=ttripdetail.ttdid and tremainingamountpersondetail.trapdtypeid='tripsum-0' LEFT JOIN tstation ON tstation.tstname=ttripdetail.ttdstation LEFT JOIN ttruck ON ttruck.tid=ttripdetail.tid GROUP BY ttripdetail.ttdstation");
        return $data->result();
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
        $data = $this->db->query("SELECT  tremainingamountpersondetailclosed.* FROM tremainingamountpersondetailclosed WHERE tremainingamountpersondetailclosed.trapdctruckbuysale=0 and tremainingamountpersondetailclosed.trapdid=".$id."");
        
        return $data->result();
    }

    // getting remaining amount from remainingclsed table for remaining page tripdetail and other and truck
      public function gettripdetilpayableafterpaidamount($id){
        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdamount, SUM(tremainingamountpersondetailclosed.trapdcamount) as paidafter,tremainingamountpersondetail.trapdamount-SUM(tremainingamountpersondetailclosed.trapdcamount) as nextremaining from tremainingamountpersondetail INNER JOIN tremainingamountpersondetailclosed on tremainingamountpersondetail.trapdid=tremainingamountpersondetailclosed.trapdid WHERE  tremainingamountpersondetailclosed.trapdctruckbuysale=0 and tremainingamountpersondetailclosed.trapdid=".$id."");
         
        return $data->row('nextremaining');
    }
  

}

?>