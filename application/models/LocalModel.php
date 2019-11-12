<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH."models/base_model.php";
class LocalModel extends base_model
{
    private  $table_name ="localtrip";

    protected function getTableName()
    {
        return $this->table_name;
    }

    public function get_station_name()
    {
    	$data = $this->db->query("SELECT tstation.tstid , tstation.tstname FROM tcity INNER JOIN tstation on tcity.tcid = tstation.tcid WHERE tcity.tcname = 'karachi'");
    	return $data->result();
    }

    public function get_station($station, $truck, $date)
    {
        if($station!='' && $truck=='' && $date==''){
  				  $data = $this->db->query('SELECT localtrip.* , tstation.tstname FROM localtrip INNER JOIN tstation ON localtrip.ltpoint = tstation.tstid AND tstation.tstid='.$station.' ');

  		}else if($station!='' && $truck!='' && $date==''){
        $data = $this->db->query('SELECT localtrip.* , tstation.tstname FROM localtrip INNER JOIN tstation ON localtrip.ltpoint = tstation.tstid AND tstation.tstid='.$station.' AND localtrip.ltvehiclenumber="'.$truck.'"');

  		}else if($station=='' && $truck!='' && $date==''){
        $data = $this->db->query('SELECT localtrip.* , tstation.tstname FROM localtrip INNER JOIN tstation ON localtrip.ltpoint = tstation.tstid AND localtrip.ltvehiclenumber="'.$truck.'"');

  		}else if($station!='' && $truck!='' && $date!=''){
        $data = $this->db->query('SELECT localtrip.* , tstation.tstname FROM localtrip INNER JOIN tstation ON localtrip.ltpoint = tstation.tstid AND tstation.tstid='.$station.' AND localtrip.ltvehiclenumber="'.$truck.'" AND localtrip.ltdate="'.$date.'" ');


  		}else if($station=='' && $truck!='' && $date!=''){
        $data = $this->db->query('SELECT localtrip.* , tstation.tstname FROM localtrip INNER JOIN tstation ON localtrip.ltpoint = tstation.tstid AND localtrip.ltvehiclenumber="'.$truck.'" AND localtrip.ltdate="'.$date.'" ');


  		}else if($station=='' && $truck=='' && $date!=''){
        $data = $this->db->query('SELECT localtrip.* , tstation.tstname FROM localtrip INNER JOIN tstation ON localtrip.ltpoint = tstation.tstid  AND localtrip.ltdate="'.$date.'" ');


  		}else if($station=='' && $truck=='' && $date==''){
        $data = $this->db->query('SELECT localtrip.* , tstation.tstname FROM localtrip INNER JOIN tstation ON localtrip.ltpoint = tstation.tstid');


  		}else{
        $data = $this->db->query('SELECT localtrip.* , tstation.tstname FROM localtrip INNER JOIN tstation ON localtrip.ltpoint = tstation.tstid');

  		}

        return $data->result();
    }

  public  function convertNumber($num = false)
{
    $num = str_replace(array(',', ''), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
        'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
    );
    $list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
    $list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : '' ) . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' and ' . $list1[$tens] . ' ' : '' );
        } elseif ($tens >= 20) {
            $tens = (int)($tens / 10);
            $tens = ' and ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    $words = implode(' ',  $words);
    $words = preg_replace('/^\s\b(and)/', '', $words );
    $words = trim($words);
    $words = ucfirst($words);
    $words = $words . ".";
    return $words;
}
}
