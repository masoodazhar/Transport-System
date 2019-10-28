 <?php 

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class MaterialModel extends base_model
{
    private  $table_name ="tothermaterial";

    public function checkdateontruckatsamedateinothermaterial($id, $date){
        $data = $this->db->query('SELECT tothermaterial.tomcurrentdate as tomcurrentdate FROM tothermaterial WHERE tothermaterial.tid='.$id.' AND tothermaterial.tomcurrentdate="'.$date.'"');
       if($data->num_rows()>0){
        return $data->row();
       }else{
        return array('tomcurrentdate'=>0);
       }
    }

    protected function getTableName()
    {
        return $this->table_name;
    }

    public function get_trip_truck()
    {
    	$data = $this->db->query('select ttripdetail.ttdid , ttruck.tnumber from ttripdetail LEFT JOIN ttruck ON ttripdetail.ttdtid = ttruck.tid WHERE ttripdetail.ttdothermaterial = 1');
    	return $data->result();
    }

    public function get_material_truck()
    {
        $data = $this->db->query('select * from tothermaterial');
        return $data->row();
    }

    public function get_truck_material()
    {
        $data1 = $this->db->query('SELECT tothermaterial.tomid, tothermaterial.tomweight , tothermaterial.tomlocation , tothermaterial.tomtransporter , tothermaterial.tomtotalamount , tothermaterial.tomremainingamount , tothermaterial.tompaymentdate , ttruck.tnumber , ttripdetail.ttdsno , ttripdetail.ttddeparturedate FROM tothermaterial LEFT JOIN ttripdetail on tothermaterial.ttdid = ttripdetail.ttdid LEFT JOIN ttruck on ttripdetail.ttdtid = ttruck.tid WHERE ttripdetail.ttdothermaterial = 1');
        return $data1->result();
    }

     public function material_detail($id)
    {
        $data1 = $this->db->query('SELECT tothermaterial.* , ttruck.tnumber , ttripdetail.ttdsno , ttripdetail.ttddeparturedate FROM tothermaterial LEFT JOIN ttripdetail on tothermaterial.ttdid = ttripdetail.ttdid LEFT JOIN ttruck on ttripdetail.ttdtid = ttruck.tid WHERE ttripdetail.ttdothermaterial = 1');
        return $data1->row();
    }

    public function get_last_id($select = "tomid")
    {
        $this->db->select($select);
        $this->db->from('tothermaterial');
        $this->db->order_by("tomid", "desc");
        return $this->db->get()->row('tomid');
    }

    public function get_truck()
    {
        $data = $this->db->query('SELECT ttruck.tnumber , tdailytrip.tid FROM ttruck INNER JOIN tdailytrip on ttruck.tid = tdailytrip.tid GROUP by ttruck.tid');
        return $data->result();
    }

    public function add_otherexpense($s, $d, $a)
    {
        $data = array('toeidentity' => $s, 'toedescription'=>$d , 'toeamount'=>$a);
        return $this->db->insert('totherexpense',$data);
    }
}