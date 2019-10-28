
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
                  <h4 class="card-title">Trip Detail Remaining Amount Detail</h4>
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
                        <?php if(count($tripdetailremaining) > 0){ $id=1; foreach ($tripdetailremaining as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo abs($results->trapdamount); ?></td>
                          <td><?php echo $results->trapddate; ?></td>
                          <td><?php 
                             $a = $this->main_model->gettripdetilpayableafterpaidamount($results->trapdid);
                             

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
                            <a href="<?php echo base_url()?>/main/payablereportview/1/<?php echo $results->trapdid ;?>" rel="tooltip" class="btn btn-success">
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
                  <h4 class="card-title">Other Material Remaining Amount Detail</h4>
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
                        <?php if(count($othermaterialremaining) > 0){ $id=1; foreach ($othermaterialremaining as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo abs($results->trapdamount); ?></td>
                          <td><?php echo $results->trapddate; ?></td>
                          <td><?php 
                             $a = $this->main_model->gettripdetilpayableafterpaidamount($results->trapdid);
                             

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
                            <a href="<?php echo base_url()?>/main/payablereportview/2/<?php echo $results->trapdid ;?>"" rel="tooltip" class="btn btn-success">
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
                             $a = $this->main_model->gettripdetilpayableafterpaidamount($results->trapdid);
                             

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
                            <a href="<?php echo base_url()?>/main/payablereportview/3/<?php echo $results->trapdid ;?>"" rel="tooltip" class="btn btn-success">
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

            </div>
          </div>
        </div>
      </div>