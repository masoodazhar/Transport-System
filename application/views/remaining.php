
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>close/add_close" class="btn btn-info"><i class="material-icons">add</i> Close Remaining </a>
                
              </div>
              <div class="card">
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
                          <th>Name</th>
                          <th>Remaining Amount</th>
                          <th>Payable Date</th>
                          <th>Recieveable</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($dailytrip_commission_details as $results) { ?>
                        <tr> 
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo abs($results->trapdamount); ?></td>
                          <td><?php echo $results->trapddate; ?></td>
                          <td><?php 
                             $a = $this->main_model->get_dailytrip_commission_remaining_after_paid_amount($results->trapdid);
                             

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
                            <a href="<?php echo base_url()?>main/remainingreportview/1/<?php echo $results->trapdid ;?>" rel="tooltip" class="btn btn-success">
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
                       
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="card">
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
                          <th>Payable Date</th>
                          <th>Status</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($tripsummary as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo abs($results->tnumber); ?></td>
                          <td><?php echo abs($results->ttddeparturedate); ?></td>
                          <td><?php echo abs($results->trapddate); ?></td>
                          <td><?php 
                             $a = $this->main_model->get_tripdetil_remaining_after_paid_amount($results->trapdid);
                             

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
                            <a href="<?php echo base_url()?>main/remainingreportview/2/<?php echo $results->trapdid ;?>"" rel="tooltip" class="btn btn-success">
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
                        
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Parchoon from Other Material Remaining Amount Detail</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables1">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Remaining Amount</th>
                          <th>Payable Date</th>
                          <th>Status</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $id=1; foreach ($othermaterialremaining as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo abs($results->trapdamount); ?></td>
                          <td><?php echo $results->trapddate; ?></td>
                          <td><?php 
                             $a = $this->main_model->get_otheramount_remaining_after_paid_amount($results->trapdid);
                             

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
                            <a href="<?php echo base_url()?>main/remainingreportview/3/<?php echo $results->trapdid ;?>"" rel="tooltip" class="btn btn-success">
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
                        
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

               <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Truck Remaining Amount Detail</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables2">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Remaining Amount</th>
                          <th>Payable Date</th>
                          <th>Status</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($truckremaining) > 0){ $id=1; foreach ($truckremaining as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo abs($results->trapdamount); ?></td>
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
                            <a href="<?php echo base_url()?>main/remainingreportview/4/<?php echo $results->trapdid ;?>"" rel="tooltip" class="btn btn-success">
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

              
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Return Trip Details</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables3">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Remaining Amount</th>
                          <th>Payable Date</th>
                          <th>Status</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $id=1; foreach ($returntrip_remaining as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo abs($results->trapdamount); ?></td>
                          <td><?php echo $results->trapddate; ?></td>
                          <td>
                          <?php 
                             $a = $this->main_model->get_returntrip_remaining_after_paid_amount($results->trapdid);
                             

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
                            <a href="<?php echo base_url()?>main/remainingreportview/5/<?php echo $results->trapdid ;?>"" rel="tooltip" class="btn btn-success">
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
                       
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>