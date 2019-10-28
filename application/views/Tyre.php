
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>tyre/add_tyre" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
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
                          <th>Name</th>
                          <th>No. Of pair</th>
                          <th>Price per pair</th>
                          <th>Total Price</th>
                          <th>Shop</th>
                          <th>Description</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                         if(count($tyre_data) > 0){ $id=1; foreach ($tyre_data as $results) { 
                          $shop_name = '';
                          foreach ($shop as $row ) {
                            if($results->ttshopid == $row->sid)
                            {
                              $shop_name = $row->tsname;
                            }
                          }
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->ttname; ?></td>
                          <td><?php echo $results->tttyrepair; ?></td>
                          <td><?php echo $results->ttprice; ?></td>
                          <td><?php echo $results->tttotalprice; ?></td>
                          <td><?php echo $shop_name; ?></td>
                          <td><?php echo $results->ttdescription; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'tyre/update_data/'.$results->ttid ?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?php echo base_url().'tyre/delete_record?ttid='.$results->ttid ?>" rel="tooltip" class="btn btn-danger">
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