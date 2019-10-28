<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH."models/base_model.php";
class Login_Model extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }


    function login($username, $password){
        
        $data = $this->db->query('select employee.empname, employee.empimage, employee.empid, tlogin_system.* FROM tlogin_system INNER JOIN employee ON tlogin_system.tlempid=employee.empid and tlogin_system.tlusername="'.$username.'" AND tlogin_system.tlpassword="'.$password.'"');
        return $data->row();
    }
    public function get_all_employee(){
        $data = $this->db->query('select * from employee where empid<>0');
        return $data->result();
    }

    public function get_all_login(){
        // $data = array(
        //     'tlempid'=>0
        // );
        $data = $this->db->query('select employee.empname, employee.empid, tlogin_system.* FROM tlogin_system INNER JOIN employee ON tlogin_system.tlempid=employee.empid and tlogin_system.tlempid<>0');
        return $data->result();
    }
    public function addCreateuser($tlusername, $tlpassword,$tlauth,$tlempid){
        $data = array(
            'tlusername'=>$tlusername,
            'tlpassword'=>$tlpassword,
            'tlauth'=>$tlauth,
            'tlempid'=>$tlempid
        );
        $this->db->insert('tlogin_system', $data);
    }

    public function updatelogin($tlusername,$tlauth, $tlid,$tlpassword){
        $data = array(
            'tlusername'=>$tlusername,
            'tlauth'=>$tlauth,
            'tlpassword'=>$tlpassword
        );
        $this->db->where(array('tlid'=>$tlid));
        $this->db->update('tlogin_system',$data);
    }
}

?>