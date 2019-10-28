<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {
	

	// Driver add section

	public function index()
	{
		 $result = $this->DriverModel->fetch_data();
		 $data=array(
		 	'result'=>$result,
            'main_content'=>'Driver'
        );
        $this->load->view('default' , $data);
	}

	public function add_driver()
	{
		 $data=array(
            'main_content'=>'addDriver'
        );
        $this->load->view('default' , $data);
	}

	public function driver_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tname' , 'driver name' , 'required');
		$this->form_validation->set_rules('tnic' , 'driver N.I.C' , array('required', 'min_length[13]'));
		$this->form_validation->set_rules('tcontact' , 'driver contact' , array('required', 'min_length[11]'));
		$this->form_validation->set_rules('taddress' , 'driver address' , 'required');
		$this->form_validation->set_rules('tdoj' , 'date of joining' , 'required');
		$this->form_validation->set_rules('tdcid' , 'driver or conductor' , 'required');
		$this->form_validation->set_rules('tsallary' , 'driver or conductor' , 'required');
		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['adddriver']);
			$this->DriverModel->add_data($data);
                redirect(base_url() . 'driver/inserted');
		}
	 else
        {
            //false
            $data = array(

                "main_content" =>'addDriver'

            );
            $this->load->view('default', $data);
        }
    }

    public function inserted()
    {
        $this->index();
    }

    //End add driver

    //start update section

	    public function update_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tname' , 'driver name' , 'required');
		$this->form_validation->set_rules('tnic' , 'driver N.I.C' , array('required', 'min_length[13]'));
		$this->form_validation->set_rules('tcontact' , 'driver contact' , array('required', 'min_length[11]'));
		$this->form_validation->set_rules('taddress' , 'driver address' , 'required');
		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['hidden_id']);
			unset($data['updatedriver']);
			$this->DriverModel->update_data($data ,array('did'=>$this->input->post("hidden_id")));
                redirect(base_url() . 'driver/update');
		}
	 else
        {
            //false
            $data = array(

                "main_content" =>'addDriver',
                "driver_data" => $this->DriverModel->single_fetch($this->input->post("hidden_id")),

            );
            $this->load->view('default', $data);
        }
    }

    public function update_data()
	    {
	        $did = $this->uri->segment(3);
	        $data = array(
	            "driver_data" => $this->DriverModel->single_fetch('*',array('did'=>$did)),
	            "main_content" => 'addDriver'
	        );
	        $this->load->view('default', $data);
	        // print_r($data);die;
	    }

    public function update()
    {
        $this->index();
    }

    //end update section

    //Delete Section

    public function delete_record()
    {
            $id = $this->input->get('did');

            $result = $this->DriverModel->delete_data(array('did'=>$id));
            // print_r($result);die;
            redirect(base_url(). 'driver');
    }

    //End Delete Section
}

?>