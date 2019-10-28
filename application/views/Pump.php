
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>pump/add_pump" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">ev_station</i>
                  </div>
                  <h4 class="card-title">Pump station/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>City</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($pump) > 0){ $id=1; foreach ($pump as $results) { 
                          $cityname = '';
                          foreach ($city as $row ) {
                            if($row->tcid == $results->tcid)
                            {
                              $cityname = $row->tcname;
                            }
                          }
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tpname; ?></td>
                          <td><?php echo $cityname; ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'pump/update_data/'.$results->tpid ?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?php echo base_url().'pump/delete_record?tpid='.$results->tpid ?>" rel="tooltip" class="btn btn-danger">
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
                            <td colspan="7" class="text-center btn-danger text-center">No Data Found</td>
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