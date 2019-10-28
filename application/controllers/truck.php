<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Truck extends CI_Controller {
	

	//Truck Section

	public function index()
	{
		$truck_data = $this->TruckModel->fetch_data();
		$data=array(
			'truck'=>$truck_data,
            'main_content'=>'Truck'
        );
        $this->load->view('default' , $data);
	}

	public function add_truck()
	{
		 $data=array(
            'main_content'=>'addTruck'
        );
        $this->load->view('default' , $data);
	}

	public function truck_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tname' , 'truck name' , 'required');
		$this->form_validation->set_rules('tmodel' , 'truck model' , 'required');
		$this->form_validation->set_rules('tnumber' , 'truck numbre' , 'required');
		$this->form_validation->set_rules('tprice' , 'truck total price' , 'required');
		$this->form_validation->set_rules('tmethod' , 'payment method' , 'required');
		$this->form_validation->set_rules('tbuysale' , 'Sell/buy' , 'required');
		$this->form_validation->set_rules('ttdtype' , 'truck/dumper' , 'required');
		if($this->form_validation->run())
		{
			//true
			$last_id = $this->TruckModel->get_last_id();
			$data1 = array(
				'trapdtypeid' => $this->input->post('trapdtypeid'),
				'trapdname' => $this->input->post('trapdname'),
				'trapdcontact' => $this->input->post('trapdcontact'),
				'trapdamount' => $this->input->post('tremainingamount'),
				'trapdformid' => $last_id+1,
				'trapddate' => $this->input->post('trapddate'),
				'trapddescription' => $this->input->post('trapddescription'),
			 );
			$this->RemainModel->add_data($data1);
			$data = $this->input->post();
			unset($data['addtruck']);
			unset($data['trapdtypeid']);
			unset($data['trapdname']);
			unset($data['trapddate']);
			unset($data['trapddescription']);
			unset($data['trapdcontact']);
			$this->TruckModel->add_data($data);
                redirect(base_url() . 'truck');
		}
	 else
        {
            //false
            $data = array(

                "main_content" =>'addTruck'

            );
            $this->load->view('default', $data);
        }
    }

    public function trucks()
    {
        $this->index();
    }

	//End truck

	//delete data truck
	public function delete_record()
    {
            $id = $this->input->get('tid');

            $result = $this->TruckModel->delete_data(array('tid'=>$id));
            // print_r($result);die;
            redirect(base_url(). 'truck');
    }
	//End delete data
}

?>