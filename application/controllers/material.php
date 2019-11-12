<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends CI_Controller {

	//shop section

	public function index()
	{
		$show_material = $this->MaterialModel->fetch_data();
		$data=array(
			'show_material'=>$show_material,
            'main_content'=>'Material'
        );
        $this->load->view('default' , $data);
	}
	public function checkdateontruckatsamedateinothermaterial(){

		$id = $this->input->post('id');
		$date = date('Y-m-d');
		$this->load->model('MaterialModel');
		$data = $this->MaterialModel->checkdateontruckatsamedateinothermaterial($id, $date);

		echo json_encode($data);


	}
	public function add_material()
	{
		 $show_truck = $this->MaterialModel->get_truck();
		 $show_station = $this->StationModel->fetch_data();
		 $data=array(
		 	'show_truck'=> $show_truck,
		 	'show_station'=>$show_station,
            'main_content'=>'addOthermaterial'
        );
        $this->load->view('default' , $data);
	}

	public function material_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tomfromdate' , 'from date' , 'required');
		$this->form_validation->set_rules('tid' , 'truck number' , 'required');
		$this->form_validation->set_rules('tomweightspace' , 'weight space' , 'required');
		$this->form_validation->set_rules('tomweight' , 'weight' , 'required');
		$this->form_validation->set_rules('tomlocation' , 'location' , 'required');
		$this->form_validation->set_rules('tomtransporter' , 'transporter name' , 'required');
		$this->form_validation->set_rules('tomtotalamount' , 'advance/bilty amount' , 'required');
		$this->form_validation->set_rules('tomvfrieght' , 'v.frieght amount' , 'required');
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = '100';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);

		if($this->form_validation->run())
		{
			//true
			$this->upload->do_upload('tomimage');
			$tomimage = $this->upload->data('file_name');

			$desc = $this->input->post('toedescription');
			$amount = $this->input->post('toeamount');
			$serial = $this->input->post('toeidentity');
			$index = 0;

			foreach($desc as $val){
				$this->MaterialModel->add_otherexpense($serial[$index], $val,$amount[$index]);
				$index++;
			}
			$last_id = $this->MaterialModel->get_last_id();
			$data = $this->input->post();
			unset($data['addmaterial']);
			unset($data['toeamount']);
			unset($data['toedescription']);
			unset($data['toeidentity']);
			$data['tomimage'] = $tomimage;
			$this->MaterialModel->add_data($data);
			$this->session->set_flashdata('datasaved',1);
                redirect(base_url() . 'material/materials');
		}
	 else
        {
            $show_truck = $this->MaterialModel->get_truck();
            $show_station = $this->StationModel->fetch_data();
            $data = array(
            	'show_truck'=> $show_truck,
            	'show_station'=>$show_station,
                "main_content" =>'addOthermaterial'

            );
            $this->load->view('default', $data);
        }
    }

    public function materials()
    {
        $this->index();
    }

	//end shop

	//delete shop
	public function delete_record()
    {
        $id = $this->input->get('tomid');

        $result = $this->CityModel->delete_data(array('tomid'=>$id));
        // print_r($result);die;
        redirect(base_url(). 'Material');
    }
	//End delete shop

	public function material_detail($id, $serial)
	{

			$material_result = $this->MaterialModel->material_detail($id);


			$data=array(
			'serialnumber' => $serial,
			'material_result'=>$material_result,
            'main_content'=>'MaterialDetail'
	        );
	        $this->load->view('default' , $data);
	}
}

?>
