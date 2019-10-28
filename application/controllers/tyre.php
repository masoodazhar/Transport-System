<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tyre extends CI_Controller {

	//Tyre Section

	public function index()
	{
		$row =$this->TyreModel->fetch_data();
		$result =$this->ShopModel->fetch_data();
		 $data=array(
		 	'tyre_data'=>$row,
		 	'shop'=>$result,
            'main_content'=>'tyre'
        );
        $this->load->view('default' , $data);
	}

	public function add_tyre()
	{
		$result =$this->ShopModel->fetch_data('*', array('tstype' =>'tyre'));
		 $data=array(
		 	'shop'=>$result,
            'main_content'=>'addTyre'
        );
        $this->load->view('default' , $data);
	}

	public function tyre_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ttname' , 'tyre name' , 'required');
		$this->form_validation->set_rules('tttyrepair' , 'No. of pair' , 'required');
		$this->form_validation->set_rules('ttshopid' , 'shop name' , 'required');
		$this->form_validation->set_rules('ttprice' , 'per pair price' , 'required');

		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addtyre']);
			$this->TyreModel->add_data($data);
                redirect(base_url() . 'tyre');
		}
	 else
        {
            //false
            $result =$this->ShopModel->fetch_data('*' , array('tstype' => 'tyre'));
            $data = array(
            	'shop'=>$result,
                "main_content" =>'addTyre'

            );
            $this->load->view('default', $data);
        }
    }

    public function tyres()
    {
        $this->index();
    }

	//end Tyre

	//delete data truck
	public function delete_record()
    {
            $id = $this->input->get('ttid');

            $result = $this->TyreModel->delete_data(array('ttid'=>$id));
            // print_r($result);die;
            redirect(base_url(). 'tyre');
    }
	//End delete data
}

?>