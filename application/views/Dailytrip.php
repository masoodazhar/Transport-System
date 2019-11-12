
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?=base_url()?>Dailytrip/add_dailytrip" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">map</i>
                  </div>
                  <h4 class="card-title">COMISSION/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">S:No#</th>
                          <th>Departure Date</th>
                          <th>Truck</th>
                          <th>City</th>
                          <th>Transporter</th>
                          <th>Weight</th>
                          <th>Advance/Bilty</th>
                          <th>Truck Rent</th>
                          <th>Rmaining Amount</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(count($show_data) > 0)
                        	{
                            $id = 1;
                        		foreach ($show_data as $row)
                        		 { 
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $row->tddeparturedate; ?></td>
                          <td><?php echo $row->tnumber; ?></td>
                          <td><?php echo $row->tcname; ?></td>
                          <td><?php echo $row->tstname; ?></td>
                          <td><?php echo $row->tdweight; ?></td>
                          <td><?php echo $row->tdtotalamount; ?></td>
                          <td><?php echo $row->tdvfrieght; ?></td>
                          <td><?php echo abs($row->tdremainingamount); ?></td>
                          <td class="td-actions text-right">
                            <a href="<?=base_url().'Dailytrip/'.$row->tdid?>" rel="tooltip" class="btn btn-info">
                              <i class="material-icons">remove_red_eye</i>
                            </a> 
                            <a href="<?=base_url().'Dailytrip/delete_record?tdid='.$row->tdid?>" rel="tooltip" class="btn btn-danger">
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

              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">map</i>
                  </div>
                  <h4 class="card-title">LOCAl OR EMPTY/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables2">
                      <thead>
                        <tr>
                          <th class="text-center">S:No#</th>
                          <th>Local Departure Date</th>
                          <th>Local Transporter</th>
                          <th>Local Truck Rent</th>
                          <th>Empty Departure Date</th>
                          <th>Empty Transporter</th>
                          <th>Empty Truck Rent</th>                      
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(count($show_data) > 0)
                          {
                            $id2 = 1;
                            foreach ($show_data as $row)
                             {
                        ?>
                        <tr>
                          <td class="text-center"><?php echo $id2; ?></td>
                          <td><?php echo $row->localdate; ?></td>
                          <td><?php echo $row->localfrieght; ?></td>
                          <td><?php echo $row->localstation; ?></td>
                          <td><?php echo $row->emptydate; ?></td>
                          <td><?php echo $row->emptyfrieght; ?></td>
                          <td><?php echo $row->emptystation; ?></td>
                        </tr>
                        <?php
                        $id2++;
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