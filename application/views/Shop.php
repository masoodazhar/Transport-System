
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>shop/add_shop" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">shop</i>
                  </div>
                  <h4 class="card-title">Shop/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Retailer Name</th>
                          <th>Contact</th>
                          <th>Address</th>
                          <th>Shop</th>
                          <th>Description</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($shop) > 0){ $id=1; foreach ($shop as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tsname; ?></td>
                          <td><?php echo $results->tsrname; ?></td>
                          <td><?php echo $results->tscontact; ?></td>
                          <td><?php echo $results->tsaddress; ?></td>
                          <td><?php echo $results->tstype; ?></td>
                          <td><?php echo $results->tsdescription; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'shop/update_data/'.$results->sid ?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?php echo base_url().'shop/delete_record?sid='.$results->sid ?>" rel="tooltip" class="btn btn-danger">
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