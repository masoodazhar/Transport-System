<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pump extends CI_Controller {

	//shop section

	public function index()
	{
		$pump_data = $this->PumpModel->fetch_data();
		$city_data = $this->CityModel->fetch_data();
		$data=array(
			'pump'=>$pump_data,
			'city'=>$city_data,
            'main_content'=>'Pump'
        );
        $this->load->view('default' , $data);
	}

	public function add_pump()
	{
		$show_city = $this->CityModel->fetch_data();
		 $data=array(
		 	'showcity'=>$show_city,
            'main_content'=>'addPump'
        );
        $this->load->view('default' , $data);
	}

	public function pump_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tpname' , 'pump station name' , 'required');
		$this->form_validation->set_rules('tcid' , 'city name' , 'required');
		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addpump']);
			$this->PumpModel->add_data($data);
                redirect(base_url() . 'Pump');
		}
	 else
        {
            //false
            $show_city = $this->CityModel->fetch_data();
            $data = array(
            	'showcity'=>$show_city,
                "main_content" =>'addPump'
            );
            $this->load->view('default', $data);
        }
    }

    public function pumps()
    {
        $this->index();
    }

	//end shop

	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('tpid');

        $result = $this->PumpModel->delete_data(array('tpid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'Pump');
    }
	//End delete shop
}

?>