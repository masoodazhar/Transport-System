<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trip extends CI_Controller {

	//shop section

	public function index()
	{
			$trip_result = $this->TripModel->trip_index();
			$data=array(
			'show_trip' => $trip_result,
            'main_content'=>'Trip'
	        );
	        $this->load->view('default' , $data);
	}

	public function trip_detail($id, $serial)
	{

			$trip_result = $this->TripModel->tripdetail($id, $serial);
			$otherexpense_result = $this->TripModel->otherexpense($serial);

			$data=array(
			'trip_result'=>$trip_result,
			'otherexpense_result'=>$otherexpense_result,
            'main_content'=>'TripDetail'
	        );
	        $this->load->view('default' , $data);
	}

	public function add_trip()
	{
		    $id = $this->input->post('myId');
			$show_truck = $this->TripModel->get_truck();
			$show_city = $this->CityModel->fetch_data();
			$show_station = $this->StationModel->fetch_data('*',array('tcid'=>$id));
			$showstation = $this->StationModel->fetch_data();
			$pumpstation = $this->PumpModel->fetch_data();
			$tripdetail = $this->TripModel->get_last_id();
			$data=array(
			'showtruck'=> $show_truck,
			'showcity'=>$show_city,
			'showstation'=>$show_station,
			'showstation1'=>$showstation,
			'showpump' =>$pumpstation,
			'showtrip' =>$this->serial($tripdetail),
            'main_content'=>'addTripsummary'
        );
        $this->load->view('default' , $data);
	}

	public function serial($id){
		$ret = '';
		$id = $id+1;
		if(strlen($id)<2){
				$ret = '000'.$id;
		}else if(strlen($id)<3){
				$ret = '00'.$id;
		}else if(strlen($id)<4){
				$ret = '0'.$id;
		}else{
			$ret = $id;
		}

		
		return $ret;
	}
	public function summary_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ttddeparturedate' , 'depparture date' , 'required');
		$this->form_validation->set_rules('ttdarrivaldate' , 'depparture date' , 'required');
		$this->form_validation->set_rules('ttdfrom' , 'depparture date' , 'required');
		$this->form_validation->set_rules('tid' , 'depparture date' , 'required');
		
		if($this->form_validation->run())
		{
			$pname = $this->input->post('tpid');
			$plamount = $this->input->post('tpdamount');
			$pplamount = $this->input->post('tpdprliteramount');
			$ptid = $this->input->post('tid');
			$pliter = $this->input->post('tpdliter');
			$ppstatus = $this->input->post('tpdpaymentstatus');
			$pindex = 0;
// 			echo '<pre>';
// 			print_r($pname);
// 				echo '=======';
// 			print_r($ptid);
// 			echo '=======';
// 			print_r($pliter);
// 			print_r($plamount);
// 			print_r($pplamount);
// 			print_r($ppstatus);
// 			die;
			foreach($pname as $name){
				$this->TripModel->add_pumpdetail($ptid, $name, $pliter[$pindex], $plamount[$pindex], $ppstatus[$pindex]);
				$pindex++;
			}
            
            
			$desc = $this->input->post('toedescription');
			$amount = $this->input->post('toeamount');
			$serial = $this->input->post('toeidentity');
			$index = 0;

			foreach($desc as $val){
				$this->TripModel->add_otherexpense($serial[$index], $val,$amount[$index]);
				$index++;
			}
			
			$last_id = $this->TripModel->get_last_id();
			$data1 = array(
				'trapdtypeid' => $this->input->post('trapdtypeid'),
				'trapdname' => $this->input->post('trapdname'),
				'trapdcontact' => $this->input->post('trapdcontact'),
				'trapdamount' => $this->input->post('trremainingamount'),
				'trapdformid' => $last_id+1,
				'trapddate' => $this->input->post('trapddate'),
				'trapddescription' => $this->input->post('trapddescription'),
			 );
			$this->RemainModel->add_data($data1);
			$data2 = array(
				'trarrivingdate' => $this->input->post('trarrivingdate'),
				'tid' => $this->input->post('tid'),
				'tritem' => $this->input->post('tritem'),
				'trweight' => $this->input->post('trweight'),
				'fromtcid' => $this->input->post('fromtcid'),
				'totcid' => $this->input->post('totcid'),
				'tstid' => $this->input->post('tstid'),
				'trdriver' => $this->input->post('trdriver'),
				'trzaheer' => $this->input->post('trzaheer'),
				'trhajijani' => $this->input->post('trhajijani'),
				'trbrokery' => $this->input->post('trbrokery'),
				'trtotalamount' => $this->input->post('trtotalamount'),
				'trvfrieght' => $this->input->post('trvfrieght'),
				'tradvancecomission' => $this->input->post('tradvancecomission'),
				'trpendingcomission' => $this->input->post('trpendingcomission'),
				'trdehari' => $this->input->post('trdehari'),
				'trinaam' => $this->input->post('trinaam'),
				'trkanta' => $this->input->post('trkanta'),
				'trcustom' => $this->input->post('trcustom'),
				'trpointprize' => $this->input->post('trpointprize'),
				'trshifting' => $this->input->post('trshifting'),
				'trloading' => $this->input->post('trloading'),
				'trextraweight' => $this->input->post('trextraweight'),
				'trtokarachi' => $this->input->post('trtokarachi'),
				'trpaymentstatus' => $this->input->post('trpaymentstatus'),
				'trrecievedamount' => $this->input->post('trrecievedamount'),
				'trremainingamount' => $this->input->post('trremainingamount'),
				'trdateofpay' => $this->input->post('trdateofpay'),
			 );
			$this->ReturntripModel->add_data($data2);
			$data = $this->input->post();
			unset($data['addtripsummary']);
			unset($data['trapdtypeid']);
			unset($data['trapdname']);
			unset($data['trapddate']);
			unset($data['trapddescription']);
			unset($data['trapdcontact']);
			unset($data['toeamount']);
			unset($data['toedescription']);
			unset($data['toeidentity']);
			unset($data['tpid']);
			unset($data['tpdamount']);
			unset($data['tpdprliteramount']);
			unset($data['tpdliter']);
			unset($data['tpdpaymentstatus']);
			unset($data['trdateofpay']);
			unset($data['trremainingamount']);
			unset($data['trrecievedamount']);
			unset($data['trpaymentstatus']);
			unset($data['trtokarachi']);
			unset($data['trextraweight']);
			unset($data['trloading']);
			unset($data['trshifting']);
			unset($data['trpointprize']);
			unset($data['trcustom']);
			unset($data['trkanta']);
			unset($data['trinaam']);
			unset($data['trdehari']);
			unset($data['trpendingcomission']);
			unset($data['tradvancecomission']);
			unset($data['trvfrieght']);
			unset($data['trtotalamount']);
			unset($data['trbrokery']);
			unset($data['trhajijani']);
			unset($data['trzaheer']);
			unset($data['trdriver']);
			unset($data['tstid']);
			unset($data['totcid']);
			unset($data['fromtcid']);
			unset($data['trweight']);
			unset($data['tritem']);
			unset($data['trarrivingdate']);
			unset($data['ttddieselliter']);
			$this->TripModel->add_data($data);
            redirect(base_url() . 'trip/add_trip');
		}
	 else
        {
            $id = $this->input->post('myId');
			$show_truck = $this->TripModel->get_truck();
			$show_city = $this->CityModel->fetch_data();
			$show_station = $this->StationModel->fetch_data('*',array('tcid'=>$id));
			$showstation = $this->StationModel->fetch_data();
			$pumpstation = $this->PumpModel->fetch_data();
			$tripdetail = $this->TripModel->get_last_id();
			$data=array(
			'showtruck'=> $show_truck,
			'showcity'=> $show_city,
			'showstation'=> $show_station,
			'showpump' => $pumpstation,
			'showtrip' => $this->serial($tripdetail),
            'main_content'=> 'addTripsummary'
        	);
            $this->load->view('default', $data);
        }
    }

    public function trips()
    {
        $this->add_trip();
    }

	//end shop

	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('ttdid');

        $result = $this->TripModel->delete_data(array('tstid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'Trip');
    }
	//End delete shop

	public function station()
		{
			$id = $this->input->post('myId');
			$show_station = $this->StationModel->fetch_data('*',array('tcid'=>$id));
			echo json_encode($show_station);

		}

		public function material()
		{
			$id = $this->input->post('mId');
			$show_material = $this->MaterialModel->single_fetch('*',array('tid'=>$id));
			echo json_encode($show_material);

		}

		public function daily()
		{
			$id = $this->input->post('mId');
			$show_daily = $this->TripModel->get_daily_trip($id);
			echo json_encode($show_daily);
		}
}

?>