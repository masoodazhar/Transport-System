<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oil extends CI_Controller {

	//Tyre Section

	public function index()
	{
		$row =$this->OilModel->fetch_data();
		$result =$this->ShopModel->fetch_data();
		 $data=array(
		 	'oil_data'=>$row,
		 	'shop'=>$result,
            'main_content'=>'oil'
        );
        $this->load->view('default' , $data);
	}

	public function add_oil()
	{
		$result =$this->ShopModel->fetch_data('*' , array('tstype' => 'oil'));
		 $data=array(
		 	'shop' => $result,
            'main_content'=>'addOil'
        );
        $this->load->view('default' , $data);
	}

	public function oil_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('toname' , 'oil name' , 'required');
		$this->form_validation->set_rules('tototalprice' , 'total amount' , 'required');
		$this->form_validation->set_rules('toquantity' , 'quantity' , 'required');
		$this->form_validation->set_rules('toshopid' , 'shop name' , 'required');

		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addoil']);
			$this->OilModel->add_data($data);
                redirect(base_url() . 'oil');
		}
	 else
        {
            //false
            $result =$this->ShopModel->fetch_data('*' , array('tstype' => 'oil'));
            $data = array(
            	'shop'=>$result,
                "main_content" =>'addOil'

            );
            $this->load->view('default', $data);
        }
    }

    public function oils()
    {
        $this->add_oil();
    }
	//End Oil

	//delete data truck
	public function delete_record()
    {
            $id = $this->input->get('toid');

            $result = $this->OilModel->delete_data(array('toid'=>$id));
            // print_r($result);die;
            redirect(base_url(). 'oil');
    }
	//End delete data
}

?>