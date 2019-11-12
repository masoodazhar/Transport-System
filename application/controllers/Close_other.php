<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Close_other extends CI_Controller {

	//Oil Section

	function __construct()
    {
		parent::__construct();
		$this->load->model('Close_other_model');
		$this->load->library('session');
		
    }


    public function index($category='no', $id=0){

        $data['category'] = $category;
        $data['id'] = $id;
        $data['get_all_oil_remaining_by_id_details'] = array();

        if($category=='oil' && $id!=0){
            $data['get_all_oil_remaining'] = $this->Close_other_model->get_all_oil_remaining_by_id($id);
            $data['get_all_oil_remaining_by_id_details'] = $this->Close_other_model->get_all_oil_remaining_by_id_details($category,$id);
            $data['get_total_oil_remaining'] = $this->Close_other_model->get_total_oil_remaining_id($id);
            $data['get_total_paid_amount_oil'] = $this->Close_other_model->get_total_paid_amount_oil_id($id,$category);
        }else{
            $data['get_total_oil_remaining'] = $this->Close_other_model->get_total_oil_remaining();
            $data['get_total_paid_amount_oil'] = $this->Close_other_model->get_total_paid_amount_oil();
            $data['get_all_oil_remaining'] = $this->Close_other_model->get_all_oil_remaining();
        }

        if($category=='tyre' && $id!=0){
            $data['get_total_tyre_remaining'] = $this->Close_other_model->get_all_tyre_remaining_by_id($id);
            $data['get_all_oil_remaining_by_id_details'] = $this->Close_other_model->get_all_tyre_remaining_by_id_details($category,$id);
            $data['get_total_tyre_remaining'] = $this->Close_other_model->get_total_tyre_remaining_id($id);
            $data['get_total_paid_amount_tyre'] = $this->Close_other_model->get_total_paid_amount_tyre_id($id);
        }else{

            $data['get_total_tyre_remaining'] = $this->Close_other_model->get_total_tyre_remaining();
            $data['get_total_paid_amount_tyre'] = $this->Close_other_model->get_total_paid_amount_tyre();
            $data['get_all_tyre_remaining'] = $this->Close_other_model->get_all_tyre_remaining();
        }


        if($category=='pump' && $id!=0){
            $data['get_sum_of_pump'] = $this->Close_other_model->get_sum_of_pump_id($id);
            // $data['get_total_tyre_remaining'] = $this->Close_other_model->get_total_tyre_remaining_id($id);
            $data['get_total_paid_amount_pump'] = $this->Close_other_model->get_total_paid_amount_pump_id($id);
            $data['get_all_oil_remaining_by_id_details'] = $this->Close_other_model->get_all_tyre_remaining_by_id_details($category,$id);
            
        }else{

            // $data['get_total_tyre_remaining'] = $this->Close_other_model->get_total_tyre_remaining();
            $data['get_total_paid_amount_pump'] = $this->Close_other_model->get_total_paid_amount_pump();
            $data['get_sum_of_pump'] = $this->Close_other_model->get_sum_of_pump();
        }
        

       
        $data['choosen_cate'] = array('oil'=>'Oil','tyre'=>'Tyre', 'pump'=>'Pump');
        $data['oil_data'] = $this->Close_other_model->get_oil_data();
        $data['tyre_data'] = $this->Close_other_model->get_tyre_data();
        $data['pump_data'] = $this->Close_other_model->get_station();
       
        $this->load->view('layout/header');
        $this->load->view('Close_other', $data);
        $this->load->view('layout/footer');   
    }

    public function check_details($category='', $id=0){
         $this->index($category, $id);       

    }

    public function save_close_data(){
       $data_save = $this->input->post();
        if(isset($data_save['cotoamount'])){
       
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('coto_foreignid' , 'Product ID' , 'required');
        $this->form_validation->set_rules('cototype' , 'Category' , 'required');
        $this->form_validation->set_rules('cotoamount' , 'Payment Amount' , 'required');
        $this->form_validation->set_rules('cotodate' , 'Payment Date' , 'required');

    		if($this->form_validation->run())
    		{
                $this->Close_other_model->save_close_data($data_save);
                $this->session->set_flashdata('datasaved',1);
                $this->index($data_save['cototype'],$data_save['coto_foreignid']);
    
            }else{
                $this->index();
            }
        }else{
            redirect('Close_other');
        }
    }
		
}

?>