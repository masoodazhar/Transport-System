<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendingClosed extends CI_Controller {

	//shop section

	// public function index()
	// {
	// 	$data=array(
 //            'main_content'=>'city'
 //        );
 //        $this->load->view('default' , $data);
	// } 

	public function add_close($stationid=0, $truckid=0)
	{
		$this->load->model('PendingClosed_model');
		$this->load->model('main_model');
		$remainingnameids = $this->PendingClosed_model->remainingnameids();
		 $data=array(
		 	'remainingnameids'=>$remainingnameids,
            'main_content'=>'pendingClosed'
		);
		
		
		$data['get_truck_name'] = $this->PendingClosed_model->get_truck_name($stationid);
		
		// $data['taledata'] = array('tdailytrip'=>'Commission','tothermaterial'=>'Parchoon','ttripdetail'=>'Voucher','treturntrip'=>'Return Trip');

		$data['get_truck_name_and_number'] = $this->PendingClosed_model->get_truck_name_and_number();

		$text = '';
		if($truckid=='0'){
			$text = 'Total';
			$data['get_all_payable_from_all_table_on_station_id'] = $this->PendingClosed_model->get_all_payable_from_all_table_on_station_id($stationid);
			$data['get_sumof_closed_amount_by_personid'] = $this->PendingClosed_model->get_sumof_all_table_closed_amount_by_personid_payable($stationid);
			$data['get_all_closed_amount_by_station_full_details'] = $this->PendingClosed_model->get_all_closed_amount_by_station_full_details_payable($stationid);
			$data['get_remaining_from_all_table_on_truck_id'] = $this->PendingClosed_model->get_payable_from_all_table_on_truck_id($stationid, $truckid);

		}else{
			$text = '(<strong>'.$this->PendingClosed_model->get_only_truck_number($truckid).'</strong>)';
			$data['get_all_payable_from_all_table_on_station_id'] = $this->PendingClosed_model->get_payable_from_all_table_on_truck_id($stationid, $truckid);
			$data['get_sumof_closed_amount_by_personid'] = $this->PendingClosed_model->get_sumof_all_table_closed_amount_by_truck_and_station_id_payable($stationid	, $truckid);
			// $data['get_all_closed_amount_by_station_full_details'] = $this->PendingClosed_model->get_one_closed_amount_by_station_full_details($stationid, $truckid,'tdremainingamount','tstid');
		}

		
		// $data['get_all_closed_amount_by_personid'] = $this->PendingClosed_model->get_all_closed_amount_by_personid($trapdid);
		// $data['get_sumof_closed_amount_by_personid'] = $this->PendingClosed_model->get_sumof_closed_amount_by_personid($trapdid);

		$data['text'] = $text;
		// $data['stationname'] = $this->PendingClosed_model->get_station_name($stationid);
		// print($data['stationname']); die;
		$data['get_all_remaining_from_all_table_on_station_id_for_view'] = $this->PendingClosed_model->get_all_payable_from_all_table_on_station_id($stationid);
		$data['get_sumof_closed_amount_by_personid_for_view'] = $this->PendingClosed_model->get_sumof_all_table_closed_amount_by_personid_payable($stationid);
		$data['get_all_closed_amount_by_station_full_details_for_view'] = $this->PendingClosed_model->get_all_closed_amount_by_station_full_details_payable($stationid);
		
		// print_r($data['get_all_closed_amount_by_station_full_details_for_view']); die;
		
		$data['get_sumof_closed_amount'] = $this->main_model->get_sumof_all_table_closed_amount_payable();
		$data['totalremaining'] = $this->main_model->getpendingamountfromalltable();
		

		$data['selected_person'] = $stationid;
		$data['selected_truck'] = $truckid;
        $this->load->view('default' , $data);
	}

	public function close_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('trapdid' , 'name' , 'required');
		$this->form_validation->set_rules('trapdcdate' , 'date' , 'required');
		$this->form_validation->set_rules('tableid' , 'Truck Number' , 'required');
		$this->form_validation->set_rules('trapdcamount' , 'paid Amount' , 'required');
		$selectedID = $this->input->post('trapdid');
		$tableid = $this->input->post('tableid');
		if($tableid==''){
			$tableid=0;
		}
		if(isset($selectedID)){
		if($this->form_validation->run())
		{
			//true

            $data = $this->input->post();
			$data['trapdctakenfrom'] = 1;
			if($tableid==''){
				$data['tableid']=0;
			}
			unset($data['addclose']);
			unset($data['xyz']);
			$this->session->set_flashdata('datasaved',1);
			$selectedID = $data['trapdid'];
			$this->PendingClosed_model->add_data($data);
                redirect(base_url() . 'PendingClosed/add_close/'.$selectedID.'/'.$tableid);
		}
	 else
        {
            //false
            $remainingnameids = $this->PendingClosed_model->remainingnameids();
            $data = array(
            	'remainingnameids'=>$remainingnameids,
                "main_content" =>'pendingClosed'

			);
			$this->add_close($selectedID,$tableid);
            // $this->load->view('default', $data);
		}
		}else{
			redirect('PendingClosed/add_close');
		}
    }

	//end shop



	public function get_detail_of_trucks($stationid, $truckid, $table){


		
	}




	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('trapdcid');

        $result = $this->PendingClosed_model->delete_data(array('trapdcid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'PendingClosed/add_close');
    }
	//End delete shop
}

?>