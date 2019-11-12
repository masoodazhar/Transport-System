<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Login_Controller extends CI_Controller {


        
	function __construct()
    {
        parent::__construct();
        $this->load->library('session');
		$this->load->model('Login_Model');
		
		
    }

    function index($data=''){

          
            $this->load->view('Login',$data);
           

    }

    function login(){
    
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        if(isset($username) && isset($password))
        {
            $data = $this->Login_Model->login($username, $password);
            if($data){
                if($username==$data->tlusername && $password==$data->tlpassword){
 
                    $this->session->set_userdata('user',$data->tlusername);
                    $this->session->set_userdata('authentication',$data->tlauth);
                    $this->session->set_userdata('auth_id_just_for_admin',$data->tlempid);
                    
                    $this->session->set_userdata('employee_name',$data->empname);                    
                    $this->session->set_userdata('employee_image',$data->empimage);

                    redirect('Main');

                }else{

                    $data['invalid_login_meessage'] = 'Login Success. but not autherized';
                    $this->index($data);
                }
            }else{
                $data['invalid_login_meessage'] = 'Invalid username and password';
                $this->index($data);
            }
        }else
        {
            $data['invalid_login_meessage'] = 'Please Fill Out Username and password';
                $this->index($data);
        }

    }

    function logout(){
        $this->session->sess_destroy();
        redirect('Login_Controller');
    }

    function createUser(){
        
        $data['get_all_employee'] = $this->Login_Model->get_all_employee();
        $data['get_all_login'] = $this->Login_Model->get_all_login();
        $this->load->view('layout/header');
        $this->load->view('createlogin',$data);
        $this->load->view('layout/footer');
    }

    function addCreateuser(){
            $tlempid = $this->input->post('tlempid');
            $tlusername = $this->input->post('tlusername');
            $tlpassword = md5($this->input->post('tlpassword'));
            $tlauth = $this->input->post('tlauth');


            $this->form_validation->set_rules('tlempid' , 'Employee Salary' , 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('tlusername' , 'Employee Salary' , 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('tlpassword' , 'Employee Salary' , 'required');


		if($this->form_validation->run())
		{
        $tlauth = json_encode($tlauth);
            $this->Login_Model->addCreateuser($tlusername, $tlpassword,$tlauth,$tlempid);
            $this->session->set_flashdata('datasaved',1);
            $this->createUser();
        }else{
            $this->createUser();
        }
    }

    function updatelogin($tlid){
        $tlusername = trim($this->input->get('tlusername'));
        $tlpassword  = trim($this->input->get('tlpassword'));
        $old  = trim($this->input->get('old'));
        $tlpassword = $tlpassword==''?$old:md5($tlpassword);
       
        
        $tlauth = $this->input->get('tlauth');
        $tlauth = json_encode($tlauth)=='null'?'["nodata"]':json_encode($tlauth);
        
       
        $this->Login_Model->updatelogin($tlusername,$tlauth, $tlid,$tlpassword);
        $this->session->set_flashdata('datasaved',1);
        redirect('Login_Controller/createUser');
    }

    }
?>