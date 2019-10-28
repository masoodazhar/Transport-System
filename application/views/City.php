
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>city/add_city" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">City/ies</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($city) > 0){ $id=1; foreach ($city as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tcname; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'city/update_data/'.$results->tcid ?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?php echo base_url().'city/delete_record?tcid='.$results->tcid ?>" rel="tooltip" class="btn btn-danger">
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