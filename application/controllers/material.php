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
		 $data=array(
		 	'show_truck'=> $show_truck,
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
		if($this->form_validation->run())
		{
			//true
			$desc = $this->input->post('toedescription');
			$amount = $this->input->post('toeamount');
			$serial = $this->input->post('toeidentity');
			$index = 0;

			foreach($desc as $val){
				$this->MaterialModel->add_otherexpense($serial[$index], $val,$amount[$index]);
				$index++;
			}
			$last_id = $this->MaterialModel->get_last_id();
			$data1 = array(
				'trapdtypeid' => $this->input->post('trapdtypeid'),
				'trapdname' => $this->input->post('trapdname'),
				'trapdcontact' => $this->input->post('trapdcontact'),
				'trapdamount' => $this->input->post('tomremainingamount'),
				'trapdformid' => $last_id+1,
				'trapddate' => $this->input->post('trapddate'),
				'trapddescription' => $this->input->post('trapddescription'),
			 );
			$this->RemainModel->add_data($data1);
			$data = $this->input->post();
			unset($data['addmaterial']);
			unset($data['trapdtypeid']);
			unset($data['trapdname']);
			unset($data['trapddate']);
			unset($data['trapddescription']);
			unset($data['trapdcontact']);
			unset($data['toeamount']);
			unset($data['toedescription']);
			unset($data['toeidentity']);
			$this->MaterialModel->add_data($data);
                redirect(base_url() . 'material/materials');
		}
	 else
        {
            $show_truck = $this->MaterialModel->get_truck();
            $data = array(
            	'show_truck'=> $show_truck,
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