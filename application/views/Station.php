
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>station/add_station" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">shop_two</i>
                  </div>
                  <h4 class="card-title">Station/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>City</th>
                          <th>Broker</th>
                          <th>Contact</th>
                          <th>Address</th>
                          <th>Description</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($station) > 0){ $id=1; foreach ($station as $results) { 
                          $cityname = '';
                          $brokername = '';
                          foreach ($city as $row ) {
                            if($row->tcid == $results->tcid)
                            {
                              $cityname = $row->tcname;
                            }
                          }
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tstname; ?></td>
                          <td><?php echo $cityname; ?></td>
                          <td><?php echo $results->tbname; ?></td>
                          <td><?php echo $results->tstcontact; ?></td>
                          <td><?php echo $results->tstaddress; ?></td>
                          <td><?php echo $results->tstdescription; ?></td>                          
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url().'station/update_data/'.$results->tstid ?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?php echo base_url().'station/delete_record?tstid='.$results->tstid ?>" rel="tooltip" class="btn btn-danger">
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