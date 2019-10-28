
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>returntrip/add_returntrip" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">check_box</i>
                  </div>
                  <h4 class="card-title">Return/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">S:No#</th>
                          <th>Arrival Date</th>
                          <th>Truck No</th>
                          <th>Weight</th>
                          <th>Location</th>
                          <th>Transporter</th>
                          <th>Total Amount</th>
                          <th>V.Frieght Amount</th>
                          <th>Rmaining Amount</th>
                          <th>Payment Status</th>
                          <th>Payment Date</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(count($show_return) > 0){  foreach ($show_return as $row) { 
                        $id = '1';
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $row->trarrivingdate; ?></td>
                          <td><?php echo $row->tnumber; ?></td>
                          <td><?php echo $row->trweight; ?></td>
                          <td><?php echo $row->tcname; ?></td>
                          <td><?php echo $row->tstname; ?></td>
                          <td><?php echo $row->trtotalamount; ?></td>
                          <td><?php echo $row->trvfrieght; ?></td>
                          <td><?php echo $row->trremainingamount; ?></td>
                          <td><?php echo $row->trpaymentstatus; ?></td>
                          <td><?php echo $row->trdateofpay; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'returntrip/return_detail/'.$row->trid ?>" rel="tooltip" class="btn btn-info">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="<?php echo base_url().'returntrip/delete_record?trid='.$row->trid ?>" rel="tooltip" class="btn btn-danger">
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
                            <td colspan="10" class="text-center btn-danger text-center">No Data Found</td>
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