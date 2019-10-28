<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	//Oil Section


	function notify()
    {
     
        $trow = $this->NotificationModel->fetch_data('*',array('ttdstatus' => '1'));
        
        return $trow;
    
    }

	//Truck Maintenance Section

	public function add_maintenance()
	{
		 $truck = $this->TruckModel->fetch_data();
		 $driver = $this->DriverModel->fetch_data();
		 $oil = $this->OilModel->fetch_data();
		 $tyre = $this->TyreModel->fetch_data();
		 $data=array(
		 	'truck' => $truck,
		 	'driver' => $driver,
		 	'oil' => $oil,
		 	'tyre' => $tyre,
            'main_content'=>'truckMaintenance'
        );

        $this->load->view('default' , $data);
	}

	public function maintenance_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('tmtruck_id' , 'truck' , 'required');
		$this->form_validation->set_rules('tmdriver_id' , 'driver' , 'required');
		

		if($this->form_validation->run())
		{
			//true

			$data = $this->input->post();
			unset($data['addmaintenance']);
			$this->MaintenanceModel->add_data($data);
                redirect(base_url() . 'main/maintnance');
		}
	 else
        {
             //false
	         $truck = $this->TruckModel->fetch_data();
			 $driver = $this->DriverModel->fetch_data();
			 $oil = $this->OilModel->fetch_data();
			 $tyre = $this->TyreModel->fetch_data();
			 $data=array(
			 	'truck' => $truck,
			 	'driver' => $driver,
			 	'oil' => $oil,
			 	'tyre' => $tyre,
	            'main_content'=>'truckMaintenance'
	        );

        	$this->load->view('default' , $data);
        }
    }

    public function maintnance()
    {
        $this->add_maintenance();
    }

    public function noti()
    {


		//$trow = $this->NotificationModel->fetch_data('*',array('ttdstatus' => '1'));
       
    	
        $data=array(
        	    'trow'=>$this->notify()
	        );
        $this->load->view('layout/header', $data);
			$this->load->view('notification',$data);
			$this->load->view('layout/footer');
    }

	//End truck maintenance

		
}

?>