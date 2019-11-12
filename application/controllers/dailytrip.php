<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dailytrip extends CI_Controller {

	public function index()
	{
		$show_data = $this->DailytripModel->show_data();
		$data = array(
			'show_data' => $show_data,
			'main_content' => 'Dailytrip'
		);
		$this->load->view('default' , $data);
	}

	//shop section
	public function add_dailytrip()
	{
			$id = $this->input->post('myId');
			$show_truck = $this->TruckModel->fetch_data();
			$show_city = $this->CityModel->fetch_data();
			$show_station = $this->StationModel->fetch_data();
			$data=array(
			'showtruck'=> $show_truck,
			'showcity'=>$show_city,
			'show_station'=>$show_station,
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
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);

		if($this->form_validation->run())
		{
			$this->upload->do_upload('tdimage');
			$empimage = $this->upload->data('file_name');
			// $data['tdimage'] = $empimage;
			$desc = $this->input->post('toedescription');
			$amount = $this->input->post('toeamount');
			$serial = $this->input->post('toeidentity');
			$index = 0;

			foreach($desc as $val){
				$this->DailytripModel->add_otherexpense($serial[$index], $val,$amount[$index]);
				$index++;
			}
			$last_id = $this->DailytripModel->get_last_id();
			$data = $this->input->post();
			unset($data['adddailytrip']);
			unset($data['toeamount']);
			unset($data['toedescription']);
			unset($data['toeidentity']);
			$data['tdimage'] = $empimage;
			$this->session->set_flashdata('datasaved',1);
			$this->DailytripModel->add_data($data);
            redirect(base_url() . 'Dailytrip');
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
		$data = $this->DailytripModel->checkdateontruckatsamedate($id, $date);
		echo json_encode($data);
	}

	//end shop

	//Delete Section

    public function delete_record()
    {
            $id = $this->input->get('tdid');

            $result = $this->DailytripModel->delete_data(array('tdid'=>$id));
            // print_r($result);die;
            redirect(base_url(). 'Dailytrip');
    }

    //End Delete Section
}

?>
