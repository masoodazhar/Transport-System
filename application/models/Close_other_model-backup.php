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
        return $this->db->query("SELECT IFNULL(SUM(close_oil_tyre_other.cotoamount),0) as totalpaidoil FROM close_oil_tyre_other INNER JOIN toil ON toil.toid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.cototype='oil'")->row('totalpaidoil');
    }

    public function get_total_oil_remaining_id($id){
        return $this->db->query("SELECT IFNULL(sum(toil.toremaining),0) as totaloilwas FROM toil where toid=".$id."")->row('totaloilwas');
    }
    public function get_total_paid_amount_oil_id($id){
        return $this->db->query("SELECT IFNULL(SUM(close_oil_tyre_other.cotoamount),0) as totalpaidoil FROM close_oil_tyre_other INNER JOIN toil ON toil.toid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.cototype='oil' and close_oil_tyre_other.coto_foreignid=".$id."")->row('totalpaidoil');
    }


    public function get_all_oil_remaining(){
        
        return $this->db->query('SELECT (SELECT IFNULL(sum(toil.toremaining),0) FROM toil) - (SELECT IFNULL(SUM(close_oil_tyre_other.cotoamount),0) FROM close_oil_tyre_other INNER JOIN toil ON toil.toid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.cototype="oil" )as total_oil_reaining FROM DUAL')->row('total_oil_reaining');

    }

    public function get_all_oil_remaining_by_id($id){
        
        return $this->db->query('SELECT (SELECT IFNULL(sum(toil.toremaining),0) FROM toil where toid='.$id.') - (SELECT IFNULL(SUM(close_oil_tyre_other.cotoamount),0) FROM close_oil_tyre_other INNER JOIN toil ON toil.toid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.cototype="oil" and close_oil_tyre_other.coto_foreignid='.$id.'  )as total_oil_reaining FROM DUAL')->row('total_oil_reaining');

    }


    public function get_all_oil_remaining_by_id_details($category,$id){
        
        return $this->db->query('SELECT close_oil_tyre_other.* , toil.toname as productname from close_oil_tyre_other INNER JOIN toil ON toil.toid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.coto_foreignid='.$id.' and close_oil_tyre_other.cototype="'.$category.'"')->result();

    }

    public function get_total_tyre_remaining(){
        return $this->db->query("SELECT IFNULL(sum(ttyre.ttremaining),0) as totaltyrewas FROM ttyre")->row('totaltyrewas');
    }

    public function get_total_paid_amount_tyre(){
        return $this->db->query("SELECT IFNULL(SUM(close_oil_tyre_other.cotoamount),0) as totalpaidtyre FROM close_oil_tyre_other INNER JOIN ttyre ON ttyre.ttid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.cototype='tyre'")->row('totalpaidtyre');
    }
    public function get_total_tyre_remaining_id($id){
        return $this->db->query("SELECT IFNULL(sum(ttyre.ttremaining),0) as totaltyrewas FROM ttyre where ttid=".$id."")->row('totaltyrewas');
    }

    public function get_total_paid_amount_tyre_id($id){
        return $this->db->query("SELECT IFNULL(SUM(close_oil_tyre_other.cotoamount),0) as totalpaidtyre FROM close_oil_tyre_other INNER JOIN ttyre ON ttyre.ttid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.cototype='tyre' and close_oil_tyre_other.coto_foreignid=".$id."")->row('totalpaidtyre');
    }

    public function get_all_tyre_remaining(){
        
        return $this->db->query('SELECT (SELECT IFNULL(sum(ttyre.ttremaining),0) FROM ttyre)-(SELECT IFNULL(SUM(close_oil_tyre_other.cotoamount),0) FROM close_oil_tyre_other INNER JOIN ttyre ON ttyre.ttid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.cototype="tyre" )as total_tyre_reaining FROM DUAL')->row('total_tyre_reaining');
        
    }

    public function get_all_tyre_remaining_by_id($id){
        
        return $this->db->query('SELECT (SELECT IFNULL(sum(ttyre.ttremaining),0) FROM ttyre where ttyre.ttid='.$id.')-(SELECT IFNULL(SUM(close_oil_tyre_other.cotoamount),0) FROM close_oil_tyre_other INNER JOIN ttyre ON ttyre.ttid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.cototype="tyre" and close_oil_tyre_other.coto_foreignid='.$id.' )as total_tyre_reaining FROM DUAL')->row('total_tyre_reaining');
        
    }
    public function get_all_tyre_remaining_by_id_details($category,$id){
        
        return $this->db->query('SELECT close_oil_tyre_other.* , ttyre.ttname as productname from close_oil_tyre_other INNER JOIN ttyre ON ttyre.ttid=close_oil_tyre_other.coto_foreignid AND close_oil_tyre_other.coto_foreignid='.$id.' and close_oil_tyre_other.cototype="'.$category.'"')->result();

    }
    public function get_oil_data(){
        return $this->db->query('select * from toil where toremaining>0')->result();
       
    }

    public function get_tyre_data(){
        return $this->db->query('select * from ttyre where ttremaining>0')->result();
       
    }

    public function save_close_data($data=array()){
        $this->db->insert('close_oil_tyre_other', $data);
    }
}

?>