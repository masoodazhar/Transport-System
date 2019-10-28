
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>truck/add_truck" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">emoji_transportation</i>
                  </div>
                  <h4 class="card-title">Truck/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Model</th>
                          <th>Number</th>
                          <th>Price</th>
                          <th>Method</th>
                          <th>Paid Amount</th>
                          <th>Remainig Amount</th>
                          <th>Installment</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(count($truck) > 0){ $id=1; foreach ($truck as $row) { 
                          $method = '';
                          $paid = '';
                          $clear = '';
                          $class = '';
                          if($row->tmethod == 'lumpsum')
                          {
                            $method = 'Lump sum';
                            $paid = 'Clear';
                            $clear = 'Clear';
                            $class = 'btn-success';
                          }
                          else if ($row->tmethod == 'installment')
                          {
                            $method = 'Installment';
                            $paid = $row->tpaidamount;
                            $clear = $row->tremainingamount;
                          }
                        ?>
                        <tr >
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $row->tname; ?></td>
                          <td><?php echo $row->tmodel; ?></td>
                          <td><?php echo $row->tnumber; ?></td>
                          <td><?php echo $row->tprice; ?></td>
                          <td><?php echo $method; ?></td>
                          <td><?php echo $paid; ?></td>
                          <td><?php echo $clear; ?></td>
                          <td><?php echo $row->tinstallmethod; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'truck/update_data/'.$row->tid ?>" rel="tooltip" class="btn btn-info">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?php echo base_url().'truck/delete_record?tid='.$row->tid ?>" rel="tooltip" class="btn btn-danger">
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