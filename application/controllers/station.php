<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Station extends CI_Controller {

	//shop section

	public function index()
	{
		$station_data = $this->StationModel->fetch_data();
		$city_data = $this->CityModel->fetch_data();
		$data=array(
			'station'=>$station_data,
			'city'=>$city_data,
            'main_content'=>'Station'
        );
        $this->load->view('default' , $data);
	}

	public function add_station()
	{
		$show_city = $this->CityModel->fetch_data();
		 $data=array(
		 	'showcity'=>$show_city,
            'main_content'=>'addStation'
        );
        $this->load->view('default' , $data);
	}

	public function station_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tstname' , 'station name' , 'required');
		$this->form_validation->set_rules('tcid' , 'city name' , 'required');
		$this->form_validation->set_rules('tbname' , 'broker name' , 'required');
		$this->form_validation->set_rules('tstcontact' , 'contact number' , 'required');
		$this->form_validation->set_rules('tstaddress' , 'address' , 'required');
		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addstation']);
			$this->StationModel->add_data($data);
                redirect(base_url() . 'Station');
		}
	 else
        {
            //false
            $show_city = $this->CityModel->fetch_data();
            $data = array(
            	'showcity'=>$show_city,
                "main_content" =>'addStation'
            );
            $this->load->view('default', $data);
        }
    }

    public function stations()
    {
        $this->index();
    }

	//end shop

	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('tstid');

        $result = $this->StationModel->delete_data(array('tstid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'Station');
    }
	//End delete shop
}

?>