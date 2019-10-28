<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	//Oil Section

	function __construct()
    {
		parent::__construct();
		$this->load->model('main_model');
		
		$_SESSION['notification'] = $this->main_model->notificationindecator();
    }


     public function index()
    {
    	$this->load->model('main_model');
		$data['totalremaining'] = $this->main_model->getremainingamountfromalltable();
		$data['totalpending'] = $this->main_model->getpendingamountfromalltable();
		
		$data['sum_of_have_haji_jani'] = $this->main_model->sum_of_have_haji_jani();

		$data['totaltrip'] = $this->main_model->totaltrip();
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
			
		$this->load->view('layout/header');
		$this->load->view('hajijani',$data);
		$this->load->view('layout/footer');


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

		$data['truckremaining'] = $this->main_model->get_all_remaining_amount_from_ttruck();

		$data['returntrip_remaining'] = $this->main_model->get_all_remaining_amount_from_returntrip();
        
            $this->load->view('layout/header');
			$this->load->view('remaining',$data);
			$this->load->view('layout/footer');
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
			$data['truckremainingview'] = $this->main_model->get_truck_remaining_after_paid_amount_view($id);
			$data['afterpaidremainingdetail'] = $this->main_model->get_truck_remaining_after_paid_amount_view_list($id);
			}else if($status==5){
				$data['pageload'] = $status;
				$data['return_remainingview'] = $this->main_model->get_return_remaining_after_paid_amount_view($id);
				$data['afterpaidremainingdetail'] = $this->main_model->get_return_remaining_after_paid_amount_view_list($id);
				}
			
			$data['trapdid'] = $id;
            $this->load->view('layout/header');
			$this->load->view('remainingreportview',$data);
			$this->load->view('layout/footer');	
	}
	
	public function payablereport()
    {

    	$this->load->model('main_model');
		$data['tripdetailremaining'] = $this->main_model->getallpayableamountfromttripdetail();
       
		$data['othermaterialremaining'] = $this->main_model->getallpayableamountfromtothermaterial();
       $data['truckremaining'] = $this->main_model->getallpayableamountfromttruck();
        
            $this->load->view('layout/header');
			$this->load->view('payable',$data);
			$this->load->view('layout/footer');
    }
	public function payablereportview($status,$id)
    {

    		$this->load->model('main_model');
    		if($status==1){
    		$data['pageload'] = $status;
			$data['tripdetailremainingview'] = $this->main_model->getallpayableamountfromttripdetailview($id);
			$data['afterpaidremainingdetail'] = $this->main_model->gettripdetilpayableafterpaidamountview($id);

			}else if($status==2){
    		$data['pageload'] = $status;
			$data['othermaterialremainingview'] = $this->main_model->getallpayableamountfromtotherview($id);
			$data['afterpaidremainingdetail'] = $this->main_model->gettripdetilpayableafterpaidamountview($id);
			
			}else if($status==3){
    		$data['pageload'] = $status;
			$data['truckremainingview'] = $this->main_model->getallpayableamountfromttruckview($id);
			$data['afterpaidremainingdetail'] = $this->main_model->gettripdetilpayableafterpaidamountview($id);
			}
			
			



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
            'main_content'=>'truckMaintenance'
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


	function tripnotification($category){
			
		$this->load->model('main_model');
		$data['tripnotification'] = $this->main_model->tripnotification();
		$data['category'] = $category;
		// echo '<pre>';
		// print_r($data);
		// die;
		$data['notificationindecatorseperatly'] = $this->main_model->notificationindecatorseperatly();
		$data['tripnotic'] =  $data['notificationindecatorseperatly']['trip'];
		$data['trucknotic'] =  $data['notificationindecatorseperatly']['truck'];
		$data['othernotic'] =  $data['notificationindecatorseperatly']['other'];
		
		$this->load->view('layout/header');
		$this->load->view('notification',$data);
		$this->load->view('layout/footer');
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