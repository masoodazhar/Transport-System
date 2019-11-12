<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	//shop section

	public function index()
	{
		$shop_data = $this->ShopModel->fetch_data();
		$data=array(
			'shop'=>$shop_data,
            'main_content'=>'Shop'
        );
        $this->load->view('default' , $data);
	}

	public function add_shop()
	{
		 $data=array(
            'main_content'=>'addShop'
        );
        $this->load->view('default' , $data);
	}

	public function shop_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tsname' , 'shop name' , 'required');
		$this->form_validation->set_rules('tsrname' , 'retailer name' , 'required');
		$this->form_validation->set_rules('tscontact' , 'shop contact' , 'required');
		$this->form_validation->set_rules('tsaddress' , 'shop address' , 'required');
		$this->form_validation->set_rules('tstype' , 'shop type' , 'required');
		$this->form_validation->set_rules('tsdescription' , 'shop description' , 'required');
		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addshop']);
			$this->ShopModel->add_data($data);
                redirect(base_url() . 'Shop');
		}
	 else
        {
            //false
            $data = array(

                "main_content" =>'addShop'

            );
            $this->load->view('default', $data);
        }
    }

    public function shops()
    {
        $this->add_shop();
    }

	//end shop

	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('sid');

        $result = $this->ShopModel->delete_data(array('sid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'Shop');
    }
	//End delete shop
}

?>