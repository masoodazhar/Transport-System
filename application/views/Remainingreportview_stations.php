
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
  .alert span{
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
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>main/add_truck_closed">
                 <div class="row">
                  <div class="col-sm-4">
                  <div class="form-group">
                    <select class="selectpicker " id="allnameOfremainingamount_truck" data-style="select-with-transition" title="Choose Name" data-size="5" name="trapdid" tabindex="-98">
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
                     <input type="hidden" name="tabletype" value="r">
                  </div>
                </div>
              </div>
                   <div class="modal-footer justify-content-center">
                   <?php
                  //  $check = $this->main_model->get_truck_remaining_after_paid_amount($truckremainingview->trapdid);
                   $check  = 0;

                   $a =  $this->main_model->get_truck_remaining_after_paid_amount($truckremainingview->trapdid);

                   if($a==null){
                    $check =  $truckremainingview->trapdamount;
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





              <div class="card " id="print_dailyexpence_page" >
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">map</i>
                  </div>
                  <h4 class="card-title">Trip Summary</h4>
                </div>
                <div class="card-body">

 




 <?php if($pageload==1){?>
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Trip Remaining Detail </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Station Name :  </span>
                              <span> <?=$tripdetailremainingview->tstname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$tripdetailremainingview->tstcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?=$tripdetailremainingview->tdremainingamount;?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?php echo date('Y-m-d', strtotime($tripdetailremainingview->tdcurrentdate. ' + 20 day'));  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Truck No :  </span>
                              <span>  <?=$tripdetailremainingview->tnumber;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Truck Departue Date :  </span>
                              <span> <?=$tripdetailremainingview->tddeparturedate;?></span>
                            </td>
                            
                            
                             
                            <td colspan="4">
                              <span  class="text-bold" > Status :  </span>
                              <span>  <?='pending';?></span>
                            </td>
                            
                            
                          </tr>
                         

                          <?php 

                          foreach ($get_dailytrip_remaining_after_paid_amount_view_list as $afterpaidremainingdetailresult) {
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
                         $a =  $this->main_model->get_dailytrip_commission_remaining_after_paid_amount($tripdetailremainingview->tstid);

                         if($a==null){
                         echo  abs($tripdetailremainingview->trapdamount);
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
                              <span> <?=$dailytripremainingview->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$dailytripremainingview->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($dailytripremainingview->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$dailytripremainingview->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold"> Truck No :  </span>
                              <span>  <?=$dailytripremainingview->tnumber;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Truck Departue Date :  </span>
                              <span> <?=$dailytripremainingview->ttddeparturedate;?></span>
                            </td>
                            
                             
                            <td colspan="4">
                              <span  class="text-bold" > Transporter Name :  </span>
                              <span>  <?=$dailytripremainingview->ttdstation;?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            
                            <td colspan="4">
                              <span  class="text-bold" >Payment Date :  </span>
                              <span> <?=$dailytripremainingview->trapddate;?></span>
                            </td>
                            
                             
                            <td colspan="4">
                              <span  class="text-bold" > Status :  </span>
                              <span>  <?='pending';?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$dailytripremainingview->trapddescription;?></span>
                            </td>
                          </tr>
                      
                          <?php 

                          foreach ($get_tripdetail_remaining_after_paid_amount_view_list as $afterpaidremainingdetailresult) {
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
                         $a =  $this->main_model->get_tripdetil_remaining_after_paid_amount($dailytripremainingview->trapdid);

                         if($a==null){
                         echo  abs($dailytripremainingview->trapdamount);
                         }else{
                          echo $a;
                         }


                          ?></td>
                      </tr>

                        </table>
  <?php }  else if($pageload==3){ 
  ?>
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Trip Remaining Detail </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$othermaterialremainingview->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$othermaterialremainingview->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($othermaterialremainingview->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$othermaterialremainingview->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="6">
                              <span  class="text-bold"> Truck No :  </span>
                              <span>  <?=$othermaterialremainingview->tnumber;?></span>
                            </td>
                           
                            
                            <td colspan="2">
                              <span  class="text-bold" > Transporter Name :  </span>
                              <span>  <?=$othermaterialremainingview->tomtransporter;?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Remain Commission Amount :  </span>
                              <span>  <?=$othermaterialremainingview->tomremainingcommission;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Payment Date :  </span>
                              <span> <?=$othermaterialremainingview->tompaymentdate;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" >Unloading Location :  </span>
                              <span>  <?=$othermaterialremainingview->tomlocation;?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Status :  </span>
                              <span>  <?='pending';?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$othermaterialremainingview->trapddescription;?></span>
                            </td>
                          </tr>
                      
                          <?php 

                          foreach ($afterpaidremainingdetail as $afterpaidremainingdetailresult) {
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
                         $a =  $this->main_model->get_otheramount_remaining_after_paid_amount($othermaterialremainingview->trapdid);

                         if($a==null){
                         echo  abs($othermaterialremainingview->trapdamount);
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
                              <td colspan="4"><span  class="text-bold text-uppercase" > Truck Remaining Detail </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$truckremainingview->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$truckremainingview->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($truckremainingview->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$truckremainingview->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Truck No :  </span>
                              <span>  <?=$truckremainingview->tnumber;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Truck Model  :  </span>
                              <span> <?=$truckremainingview->tmodel;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" >Payment Method:  </span>
                              <span>  <?=$truckremainingview->tmethod;?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Total Price :  </span>
                              <span>  <?=$truckremainingview->tprice;?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Installment Duration :  </span>
                              <span>  <?=$truckremainingview->tinstallmethod;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Paid Amount :  </span>
                              <span> <?=$truckremainingview->tpaidamount;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" >Vehicle  Type:  </span>
                              <span>  <?=$truckremainingview->ttdtype;?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Status :  </span>
                              <span>  <?='pending';?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$truckremainingview->trapddescription;?></span>
                            </td>
                          </tr>
                       <?php 

                          foreach ($afterpaidremainingdetail as $afterpaidremainingdetailresult) {
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
                        <td colspan="8" class="stillremainingamount_of_truck"><?php
                         $a =  $this->main_model->get_truck_remaining_after_paid_amount($truckremainingview->trapdid);

                         if($a==null){
                         echo  $truckremainingview->trapdamount;
                         }else{
                          echo $a;
                         }


                          ?></td>
                      </tr>

                        </table>
  <?php }
   if($pageload==5){ 
  ?>
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                              <td colspan="6"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="4"><span  class="text-bold text-uppercase" > Trip Remaining Detail </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$return_remainingview->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$return_remainingview->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($return_remainingview->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$return_remainingview->trapddate;  ?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Truck No :  </span>
                              <span>  <?=$return_remainingview->tnumber;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Truck Model  :  </span>
                              <span> <?=$return_remainingview->tmodel;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" >Payment Method:  </span>
                              <span>  <?=$return_remainingview->tmethod;?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Total Price :  </span>
                              <span>  <?=$return_remainingview->tprice;?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Installment Duration :  </span>
                              <span>  <?=$return_remainingview->tinstallmethod;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Paid Amount :  </span>
                              <span> <?=$return_remainingview->tpaidamount;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" >Vehicle  Type:  </span>
                              <span>  <?=$return_remainingview->ttdtype;?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Status :  </span>
                              <span>  <?='pending';?></span>
                            </td>
                            
                            
                          </tr>
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$return_remainingview->trapddescription;?></span>
                            </td>
                          </tr>
                       <?php 

                          foreach ($afterpaidremainingdetail as $afterpaidremainingdetailresult) {
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
                         $a =  $this->main_model->get_truck_remaining_after_paid_amount($return_remainingview->trapdid);

                         if($a==null){
                         echo  abs($return_remainingview->trapdamount);
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