<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Close extends CI_Controller {

	//shop section

	// public function index()
	// {
	// 	$data=array(
 //            'main_content'=>'city'
 //        );
 //        $this->load->view('default' , $data);
	// }

	public function add_close($trapdid=0)
	{
		$this->load->model('ClosedModel');
		$remainingnameids = $this->ClosedModel->remainingnameids();
		 $data=array(
		 	'remainingnameids'=>$remainingnameids,
            'main_content'=>'RemainingClosed'
		);
		
		
		$data['get_all_closed_amount_by_personid'] = $this->ClosedModel->get_all_closed_amount_by_personid($trapdid);
		$data['get_sumof_closed_amount_by_personid'] = $this->ClosedModel->get_sumof_closed_amount_by_personid($trapdid);


		$data['selected_person'] = $trapdid;
        $this->load->view('default' , $data);
	}

	public function close_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('trapdid' , 'name' , 'required');
		$this->form_validation->set_rules('trapdcdate' , 'date' , 'required');
		$this->form_validation->set_rules('trapdcamount' , 'paid Amount' , 'required');

		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addclose']);
			unset($data['xyz']);
			$this->ClosedModel->add_data($data);
                redirect(base_url() . 'close/add_close');
		}
	 else
        {
            //false
            $remainingnameids = $this->ClosedModel->remainingnameids();
            $data = array(
            	'remainingnameids'=>$remainingnameids,
                "main_content" =>'RemainingClosed'

            );
            $this->load->view('default', $data);
        }
    }

	//end shop

	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('trapdcid');

        $result = $this->ClosedModel->delete_data(array('trapdcid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'close/add_close');
    }
	//End delete shop
}

?>