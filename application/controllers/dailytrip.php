<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dailytrip extends CI_Controller {

	//shop section
	public function add_dailytrip()
	{
			$id = $this->input->post('myId');
			$show_truck = $this->TruckModel->fetch_data();
			$show_city = $this->CityModel->fetch_data();
			$show_station = $this->StationModel->fetch_data('*',array('tcid'=>$id));
			$data=array(
			'showtruck'=> $show_truck,
			'showcity'=>$show_city,
			'showstation'=>$show_station,
            'main_content'=>'addDailytrip'
        );
        $this->load->view('default' , $data);
	}

	public function dailytrip_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tddeparturedate' , 'depparture date' , 'required');
		$this->form_validation->set_rules('tid' , 'truck number' , 'required');
		$this->form_validation->set_rules('tdcontainertype' , 'container type' , 'required');
		$this->form_validation->set_rules('tdweight' , 'weight' , 'required');
		$this->form_validation->set_rules('tcid' , 'city name' , 'required');
		$this->form_validation->set_rules('tstid' , 'station name' , 'required');
		$this->form_validation->set_rules('tdtotalamount' , 'advance/bilty' , 'required');
		$this->form_validation->set_rules('tdpaydate' , 'payment date' , 'required');
		$this->form_validation->set_rules('tdvfrieght' , 'v.frieght amount' , 'required');
		if($this->form_validation->run())
		{

			$desc = $this->input->post('toedescription');
			$amount = $this->input->post('toeamount');
			$serial = $this->input->post('toeidentity');
			$index = 0;

			foreach($desc as $val){
				$this->DailytripModel->add_otherexpense($serial[$index], $val,$amount[$index]);
				$index++;
			}
			$last_id = $this->DailytripModel->get_last_id();
			$data1 = array(
				'trapdtypeid' => $this->input->post('trapdtypeid'),
				'trapdname' => $this->input->post('trapdname'),
				'trapdcontact' => $this->input->post('trapdcontact'),
				'trapdamount' => $this->input->post('tdremainingamount'),
				'trapdformid' => $last_id+1,
				'trapddate' => $this->input->post('trapddate'),
				'trapddescription' => $this->input->post('trapddescription'),
			 );
			$this->RemainModel->add_data($data1);
			$data = $this->input->post();
			unset($data['adddailytrip']);
			unset($data['trapdtypeid']);
			unset($data['trapdname']);
			unset($data['trapddate']);
			unset($data['trapddescription']);
			unset($data['trapdcontact']);
			unset($data['toeamount']);
			unset($data['toedescription']);
			unset($data['toeidentity']);
			$this->DailytripModel->add_data($data);
            redirect(base_url() . 'Dailytrip/daily');
		}
	 else
        {
        	$id = $this->input->post('myId');
			$show_truck = $this->TruckModel->fetch_data();
			$show_city = $this->CityModel->fetch_data();
			$show_station = $this->StationModel->fetch_data('*',array('tcid'=>$id));
			$data=array(
			'showtruck'=> $show_truck,
			'showcity'=> $show_city,
			'showstation'=> $show_station,
            'main_content'=> 'addDailytrip'
        	);
            $this->load->view('default', $data);
        }
    }

    public function daily()
    {
        $this->add_dailytrip();
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
		$data = $this->DailytripModel->checkdateontruckatsamedate($id, $date);
		echo json_encode($data);
	}

	//end shop
}

?>