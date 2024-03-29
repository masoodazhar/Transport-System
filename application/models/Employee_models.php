<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// require_once APPPATH."models/base_model.php";
class Employee_models extends CI_Model
{
	function __construct()
    {
        parent::__construct();
    }

    public function selectEmployee(){
        $data = $this->db->query('SELECT employee.* ,IFNULL( SUM(emp_advance.adadvance),0) as total_advance FROM employee LEFT JOIN emp_advance ON employee.empid=emp_advance.adempid WHERE employee.empid<>0 GROUP BY employee.empid');
        return $data->result();
    }

    public function addemployee($empname,$empcontact, $empdateofjoin, $emptype, $empsalary, $empimage ){
        $data = array(
            'empname'=>$empname,
            'empcontact'=>$empcontact,
            'empdateofjoin'=>$empdateofjoin,
            'emptype'=>$emptype,
            'empsalary'=> $empsalary,
            'empimage'=>$empimage
        );
          $this->db->insert('employee', $data);
        $this->selectEmployee();
    }
  
    public function updateemployee($id, $val, $column){
        $data = array(
            $column => $val
        );
        $this->db->where('empid', $id);
        $this->db->update('employee', $data);
        $this->selectEmployee();
    }

    public function addadvance($empid, $adadvance, $adpaymentmethod, $adinstallment, $addetail, $addate){
        $data = array(
            'adempid'=>$empid,
            'adadvance'=>$adadvance,
            'adpaymentmethod'=>$adpaymentmethod,
            'adinstallment'=>$adinstallment,
            'addetail'=>$addetail,
            'addate'=>$addate
        );

        $this->db->insert('emp_advance', $data);
    }

    public function addsalary($salempid, $saladvanceinstallment, $saldate, $saltotalsalary, $salbonus, $saleidi, $saldetail){
        $data = array(
            'salempid' => $salempid,
            'saladvanceinstallment'=> $saladvanceinstallment,
            'saldate'=>$saldate,
            'saltotalsalary'=> $saltotalsalary,
            'salbonus'=>$salbonus,
            'saleidi'=> $saleidi,
            'saldetail'=>$saldetail
        );

        $this->db->insert('salary',$data);
        $this->db->where(array('salempid'=>$salempid));
        $data = $this->db->get('salary');
        return $data->result();
    }

    public function get_all_salary_of_one_employee($salempid){
        // $this->db->where(array('salempid'=>$salempid, 'saltotalsalary'>0));
        $data = $this->db->query('select * from salary where salempid='.$salempid.' and saltotalsalary>0 ');
        return $data->result();
    }
    
     public function get_only_advanceinstallment_employee($salempid){
        $data = $this->db->query('select sum(salary.saladvanceinstallment) as totaladvanceinstallment from salary where salempid='.$salempid.' and saltotalsalary<1 ');
        return $data->row('totaladvanceinstallment');
    }


    public function getEmployeeData($empid){

        $this->db->where(array('empid'=>$empid));
        $data = $this->db->get('employee');
        return $data->row();
    }


    public function get_advance_sum($empid){

        $this->db->where(array('empid'=>$empid));
        $data = $this->db->query('employee');
        return $data->row();
    }

    public function getEmployeeAdvanceData($empid){
        $this->db->where(array('adempid'=>$empid));
        $data = $this->db->get('emp_advance');
        return $data->result();
    }

    public function active_deactive_employee($id,$status){
        $data = array(
            'empstatus'=>$status
        );
        $this->db->where(array('empid'=>$id));
        $this->db->update('employee', $data);
    }

    public function sum_of_one_employee_salary($id){
        $data = $this->db->query('select SUM(salary.saltotalsalary)+SUM(salary.saladvanceinstallment) as sum_of_one_employee_salary from salary WHERE salempid='.$id.'');
        return $data->row('sum_of_one_employee_salary');
    }


    public function sum_of_one_employee_advance_returned($id){
        $data = $this->db->query('select SUM(salary.saladvanceinstallment) as sum_of_one_employee_advance_returned from salary WHERE salempid='.$id.'');
        return $data->row('sum_of_one_employee_advance_returned');
    }

    public function all_office_expence_things(){
        $data = $this->db->get('othermaterialname');
        return $data->result();
    }

    public function addofficeexpence($oethings, $oeamount, $oedate, $oemonth, $oedetail,$oetype, $oetaken){
        $this->db->where(array('omnname'=>$oethings));
        $data = $this->db->get('othermaterialname');
        if($data->num_rows()<1){
            
            $this->db->insert('othermaterialname', array('omnname'=>$oethings));
            $this->db->insert('officeexpence', array('oethings'=>$oethings, 'oeamount'=> $oeamount, 'oedate'=>$oedate, 'oemonth'=>$oemonth, 'oedetail'=>$oedetail, 'oetype'=>$oetype,'oetaken'=>$oetaken));
        }else{
            $this->db->insert('officeexpence', array('oethings'=>$oethings, 'oeamount'=> $oeamount, 'oedate'=>$oedate, 'oemonth'=>$oemonth, 'oedetail'=>$oedetail, 'oetype'=>$oetype, 'oetaken'=>$oetaken));
        }
        
    }

    public function get_office_expence($oemonth='',$oetype=0){
        $oemonth = date('F');
        $data = $this->db->query('select * from officeexpence where oemonth="'.$oemonth.'" and oetype=0 and oetaken=0');
        return $data->result();
    }
    public function get_office_income($oemonth='',$oetype=1){
        $oemonth = date('F');
        $data = $this->db->query('select * from officeexpence where oemonth="'.$oemonth.'" and oetype=1 and oetaken=0 ');
        return $data->result();
    }
    public function get_office_expence_by_search($startdate, $enddate){
       
		if($startdate=='' && $enddate==''){
            $data = $this->db->query('select * from officeexpence where oetype=0');
		}else if($startdate=='' && $enddate!=''){
            $oemonth = date('F', strtotime($enddate));
			$data = $this->db->query('select * from officeexpence where  oemonth="'.$oemonth.'" and oetype=0 and oetaken=0');
		}else if($startdate!='' && $enddate==''){
            $oemonth = date('F', strtotime($startdate));
			$data = $this->db->query('select * from officeexpence where  oemonth="'.$oemonth.'" and oetype=0 and oetaken=0');
		}else if($startdate!='' && $enddate==''){
            $oemonth = date('F', strtotime($startdate));
			$data = $this->db->query('select * from officeexpence where  oemonth="'.$oemonth.'" and oetype=0 and oetaken=0');
		}else if($startdate=='' && $enddate!=''){
            $oemonth = date('F', strtotime($enddate));
			$data = $this->db->query('select * from officeexpence where  oemonth="'.$oemonth.'" and oetype=0 and oetaken=0');
        
		}else{
			$data = $this->db->query('select * from officeexpence where oedate between "'.$startdate.'" and "'.$enddate.'" and oetype=0 and oetaken=0');
        
        }
        
        // $data = $this->db->query('select * from officeexpence where oedate between "'.$startdate.'" and "'.$enddate.'" and oetype='.$oetype.'');
        return $data->result();
    }

    
    public function get_office_income_by_search($startdate, $enddate){
       
		if($startdate=='' && $enddate==''){
            $data = $this->db->query('select * from officeexpence where oetype=1');
		}else if($startdate=='' && $enddate!=''){
            $oemonth = date('F', strtotime($enddate));
			$data = $this->db->query('select * from officeexpence where  oemonth="'.$oemonth.'" and oetype=1 and oetaken=0');
		}else if($startdate!='' && $enddate==''){
            $oemonth = date('F', strtotime($startdate));
			$data = $this->db->query('select * from officeexpence where  oemonth="'.$oemonth.'" and oetype=1 and oetaken=0');
		}else if($startdate!='' && $enddate==''){
            $oemonth = date('F', strtotime($startdate));
			$data = $this->db->query('select * from officeexpence where  oemonth="'.$oemonth.'" and oetype=1 and oetaken=0');
		}else if($startdate=='' && $enddate!=''){
            $oemonth = date('F', strtotime($enddate));
			$data = $this->db->query('select * from officeexpence where  oemonth="'.$oemonth.'" and oetype=1 and oetaken=0');
        
		}else{
			$data = $this->db->query('select * from officeexpence where oedate between "'.$startdate.'" and "'.$enddate.'" and oetype=1 and oetaken=0');
        
        }
        
        // $data = $this->db->query('select * from officeexpence where oedate between "'.$startdate.'" and "'.$enddate.'" and oetype='.$oetype.'');
        return $data->result();
    }
}

?>