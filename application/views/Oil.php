
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>oil/add_oil" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">opacity</i>
                  </div>
                  <h4 class="card-title">Oil</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Quantity</th>
                          <th>Price pr Gallon/Drum</th>
                          <th>Total Price</th>
                          <th>Shop</th>
                          <th>Description</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         if(count($oil_data) > 0){ $id=1; foreach ($oil_data as $results) { 
                          $shop_name = '';
                          foreach ($shop as $row ) {
                            if($results->toshopid == $row->sid)
                            {
                              $shop_name = $row->tsname;
                            }
                          }
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->toname; ?></td>
                          <td><?php echo $results->toquantity; ?></td>
                          <td><?php echo $results->topricegallon; ?></td>
                          <td><?php echo $results->tototalprice; ?></td>
                          <td><?php echo $shop_name; ?></td>
                          <td><?php echo $results->todescription; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'oil/update_data/'.$results->toid ?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?php echo base_url().'oil/delete_record?toid='.$results->toid ?>" rel="tooltip" class="btn btn-danger">
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