
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>material/add_material" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">check_box</i>
                  </div>
                  <h4 class="card-title">Purchoon/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">S:No#</th>
                          <th>Departure Date</th>
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
                        if(count($show_material) > 0){  foreach ($show_material as $row) { 
                        $id = '1';
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $row->tomfromdate; ?></td>
                          <td><?php echo $row->tid; ?></td>
                          <td><?php echo $row->tomweight; ?></td>
                          <td><?php echo $row->tomlocation; ?></td>
                          <td><?php echo $row->tomtransporter; ?></td>
                          <td><?php echo $row->tomtotalamount; ?></td>
                          <td><?php echo $row->tomvfrieght; ?></td>
                          <td><?php echo $row->tomremainingamount; ?></td>
                          <td><?php echo $row->tompaymentstatus; ?></td>
                          <td><?php echo $row->tompaymentdate; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'material/material_detail/'.$row->tomid ?>" rel="tooltip" class="btn btn-info">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="<?php echo base_url().'trip/delete_record?tomid='.$row->tomid ?>" rel="tooltip" class="btn btn-danger">
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
                            <td colspan="12" class="text-center btn-danger text-center">No Data Found</td>
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