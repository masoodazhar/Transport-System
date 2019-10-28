<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Broker extends CI_Controller {
	

	// Broker add section

	public function index()
	{
		 $result = $this->BrokerModel->fetch_data();
		 $data=array(
		 	'result'=>$result,
            'main_content'=>'Broker'
        );
        $this->load->view('default' , $data);
	}

	public function add_broker()
	{
		 $data=array(
            'main_content'=>'addBroker'
        );
        $this->load->view('default' , $data);
	}

	public function broker_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tbname' , 'broker name' , 'required');
		$this->form_validation->set_rules('tbnic' , 'broker N.I.C' , array('required', 'min_length[13]'));
		$this->form_validation->set_rules('tbcontact' , 'broker contact' , array('required', 'min_length[11]'));
		$this->form_validation->set_rules('tbaddress' , 'broker address' , 'required');
		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addbroker']);
			$this->BrokerModel->add_data($data);
                redirect(base_url() . 'broker/inserted');
		}
	 else
        {
            //false
            $data = array(

                "main_content" =>'addBroker'

            );
            $this->load->view('default', $data);
        }
    }

    public function inserted()
    {
        $this->index();
    }

    //End add broker

    //start update section

	//     public function update_validation()
	// {
	// 	$this->load->library('form_validation');
	// 	$this->form_validation->set_rules('tname' , 'driver name' , 'required');
	// 	$this->form_validation->set_rules('tnic' , 'driver N.I.C' , array('required', 'min_length[13]'));
	// 	$this->form_validation->set_rules('tcontact' , 'driver contact' , array('required', 'min_length[11]'));
	// 	$this->form_validation->set_rules('taddress' , 'driver address' , 'required');
	// 	if($this->form_validation->run())
	// 	{
	// 		//true

	// 		$data = $this->input->post();
	// 		unset($data['hidden_id']);
	// 		unset($data['updatedriver']);
	// 		$this->DriverModel->update_data($data ,array('did'=>$this->input->post("hidden_id")));
 //                redirect(base_url() . 'driver/update');
	// 	}
	//  else
 //        {
 //            //false
 //            $data = array(

 //                "main_content" =>'addDriver',
 //                "driver_data" => $this->DriverModel->single_fetch($this->input->post("hidden_id")),

 //            );
 //            $this->load->view('default', $data);
 //        }
 //    }

 //    public function update_data()
	//     {
	//         $did = $this->uri->segment(3);
	//         $data = array(
	//             "driver_data" => $this->DriverModel->single_fetch('*',array('did'=>$did)),
	//             "main_content" => 'addDriver'
	//         );
	//         $this->load->view('default', $data);
	//         // print_r($data);die;
	//     }

 //    public function update()
 //    {
 //        $this->index();
 //    }

    //end update section

    //Delete Section

    public function delete_record()
    {
            $id = $this->input->get('tbid');

            $result = $this->BrokerModel->delete_data(array('tbid'=>$id));
            // print_r($result);die;
            redirect(base_url(). 'broker');
    }

    //End Delete Section
}

?>