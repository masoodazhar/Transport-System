<style>
.text-bold{
    font-weight: bold;
    padding: 10px;
  }

  td{
    border-left: solid 2px;

  }
  .underscore{
    border-bottom: 1px solid;
    width: 100%;
  }
 .my-card
{
    position:absolute;
    left:43%;
    top:-30%;
    border-radius:50%;
    width:50px;

}
.profile-employee {
  padding: 4px;
}

.profile-employee li{
  display: inline-block;
    list-style: none;
    float: left;
    padding: 5px;
}

.profile-employee li img{
    border: solid 2px;
    border-radius: 40px;
    /* float: left;*/
}
.mycard-text{
  padding:0px !important;
}

.profile-employee li h2{
     margin-top: 0px;
    font-size: 18px;
    vertical-align: bottom;
    text-transform: capitalize;
}
.show-error .alert span{
    display: inline-block !important;
    font-weight: bolder;
    background: green;
    padding: 0px 5px 0 5px;
  }
</style>

<div class="content">
        <div class="container-fluid">
        
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Recieve Installment</h4>
                  </div>
                  <div class="card-text">
                    <h4 class="card-title">Total Recieveable Amount is: <strong>Rs. <?=$totalremaining-$get_sumof_closed_amount; ?></strong></h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>close/close_validation">
                 <div class="row">
                  <div class="col-sm-3">
                  <div class="form-group">
                    <select class="selectpicker " id="allnameOfremainingamount" data-style="select-with-transition" title="Choose Name" data-size="5" name="trapdid" tabindex="-98">
                    <?php

                    foreach ($remainingnameids as $key) {
                      $selected='';
                      if($selected_person==$key->tstid && $selected_person!=0){
                        $selected='selected="selected"';
                      }else{
                        $selected='';
                      }
                      echo ' <option '.$selected.' value="'.$key->tstid.'">'.$key->tstname.'</option>';
                    }

                    ?>
                   </select>
                    <span class="text-danger"><?php echo form_error('trapdid'); ?></span>
                  </div>
                </div>
                      <?php if(isset($selected_person)){
                        
                          // if($selected_person>0){
                        ?>
                <div class="col-sm-3">
                  <div class="form-group">
                    <select class="selectpicker " id="allnameOfremainingamount_get_sum_of_table_amount" data-style="select-with-transition" title="Select Truck" data-size="5" name="tableid" tabindex="-98">
                    <?php

                        foreach ($get_truck_name as $key) {
                          $selected='';
                          if($selected_truck==$key->tid){
                            $selected='selected="selected"';
                          }else{
                            $selected='';
                          }
                          echo ' <option '.$selected.' value="'.$key->tid.'">'.$key->tnumber.'</option>';
                        }

                        ?>
                   </select>
                    <span class="text-danger"><?php echo form_error('tableid'); ?></span>
                  </div>
                </div>
                      <?php } ?>

                <div class="col-sm-3">
                  <div class="form-group">
                    <select class="selectpicker " id="trapdctakenfrom" data-style="select-with-transition" title="Choose Cashier" data-size="5" name="trapdctakenfrom" tabindex="-98">
                    <option value="1">Office Staff</option>
                    <option value="2">Haji Jani</option>
                    <option value="3">Driver</option>

                   </select>
                  </div>
                </div>
               
                 
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="exampleEmail" class="">Date</label>
                   <input type="text" name="trapdcdate" class="form-control datepicker">
                    <span class="text-danger"><?php echo form_error('trapdcdate'); ?></span>
                  </div>

                </div>
                <div class="col-sm-3">

                  <div class="form-group">
                    <input type="hidden" name="trapdctruckbuysale" value="1">
                    <label for="exampleEmail" class="bmd-label-floating">Amount</label>
                  <input type="text" name="trapdcamount" class="form-control stillremainingamount_of_truck_typing">
                    <span class="text-danger"><?php echo form_error('trapdcamount'); ?></span>
                  </div>
                  </div>
                <div class="col-sm-2 my-3">
                  <label class="form-check-label">
                            <input class="form-check-input" id="trapdcndate" name="xyz" type="checkbox" value=""> Next date
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                </div>
                <div class="col-sm-6 trapdcndate" style="display: none;">
                  <div class="form-group" >
                    <label for="exampleEmail" class="">Next Date</label>
                   <input type="text" name="trapdcnextdate" class="form-control datepicker">
                  </div>                  
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Description</label>
                     <textarea class="form-control" name="trapdcdescription"></textarea>
                     <input type="hidden" name="tabletype" value="r">
                  </div>
                </div>
              </div>
                   <div class="modal-footer justify-content-center">
                   <?php
                    if($get_all_remaining_from_all_table_on_station_id-$get_sumof_closed_amount_by_personid>0){
                   ?>
                     <input type="submit" class="btn btn-info btn-round" name="addclose" data-dismiss="modal">
                     <?php
                     }else{
                       ?>
                        <a class="btn btn-danger btn-round" name="addclose" data-dismiss="modal">His Account is closed</a>
                       <?php
                     }
                     ?>
                     <a href="#" class="btn btn-danger btn-round">Close</a>
                   </div>
                </form>
               </div>

              </div>
              <div class="row show-error" style="display:none;">
                                <div class="col-md-12">
                                <div class="alert alert-danger" role="alert">
                                  
                                  <strong>Alert!</strong> Total Remaining Amount is <span class="setremainamount "></span> You Typed <span class="settypedamount"></span>. Please Recheck
                                
                                  </div>              
                                </div>
                              </div>
            </div>
                                  
                           <div class="row w-100">
                              <div class="col-md-4">
                                  <div class="card border-info mx-sm-1 p-3">
                                      <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-money" aria-hidden="true"></span></div>
                                      <div class="text-info text-center mt-3"><h4><?=$text;?> Amount Was Remaining</h4></div>
                                      <div class="text-info text-center mt-2"><h2>Rs. <?php echo $get_all_remaining_from_all_table_on_station_id==''?0:$get_all_remaining_from_all_table_on_station_id;  ?></h2></div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="card border-success mx-sm-1 p-3">
                                      <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                                      <div class="text-success text-center mt-3"><h4><?=$text;?> Paid Amount</h4></div>
                                      <div class="text-success text-center mt-2"><h2>Rs. <?= $get_sumof_closed_amount_by_personid?$get_sumof_closed_amount_by_personid:0 ?> </h2></div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="card border-danger mx-sm-1 p-3">
                                      <div class="card border-danger shadow text-danger p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                                      <div class="text-danger text-center mt-3"><h4><?=$text;?> Still Remaining</h4></div>
                                      <div class="text-danger text-center mt-2"><h2>Rs. <span class="stillremainingamount_of_truck"><?php echo abs($get_all_remaining_from_all_table_on_station_id-$get_sumof_closed_amount_by_personid); ?></span></h2></div>
                                  </div>
                              </div>
                          </div>


                          
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Remaining Amount Detals</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                  
                  
                  <!-- <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Trip Remaining Detail </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Station Name :  </span>
                              <span> <?=$stationname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Total Amount:  </span>
                              <span> 21321321</span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" >Total Remaining Amount :  </span>
                              <span>  1000 </span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Total Recieveable Amount:  </span>
                              <span> 1000  </span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Truck No :  </span>
                              <span> MA-251 </span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Truck Departue Date :  </span>
                              <span> 20/10/2019  </span>
                            </td>
                            
                            
                             
                            <td colspan="4">
                              <span  class="text-bold" > Status :  </span>
                              <span>  <?='pending';?></span>
                            </td>
                            
                            
                          </tr>
                         

                          
                      

                        </table> -->
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                       
                          <th> Truck Number </th>
                          <th> Truck Trip </th>
                          <th> Total Remaining </th>
                          <th> Paid Amount </th>
                          <th> Still Remaining </th>
                                                
                          <!-- <th width="15%" class="text-right">Actions</th> -->

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($get_truck_name as $value) {
                          # code...
                        ?>
                        <tr>
                        <td>  <?= $value->tnumber; ?> </td>
                        <td>  <?= $this->ClosedModel->get_trip_on_truck($selected_person, $value->tid); ?> </td>
                        <td>  <?= $this->ClosedModel->get_remaining_on_truck($selected_person, $value->tid); ?> </td>
                        <td> <?= $this->ClosedModel->get_sumof_all_table_closed_amount_by_truck_and_station_id($selected_person, $value->tid) ?> </td>
                        <td> <?= $this->ClosedModel->get_remaining_on_truck($selected_person, $value->tid)-$this->ClosedModel->get_sumof_all_table_closed_amount_by_truck_and_station_id($selected_person, $value->tid)?> </td>
                         <!-- <td>
                            <a href="" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a>
                           
                          </td> -->
                        </tr>
                       <?php
                       }?>
                        
                      </tbody>
                    </table>
                  </div>
          </div>
          
        </div>

        
      </div>
          </div>
        </div>
      </div>