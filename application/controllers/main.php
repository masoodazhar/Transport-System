<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	//Oil Section

	function __construct()
    {
		parent::__construct();
		$this->load->model('main_model');
		$this->load->library('session');
		// $_SESSION['notification'] = $this->main_model->notificationindecator();

		//==================START TRUCK NOTIFICATION===========//
		 $truck_notification = $this->main_model->truck_notification();

		$this->check_for_truck_notification_to_update();
		// $this->change_status_on_date_detected();
		 if(count($truck_notification)>0){
			$count_truck_notify = 0;

			foreach ($truck_notification as $key => $value) {
				$insuranceexpirydate = date('m/d/Y', strtotime($value->tninsuranceexpirydate. ' - 25 day'));
				$permitexpirydate = date('m/d/Y', strtotime($value->tnpermitexpirydate. ' - 25 day'));
				$fitnessexpirydate = date('m/d/Y', strtotime($value->tnfitnessexpirydate. ' - 25 day'));
        	$tntexexpirydate = date('m/d/Y', strtotime($value->tntexexpirydate. ' - 25 day'));

				$check_currentDate = strtotime(date('m/d/Y'));
				// $insuranceexpirydate = new DateTime($insuranceexpirydate);
				// $permitexpirydate = new DateTime($permitexpirydate);
				// $fitnessexpirydate = new DateTime($fitnessexpirydate);

				if($check_currentDate>strtotime($insuranceexpirydate) || $check_currentDate>strtotime($permitexpirydate) || $check_currentDate>strtotime($fitnessexpirydate)|| $check_currentDate>strtotime($tntexexpirydate)){

					// echo $currentdate.'<br>';
					$count_truck_notify++;


					$this->session->set_userdata('truck_notification',$count_truck_notify);
				}else{

					$this->session->set_userdata('truck_notification',$count_truck_notify);
				}
			}

			}else{
				$this->session->set_userdata('truck_notification',0);
			}





	}


	public function check_for_truck_notification_to_update(){
		$truck_notification_check_for_update_status = $this->main_model->truck_notification_check_for_update_status();
		if(count($truck_notification_check_for_update_status)>0){

			foreach ($truck_notification_check_for_update_status as $key => $value) {
				$insuranceexpirydate = date('m/d/Y', strtotime($value->tninsuranceexpirydate. ' - 25 day'));
				$permitexpirydate = date('m/d/Y', strtotime($value->tnpermitexpirydate. ' - 25 day'));
				$fitnessexpirydate = date('m/d/Y', strtotime($value->tnfitnessexpirydate. ' - 25 day'));

				$check_currentDate = strtotime(date('m/d/Y'));
				// $insuranceexpirydate = new DateTime($insuranceexpirydate);
				// $permitexpirydate = new DateTime($permitexpirydate);
				// $fitnessexpirydate = new DateTime($fitnessexpirydate);

				if($check_currentDate>strtotime($insuranceexpirydate) || $check_currentDate>strtotime($permitexpirydate) || $check_currentDate>strtotime($fitnessexpirydate)){

					// echo $currentdate.'<br>';
					// print($value->tnid); die;

					$this->main_model->change_status_on_date_detected($value->tnid);

				}else{


				}
			}

			}else{

			}
	}

	public function check_same_remaining_and_pending(){

		$stations = $this->main_model->get_station();
		$trucks = $this->main_model->get_truck_number();
		$numberofsamedat = 0;

		$datafortable = '';

		$conditionpay_or_recieve = 0;
		$condition_value = '';
		$identity = '';
		$datafortable .=' <table class="table table-striped">';
						$datafortable .='<thead>
							<tr>
							<th class="text-center">#</th>
							<th>Station Name</th>
							<th>Trcuk Number</th>
							<th>Recieveable </th>
							<th>Payable </th>
							<th>Paid Amount</th>
							<th>Still Recieveable</th>
							<th>Still Payable </th>
							<th>Will Be </th>
							<th class="text-right">Actions</th>
							</tr>
						</thead><tbody>';
		foreach ($stations as $key => $stationsids) {
			foreach ($trucks as $key1 => $trucksids) {

				// echo 'stationID: '.$stationsids->tstid . 'Truckid: '.$trucksids->tid.'<r>';

				$remaining = $this->main_model->get_remaining_from_all_table_on_truck_and_station_id($stationsids->tstid, $trucksids->tid);

				if($remaining>0){
					$matched = $this->main_model->get_payable_from_all_table_on_truck_and_station_id($stationsids->tstid, $trucksids->tid);
					if($matched<0){




						$paidamount = $this->main_model->get_sum_of_all_table_closed_amount_by_truck_and_station_id($stationsids->tstid, $trucksids->tid);
						if($remaining-$paidamount-abs($matched)<0 && ($remaining-$paidamount>0)){
							// echo 'STATION ID: '.$stationsids->tstid.'====== TRUCK ID: '.$trucksids->tid.'========Remaining Amount:'.$remaining.'======= Pending Amount: '.$matched.'========= Paid Amount: '.$paidamount.' Still Remaining: '.($remaining-$paidamount).'=====Managed: '.(($remaining-$paidamount)-abs($matched)).'<br>';
							$numberofsamedat++;

							$conditionpay_or_recieve = (($remaining-$paidamount)-abs($matched));
							if($conditionpay_or_recieve<0){
								$condition_value = 'Payable';
								$identity = 'r';
							}else{
								$condition_value = 'Recieveable';
								$identity = 'p';
							}

							$datafortable .='
							<form  method="POST" action="'.base_url().'main/close_from_management">
							<tr>
							<td>'.$numberofsamedat.'</td>
							<td>'.$stationsids->tstname.'</td>
							<td>'.$trucksids->tnumber.'</td>
							<td>'.$remaining.'</td>
							<td>'.abs($matched).'</td>
							<td>'.$paidamount.'</td>
							<td>'.$paidamount.'</td>
							<td>'.($remaining-$paidamount).'</td>
							<td>'.$condition_value.' '.abs((($remaining-$paidamount)-abs($matched))).'</td>
							<td>
							<input type="hidden" name="trapdid" value="'.$stationsids->tstid.'">
							<input type="hidden" name="tableid" value="'.$trucksids->tid.'">
							<input type="hidden" name="trapdcamount" value="'.($remaining-$paidamount).'">
							<input type="hidden" name="tabletype" value="'.$identity.'">
							<input type="hidden" name="trapdctakenfrom" value="0">
							<input type="hidden" name="trapdcdescription" value="Managed From Sodtware">
							<input type="hidden" name="trapdcdate" value="'.date('m/d/Y').'">
							<input type="hidden" name="trapdctruckbuysale" value="2">
							<input type="submit" class="btn btn-success" value="Done"></td>
							</tr>
							<form>
							';
						}else{

						}

					}
				}else{
					// echo 'not found <br>';
				}
			}


		}
		$datafortable .='</tbody></table>';

		// echo $datafortable;
		$this->session->set_userdata('manage_station_amount',$numberofsamedat );
		$this->session->set_userdata('all_manageable_data',$datafortable);

		// $data['get_payable_from_all_table_on_truck_and_station_id'] = $this->main_model->get_payable_from_all_table_on_truck_and_station_id()
	}

	public function close_from_management(){

			$tabletype = $data = $this->input->post('tabletype');
			// $aftertable='p';
			// echo '<pre>';
			// print_r($_SERVER);
			$this->load->library('user_agent');


			for($i=0; $i<=1; $i++){
				if($tabletype=='r'){
					$this->load->model('PendingClosed_model');
					$data = $this->input->post();
					$data['tabletype'] = $tabletype;
					$tabletype='p';
					$this->PendingClosed_model->add_data($data);
				}else{

					$this->load->model('PendingClosed_model');
					$data = $this->input->post();
					$data['tabletype'] = $tabletype;
					$tabletype='r';
					$this->PendingClosed_model->add_data($data);
				}

			}
			$this->session->set_flashdata('datasaved',1);
			$this->check_same_remaining_and_pending();
            redirect($this->agent->referrer());
	}
     public function index()
    {
		$this->check_same_remaining_and_pending();
    	$this->load->model('main_model');
		$data['totalremaining'] = $this->main_model->getremainingamountfromalltable();
		$data['totalpending'] = $this->main_model->getpendingamountfromalltable();
		$data['get_sumof_closed_amount'] = $this->main_model->get_sumof_all_table_closed_amount();
		$data['get_sumof_all_table_closed_amount_payable'] = $this->main_model->get_sumof_all_table_closed_amount_payable();
		$data['sum_of_have_haji_jani'] = $this->main_model->sum_of_have_haji_jani();

		$data['get_station'] = $this->main_model->get_station();
		// echo '<pre>';
		// print_r($data);
		// die;
		// $trow = $this->main_model->notification();
		// $paidonInstallment = $this->main_model->notificationremainingamountfromtremaingingclose($trow[0]->trapdid);
		// $data['totalofaperson'] = $trow[0]->trapdamount;
		// $data['personName'] = $trow[0]->trapdname;
		// $data['paidonInstallment'] = $paidonInstallment;
        $this->load->view('layout/header',$data);
		$this->load->view('dashboard_2',$data);
		$this->load->view('layout/footer');
    }
	public function totalstationcountview()
    {

    	$this->load->model('main_model');
		$data['totalstationcountview'] = $this->main_model->totalstationcountview();


            $this->load->view('layout/header');
			$this->load->view('totalstationview',$data);
			$this->load->view('layout/footer');
	}

	public function hajijani(){

		$data['sum_of_have_haji_jani'] = $this->main_model->sum_of_have_haji_jani();
		$data['get_haji_amount_from_tdailytrip'] = $this->main_model->get_haji_amount_from_tdailytrip();
		$data['get_haji_amount_from_ttripdetaail'] = $this->main_model->get_haji_amount_from_ttripdetaail();
		$data['get_haji_amount_from_treturntrip'] = $this->main_model->get_haji_amount_from_treturntrip();
		$data['get_haji_amount_from_tothermaterial'] = $this->main_model->get_haji_amount_from_tothermaterial();
		$data['get_haji_amount_from_remaining_closed'] = $this->main_model->get_haji_amount_from_remaining_closed();
		$data['get_sum_all_returened_from_hajijani'] = $this->main_model->get_sum_all_returened_from_hajijani();
		$data['get_all_returened_from_hajijani_list'] = $this->main_model->get_all_returened_from_hajijani_list();
		$data['hajijani_taken_from_others'] = $this->main_model->hajijani_taken_from_others();

		$this->load->view('layout/header');
		$this->load->view('hajijani',$data);
		$this->load->view('layout/footer');


	}



	public function add_truck_closed($trapdid=0, $tableid='0')
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('trapdid' , 'name' , 'required');
		$this->form_validation->set_rules('trapdcdate' , 'date' , 'required');
		$this->form_validation->set_rules('tableid' , 'Trip' , 'required');
		$this->form_validation->set_rules('trapdcamount' , 'paid Amount' , 'required');
		$trapdid = $this->input->post('trapdid');
		if($this->form_validation->run())
		{
			$data = $this->input->post();
			$this->session->set_flashdata('datasaved',1);
			unset($data['addclose']);
			unset($data['xyz']);
			$selectedID = $data['trapdid'];
			$this->ClosedModel->add_data($data);
      redirect(base_url() . 'main/remainingreportview/4/'.$selectedID);
		}
	 else
        {
            $remainingnameids = $this->ClosedModel->remainingnameids();
            $data = array(
            "remainingnameids" =>$remainingnameids,
            "main_content" =>'RemainingClosed'
            );
			$this->remainingreportview('4',$trapdid);
		}
	}

	public function add_truck_closed_payable($trapdid=0, $tableid='0')
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('trapdid' , 'name' , 'required');
		$this->form_validation->set_rules('trapdcdate' , 'date' , 'required');
		$this->form_validation->set_rules('tableid' , 'Trip' , 'required');
		$this->form_validation->set_rules('trapdcamount' , 'paid Amount' , 'required');
		$selectedID = $this->input->post('trapdid');
		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();

			unset($data['addclose']);
			unset($data['xyz']);
			$this->session->set_flashdata('datasaved',1);
			$selectedID = $data['trapdid'];
			$this->ClosedModel->add_data($data);
			// $this->add_close();
                redirect(base_url() . 'main/payablereportview/4/'.$selectedID);
		}
	 else
        {
            //false
            $remainingnameids = $this->ClosedModel->remainingnameids();
            $data = array(
            	'remainingnameids'=>$remainingnameids,
                "main_content" =>'RemainingClosed'

            );
            // $this->load->view('default', $data)

			$this->payablereportview('4',$selectedID);
		}
    }
	public function addhajijani(){
		$hjamount = $this->input->post('hjamount');
		$hjdate = $this->input->post('hjdate');
		$hjdetails = $this->input->post('hjdetails');

		$this->form_validation->set_rules('hjamount' , 'Amount' , 'required');
		$this->form_validation->set_rules('hjdate' , 'Date' , 'required');

		if(isset($hjamount)){
		$data['hajijaniFormSubmitted']="true";
		if($this->form_validation->run())
		{
			$this->main_model->addhajijani($hjamount, $hjdate, $hjdetails);
			$data['hajijaniFormSubmitted'] = "true";
			$data['sum_of_have_haji_jani'] = $this->main_model->sum_of_have_haji_jani();
			$data['get_haji_amount_from_tdailytrip'] = $this->main_model->get_haji_amount_from_tdailytrip();
			$data['get_haji_amount_from_ttripdetaail'] = $this->main_model->get_haji_amount_from_ttripdetaail();
			$data['get_haji_amount_from_treturntrip'] = $this->main_model->get_haji_amount_from_treturntrip();
			$data['get_haji_amount_from_tothermaterial'] = $this->main_model->get_haji_amount_from_tothermaterial();
			$data['get_haji_amount_from_remaining_closed'] = $this->main_model->get_haji_amount_from_remaining_closed();
			$data['get_sum_all_returened_from_hajijani'] = $this->main_model->get_sum_all_returened_from_hajijani();
			$data['get_all_returened_from_hajijani_list'] = $this->main_model->get_all_returened_from_hajijani_list();
			$data['hajijani_taken_from_others'] = $this->main_model->hajijani_taken_from_others();
			$this->session->set_flashdata('datasaved',1);
			$this->load->view('layout/header');
			$this->load->view('hajijani',$data);
			$this->load->view('layout/footer');

		}else{
			$data['hajijaniFormSubmitted'] = "false";
			$data['sum_of_have_haji_jani'] = $this->main_model->sum_of_have_haji_jani();
			$data['get_haji_amount_from_tdailytrip'] = $this->main_model->get_haji_amount_from_tdailytrip();
			$data['get_haji_amount_from_ttripdetaail'] = $this->main_model->get_haji_amount_from_ttripdetaail();
			$data['get_haji_amount_from_treturntrip'] = $this->main_model->get_haji_amount_from_treturntrip();
			$data['get_haji_amount_from_tothermaterial'] = $this->main_model->get_haji_amount_from_tothermaterial();
			$data['get_haji_amount_from_remaining_closed'] = $this->main_model->get_haji_amount_from_remaining_closed();
			$data['get_sum_all_returened_from_hajijani'] = $this->main_model->get_sum_all_returened_from_hajijani();
			$data['get_all_returened_from_hajijani_list'] = $this->main_model->get_all_returened_from_hajijani_list();
			$data['hajijani_taken_from_others'] = $this->main_model->hajijani_taken_from_others();

			$this->load->view('layout/header');
			$this->load->view('hajijani',$data);
			$this->load->view('layout/footer');
		}
	}else{
		redirect('main/hajijani');
	}

	}

	public function get_all_returened_from_hajijani(){

	}
 	public function remainingreport()
    {

    	$this->load->model('main_model');
		$data['dailytrip_commission_details'] = $this->main_model->getallremainingamountfrom_dailytrip_commission();

		$data['tripsummary'] = $this->main_model->get_all_remaining_amount_from_ttripsummary_as_tripDetail();

		$data['othermaterialremaining'] = $this->main_model->get_all_remaining_amount_from_tothermaterial();

		$data['returntrip_remaining'] = $this->main_model->get_all_remaining_amount_from_returntrip();

		$data['truckremaining'] = $this->main_model->get_all_remaining_amount_from_ttruck();

            $this->load->view('layout/header');
			$this->load->view('remaining',$data);
			$this->load->view('layout/footer');
	}

	public function get_all_details_from_one_table_on_stationid(){
		$stationid = $this->input->post('stationid');
		$tablename = $this->input->post('tablename');
		$remain_columname = $this->input->post('remain_columname');
		$station_columname = $this->input->post('station_columname');
		$stationname = $this->input->post('stationname');
		$data = $this->main_model->get_all_details_from_one_table_on_stationid($stationid,$tablename,$remain_columname ,$station_columname);
		$totaltable='';

		$totaltable .='<table border="1" class="table table-striped">';
		$totaltable .='<tr> <td colspan="2">Transport Name</td> <td colspan="2">'.$stationname.'</td></tr>';
		foreach($data as $data){
			$td = 0;
			foreach($data as $key => $value){
				$tr = '';
				$keys ='';
				if(strpos($key,'id') ||
				 strpos($key,'status') ||
				 strpos($key,'image')||
				 strpos($key,'rrentdate')||
				 strpos($key,'station')||
				 strpos($key,'nt_da')||
				 strpos($key,'rdate')||
				 strpos($key,'nsport')||
				 strpos($key,'daclosed')){
					// $tr .= '<tr><td colspan="2">Find id</td></tr>';
				}else{
					if(strpos($key,'arturedate')){
						$keys ='Departure Date';
					}else if(strpos($key,'container')){
						$keys ='Container Type';
					}else if(strpos($key,'eightsp')){
						$keys ='Weight Space';
					}else if(strpos($key,'weight')){
						$keys ='Weight';
					}else if(strpos($key,'brok')){
						$keys ='Brokery';
					}else if(strpos($key,'totalamount')){
						$keys ='Total Amount';
					}else if(strpos($key,'cash')){
						$keys ='Cash';
					}else if(strpos($key,'river')){
						$keys ='Driver';
					}else if(strpos($key,'jani')){
						$keys ='Haji Jani';
					}else if(strpos($key,'heaque')){
						$keys ='Cheaque';
					}else if(strpos($key,'paydate')){
						$keys ='Payment Date';
					}else if(strpos($key,'info')){
						$keys ='Info';
					}else if(strpos($key,'frieght')){
						$keys ='V-frieght';
					}else if(strpos($key,'dvcomission') || strpos($key,'vancecom')){
						$keys ='Advance Comission';
					}else if(strpos($key,'endcomis')||strpos($key,'dingcomis')){
						$keys ='Pending Comission';
					}else if(strpos($key,'custom')){
						$keys ='Custom';
					}else if(strpos($key,'xweight')){
						$keys ='Extra Weight';
					}else if(strpos($key,'nloading')){
						$keys ='Unloading';
					}else if(strpos($key,'inaam')){
						$keys ='Inaam';
					}else if(strpos($key,'ehari')){
						$keys ='Dehari';
					}else if(strpos($key,'ptycontainer')){
						$keys ='Empty Container';
					}else if(strpos($key,'mushiana')||strpos($key,'munshi')){
						$keys ='Mushiana';
					}else if(strpos($key,'iningreci')|| strpos($key,'inreci')){
						$keys ='Remaining Recieve';
					}else if(strpos($key,'mainingamount')){
						$keys ='Remaining Amount';
					}else if(strpos($key,'aymetndate') || strpos($key,'aymentdate')){
						$keys ='Payment Date';
					}else if(strpos($key,'inam')){
						$keys ='Inaam';
					}else if(strpos($key,'sno')){
						$keys ='Serial No';
					}else if(strpos($key,'aterial')){
						$keys ='Other Material';
					}else if(strpos($key,'rivaldate')|| strpos($key,'riving')){
						$keys ='Arrival Date';
					}else if(strpos($key,'from')){
						$keys ='From';
					}else if(strpos($key,'oil')){
						$keys ='Oil';
					}
					else if(strpos($key,'talinco')){
						$keys ='Total Income';
					}
					else if(strpos($key,'talexpenset')){
						$keys ='Total Expense ';
					}
					else if(strpos($key,'otalsavi')){
						$keys ='Total Savings';
					}
					else if(strpos($key,'tok')){
						$keys ='To Karachi';
					}
					else if(strpos($key,'to')){
						$keys ='To';
					}else if(strpos($key,'izeamou')){
						$keys ='Trip Prize';
					}else if(strpos($key,'intain')){
						$keys ='Truck Maintainance';
					}else if(strpos($key,'polic')){
						$keys ='Police';
					}else if(strpos($key,'descripti')){
						$keys ='Description';
					}else if(strpos($key,'ebitamo')){
						$keys ='Debit Amount';
					}else if(strpos($key,'vechicleamo')){
						$keys ='Vechicle Amount';
					}else if(strpos($key,'2amount')){
						$keys ='2 Amount';
					}else if(strpos($key,'alaryamou')){
						$keys ='Salary Amount';
					}else if(strpos($key,'daoamount')){
						$keys ='Driver Amount';
					}else if(strpos($key,'cdexpens')){
						$keys ='Description Expense';
					}else if(strpos($key,'enseamoun')){
						$keys ='Expense Amount';
					}else if(strpos($key,'biltyreci')){
						$keys ='Bilty Recieving Port';
					}else if(strpos($key,'arerat')){
						$keys ='Fare Rate';
					}else if(strpos($key,'rchoonreci')){
						$keys ='Parchoon Recieving';
					}else if(strpos($key,'turnvfrei')){
						$keys ='Return Freight';
					}else if(strpos($key,'shiftin')){
						$keys ='Shifting';
					}else if(strpos($key,'reditamo')){
						$keys ='Credit Amount';
					}else if(strpos($key,'eturnamou')){
						$keys ='Return Amount';
					}else if(strpos($key,'yreb')){
						$keys ='Tyre Bought';
					}else if(strpos($key,'tyres')){
						$keys ='Tyre Sell';
					}else if(strpos($key,'locati')){
						$keys ='Location';
					}else if(strpos($key,'foodexp')){
						$keys ='Food Expense';
					}else if(strpos($key,'xtrafaream')){
						$keys ='Extra Fare Amountl';
					}else if(strpos($key,'tyres')){
						$keys ='Tyre Sell';
					}else if(strpos($key,'mainingcommi')){
						$keys ='Remaining Commission';
					}else if(strpos($key,'kanta')){
						$keys ='Kanta';
					}else if(strpos($key,'ointpri')){
						$keys ='Point prize';
					}else if(strpos($key,'cievedamo')){
						$keys ='Recieved Amount';
					}else if(strpos($key,'tyres')){
						$keys ='Tyre Sell';
					}else{
						$keys = $key;
					}


					if($td==3){
						$td=0;
						$tr .='</tr>';
					}else if($td==2){

					    $tr .='<td>'.$keys.'</td><td>'.$value.'</td>';
					}else if($td==1){
						$tr .= '<tr><td>'.$keys.'</td><td>'.$value.'</td>';
					}


					$td =$td+1;

				}
				$totaltable .= $tr;

			}
			$totaltable .='</table> <br>';
			$totaltable .= '<table border="1" class="table table-striped">';
		}
		$totaltable .= '</table>';


		echo $totaltable;
	}


 public function remainingreportview($status,$id)
    {

    		$this->load->model('main_model');
    		if($status==1){
    		$data['pageload'] = $status;
			$data['tripdetailremainingview'] = $this->main_model->get_all_remaining_amount_from_dailytrip_view($id);
			$data['get_dailytrip_remaining_after_paid_amount_view_list'] = $this->main_model->get_dailytrip_remaining_after_paid_amount_view_list($id);

			}else if($status==2){
				$data['pageload'] = $status;
				$data['dailytripremainingview'] = $this->main_model->get_tripdetil_remaining_after_paid_amount_view($id);
				$data['get_tripdetail_remaining_after_paid_amount_view_list'] = $this->main_model->get_tripdetail_remaining_after_paid_amount_view_list($id);
				// print_r($data['dailytripremainingview']);
			}else if($status==3){
    		$data['pageload'] = $status;
			$data['othermaterialremainingview'] = $this->main_model->get_othermaterial_remaining_after_paid_amount_view($id);
			$data['afterpaidremainingdetail'] = $this->main_model->get_othermaterial_remaining_after_paid_amount_view_list($id);

			}else if($status==4){



			$data['pageload'] = $status;
			$data['get_name_of_remaining_of_sold_truck'] = $this->main_model->get_name_of_remaining_of_sold_truck();
			$data['selected_person'] = $id;


			$data['truckremainingview'] = $this->main_model->get_truck_remaining_after_paid_amount_view($id);
			$data['afterpaidremainingdetail'] = $this->main_model->get_truck_remaining_after_paid_amount_view_list($id);



			}else if($status==5){


				$data['pageload'] = $status;
				$data['return_remainingview'] = $this->main_model->get_return_remaining_after_paid_amount_view($id);
				$data['afterpaidremainingdetail'] = $this->main_model->get_return_remaining_after_paid_amount_view_list($id);
				}

			$data['trapdid'] = $id;
            $this->load->view('layout/header');
			$this->load->view('Remainingreportview',$data);
			$this->load->view('layout/footer');
	}

	public function payablereport()
    {

    	$this->load->model('main_model');
	// 	$data['tripdetailremaining'] = $this->main_model->getallpayableamountfromttripdetail();

	// 	$data['othermaterialremaining'] = $this->main_model->getallpayableamountfromtothermaterial();
	//    $data['truckremaining'] = $this->main_model->getallpayableamountfromttruck();

	    $data['dailytrip_commission_details_payable'] = $this->main_model->getallpayableamountfrom_dailytrip_commission();

		$data['tripsummary_payable'] = $this->main_model->get_all_payable_amount_from_ttripsummary_as_tripDetail();

		$data['othermaterial_payable'] = $this->main_model->get_all_payable_amount_from_tothermaterial();

		$data['truck_payable'] = $this->main_model->get_all_payable_amount_from_ttruck();

		$data['pump_payable_details'] = $this->main_model->pump_payable_details();

		$data['returntrip_payable'] = $this->main_model->get_all_payable_amount_from_returntrip();
        $data['get_all_truck_maintainance'] = $this->main_model->get_all_truck_maintainance();
            $this->load->view('layout/header');
			$this->load->view('payable',$data);
			$this->load->view('layout/footer');
	}

	public function get_truck_maintainance(){
		$id = $this->input->post('id');
		$data = $this->main_model->get_truck_maintainance($id);
		echo json_encode($data);
	}
	public function payablereportview($status,$id)
    {

    		$this->load->model('main_model');
    		if($status==1){
    		$data['pageload'] = $status;
			$data['get_all_payable_amount_from_dailytrip_view'] = $this->main_model->get_all_payable_amount_from_dailytrip_view($id);
			$data['get_dailytrip_payable_after_paid_amount_view_list'] = $this->main_model->get_dailytrip_payable_after_paid_amount_view_list($id);

			}else if($status==2){
    		$data['pageload'] = $status;
			$data['get_tripdetil_payable_after_paid_amount_view'] = $this->main_model->get_tripdetil_payable_after_paid_amount_view($id);
			$data['get_tripdetail_payable_after_paid_amount_view_list'] = $this->main_model->get_tripdetail_payable_after_paid_amount_view_list($id);

			}else if($status==3){
    		$data['pageload'] = $status;
			$data['get_othermaterial_payable_after_paid_amount_view'] = $this->main_model->get_othermaterial_payable_after_paid_amount_view($id);
			$data['get_othermaterial_payable_after_paid_amount_view_list'] = $this->main_model->get_othermaterial_payable_after_paid_amount_view_list($id);
			}
			else if($status==4){


    		$data['pageload'] = $status;
			$data['get_truck_payable_after_paid_amount_view'] = $this->main_model->get_truck_payable_after_paid_amount_view($id);
			$data['get_truck_payable_after_paid_amount_view_list'] = $this->main_model->get_truck_payable_after_paid_amount_view_list($id);
			$data['selected_person'] = $id;
			$data['get_name_of_remaining_of_sold_truck'] = $this->main_model->get_name_of_remaining_of_bought_truck();


			}
			else if($status==5){
    		$data['pageload'] = $status;
			$data['get_return_payable_after_paid_amount_view'] = $this->main_model->get_return_payable_after_paid_amount_view($id);
			$data['get_return_payable_after_paid_amount_view_list'] = $this->main_model->get_return_payable_after_paid_amount_view_list($id);
			}


			$data['trapdid'] = $id;


            $this->load->view('layout/header');
			$this->load->view('payablereportview',$data);
			$this->load->view('layout/footer');
    }


    // public function gettripdetilremainingafterpaidamountview($id){

    // 	$data['afterpaidremainingdetail'] $this->main_model->gettripdetilremainingafterpaidamountview($id);
    // 	// $data['afterpaidamount'] = $this->main_model->gettripdetilremainingafterpaidamount($id);
    // }




	//Truck Maintenance Section

	public function add_maintenance()
	{
		 $truck = $this->TruckModel->fetch_data();
		 $driver = $this->DriverModel->fetch_data();
		 $oil = $this->OilModel->fetch_data();
		 $tyre = $this->TyreModel->fetch_data();
		 $shop = $this->ShopModel->fetch_data('*', array('tstype'=>'other'));
		 $data=array(
		 	'truck' => $truck,
		 	'driver' => $driver,
		 	'oil' => $oil,
		 	'tyre' => $tyre,
		 	'shop' => $shop,
            'main_content'=>'TruckMaintenance'
        );

        $this->load->view('default' , $data);
	}

	public function maintenance_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tmtruck_id' , 'truck' , 'required');
		$this->form_validation->set_rules('tmdriver_id' , 'driver' , 'required');


		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addmaintenance']);
			$this->MaintenanceModel->add_data($data);
                redirect(base_url() . 'main/maintnance');
		}
	 else
        {
             //false
	         $truck = $this->TruckModel->fetch_data();
			 $driver = $this->DriverModel->fetch_data();
			 $oil = $this->OilModel->fetch_data();
			 $tyre = $this->TyreModel->fetch_data();
			 $data=array(
			 	'truck' => $truck,
			 	'driver' => $driver,
			 	'oil' => $oil,
			 	'tyre' => $tyre,
	            'main_content'=>'truckMaintenance'
	        );

        	$this->load->view('default' , $data);
        }
    }

    public function maintnance()
    {
        $this->add_maintenance();
	}


	function notificationindecatorseperatly(){

		$this->load->model('main_model');
		$data['notificationindecatorseperatly'] = $this->main_model->notificationindecatorseperatly();

		echo '<pre>';
		print_r($data);
		echo "==================";
		$data['tripnotic'] =  $data['notificationindecatorseperatly']['trip'];
		$data['trucknotic'] =  $data['notificationindecatorseperatly']['truck'];
		$data['othernotic'] =  $data['notificationindecatorseperatly']['other'];
		die;

		$this->load->view('layout/header');
		$this->load->view('notification',$data);
		$this->load->view('layout/footer');
	}

	function all_notification($category=0){

		$data['truck_notification_rows'] = $this->main_model->truck_notification_rows();
		$data['category'] = $category;
		$data['truck_no_of_notyfy'] = count($data['truck_notification_rows']);
		$this->load->view('layout/header');
		$this->load->view('Notification',$data);
		$this->load->view('layout/footer');
	}


	function get_truck_notification_details_on_tnotify_id(){
		$tnid = $this->input->post('tid');
		$truck_notification = $this->main_model->get_truck_notification_details_on_tnotify_id($tnid);


				$set_details = '';
					$insuranceexpirydate = date('m/d/Y', strtotime($truck_notification->tninsuranceexpirydate. ' - 25 day'));
					$permitexpirydate = date('m/d/Y', strtotime($truck_notification->tnpermitexpirydate. ' - 25 day'));
					$fitnessexpirydate = date('m/d/Y', strtotime($truck_notification->tnfitnessexpirydate. ' - 25 day'));
          $tntexexpirydate = date('m/d/Y', strtotime($truck_notification->tntexexpirydate. ' - 25 day'));

          $insuranceexpirydate_before = date('m/d/Y', strtotime($truck_notification->tninsuranceexpirydate));
          $permitexpirydate_before = date('m/d/Y', strtotime($truck_notification->tnpermitexpirydate));
          $fitnessexpirydate_before = date('m/d/Y', strtotime($truck_notification->tnfitnessexpirydate));
          $tntexexpirydate_before = date('m/d/Y', strtotime($truck_notification->tntexexpirydate));

          $set_details .= ' <h2>Truck No: <b>'.$truck_notification->tntnumber.'</b></h2>';
					$currentdate = new DateTime(date('m/d/Y'));

					if(strtotime(date('m/d/Y'))>strtotime($insuranceexpirydate)){

						$insdate = new DateTime($insuranceexpirydate);
            $insdate_before = new DateTime($insuranceexpirydate_before);
						if($currentdate>$insdate && $currentdate<$insdate_before){
							$days  = $insdate->diff($currentdate)->format('%a');
							$set_details .= '<p><b>Insurance  </b>is going to be Expired. <b> ( '.$days.' days Left)</b></p>';
						}else{
							$set_details .= '<p><b>Insurance  </b>has been <b>Expired</b></p>';
						}

					}if(strtotime(date('m/d/Y'))>strtotime($permitexpirydate)){

						$permit = new DateTime($permitexpirydate);
            $permit_before = new DateTime($permitexpirydate_before);
						if($currentdate>$permit && $currentdate<$permit_before){
							$days1  = $permit->diff($currentdate)->format('%a');
							$set_details .= '<p><b>Permit  </b>is going to be Expired. <b> ( '.$days1.' days Left)</b></p>';
						}else{
							$set_details .= '<p><b>Permit  </b>has been <b>Expired</b></p>';
						}


					}if(strtotime(date('m/d/Y'))>strtotime($fitnessexpirydate)){
						$fitnes = new DateTime($fitnessexpirydate);
            $fitnes_before = new DateTime($fitnessexpirydate_before);
						if($currentdate>$fitnes && $currentdate<$fitnes_before){
							$days3  = $fitnes->diff($currentdate)->format('%a');
							$set_details .= '<p><b>Fitness  </b>is going to be Expired. <b> ( '.$days3.' days Left)</b></p>';
						}else{
							$set_details .= '<p><b>Fitness  </b>has been <b>Expired</b></p>';
						}
					}	if(strtotime(date('m/d/Y'))>strtotime($tntexexpirydate)){

  						$tesdate = new DateTime($tntexexpirydate);
              $tesdate_before = new DateTime($tntexexpirydate_before);
  						if($currentdate>$tesdate && $currentdate<$tesdate_before){
  							$days  = $tesdate->diff($currentdate)->format('%a');
  							$set_details .= '<p><b>Tex Date  </b>is going to be Expired. <b> ( '.$days.' days Left)</b></p>';
  						}else{
  							$set_details .= '<p><b>Tex Date  </b>has been <b>Expired</b></p>';
  						}

  					}else{
						$set_details .= '<p><b>All Thing is up to date</b></p>';
					}
					echo $set_details ;



	}

	public function get_notify_dates(){
		$tnid = $this->input->post('id');
		$data = $this->main_model->get_notify_dates($tnid);
		echo json_encode($data);
	}

	public function update_truck_dates(){
		$data = $this->input->post();
		$id = $data['tnid'];
		unset($data['tnid']);
		$this->main_model->update_truck_dates($data, $id);
		redirect('main/all_notification');
	}
	function tripnotification($category=0){
		$datetime1 = strtotime(date('m/d/Y'),'+ 1 day');
		$datetime2 = date('m/d/Y');

		// $interval = $datetime1->diff($datetime2);
		// echo $interval->format('%m-%d-%Y');

		// $this->load->model('main_model');
		// $data['tripnotification'] = $this->main_model->tripnotification();
		// $data['category'] = $category;
		// // echo '<pre>';
		// // print_r($data);
		// // die;
		// $data['notificationindecatorseperatly'] = $this->main_model->notificationindecatorseperatly();
		// $data['tripnotic'] =  $data['notificationindecatorseperatly']['trip'];
		// $data['trucknotic'] =  $data['notificationindecatorseperatly']['truck'];
		// $data['othernotic'] =  $data['notificationindecatorseperatly']['other'];

		// $this->load->view('layout/header');
		// $this->load->view('notification',$data);
		// $this->load->view('layout/footer');
	}


	function othermaterialnotification($category){
		$this->load->model('main_model');
		$data['othermaterialnotification'] = $this->main_model->othermaterialnotification();
		$data['category'] = $category;
		// echo '<pre>';
		// print_r($trow);
		// die;
		$data['notificationindecatorseperatly'] = $this->main_model->notificationindecatorseperatly();
		$data['tripnotic'] =  $data['notificationindecatorseperatly']['trip'];
		$data['trucknotic'] =  $data['notificationindecatorseperatly']['truck'];
		$data['othernotic'] =  $data['notificationindecatorseperatly']['other'];

		$this->load->view('layout/header');
		$this->load->view('notification',$data);
		$this->load->view('layout/footer');
	}


	function trucknotification($category){
		$this->load->model('main_model');
		$data['trucknotification'] = $this->main_model->trucknotification();
		$data['category'] = $category;
		// echo '<pre>';
		// print_r($trow);
		// die;
		$data['notificationindecatorseperatly'] = $this->main_model->notificationindecatorseperatly();
		$data['tripnotic'] =  $data['notificationindecatorseperatly']['trip'];
		$data['trucknotic'] =  $data['notificationindecatorseperatly']['truck'];
		$data['othernotic'] =  $data['notificationindecatorseperatly']['other'];

		$this->load->view('layout/header');
		$this->load->view('notification',$data);
		$this->load->view('layout/footer');
	}


	function tyrenotification($category){
		$this->load->model('main_model');
		$data['tyrenotification'] = $this->main_model->tyrenotification();
		$data['category'] = $category;
		// echo '<pre>';
		// print_r($trow);
		// die;

		$this->load->view('layout/header');
		$this->load->view('notification',$data);
		$this->load->view('layout/footer');
	}


	function viewnotification($notifiyId, $category, $fromId, $tn, $tcolmn){
		$this->load->model('main_model');
		$data = $this->main_model->viewnotification($notifiyId, $category, $fromId, $tn, $tcolmn);
		echo '<pre>';
		print_r($data);
		die;
	}

	function viewnotifications(){
		$this->load->model('main_model');
		$notifiyId = $this->input->post('tnid');
		 $category = $this->input->post('category');
		  $fromId= $this->input->post('fromid');
		   $tn = $this->input->post('tablename');
		    $tcolmn = $this->input->post('columname');
		 $data = $this->main_model->viewnotification($notifiyId, $category, $fromId, $tn, $tcolmn);
		//echo $tn;
		echo json_encode($data);


	}

	function notify()
    {


		$trow = $this->main_model->notification();
		//$data = $this->main_model->notificationremainingamountfromtremaingingclose($trow[0]->trapdid);
		echo '<pre>';
		print_r($trow);
		die;
		// // return $trow;
		// echo '<pre>';
		// print_r($trow);
		// echo '</pre>';
		// echo '=========================================';
		// echo '<br>recieveabel '. $trow[0]->trapdamount .'<br>';
		// echo 'paid '.$data;
		// // Declare and define two dates

		// die;
		// $data['totalofaperson'] = $trow[0]->trapdamount;
		// $data['paidonInstallment'] = $paidonInstallment;
		$data=array(
			'trow'=>$trow
		);

		$this->load->view('layout/header', $data);
		$this->load->view('notification',$data);
		$this->load->view('layout/footer');
	}

    // public function noti()
    // {


	// 	$trow = $this->NotificationModel->fetch_data('*',array('ttdstatus' => '1'));



    // }



	//End truck maintenance


}

?>
