
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>Localtrip/add_local" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                <button class="btn btn-info" onclick="jQuery('#print_area').print()"><i class="material-icons">print</i> Print</a>

              </div>

              <div class="card" >
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">toll</i>
                  </div>
                  <div class="card-icon" style="background: white !important;">
                  <form class="" action="<?=base_url()?>Localtrip/search_data" method="get">
                  <div class="row">
                    <div class="col-sm-3">
                      <select class="selectpicker" name="truck"  data-style="select-with-transition" title="Select Vehicle Number" data-size="5" tabindex="-98">
                        <?php
                         foreach ($dumper as $key)
                         {
                           $selected = '';
                           if($selected_truck==$key->tnumber){
                             $selected = 'selected="selected"';
                           }else{
                              $selected = '';
                           }
                           echo '<option '.$selected.' value="'.$key->tnumber.'">'.$key->tnumber.'</option>';
                         }
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-3">
                      <select class="selectpicker" name="station"  data-style="select-with-transition" title="Select Load Point <?=$selected_station;?>" data-size="5" tabindex="-98">
                        <?php
                         foreach ($station as $row)
                         {
                            $selected = '';
                           if($selected_station==$row->tstid){
                             $selected = 'selected="selected"';
                           }else{
                              $selected = '';
                           }
                           echo '<option '.$selected.' value="'.$row->tstid.'">'.$row->tstname.'</option>';
                         }
                        ?>
                      </select>
                    </div>
                    <div class="col-sm-3">
                        <input type="text" name="date" placeholder="Date" class="mx-4 datepicker form-control ">
                    </div>
                    <div class="col-sm-3">
                        <input type="submit" name="" class="ml-4 btn btn-primary" value="Search">
                    </div>
                  </div>




                  </form>
                </div>

                </div>


                <div class="card-body" id="print_area">

                  <div class="material-datatables my-4">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>DATE</th>
                          <th>VHICLE NUMBER</th>
                          <th>LOAD POINT</th>
                          <th>LOAD WEIGHT</th>
                          <th>RATE PARTON</th>
                          <th>ADVANCES</th>
                          <th>TOTAL AMOUNT</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         if(count($local_data) > 0){ $id=1; foreach ($local_data as $results)
                          {
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?=$results->ltdate; ?></td>
                          <td><?=$results->ltvehiclenumber; ?></td>
                          <td><?=$results->tstname; ?></td>
                          <td><?=$results->ltweight; ?></td>
                          <td><?=$results->ltrateparton; ?></td>
                          <td><?=$results->ltadvances; ?></td>
                          <td><?=$results->lttotalamount; ?></td>
                          <td class="td-actions text-right">
                            <a data-toggle="modal" data-target="#get_detail" href="#" rel="tooltip" class="btn btn-success view" data-id="<?=$results->ltid?>">
                              <i class="material-icons">remove_red_eye</i>
                            </a>
                          </td>
                        </tr>
                        <?php
                          $id++;
                          }
                        }
                        else
                        {
                        ?>
                          <tr>
                            <td colspan="10" class="text-center btn-danger text-center">No Data Found</td>
                          </tr>
                        <?php
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>



<style>
tr td{
  text-align: center;
}
</style>

          <table class="table-striped my-4" border="1" width="100%">
            <tr>
              <td width="10%">&nbsp;</td>
              <td width="15%">&nbsp;</td>
              <td width="10%">TOTAL</td>
              <td width="15%"><?=$total_weights;?></td>
              <td width="15%">&nbsp;</td>
              <td width="10%"><?=$advances;?></td>
              <td width="25%"><?=$totalamount;?></td>
            </tr>
            <tr>
              <td colspan="8" width="100%">&nbsp;</td>

            </tr>
            <tr>
              <td colspan="2" width="15%">TRANSPORTAION PARTION AS</td>
              <td colspan="5" width="85%" style="text-align:left;"><?=rtrim($partion,'/');?></td>
            </tr>
            <tr>
              <td colspan="2">NET AMOUNT</td>
              <td colspan="5" style="text-align:left;"><?=$totalamount;?></td>
            </tr>
            <tr>
              <td colspan="2">ADVANCE</td>
              <td colspan="5" style="text-align:left;"><?=$advances;?></td>
            </tr>
            <tr>
              <td colspan="2">TOTAL AMOUNT BALANCE</td>
              <td colspan="5" style="text-align:left;"><?=$totalamount-$advances;?></td>
            </tr>
            <tr style="background:white !important; border: 0px !important;">
              <td colspan="8" style="background:white !important;  border: 0px !important;">&nbsp;</td>
            </tr>
            <tr style="border:solid 1px; text-align:center;text-transform: uppercase; font-weight:bolder;">
              <td colspan="8"><?php echo $this->LocalModel->convertNumber($totalamount-$advances); echo $totalamount-$advances=='0'?'ZERO ':''?> RUPEES ONLY.</td>
            </tr>

            <tr style="background:white !important; border: 0px !important;">
              <td colspan="8" style="background:white !important;  border: 0px !important;">&nbsp;</td>
            </tr>
            <tr style="background:white !important;  border: 0px !important;">
              <td colspan="8" style="background:white !important;  border: 0px !important;">&nbsp;</td>
            </tr>
            <tr style="background:white !important;  border: 0px !important;">
              <td colspan="8" style="background:white !important;  border: 0px !important;">&nbsp;</td>
            </tr>
            <tr style="background:white !important; border: 0px !important;">
              <td colspan="4" style="background:white !important;  border: 0px !important;">
                <p style="border-top: 1px solid; text-align: center; width: 100%; margin-left: 25px;">Properitor</p>
              </td>
              <td colspan="4" style="background:white !important;  border: 0px !important;">
                <p style="border: 1px solid; text-align: center; width: 80%; float:right;">Al FARAZ FREIGHT SERVICE</p>
              </td>
            </tr>
            <tr style="background:white !important;  border: 0px !important;">
              <td colspan="8" style="background:white !important;  border: 0px !important;">&nbsp;</td>
            </tr>
          </table>


</div>
        </div>
      </div>
      </div>
    </div>
  </div>

      <!-- Classic Modal -->
                      <div class="modal fade" id="get_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">SHOP DETAIL</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table" id="datatables2">
                                <thead>
                                <tr>
                                  <th>Shop</th>
                                  <th>No. Of pair</th>
                                  <th>Total Price</th>
                                  <th>Paid Amount</th>
                                  <th>Remaining</th>
                                  <th>Date</th>
                                </tr>
                                </thead>
                              <tbody class="setdata">


                              </tbody>
                            </table>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  End Modal -->
