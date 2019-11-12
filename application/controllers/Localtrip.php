<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localtrip extends CI_Controller {

	//Dumper Section

	public function index($stationid=0, $truck='', $date='')
	{
		$row =$this->LocalModel->get_station($stationid, $truck, $date);
		$dumper = $this->TruckModel->fetch_data('*',array('ttdtype' => '1' ));
		$station = $this->LocalModel->get_station_name();

		$totalamount = 0;
		$advances = 0;
		$total_weights=0.0;
		$partion = '';
		$check_partion = array();

		foreach ($row as $key => $value) {
			$totalamount +=$value->lttotalamount;
			$advances +=$value->ltadvances;
			$total_weights += $value->ltweight;
			if(in_array($value->ltrateparton,$check_partion)){

			}else{
					array_push($check_partion,$value->ltrateparton);
					$partion .=$value->ltrateparton.'/';
			}

		}
		// echo '<pre>';
		// // echo 'testing .. '.$check_partion.' ssdsd<br>';
		// echo $advances.'<br>';
		//
		// echo rtrim($partion,'/').'<br>';
		// print_r($row); die;

		 $data=array(
			 'dumper'=>$dumper,
			 'station'=>$station,
		 	 'local_data'=>$row,
			 'selected_station'=>$stationid,
			 'selected_date'=>$date,
			 'selected_truck'=>$truck,
			 'totalamount'=>$totalamount ,
			 'advances'=>$advances ,
			 'total_weights'=>$total_weights,
			 'partion'=> $partion,
       'main_content'=>'Local'
        );
        $this->load->view('default' , $data);
	}

public function search_data(){
	$station = $this->input->get('station');
	$truck = $this->input->get('truck');
	$date = $this->input->get('date');
	$this->index($station, $truck, $date);
}

	public function add_local()
	{
		$dumper = $this->TruckModel->fetch_data('*',array('ttdtype' => '1' ));
		$station = $this->LocalModel->get_station_name();
		 $data=array(
		 	'dumper'=>$dumper,
		 	'station'=>$station,
      'main_content'=>'addLocal'
        );
        $this->load->view('default' , $data);
	}

	public function local_validation()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ltdate' , 'date' , 'required');
		$this->form_validation->set_rules('ltvehiclenumber' , 'Vehicle Number' , 'required');
		$this->form_validation->set_rules('ltpoint' , 'Loadin Point' , 'required');
		$this->form_validation->set_rules('ltweight' , 'Loading Weigt' , 'required');
		$this->form_validation->set_rules('ltrateparton' , 'Rate Parton' , 'required');
		$this->form_validation->set_rules('ltadvances' , 'Advances' , 'required');

		if($this->form_validation->run())
		{
			//true
			$data = $this->input->post();
			unset($data['adddumper']);
			$this->LocalModel->add_data($data);
                redirect(base_url() . 'Localtrip');
		}
	 else
        {
            //false
            $dumper = $this->TruckModel->fetch_data('*',array('ttdtype' => '1' ));
						$station = $this->LocalModel->get_station_name();
            $data = array(
            	'dumper'=>$dumper,
			 	'station'=>$station,
                "main_content" =>'addLocal'

            );
            $this->load->view('default', $data);
        }
    }

    public function Dumper()
    {
        $this->index();
    }

	//end Tyre

	//delete data truck
	public function delete_record()
    {
            $id = $this->input->get('ltid');
            $result = $this->LocalModel->delete_data(array('ltid'=>$id));
            // print_r($result);die;
            redirect(base_url(). 'Localtrip');
    }
	//End delete data

	// public function get_single_detail()
	// {
	// 	$id = $this->input->post('id');
	// 	$result = $this->LocalModel->shop_single_remaining($id);
	// 	$tr = '';

	// 	foreach ($result as $key => $value) {
	// 		$tr .='

	// 							<tr>
 //                                  <td id="shop">'.$value->tsname.'</td>
 //                                  <td class="pair">'.$value->tttyrepair.'</td>
 //                                  <td class="amount">'.$value->tttotalprice.'</td>
 //                                  <td class="paid">'.$value->ttpaid.'</td>
 //                                  <td class="remaining">'.$value->ttremaining.'</td>
 //                                  <td class="Date">'.$value->crnt_date.'</td>
 //                                </tr>
	// 		';
	// 	}
	// 	echo $tr;
	// }
}

?>
