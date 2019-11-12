<?php

/**
 * Created by PhpStorm.
 * User: ik
 * Date: 2/11/2019
 * Time: 11:24 AM
 */
class base_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    public function add_data($data = array())
    {
        if($this->getTableName()=='ttruck'){
            $tnumber = $data['tnumber'];
            $tinsurancedate = $data['tinsurancedate'];
            $tpermitdate = $data['tpermitdate'];
            $tfitnessdate = $data['tfitnessdate'];

            $this->db->insert('trucknotification',array('tntnumber'=>$tnumber, 'tninsuranceexpirydate'=>$tinsurancedate, 'tnpermitexpirydate'=>$tpermitdate, 'tnfitnessexpirydate'=>$tfitnessdate ));
        }

        if(isset($data['tabletype']) && $data['tabletype']!=0){

        }


        return $this->db->insert($this->getTableName(), $data) ? $this->db->insert_id() : FALSE;


    }


    public function delete_data($where)
    {
         if($this->getTableName()=='ttruck'){
             $id = $this->input->get('tid');
             $this->db->query('delete from trucknotification where tnid='.$id.'');
        }
        $this->db->where($where);
        $this->db->from($this->getTableName());
         return $this->db->delete();


    }


    public function update_data($data = array(), $where = array())
    {
        $this->db->where($where);
        return $this->db->update($this->getTableName(), $data) ? TRUE : FALSE;
    }




    public function fetch_data($select = "*", $where = '')
    {
        $this->db->select($select);
        $this->db->from($this->getTableName());
        if (!empty($where)) {
            $this->db->where($where);
        }

        return $this->db->get()->result();
    }

    public function single_fetch($select = "*", $where = '')
    {
        $this->db->select($select);
        $this->db->from($this->getTableName());
        if (!empty($where)) {
            $this->db->where($where);
        }
        return $this->db->get()->row();
    }


}
