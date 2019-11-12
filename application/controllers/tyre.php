<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tyre extends CI_Controller {

	//Tyre Section

	public function index()
	{
		$row =$this->TyreModel->shop_remaining();
		 $data=array(
		 	'tyre_data'=>$row,
            'main_content'=>'Tyre'
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
                redirect(base_url() . 'Tyre');
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
            redirect(base_url(). 'Tyre');
    }
	//End delete data

	public function get_single_detail()
	{
		$id = $this->input->post('id');
		$result = $this->TyreModel->shop_single_remaining($id);
		$tr = '';

		foreach ($result as $key => $value) {
			$tr .='

								<tr>
                                  <td id="shop">'.$value->tsname.'</td>
                                  <td class="pair">'.$value->tttyrepair.'</td>
                                  <td class="amount">'.$value->tttotalprice.'</td>
                                  <td class="paid">'.$value->ttpaid.'</td>
                                  <td class="remaining">'.$value->ttremaining.'</td>
                                  <td class="Date">'.$value->crnt_date.'</td>
                                </tr>
			';
		}
		echo $tr;
	}
}

?>