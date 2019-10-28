
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            
              
               <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Truck Remaining Amount Detail</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables2">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Name</th>
                          <th>Truck Number</th>
                          <th>Remaining Amount</th>
                          <th>Station Name</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($totalstationcountview) > 0){ $id=1; foreach ($totalstationcountview as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo abs($results->tnumber); ?></td>
                          <td><?php echo $results->trapdamount; ?></td>
                          <td><?php echo $results->tstname; ?></td>
                         
                          <td class="td-actions text-right">
                            <a href="#" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="" rel="tooltip" class="btn btn-danger">
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