
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php 
                echo base_url() ?>close/add_close/<?=$trapdid;?>
                " class="btn btn-info"><i class="material-icons">add</i> Pay Remaining Amount</a>
                
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
                              <td colspan="4"><span  class="text-bold text-uppercase" > Trip Remaining Detail </td>
                          </tr>
                         
                          
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" >Name :  </span>
                              <span> <?=$tripdetailremainingview->trapdname;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Contact No :  </span>
                              <span> <?=$tripdetailremainingview->trapdcontact;?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span>  <?= abs($tripdetailremainingview->trapdamount);?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payable Date :  </span>
                              <span>  <?=$tripdetailremainingview->trapddate;  ?></span>
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
                          <tr>
                            <td colspan="10">
                               <span  class="text-bold" > Description :  </span>
                              <span>  <?=$tripdetailremainingview->trapddescription;?></span>
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
                         $a =  $this->main_model->get_dailytrip_commission_remaining_after_paid_amount($tripdetailremainingview->trapdid);

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
                              <td colspan="4"><span  class="text-bold text-uppercase" > Trip Remaining Detail </td>
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
                        <td colspan="8"><?php
                         $a =  $this->main_model->get_truck_remaining_after_paid_amount($truckremainingview->trapdid);

                         if($a==null){
                         echo  abs($truckremainingview->trapdamount);
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