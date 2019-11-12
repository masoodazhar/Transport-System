<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH."models/base_model.php";
class Close_other_model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    public function get_total_oil_remaining(){
        return $this->db->query("SELECT IFNULL(sum(toil.toremaining),0) as totaloilwas FROM toil")->row('totaloilwas');
    }
    public function get_total_paid_amount_oil(){
        return $this->db->query("SELECT IFNULL(sum(close_oil_tyre_other.cotoamount),0) as totalpaidoil FROM close_oil_tyre_other INNER JOIN tshop WHERE close_oil_tyre_other.coto_foreignid=tshop.sid AND close_oil_tyre_other.cototype='oil'")->row('totalpaidoil');
    }

    public function get_total_oil_remaining_id($id){
        return $this->db->query("SELECT tshop.tsname , toil.toshopid , SUM(toil.toquantity) as quantity , SUM(toil.tototalprice) AS total_amount , SUM(toil.toremaining) AS remaining FROM toil INNER JOIN tshop ON toil.toshopid = tshop.sid and tshop.sid=".$id." GROUP BY tshop.tsname")->row('total_amount');
    }

    public function get_total_paid_amount_oil_id($id, $category){
        return $this->db->query("SELECT IFNULL(sum(close_oil_tyre_other.cotoamount),0) as totalpaidoil FROM close_oil_tyre_other WHERE close_oil_tyre_other.coto_foreignid=".$id." AND close_oil_tyre_other.cototype='oil'")->row('totalpaidoil');
    }


    public function get_all_oil_remaining(){
        return $this->db->query('SELECT tshop.tsname , toil.toshopid , SUM(toil.toquantity) as quantity , SUM(toil.tototalprice) AS total_amount , SUM(toil.toremaining) AS remaining FROM toil INNER JOIN tshop ON toil.toshopid = tshop.sid GROUP BY tshop.tsname')->row('total_amount');
    }


    public function get_all_oil_remaining_by_id($id){
        return $this->db->query('SELECT tshop.tsname , toil.toshopid , SUM(toil.toquantity) as quantity , SUM(toil.tototalprice) AS total_amount , SUM(toil.toremaining) AS remaining FROM toil INNER JOIN tshop ON toil.toshopid = tshop.sid AND tshop.sid='.$id.'  GROUP BY tshop.tsname')->row('total_amount');
    }


    public function get_all_paid_remaining_by_id_oil($category,$id){
        return $this->db->query('SELECT tshop.tsname , toil.toshopid , SUM(toil.toquantity) as quantity , SUM(toil.tototalprice) AS total_amount , SUM(toil.toremaining) AS remaining FROM toil INNER JOIN tshop ON toil.toshopid = tshop.sid AND tshop.sid='.$id.'  GROUP BY tshop.tsname')->row('total_amount');
    }


    public function get_all_oil_remaining_by_id_details($category,$id){
        
        return $this->db->query('SELECT close_oil_tyre_other.* , toil.toname as productname from close_oil_tyre_other INNER JOIN toil ON toil.toid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.coto_foreignid='.$id.' and close_oil_tyre_other.cototype="'.$category.'"')->result();

    }

    public function get_total_tyre_remaining(){
        return $this->db->query("SELECT IFNULL(sum(ttyre.ttremaining),0) as totaltyrewas FROM ttyre")->row('totaltyrewas');
    }

    public function get_total_paid_amount_tyre(){
        return $this->db->query("SELECT IFNULL(sum(close_oil_tyre_other.cotoamount),0) as totalpaidoil FROM close_oil_tyre_other INNER JOIN tshop WHERE close_oil_tyre_other.coto_foreignid=tshop.sid AND close_oil_tyre_other.cototype='tyre'")->row('totalpaidoil');
    }
    public function get_total_tyre_remaining_id($id){
        return $this->db->query("SELECT tshop.tsname , toil.toshopid , SUM(toil.toquantity) as quantity , SUM(toil.tototalprice) AS total_amount , SUM(toil.toremaining) AS remaining FROM toil INNER JOIN tshop ON toil.toshopid = tshop.sid and tshop.sid=".$id." GROUP BY tshop.tsname")->row('total_amount');
    }

    public function get_total_paid_amount_tyre_id($id){
        return $this->db->query("SELECT IFNULL(sum(close_oil_tyre_other.cotoamount),0) as totalpaidoil FROM close_oil_tyre_other WHERE close_oil_tyre_other.coto_foreignid=".$id." AND close_oil_tyre_other.cototype='tyre'")->row('totalpaidoil');
    }

    public function get_all_tyre_remaining(){
        
        return $this->db->query('Select ttyre.ttshopid , tshop.tsname , SUM(ttyre.tttyrepair) as tyre_pair ,  SUM(ttyre.tttotalprice) as total_amount , SUM(ttyre.ttpaid) as total_paid , SUM(ttyre.ttremaining) as total_remaining FROM ttyre INNER JOIN tshop ON ttyre.ttshopid = tshop.sid GROUP BY ttyre.ttshopid')->row('total_remaining');
       
    }

    public function get_all_tyre_remaining_by_id($id){
        
        return $this->db->query('Select ttyre.ttshopid , tshop.tsname , SUM(ttyre.tttyrepair) as tyre_pair ,  SUM(ttyre.tttotalprice) as total_amount , SUM(ttyre.ttpaid) as total_paid , SUM(ttyre.ttremaining) as total_remaining FROM ttyre INNER JOIN tshop ON ttyre.ttshopid = tshop.sid and tshop.sid='.$id.' GROUP BY ttyre.ttshopid')->row('total_remaining');
        
    }
    public function get_all_tyre_remaining_by_id_details($category,$id){
        
        return $this->db->query('SELECT close_oil_tyre_other.* , ttyre.ttname as productname from close_oil_tyre_other INNER JOIN ttyre ON ttyre.ttid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.coto_foreignid='.$id.' and close_oil_tyre_other.cototype="'.$category.'"')->result();

    }
    public function get_oil_data(){
        return $this->db->query('SELECT tshop.tsname , toil.toshopid , SUM(toil.toquantity) as quantity , SUM(toil.tototalprice) AS total_amount , SUM(toil.topaid) AS paid , SUM(toil.toremaining) AS remaining FROM toil INNER JOIN tshop ON toil.toshopid = tshop.sid GROUP BY tshop.tsname')->result();
       
    }

    public function get_tyre_data(){
        return $this->db->query('Select ttyre.ttshopid , tshop.tsname , SUM(ttyre.tttyrepair) as tyre_pair ,  SUM(ttyre.tttotalprice) as total_amount , SUM(ttyre.ttpaid) as total_paid , SUM(ttyre.ttremaining) as total_remaining FROM ttyre INNER JOIN tshop ON ttyre.ttshopid = tshop.sid GROUP BY ttyre.ttshopid')->result();
       
    }

    public function save_close_data($data=array()){
        $this->db->insert('close_oil_tyre_other', $data);
    }


    public function get_station(){
      return  $this->db->get('tpumpstation')->result();
    }


    function get_sum_of_pump(){
        return $this->db->query('SELECT IFNULL(SUM(tpumpdetail.tpdamount),0) as totalamount FROM tpumpdetail ')->row('totalamount'); 
      
    }
    public function get_total_paid_amount_pump(){
        return $this->db->query("SELECT IFNULL(sum(close_oil_tyre_other.cotoamount),0) as totalpaidoil FROM close_oil_tyre_other INNER JOIN tpumpstation WHERE close_oil_tyre_other.coto_foreignid=tpumpstation.tpid AND close_oil_tyre_other.cototype='pump'")->row('totalpaidoil');
    }

    function get_sum_of_pump_id($id){
        return $this->db->query('SELECT IFNULL(SUM(tpumpdetail.tpdamount),0) as totalamount FROM tpumpdetail where tpumpdetail.tpid='.$id.' ')->row('totalamount'); 
      
    }

    public function get_total_paid_amount_pump_id($id){
        return $this->db->query("SELECT IFNULL(sum(close_oil_tyre_other.cotoamount),0) as totalpaidoil FROM close_oil_tyre_other INNER JOIN tpumpstation WHERE close_oil_tyre_other.coto_foreignid=tpumpstation.tpid AND close_oil_tyre_other.cototype='pump' and close_oil_tyre_other.coto_foreignid=".$id." ")->row('totalpaidoil');
    }
    
    public function get_all_pump_remaining_by_id_details($category,$id){
        
        return $this->db->query('SELECT close_oil_tyre_other.* , tpumpstation.tpname as productname from close_oil_tyre_other INNER JOIN tpumpstation ON tpumpstation.tpid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.coto_foreignid='.$id.' and close_oil_tyre_other.cototype="'.$category.'"')->result();

    }


}

?>