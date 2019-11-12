
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
             
              <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Payble Installment</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>main/add_truck_closed">
                 <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <select class="selectpicker " id="allnameOfpayableamount_truck" data-style="select-with-transition" title="Choose Name" data-size="5" name="trapdid" tabindex="-98">
                    <?php

                    foreach ($get_name_of_remaining_of_sold_truck as $key) {
                      $selected='';
                      if($selected_person==$key->trapdid && $selected_person!=0){
                        $selected='selected="selected"';
                      }else{
                        $selected='';
                      }
                      echo ' <option '.$selected.' value="'.$key->trapdid.'">'.$key->trapdname.'</option>';
                    }

                    ?>
                   </select>
                   <input type="hidden" name="tableid" value="ttruck">
                    <span class="text-danger"><?php echo form_error('trapdid'); ?></span>
                  </div>
                </div>
                <div class="col-sm-4">

                  <div class="form-group">
                    <input type="hidden" name="trapdctruckbuysale" value="1">
                    <label for="exampleEmail" class="bmd-label-floating ">Amount</label>
                    <input type="text" name="trapdcamount" class="form-control stillremainingamount_of_truck_typing">
                    <span class="text-danger"><?php echo form_error('trapdcamount'); ?></span>
                  </div>
                  </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <select class="selectpicker " id="trapdctakenfrom" data-style="select-with-transition" title="Choose Cashier" data-size="5" name="trapdctakenfrom" tabindex="-98">
                    <option value="1">Office Staff</option>
                    <option value="2">Haji Jani</option>
                    <option value="3">Driver</option>

                   </select>
                    <span class="text-danger"><?php echo form_error('trapdid'); ?></span>
                  </div>
                </div>
               
                 
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="">Date</label>
                   <input type="text" name="trapdcdate" class="form-control datepicker">
                    <span class="text-danger"><?php echo form_error('trapdcdate'); ?></span>
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
                     <input type="hidden" name="tabletype" value="tr">
                  </div>
                </div>
              </div>
                   <div class="modal-footer justify-content-center">
                   <?php
                  //  $check = $this->main_model->get_truck_remaining_after_paid_amount($truckremainingview->trapdid);
                   $check  = 0;

                   $a =  $this->main_model->get_truck_remaining_after_paid_amount($get_truck_payable_after_paid_amount_view->trapdid);

                   if($a==null){
                    $check =  $get_truck_payable_after_paid_amount_view->trapdamount;
                   }else{
                    $check = $a;
                   }

                    if( $check>0){
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
            </div>


          <div class="row">
              <div class="col-md-3">
                <div class="card-icon">
                  <button class="btn btn-info" onclick="print_dailyexpence()"><i class="material-icons">print</i> Print Report
                  </button>
                  
                  </div>
              </div>

              <div class="col-md-9 show-error" style="display:none;">
                <div class="alert alert-danger" role="alert">
                  
                  <strong>Alert!</strong> Total Remaining Amount is <span class="setremainamount "></span> You Typed <span class="settypedamount"></span>. Please Recheck
               
                </div>              
              </div>
            </div>


              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">map</i>
                  </div>
                  <h4 class="card-title">Trip Summary</h4>
                </div>
                <div class="card-body">
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
  
 </style>
 <?php if($pageload==1){?>
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Trip Summary Detail </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$get_all_payable_amount_from_dailytrip_view->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$get_all_payable_amount_from_dailytrip_view->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Payable Amount is:  </span>
                              <span>  <?= abs($get_all_payable_amount_from_dailytrip_view->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$get_all_payable_amount_from_dailytrip_view->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="4">
                              <span  class="text-bold" >Truck No :  </span>
                              <span>  <?=$get_all_payable_amount_from_dailytrip_view->tnumber;?></span>
                            </td>
                            
                             
                            <td colspan="4">
                              <span  class="text-bold" > Status :  </span>
                              <span>  <?='pending';?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$get_all_payable_amount_from_dailytrip_view->trapddescription;?></span>
                            </td>
                          </tr>

                          <?php 

                          foreach ($get_dailytrip_payable_after_paid_amount_view_list as $afterpaidremainingdetailresult) {
                            ?>
                            <tr>
                              <td colspan="2">
                                <span  class="text-bold" >Payment Date :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdate;?></span>
                              </td>
                              <td colspan="2">
                                <span  class="text-bold" >Next Payment Date :  </span>
                                <span> <?=$afterpaidremainingdetailresult->trapdcnextdate;?></span>
                              </td>
                              
                              <td colspan="2">
                                <span  class="text-bold" >Recieved Amount :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcamount;?></span>
                              </td>
                               
                              <td colspan="2">
                                <span  class="text-bold" > Description :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdescription;?></span>
                              </td>
                            </tr>

                            <?php
                          }
                          ?>
                      <tr>
                        <td colspan="2">Still Recieveable Amount</td>
                        <td colspan="8"><?php
                         $a =  $this->main_model->get_dailytrip_commission_payable_after_paid_amount($get_all_payable_amount_from_dailytrip_view->trapdid);

                         if($a==null){
                         echo  abs($get_all_payable_amount_from_dailytrip_view->trapdamount);
                         }else{
                          echo $a;
                         }


                          ?></td>
                      </tr>

                        </table>
  <?php 
              } else if($pageload==2){ 
  ?>
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Trip Remaining Detail </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$get_tripdetil_payable_after_paid_amount_view->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$get_tripdetil_payable_after_paid_amount_view->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($get_tripdetil_payable_after_paid_amount_view->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$get_tripdetil_payable_after_paid_amount_view->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="4">
                              <span  class="text-bold"> Truck No :  </span>
                              <span>  <?=$get_tripdetil_payable_after_paid_amount_view->tnumber;?></span>
                            </td>
                           
                            <td colspan="4">
                              <span  class="text-bold" > Transporter Name :  </span>
                              <span>  <?=$get_tripdetil_payable_after_paid_amount_view->ttdstation;?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            
                            <td colspan="4">
                              <span  class="text-bold" >Payment Date :  </span>
                              <span> <?=$get_tripdetil_payable_after_paid_amount_view->trapddate;?></span>
                            </td>
                            
                            
                            <td colspan="4">
                              <span  class="text-bold" > Status :  </span>
                              <span>  <?='pending';?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$get_tripdetil_payable_after_paid_amount_view->trapddescription;?></span>
                            </td>
                          </tr>
                      
                          <?php 

                          foreach ($get_tripdetail_payable_after_paid_amount_view_list as $afterpaidremainingdetailresult) {
                            ?>
                            <tr>
                              <td colspan="2">
                                <span  class="text-bold" >Payment Date :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdate;?></span>
                              </td>
                              <td colspan="2">
                                <span  class="text-bold" >Next Payment Date :  </span>
                                <span> <?=$afterpaidremainingdetailresult->trapdcnextdate;?></span>
                              </td>
                              
                              <td colspan="2">
                                <span  class="text-bold" >Recieved Amount :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcamount;?></span>
                              </td>
                               
                              <td colspan="2">
                                <span  class="text-bold" > Description :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdescription;?></span>
                              </td>
                            </tr>

                            <?php
                          }
                          ?>
                      <tr>
                        <td colspan="2">Still Recieveable Amount</td>
                        <td colspan="8"><?php
                         $a =  $this->main_model->get_tripdetil_payable_after_paid_amount($get_tripdetil_payable_after_paid_amount_view->trapdid);

                         if($a==null){
                         echo  abs($get_tripdetil_payable_after_paid_amount_view->trapdamount);
                         }else{
                          echo $a;
                         }


                          ?></td>
                      </tr>

                        </table>
  <?php } else if($pageload==3){ 
  ?>
  
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Parchoon Remaining Detail </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$get_othermaterial_payable_after_paid_amount_view->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$get_othermaterial_payable_after_paid_amount_view->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($get_othermaterial_payable_after_paid_amount_view->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$get_othermaterial_payable_after_paid_amount_view->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="4">
                              <span  class="text-bold" >Truck No :  </span>
                              <span>  <?=$get_othermaterial_payable_after_paid_amount_view->tnumber;?></span>
                            </td>
                            
                          
                             
                            <td colspan="4">
                              <span  class="text-bold" > Total Price :  </span>
                              <span>  <?=$get_othermaterial_payable_after_paid_amount_view->tomtotalamount;?></span>
                            </td>
                            
                            
                          </tr>
                          
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$get_othermaterial_payable_after_paid_amount_view->trapddescription;?></span>
                            </td>
                          </tr>
                       <?php 

                          foreach ($get_othermaterial_payable_after_paid_amount_view_list as $afterpaidremainingdetailresult) {
                            ?>
                            <tr>
                              <td colspan="2">
                                <span  class="text-bold" >Payment Date :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdate;?></span>
                              </td>
                              <td colspan="2">
                                <span  class="text-bold" >Next Payment Date :  </span>
                                <span> <?=$afterpaidremainingdetailresult->trapdcnextdate;?></span>
                              </td>
                              
                              <td colspan="2">
                                <span  class="text-bold" >Recieved Amount :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcamount;?></span>
                              </td>
                               
                              <td colspan="2">
                                <span  class="text-bold" > Description :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdescription;?></span>
                              </td>
                            </tr>

                            <?php
                          }
                          ?>
                      <tr>
                        <td colspan="2">Still Recieveable Amount</td>
                        <td colspan="8"><?php
                         $a =  $this->main_model->get_otheramount_payable_after_paid_amount($get_othermaterial_payable_after_paid_amount_view->trapdid);

                         if($a==null){
                         echo  abs($get_othermaterial_payable_after_paid_amount_view->trapdamount);
                         }else{
                          echo $a;
                         }


                          ?></td>
                      </tr>

                        </table>
  <?php } else if($pageload==4){ 
  ?>
  
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Truck Details </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$get_truck_payable_after_paid_amount_view->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$get_truck_payable_after_paid_amount_view->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($get_truck_payable_after_paid_amount_view->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$get_truck_payable_after_paid_amount_view->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="4">
                              <span  class="text-bold" >Truck No :  </span>
                              <span>  <?=$get_truck_payable_after_paid_amount_view->tnumber;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Total Price :  </span>
                              <span>  <?=$get_truck_payable_after_paid_amount_view->tprice;?></span>
                            </td>
                            
                             
                            <td colspan="2">
                              <span  class="text-bold" > Paid Amount :  </span>
                              <span>  <?=$get_truck_payable_after_paid_amount_view->tpaidamount;?></span>
                            </td>
                            
                            
                          </tr>
                          
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$get_truck_payable_after_paid_amount_view->trapddescription;?></span>
                            </td>
                          </tr>
                       <?php 

                          foreach ($get_truck_payable_after_paid_amount_view_list as $afterpaidremainingdetailresult) {
                            ?>
                            <tr>
                              <td colspan="2">
                                <span  class="text-bold" >Payment Date :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdate;?></span>
                              </td>
                              <td colspan="2">
                                <span  class="text-bold" >Next Payment Date :  </span>
                                <span> <?=$afterpaidremainingdetailresult->trapdcnextdate;?></span>
                              </td>
                              
                              <td colspan="2">
                                <span  class="text-bold" >Recieved Amount :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcamount;?></span>
                              </td>
                               
                              <td colspan="2">
                                <span  class="text-bold" > Description :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdescription;?></span>
                              </td>
                            </tr>

                            <?php
                          }
                          ?>
                      <tr>
                        <td colspan="2">Still Recieveable Amount</td>
                        <td colspan="8"><?php
                         $a =  $this->main_model->get_truck_payable_after_paid_amount($get_truck_payable_after_paid_amount_view->trapdid);

                         if($a==null){
                         echo  abs($get_truck_payable_after_paid_amount_view->trapdamount);
                         }else{
                          echo $a;
                         }


                          ?></td>
                      </tr>

                        </table>
  <?php } else if($pageload==5){ 
  ?>
  
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Return Trip Details </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$get_return_payable_after_paid_amount_view->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$get_return_payable_after_paid_amount_view->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($get_return_payable_after_paid_amount_view->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="4">
                              <span  class="text-bold" >Truck No :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->tnumber;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Total Price :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->tprice;?></span>
                            </td>
                            
                             
                            <td colspan="2">
                              <span  class="text-bold" > Paid Amount :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->tpaidamount;?></span>
                            </td>
                            
                            
                          </tr>
                          
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->trapddescription;?></span>
                            </td>
                          </tr>
                       <?php 

                          foreach ($get_return_payable_after_paid_amount_view_list as $afterpaidremainingdetailresult) {
                            ?>
                            <tr>
                              <td colspan="2">
                                <span  class="text-bold" >Payment Date :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdate;?></span>
                              </td>
                              <td colspan="2">
                                <span  class="text-bold" >Next Payment Date :  </span>
                                <span> <?=$afterpaidremainingdetailresult->trapdcnextdate;?></span>
                              </td>
                              
                              <td colspan="2">
                                <span  class="text-bold" >Recieved Amount :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcamount;?></span>
                              </td>
                               
                              <td colspan="2">
                                <span  class="text-bold" > Description :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdescription;?></span>
                              </td>
                            </tr>

                            <?php
                          }
                          ?>
                      <tr>
                        <td colspan="2">Still Recieveable Amount</td>
                        <td colspan="8"><?php
                         $a =  $this->main_model->get_returntrip_payable_after_paid_amount($get_return_payable_after_paid_amount_view->trapdid);

                         if($a==null){
                         echo  abs($get_return_payable_after_paid_amount_view->trapdamount);
                         }else{
                          echo $a;
                         }


                          ?></td>
                      </tr>

                        </table>
  <?php } else if($pageload==6){ 
  ?>
  
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Pump Details </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$get_return_payable_after_paid_amount_view->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$get_return_payable_after_paid_amount_view->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($get_return_payable_after_paid_amount_view->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="4">
                              <span  class="text-bold" >Truck No :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->tnumber;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Total Price :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->tprice;?></span>
                            </td>
                            
                             
                            <td colspan="2">
                              <span  class="text-bold" > Paid Amount :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->tpaidamount;?></span>
                            </td>
                            
                            
                          </tr>
                          
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$get_return_payable_after_paid_amount_view->trapddescription;?></span>
                            </td>
                          </tr>
                       <?php 

                          foreach ($get_return_payable_after_paid_amount_view_list as $afterpaidremainingdetailresult) {
                            ?>
                            <tr>
                              <td colspan="2">
                                <span  class="text-bold" >Payment Date :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdate;?></span>
                              </td>
                              <td colspan="2">
                                <span  class="text-bold" >Next Payment Date :  </span>
                                <span> <?=$afterpaidremainingdetailresult->trapdcnextdate;?></span>
                              </td>
                              
                              <td colspan="2">
                                <span  class="text-bold" >Recieved Amount :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcamount;?></span>
                              </td>
                               
                              <td colspan="2">
                                <span  class="text-bold" > Description :  </span>
                                <span>  <?=$afterpaidremainingdetailresult->trapdcdescription;?></span>
                              </td>
                            </tr>

                            <?php
                          }
                          ?>
                      <tr>
                        <td colspan="2">Still Recieveable Amount</td>
                        <td colspan="8"><?php
                         $a =  $this->main_model->get_returntrip_payable_after_paid_amount($get_return_payable_after_paid_amount_view->trapdid);

                         if($a==null){
                         echo  abs($get_return_payable_after_paid_amount_view->trapdamount);
                         }else{
                          echo $a;
                         }


                          ?></td>
                      </tr>

                        </table>
  <?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>