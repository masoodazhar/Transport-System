<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oil extends CI_Controller {

	//Tyre Section

	public function index()
	{
		$row =$this->OilModel->shop_remaining_oil();
		 $data=array(
		 	'oil_data'=>$row,
            'main_content'=>'Oil'
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
                redirect(base_url() . 'Oil');
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
            redirect(base_url(). 'Oil');
    }
	//End delete data

	public function get_single_detail()
	{
		$id = $this->input->Post('id');
		$data = $this->OilModel->get_single($id);
		$tr = '';

		foreach ($data as $key => $value) {
			$tr .='

								<tr>
                                  <td>'.$value->tsname.'</td>
                                  <td>'.$value->toquantity.'</td>
                                  <td>'.$value->tototalprice.'</td>
                                  <td>'.$value->topaid.'</td>
                                  <td>'.$value->toremaining.'</td>
                                  <td>'.$value->crnt_date.'</td>
                                </tr>
			';
		}
		echo $tr;
	}
}

?>