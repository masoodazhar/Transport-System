
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>trip/add_trip" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">map</i>
                  </div>
                  <h4 class="card-title">Trip/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">S:No#</th>
                          <th>Departure Date</th>
                          <th>Arrival Date</th>
                          <th>Truck No</th>
                          <th>Total Amount</th>
                          <th>Truck Rent</th>
                          <th>Recieve Amount</th>
                          <th>Payment Status</th>
                          <th>Rmaining Amount</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(count($show_trip) > 0){  foreach ($show_trip as $row) { 
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $row->ttdsno; ?></td>
                          <td><?php echo $row->ttddeparturedate; ?></td>
                          <td><?php echo $row->ttdarrivaldate; ?></td>
                          <td><?php echo $row->tnumber; ?></td>
                          <td><?php echo $row->ttdtotalamount; ?></td>
                          <td><?php echo $row->ttdtruckrent; ?></td>
                          <td><?php echo $row->ttdadvancerecieveamount; ?></td>
                          <td><?php echo $row->ttdpaymentmethod; ?></td>
                          <td><?php echo abs($row->ttdremainingamount); ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'trip/trip_detail/'.$row->ttdid.'/'.$row->ttdsno ?>" rel="tooltip" class="btn btn-info">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="<?php echo base_url().'trip/delete_record?ttdid='.$row->ttdid ?>" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a>
                          </td>
                        </tr>
                        <?php 
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