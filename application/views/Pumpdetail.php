
<div class="content">
        <div class="container-fluid">
            
          <div class="row">
            <div class="col-md-12">
                <div class="card-icon">
                <a href="<?php echo base_url() ?>close_other/check_details/pump" class="btn btn-info"><i class="material-icons">add</i> Pay Remaining Amount</a>
                
              </div>
              <div class="card-icon">
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">ev_station</i>
                  </div>
                  <h4 class="card-title">PUMP DETAIL</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Station Name</th>
                          <th>Total Liter</th>
                          <th>Total Amount</th>
                          <th>Paid Amount</th>
                          <th>Remaining Amount</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         if(count($pump_data) > 0){ $id=1; foreach ($pump_data as $results) { 
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tpname; ?></td>
                          <td><?php echo $results->liter; ?></td>
                          <td><?php echo $results->total_amount; ?></td>
                          <td><?php echo $results->paid; ?></td>
                          <td><?php echo $results->remaining; ?></td>
                          <td class="td-actions text-right">
                            <a href="#" data-id="<?=$results->tpid?>" data-toggle="modal" data-target="#get_detail" rel="tooltip" class="btn btn-success pump_view">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="<?php echo base_url().'pumpdetail/delete_record?tpid='.$results->tpid ?>" rel="tooltip" class="btn btn-danger">
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
                            <td colspan="8" class="text-center btn-danger text-center">No Data Found</td>
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

            <!-- Classic Modal -->
                      <div class="modal fade" id="get_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">STATION DETAIL</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <table class="table" id="datatables2">
                                <thead>
                                <tr>
                                  <th>Shop</th>
                                  <th>Liter</th>
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