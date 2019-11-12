<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Close extends CI_Controller {
	
	//shop section

	// public function index()
	// {
	// 	$data=array(
 //            'main_content'=>'city'
 //        );
 //        $this->load->view('default' , $data);
	// }

	public function add_close($stationid=0, $truckid='0')
	{
		$this->load->model('ClosedModel');
		$this->load->model('main_model');
		$remainingnameids = $this->ClosedModel->remainingnameids();
		 $data=array(
		 	'remainingnameids'=>$remainingnameids,
            'main_content'=>'RemainingClosed'
		);

		
		$data['get_truck_name'] = $this->ClosedModel->get_truck_name($stationid);
		
		// $data['taledata'] = array('tdailytrip'=>'Commission','tothermaterial'=>'Parchoon','ttripdetail'=>'Voucher','treturntrip'=>'Return Trip');

		$data['get_truck_name_and_number'] = $this->ClosedModel->get_truck_name_and_number();

		$text = '';
		if($truckid=='0'){
			$text = 'Total';
			$data['get_all_remaining_from_all_table_on_station_id'] = $this->ClosedModel->get_all_remaining_from_all_table_on_station_id($stationid);
			$data['get_sumof_closed_amount_by_personid'] = $this->ClosedModel->get_sumof_all_table_closed_amount_by_personid($stationid);
			$data['get_all_closed_amount_by_station_full_details'] = $this->ClosedModel->get_all_closed_amount_by_station_full_details($stationid);
			$data['get_remaining_from_all_table_on_truck_id'] = $this->ClosedModel->get_remaining_from_all_table_on_truck_id($stationid, $truckid);

		}else{
			$text = '(<strong>'.$this->ClosedModel->get_only_truck_number($truckid).'</strong>)';
			$data['get_all_remaining_from_all_table_on_station_id'] = $this->ClosedModel->get_remaining_from_all_table_on_truck_id($stationid, $truckid);
			$data['get_sumof_closed_amount_by_personid'] = $this->ClosedModel->get_sumof_all_table_closed_amount_by_truck_and_station_id($stationid	, $truckid);
			// $data['get_all_closed_amount_by_station_full_details'] = $this->ClosedModel->get_one_closed_amount_by_station_full_details($stationid, $truckid,'tdremainingamount','tstid');
		}
		
		// else if($truckid=='tdailytrip'){
		// 	$text = 'Commission';
		// 	$data['get_all_remaining_from_all_table_on_station_id'] = $this->ClosedModel->get_remaining_from_one_table_on_station_id($trapdid, $truckid,'tdremainingamount','tstid');
		// 	$data['get_sumof_closed_amount_by_personid'] = $this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($trapdid, $truckid);
		// 	$data['get_all_closed_amount_by_station_full_details'] = $this->ClosedModel->get_one_closed_amount_by_station_full_details($trapdid, $truckid,'tdremainingamount','tstid');
		// }else if($truckid=='tothermaterial'){
		// 	$text = 'Parchoon';
		// 	$data['get_all_remaining_from_all_table_on_station_id'] = $this->ClosedModel->get_remaining_from_one_table_on_station_id($trapdid, $truckid,'tomremainingamount','tomtransporter');
		// 	$data['get_sumof_closed_amount_by_personid'] = $this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($trapdid, $truckid);
		// 	$data['get_all_closed_amount_by_station_full_details'] = $this->ClosedModel->get_one_closed_amount_by_station_full_details($trapdid, $truckid,'tomremainingamount','tomtransporter');
		// }else if($truckid=='ttripdetail'){
		// 	$text = 'Voucher';
		// 	$data['get_all_remaining_from_all_table_on_station_id'] = $this->ClosedModel->get_remaining_from_one_table_on_station_id($trapdid, $truckid,'ttdremainingamount','ttdstation');
		// 	$data['get_sumof_closed_amount_by_personid'] = $this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($trapdid, $truckid);
		// 	$data['get_all_closed_amount_by_station_full_details'] = $this->ClosedModel->get_one_closed_amount_by_station_full_details($trapdid, $truckid,'ttdremainingamount','ttdstation');
		// }else if($truckid=='treturntrip'){
		// 	$text = 'Return Trip';
		// 	$data['get_all_remaining_from_all_table_on_station_id'] = $this->ClosedModel->get_remaining_from_one_table_on_station_id($trapdid, $truckid,'trremainingamount','tstid');
		// 	$data['get_sumof_closed_amount_by_personid'] = $this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($trapdid, $truckid);
		// 	$data['get_all_closed_amount_by_station_full_details'] = $this->ClosedModel->get_one_closed_amount_by_station_full_details($trapdid, $truckid,'trremainingamount','tstid');
		// }
		
		$data['text'] = $text;
		$data['stationname'] = $this->ClosedModel->get_station_name($stationid);
		$data['get_all_remaining_from_all_table_on_station_id_for_view'] = $this->ClosedModel->get_all_remaining_from_all_table_on_station_id($stationid);
		$data['get_sumof_closed_amount_by_personid_for_view'] = $this->ClosedModel->get_sumof_all_table_closed_amount_by_personid($stationid);
		$data['get_all_closed_amount_by_station_full_details_for_view'] = $this->ClosedModel->get_all_closed_amount_by_station_full_details($stationid);
		
		// print_r($data['get_all_closed_amount_by_station_full_details_for_view']); die;
		$data['get_sumof_closed_amount'] = $this->main_model->get_sumof_all_table_closed_amount();
		$data['totalremaining'] = $this->main_model->getremainingamountfromalltable();
		

		$data['selected_person'] = $stationid;
		$data['selected_truck'] = $truckid;
		
        $this->load->view('default' , $data);
	}

	public function close_validation($trapdid=0, $tableid='0')
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('trapdid' , 'name' , 'required');
		$this->form_validation->set_rules('trapdcdate' , 'date' , 'required');
		$this->form_validation->set_rules('tableid' , 'Truck Number' , 'required');
		$this->form_validation->set_rules('trapdcamount' , 'paid Amount' , 'required');
		$selectedID = $this->input->post('trapdid');
		$selectrtuck = $this->input->post('tableid');
		if($selectrtuck==''){
			$selectrtuck=0;
		}
		if(isset($selectedID )){
					if($this->form_validation->run())
					{
						//true

						$data = $this->input->post();
						if($selectrtuck==''){
							$data['tableid']=0;
						}
						$this->session->set_flashdata('datasaved',1);
						unset($data['addclose']);
						unset($data['xyz']);
						$selectedID = $data['trapdid'];
						$selectrtuck = $data['tableid'];
						$this->ClosedModel->add_data($data);
						
						// $this->add_close();
							redirect(base_url() . 'close/add_close/'.$selectedID.'/'. $selectrtuck);
							
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

						$this->add_close($trapdid,$selectrtuck);
					}
				}else{
					redirect('Close/add_close');
				}

    }

	//end shop

	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('trapdcid');

        $result = $this->ClosedModel->delete_data(array('trapdcid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'close/add_close');
    }
	//End delete shop
}

?>