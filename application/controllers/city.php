<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {

	//shop section

	public function index()
	{
		$city_data = $this->CityModel->fetch_data();
		$data=array(
			'city'=>$city_data,
            'main_content'=>'City'
        );
        $this->load->view('default' , $data);
	}

	public function add_city()
	{
		 $data=array(
            'main_content'=>'addCity'
        );
        $this->load->view('default' , $data);
	}

	public function city_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tcname' , 'city name' , 'required|alpha_numeric_spaces');
		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addcity']);
			$this->CityModel->add_data($data);
                redirect(base_url() . 'City');
		}
	 else
        {
            //false
            $data = array(

                "main_content" =>'addCity'

            );
            $this->load->view('default', $data);
        }
    }

    public function cities()
    {
        $this->add_city();
    }

	//end shop

	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('tcid');

        $result = $this->CityModel->delete_data(array('tcid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'City');
    }
	//End delete shop
}

?>