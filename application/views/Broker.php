
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>broker/add_broker" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">supervised_user_circle</i>
                  </div>
                  <h4 class="card-title">Broker/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Contact</th>
                          <th>N.I.C</th>
                          <th>Address</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($result) > 0){ $id=1; foreach ($result as $results) { 
                          ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tbname; ?></td>
                          <td><?php echo $results->tbcontact; ?></td>
                          <td><?php echo $results->tbnic; ?></td>
                          <td><?php echo $results->tbaddress; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'broker/update_data/'.$results->tbid ?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?php echo base_url().'broker/delete_record?tbid='.$results->tbid ?>" rel="tooltip" class="btn btn-danger">
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
                            <td colspan="6" class="text-center btn-danger text-center">No Data Found</td>
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