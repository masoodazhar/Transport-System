<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

	//Oil Section

	function __construct()
    {
		parent::__construct();
		$this->load->model('Employee_models');
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
    }

	public function index($modelsinvalid=false){
		$data['modelsinvalid'] = $modelsinvalid;
		$data['employees'] = $this->Employee_models->selectEmployee();
		$this->load->view('layout/header');
		$this->load->view('employee', $data);
		$this->load->view('layout/footer');
	}

	public function addemployee(){
		$empname = $this->input->post('empname');
		$empcontact = $this->input->post('empcontact');
		$empdateofjoin = $this->input->post('empdateofjoin');
		$emptype = $this->input->post('emptype');
		$empsalary = $this->input->post('empsalary');

		//===================Image validation and path=================
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);

		//===================Image validation and path=================
			$this->form_validation->set_rules('empname' , 'Employee name' , 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('empcontact' , 'Employee Contact' , 'required|alpha_numeric_spaces');
			$this->form_validation->set_rules('empdateofjoin' , 'Employee Date of join' , 'required');
			$this->form_validation->set_rules('emptype' , 'Employee type' , 'required');
			$this->form_validation->set_rules('empsalary' , 'Employee Salary' , 'required|alpha_numeric_spaces');

		if($this->form_validation->run())
		{
				$this->upload->do_upload('empimage');
				$empimage = $this->upload->data('file_name');
				$this->Employee_models->addemployee($empname,$empcontact, $empdateofjoin, $emptype, $empsalary, $empimage);
				$data['employees'] = $this->Employee_models->selectEmployee();
				$this->session->set_flashdata('datasaved',1);
				redirect('Employee');

		}else{
			$data['employees'] = $this->Employee_models->selectEmployee();
			$this->load->view('layout/header');
			$this->load->view('employee', $data);
			$this->load->view('layout/footer');
		}


	}

	public function updateemployee(){
		$id = $this->input->post('id');
		$val = $this->input->post('val');
		$column = $this->input->post('column');

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		$this->upload->do_upload($val);
		// echo $column;
		$data['updated'] = $this->Employee_models->updateemployee($id, $val, $column);

	}

	public function uploadImage(){


		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '200';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		if($this->upload->do_upload('empimage')){
			$id = $this->input->post('id');
			$val =  $this->upload->data('file_name');
			$column = 'empimage';

			$data['updated'] = $this->Employee_models->updateemployee($id, $val, $column);
			$this->index();
		}else{
			 echo $this->upload->display_errors();
		}
		// echo $column;


	}

	public function addsalary(){

		$salempid = $this->input->post('salempid');
		$saladvanceinstallment = $this->input->post('saladvanceinstallment');
		$saldate = $this->input->post('saldate');
		$saltotalsalary = $this->input->post('saltotalsalary');
		$salbonus = $this->input->post('salbonus');
		$saleidi = $this->input->post('saleidi');
		$saldetail = $this->input->post('saldetail');
	if(isset($salempid)){
		$this->form_validation->set_rules('saldate' , 'Payment Date' , 'required');
		$this->form_validation->set_rules('saltotalsalary' , 'Total Salary' , 'required|alpha_numeric_spaces');

		if($this->form_validation->run())
		{
			$this->Employee_models->addsalary($salempid, $saladvanceinstallment, $saldate, $saltotalsalary, $salbonus, $saleidi, $saldetail);
			$this->session->set_flashdata('datasaved',1);
			$this->salary($salempid);
		}else{
			$this->salary($salempid);
		}
	}else{
		redirect('Employee');
	}


	}


	public function salary($empid){

		$data['emplyee_data'] = $this->Employee_models->getEmployeeData($empid);
		/* IF EMPLOYEE IS AVAILABLE THEN. OTHER WISE GO TO ELSE PART*/
		if($data['emplyee_data']->empid>0){

        $data['get_only_advanceinstallment_employee'] = $this->Employee_models->get_only_advanceinstallment_employee($empid);

		$data['employeea_dvance_data'] = $this->Employee_models->getEmployeeAdvanceData($empid);

		$data['get_all_salary_of_one_employee'] = $this->Employee_models->get_all_salary_of_one_employee($empid);


		// echo  '<pre>';
		// print_r($employeea_dvance_data);
		// echo '================';
		$advance_payment_held_by_employee = 0;
		// echo count($data['employeea_dvance_data']);
		// die;
		if(count($data['employeea_dvance_data'])>0){

			foreach($data['employeea_dvance_data'] as $result){
				$advance_payment_held_by_employee +=$result->adadvance;
			}

		}else{
			$advance_payment_held_by_employee=0;
		}

		$data['advance_payment_held_by_employee'] = $advance_payment_held_by_employee;
		if(count($data['employeea_dvance_data'])>0){
			$data['advanceinstallmentpermonth'] = $data['employeea_dvance_data'][count($data['employeea_dvance_data'])-1]->adinstallment;
		}else{
			$data['advanceinstallmentpermonth'] = 0;
		}



		$this->load->view('layout/header');
		$this->load->view('salary', $data);
		$this->load->view('layout/footer');

	}else{
		redirect('Employee');
	}

	}

	public function addadvance(){

		$empid = $this->input->post('empid');
		$adadvance = $this->input->post('adadvance');
		$adpaymentmethod = $this->input->post('adpaymentmethod');
		$adinstallment = $this->input->post('adinstallment');
		$addetail = $this->input->post('addetail');
		$submitadvance = $this->input->post('submitadvance');
		$addate = $this->input->post('addate');

		if(isset($submitadvance)){

				$this->form_validation->set_rules('adadvance' , 'Advance Amount' , 'required|alpha_numeric_spaces');
				$this->form_validation->set_rules('adpaymentmethod' , 'Installment Method' , 'required|alpha_numeric_spaces');
				$this->form_validation->set_rules('adinstallment' , 'Installment per Payment Method' , 'required|alpha_numeric_spaces');
				$this->form_validation->set_rules('addate' , 'Payment Date' , 'required');
				if($this->form_validation->run())
				{

				$this->Employee_models->addadvance($empid, $adadvance, $adpaymentmethod, $adinstallment, $addetail, $addate);
				// $data['modelsinvalid'] = false;
				$this->session->set_flashdata('datasaved',1);
				$this->index(false);
				}
				else
				{
					// $data['modelsinvalid'] = true;
					$this->index(true);

				}
		}else{
			$this->index(false);
		}

	}



	public function advancedetails(){
			$tr = '';
			$paymentmethod = '';
			$empid = $this->input->post('id');
			$data['employeea_dvance_data'] = $this->Employee_models->getEmployeeAdvanceData($empid);

			foreach ($data['employeea_dvance_data']  as $key => $value) {

				if($value->adpaymentmethod==1){
					$paymentmethod = 'Monthly';
				}else if($value->adpaymentmethod==2){
					$paymentmethod =	'Fortnight';
				}else{
					$paymentmethod =	'Weekly';
				}
				$tr .='<tr>
                          <td>'.$value->adadvance.'</td>
                          <td>'.$paymentmethod.'</td>
                          <td>'.$value->adinstallment.'</td>
                          <td>'.$value->addate.'</td>
                        </tr>';
			}

			// $this->session->set_flashdata('employeea_dvance_data',$tr);
			// echo $tr;
			// print_r($data['employeea_dvance_data'] );

	}

	public function active_deactive_employee(){
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		$this->Employee_models->active_deactive_employee($id,$status);
	}


	public function addofficeexpence(){

		$oethings = $this->input->post('oethings');
		$oeamount = $this->input->post('oeamount');
		$oedate = $this->input->post('oedate');
		$oetype = $this->input->post('oetype');
		$oedetail = $this->input->post('oedetail');
		$oetaken = $this->input->post('oetaken');
		$oemonth = date('F', strtotime($oedate));
		$this->form_validation->set_rules('oethings' , 'Description' , 'required');
		$this->form_validation->set_rules('oeamount' , 'Amount' , 'required');
		$this->form_validation->set_rules('oedate' , 'Date' , 'required');
		$this->form_validation->set_rules('oetype' , 'Type' , 'required');
		if(isset($oethings))
		{
				if($this->form_validation->run())
				{
					$this->Employee_models->addofficeexpence($oethings, $oeamount, $oedate, $oemonth, $oedetail,$oetype,$oetaken);
					$this->officexpence();

				}else{
					$this->officexpence();
				}
		}
		else{
			redirect('Employee/officexpence');
		}

	}

	public function searchOfficeExpence(){

		$startdate = $this->input->get('startdate');
		$enddate = $this->input->get('enddate');
		// $oetype = $this->input->get('oetype');




		$data['allofficeexpencethings'] = $this->Employee_models->all_office_expence_things();
		$data['get_all_office_expence'] = $this->Employee_models->get_office_expence_by_search($startdate,$enddate);
		$data['get_all_office_income'] = $this->Employee_models->get_office_income_by_search($startdate,$enddate);
		$data['month'] = '';

		if($startdate=="" && $enddate==""){
			$data['month'] = date('F');
			$data['searchedmonth'] = date('F');
		}else if($startdate=="" && $enddate!=""){
			$data['month'] = date('F' ,strtotime($enddate));
			$data['searchedmonth'] =  date('F' ,strtotime($enddate));
		}else if($enddate=="" && $startdate!=""){
			$data['month'] = date('F' ,strtotime($startdate));
			$data['searchedmonth'] =  date('F' ,strtotime($startdate));
		}else{
			$data['searchedmonth'] =  $startdate.' TO '.$enddate;
			$data['month'] = date('F' ,strtotime($startdate)).' TO '. date('F' ,strtotime($enddate));
		}




		$total_of_searched_amount=0;
		$total_of_searched_amount_income=0;

		if(count($data['get_all_office_expence'])){
			foreach($data['get_all_office_expence'] as $gettingTotal){
				$total_of_searched_amount += $gettingTotal->oeamount;
			}
		}
		$data['total_of_searched_amount'] = $total_of_searched_amount;

		if(count($data['get_all_office_income'])){
			foreach($data['get_all_office_income'] as $gettingTotal){
				$total_of_searched_amount_income += $gettingTotal->oeamount;
			}
		}
		$data['total_of_searched_amount_income'] = $total_of_searched_amount_income;

		$this->load->view('layout/header');
		$this->load->view('officexpence', $data);
		$this->load->view('layout/footer');

	}


	public function officexpence(){

			$data['allofficeexpencethings'] = $this->Employee_models->all_office_expence_things();
			$data['get_all_office_expence'] = $this->Employee_models->get_office_expence();
			$data['get_all_office_income'] = $this->Employee_models->get_office_income();

			$data['month'] = date('F');
			$data['searchedmonth'] = date('F');

			$total_of_searched_amount=0;
			$total_of_searched_amount_income=0;

			if(count($data['get_all_office_expence'])){
				foreach($data['get_all_office_expence'] as $gettingTotal){
					$total_of_searched_amount += $gettingTotal->oeamount;
				}
			}
			if(count($data['get_all_office_income'])){
				foreach($data['get_all_office_income'] as $gettingTotal){
					$total_of_searched_amount_income += $gettingTotal->oeamount;
				}
			}
			$data['total_of_searched_amount'] = $total_of_searched_amount;
			$data['total_of_searched_amount_income'] = $total_of_searched_amount_income;


			$this->load->view('layout/header');
			$this->load->view('officexpence', $data);
			$this->load->view('layout/footer');

	}


	public function pendingnameids(){

        $data = $this->db->query("SELECT tremainingamountpersondetail.trapdid, tremainingamountpersondetail.trapdname  FROM tremainingamountpersondetail where tremainingamountpersondetail.trapdamount<0");

        return $data->result();

	}


	public function expence_and_pending(){
		$this->load->model('main_model');

		$data['totalremaining'] = $this->main_model->getremainingamountfromalltable();
		$data['totalremaining_closed'] = $this->main_model->get_sumof_all_table_closed_amount();


		$data['totalpending'] = $this->main_model->getpendingamountfromalltable();
		$data['totalpending_closed'] = $this->main_model->get_sumof_all_table_closed_amount_payable();

		$data['sum_of_have_haji_jani'] = $this->main_model->sum_of_have_haji_jani();

			$this->load->view('layout/header');
			$this->load->view('expence_and_pending', $data);
			$this->load->view('layout/footer');
	}

	public function printpreview_dailyentry($page){
			$data['page'] = $page;
			$date = $this->input->get('date');

			$date_explode =explode(' ',$date);

			if(in_array('TO', $date_explode)){
				$data['realsearched'] = $date;
				$data['month'] = date('F' ,strtotime($date_explode[0])).' TO '. date('F' ,strtotime($date_explode[2]));
				if($page==1){

					$data['get_all_office_income_expence'] = $this->Employee_models->get_office_income_by_search($date_explode[0],$date_explode[2]);
				}else if($page==2){
					$data['get_all_office_income_expence'] = $this->Employee_models->get_office_expence_by_search($date_explode[0],$date_explode[2]);
				}
			}else{
				$data['realsearched'] = $date;
				$data['month'] = $date;
				if($page==1){
					$data['get_all_office_income_expence'] = $this->Employee_models->get_office_income($date);
				}else if($page==2){
					$data['get_all_office_income_expence'] = $this->Employee_models->get_office_expence($date);
				}
			}

		$total_of_searched_amount_income=0;

			if(count($data['get_all_office_income_expence'])){
				foreach($data['get_all_office_income_expence'] as $gettingTotal){
					$total_of_searched_amount_income += $gettingTotal->oeamount;
				}
			}
			$data['get_all_office_income_expence_total'] = $total_of_searched_amount_income;




			$this->load->view('layout/header');
			$this->load->view('Printpreview_daily_entry.php', $data);
			$this->load->view('layout/footer');
	}

}

?>
