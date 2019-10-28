
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>driver/add_driver" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">how_to_reg</i>
                  </div>
                  <h4 class="card-title">Driver/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>Category</th>
                          <th>Date Of Joining</th>
                          <th>Address</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($result) > 0){ $id=1; foreach ($result as $results) { 
                          $driver = '';
                          if($results->tdcid == '0')
                          {
                            $driver = 'Driver';
                          }
                          else if ($results->tdcid == '1') {
                            $driver = 'Conductor';
                          }
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tname; ?></td>
                          <td><?php echo $results->tcontact; ?></td>
                          <td><?php echo $driver; ?></td>
                          <td><?php echo $results->tdoj; ?></td>
                          <td><?php echo $results->taddress; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'driver/update_data/'.$results->did ?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?php echo base_url().'driver/delete_record?did='.$results->did ?>" rel="tooltip" class="btn btn-danger">
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