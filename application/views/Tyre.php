
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>tyre/add_tyre" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                <a href="<?php echo base_url() ?>close_other/check_details/tyre" class="btn btn-info"><i class="material-icons">add</i> Pay Remaining Amount</a>
             
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">toll</i>
                  </div>
                  <h4 class="card-title">Tyre/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Shop</th>
                          <th>No. Of pair</th>
                          <th>Total Price</th>
                          <th>Paid Amount</th>
                          <th>Remaining</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         if(count($tyre_data) > 0){ $id=1; foreach ($tyre_data as $results) 
                          { 
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?=$results->tsname; ?></td>
                          <td><?=$results->tyre_pair; ?></td>
                          <td><?=$results->total_amount; ?></td>
                          <td><?=$results->total_paid; ?></td>
                          <td><?=$results->total_remaining; ?></td>
                          <td class="td-actions text-right">
                            <a data-toggle="modal" data-target="#get_detail" href="#" rel="tooltip" class="btn btn-success view" data-id="<?=$results->ttshopid?>">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="<?=base_url().'tyre/delete_record?ttid='.$results->ttshopid ?>" rel="tooltip" class="btn btn-danger">
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