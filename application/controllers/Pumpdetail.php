<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pumpdetail extends CI_Controller {

	//shop section

	public function index()
	{
		$pump_data = $this->PumpdetailModel->station_remaining();
		$data=array(
			'pump_data'=>$pump_data,
            'main_content'=>'Pumpdetail'
        );
        $this->load->view('default' , $data);
	}

	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('tpid');

        $result = $this->PumpdetailModel->delete_data(array('tpid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'Pumpdetail');
    }
	//End delete shop

	public function get_single_detail()
	{
		$id = $this->input->Post('id');
		$data = $this->PumpdetailModel->get_single($id);
		$tr = '';
		foreach ($data as $key => $value) {
			$tr .='

								<tr>
                                  <td>'.$value->tpname.'</td>
                                  <td>'.$value->liter.'</td>
                                  <td>'.$value->total_amount.'</td>
                                  <td>'.$value->paid.'</td>
                                  <td>'.$value->remaining.'</td>
                                  <td>'.$value->crnt_date.'</td>
                                </tr>
			';
		}
		echo $tr;
	}
}

?>