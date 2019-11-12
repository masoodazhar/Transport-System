
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>close/add_close" class="btn btn-info"><i class="material-icons">remove_red_eye</i>View and Close Remaining </a>
                
              </div>
              <!-- <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Comission from tdailytrip</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Station Name</th>
                          <th>Remaining Amount</th>
                          <th>Returned Amount</th>
                          <th>Recieveable</th>
                          <th>Payable Date</th>

                          
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($dailytrip_commission_details as $results) { ?>
                        <tr> 
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tstname; ?></td>
                          <td><?php echo $results->tdremainingamount; ?></td>
                          <td><?php echo $this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid, 'tdailytrip')?$this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid, 'tdailytrip'):0?></td>
                          <td><?php echo $results->tdremainingamount-$this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid  , 'tdailytrip')?></td>
                          <td><?php echo date('Y-m-d', strtotime($results->tdcurrentdate. ' + 20 day')) ?></td>
                          
                          <td class="td-actions text-right">
                            <!-- <a href="<?php echo base_url()?>main/remainingreportview/1/<?php echo $results->tstid ;?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i>
                            </a>  -->
                            <a href="#" rel="tooltip" class="btn btn-success viewtable_details">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <input type="hidden" class="stationid" value="<?=$results->tstid;?>">
                            <input type="hidden" class="tablename" value="tdailytrip">
                            <input type="hidden" class="remain_columname" value="tdremainingamount">
                            <input type="hidden" class="station_columname" value="tstid">
                            <input type="hidden" class="stationname" value="<?php echo $results->tstname; ?>">
                            <a href="" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a>
                          </td>
                        </tr>
                        <?php
                          $id++;  
                          }
                       
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> -->



               
              <!-- <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Voucher Details from tripdetail</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables1">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Truck Number </th>
                          <th>Remaining Amount</th>
                          <th>Returned Amount</th>
                          <th>Recieveable</th>
                          <th>Payable Date</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($tripsummary as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tstname; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo $results->ttdremainingamount; ?></td>
                          <td><?php echo $this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid, 'ttripdetail')?$this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid, 'ttripdetail'):0?></td>
                          <td><?php echo $results->ttdremainingamount-$this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid  , 'ttripdetail')?></td>
                          <td><?php echo date('Y-m-d', strtotime($results->crnt_date. ' + 20 day')) ?></td>
                          
                          <td class="td-actions text-right">
                         <a href="<?php echo base_url()?>main/remainingreportview/2/<?php echo $results->trapdid ;?>"" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i>
                            </a>  
                            <a href="#" rel="tooltip" class="btn btn-success viewtable_details">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <input type="hidden" class="stationid" value="<?=$results->tstid;?>">
                            <input type="hidden" class="tablename" value="tdailytrip">
                            <input type="hidden" class="remain_columname" value="tdremainingamount">
                            <input type="hidden" class="station_columname" value="tstid">
                            <a href="" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a>
                          </td>
                        </tr>
                        <?php
                          $id++;  
                          }
                        
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  -->
 
              <!-- <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Parchoon from Other Material Remaining Amount Detail</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables2">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Truck</th>
                          <th>Remaining Amount</th>
                          <th>Returned Amount</th>
                          <th>Recieveable</th>
                          <th>Payable Date</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $id=1; foreach ($othermaterialremaining as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tstname; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo $results->tomremainingamount; ?></td>
                          <td><?php echo $this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid, 'tothermaterial')?$this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid, 'tothermaterial'):0?></td>
                          <td><?php echo $results->tomremainingamount-$this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid  , 'tothermaterial')?></td>
                          <td><?php echo date('Y-m-d', strtotime($results->tomcurrentdate. ' + 20 day')) ?></td>
       
                          
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url()?>main/remainingreportview/3/<?php echo $results->tstid ;?>"" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i>
                            </a>  
                            <a href="#" rel="tooltip" class="btn btn-success viewtable_details">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <input type="hidden" class="stationid" value="<?=$results->tstid;?>">
                            <input type="hidden" class="tablename" value="tothermaterial">
                            <input type="hidden" class="remain_columname" value="tomremainingamount">
                            <input type="hidden" class="station_columname" value="tomtransporter">
                            <input type="hidden" class="stationname" value="<?php echo $results->tstname; ?>">
                            <a href="" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a>
                          </td>
                        </tr>
                        <?php
                          $id++;  
                          }
                        
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              -->
             

               <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Truck Remaining Amount Detail</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables3">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Payment Reciever Name</th>
                          <th>Trcuk Number</th>
                          <th>Remaining Amount</th>
                          <th>Payable Date</th>
                          <th>Recieveable</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($truckremaining) > 0){ $id=1; foreach ($truckremaining as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo $results->tremainingamount; ?></td>
                          <td><?php echo $results->trapddate; ?></td>
                          <td>
                          <?php 
                             $a = $this->main_model->get_truck_remaining_after_paid_amount($results->trapdid);
                             

                             if($a==null){
                              echo 'All Pending';
                             }else if($a>0){
                              echo $a;
                             }
                             else{
                              echo 'clear';
                             }
                           ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url()?>main/remainingreportview/4/<?php echo $results->trapdid ;?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
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
                            <td colspan="6" class="text-center btn-danger text-center">No Data Found</td>
                          </tr>
                        <?php
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>


               
              <!-- <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Return Trip Details</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables4">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Truck Number</th>
                          <th>Remaining Amount</th>
                          <th>Returned Amount</th>
                          <th>Recieveable</th>
                          <th>Payable Date</th>
                         
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $id=1; foreach ($returntrip_remaining as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tstname; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo abs($results->trremainingamount); ?></td>
                          <td><?php echo $this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid, 'treturntrip')?$this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid, 'treturntrip'):0?></td>
                          <td><?php echo $results->trremainingamount-$this->ClosedModel->get_sumof_one_table_closed_amount_by_personid($results->tstid  , 'treturntrip')?></td>
                          <td><?php echo date('Y-m-d', strtotime($results->trcurrentdate. ' + 20 day')) ?></td>
       
                          
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url()?>main/remainingreportview/5/<?php echo $results->tstid ;?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="#" rel="tooltip" class="btn btn-success viewtable_details">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <input type="hidden" class="stationid" value="<?=$results->tstid;?>">
                            <input type="hidden" class="tablename" value="treturntrip">
                            <input type="hidden" class="remain_columname" value="trremainingamount">
                            <input type="hidden" class="station_columname" value="tstid">
                            <input type="hidden" class="stationname" value="<?php echo $results->tstname; ?>">
                            <a href="" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a>
                          </td>
                        </tr>
                        <?php
                          $id++;  
                          }
                       
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  -->

            </div>
          </div>
        </div>
      </div>
      <button class="btn btn-primary openmodal_for_data" type="button" data-toggle="modal" data-target="#my-modal">Content</button>
      
      
     <div class="row">
       <div class="col-sm-8">
       <div class="modal col-sm-8 offset-sm-2 my-4" style="height:700px;" role="document" id="my-modal">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="my-modal-title">View all Details</h5>
              <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <span class="setalldata">
              <div class="row">
                <div class="col-sm-12" style="text-align:center">
                 <img src="<?=base_url()?>assets/img/loading.gif" style="width:50px;" class="img-fluid">
                 <p>Loading .....</p>
                </div>
              </div>
            </span>
            </div>
          </div>
        </div>
       </div>
     </div>
        
     
    