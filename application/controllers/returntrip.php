<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Returntrip extends CI_Controller {


	public function index()
	{
		$show_return = $this->ReturntripModel->return_detail_show();	
		$data=array(
			'show_return'=>$show_return,
            'main_content'=>'return'
        );
        $this->load->view('default' , $data);
	}

	//shop section
	public function add_returntrip()
	{
			$id = $this->input->post('myId');
			$show_truck = $this->TripModel->get_truck();
			$show_city = $this->CityModel->fetch_data();
			$show_station = $this->StationModel->fetch_data('*',array('tcid'=>$id));
			$data=array(
			'showtruck'=> $show_truck,
			'showcity'=>$show_city,
			'showstation'=>$show_station,
            'main_content'=>'addreturntrip'
        );
        $this->load->view('default' , $data);
	}

	public function returntrip_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('trarrivingdate' , 'Arrival date' , 'required');
		$this->form_validation->set_rules('tritem' , 'Item' , 'required');
		$this->form_validation->set_rules('tid' , 'truck number' , 'required');
		$this->form_validation->set_rules('trweight' , 'weight' , 'required');
		$this->form_validation->set_rules('tcid' , 'city name' , 'required');
		$this->form_validation->set_rules('tstid' , 'station name' , 'required');
		$this->form_validation->set_rules('trtotalamount' , 'advance/bilty' , 'required');
		$this->form_validation->set_rules('trpaymethod' , 'payment method' , 'required');
		$this->form_validation->set_rules('trvfrieght' , 'v.frieght amount' , 'required');
		if($this->form_validation->run())
		{
			$desc = $this->input->post('toedescription');
			$amount = $this->input->post('toeamount');
			$serial = $this->input->post('toeidentity');
			$index = 0;

			foreach($desc as $val){
				$this->ReturntripModel->add_otherexpense($serial, $val,$amount[$index]);
				$index++;
			}
			$last_id = $this->ReturntripModel->get_last_id();
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
			$data = $this->input->post();
			unset($data['addreturntrip']);
			unset($data['trapdtypeid']);
			unset($data['trapdname']);
			unset($data['trapddate']);
			unset($data['trapddescription']);
			unset($data['trapdcontact']);
			unset($data['toeamount']);
			unset($data['toedescription']);
			unset($data['toeidentity']);
			$this->ReturntripModel->add_data($data);
            redirect(base_url() . 'returntrip');
		}
	 else
        {
        	$id = $this->input->post('myId');
			$show_truck = $this->TripModel->get_truck();
			$show_city = $this->CityModel->fetch_data();
			$show_station = $this->StationModel->fetch_data('*',array('tcid'=>$id));
			$data=array(
			'showtruck'=> $show_truck,
			'showcity'=> $show_city,
			'showstation'=> $show_station,
            'main_content'=> 'addreturntrip'
        	);
            $this->load->view('default', $data);
        }
    }

    public function return()
    {
        $this->index();
    }

    public function station()
		{
			$id = $this->input->post('myId');
			$show_station = $this->StationModel->fetch_data('*',array('tcid'=>$id));
			echo json_encode($show_station);

		}


	public function checkdateontruckatsamedate(){

		$id = $this->input->post('id');
		$date = date("y-m-d");
		$this->load->model('ReturntripModel');
		$data = $this->ReturntripModel->checkdateontruckatsamedate($id, $date);
		echo json_encode($data);
	}

	//end shop
}

?>