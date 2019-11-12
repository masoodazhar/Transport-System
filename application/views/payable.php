
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <!-- <a href="<?php echo base_url() ?>PendingClosed/add_close" class="btn btn-info"><i class="material-icons">add</i> Close Pending </a> -->
                
              </div>
              

               <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Truck Payable Amount Detail</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables2">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Payment Reciever Name</th>
                          <th>Trcuk Number</th>
                          <th>Payable Amount</th>
                          <th>Payable Date</th>
                          <th>Still Payable</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($truck_payable as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo $results->tremainingamount; ?></td>
                          <td><?php echo $results->trapddate; ?></td>

                          <td>
                          <?php 
                             $a = $this->main_model->get_truck_payable_after_paid_amount($results->trapdid);
                             

                             if($a==null){
                              echo 'All Pending';
                             }else if($a>0){
                              echo $a;
                             }
                             else{
                              echo 'clear';
                             }
                           ?></td>
                          <td class="td-actions text-right">
                            <a href="<?php echo base_url()?>main/payablereportview/4/<?php echo $results->trapdid ;?>"" rel="tooltip" class="btn btn-success">
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
<style>
.tbody tr td span{
  font-weight:bolder;
  font-size:20px;
}
</style>
      
   
      <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
              <table class="table table-light table-strped">
              
                <tbody class="tbody">
                  <tr>
                    <td> Truck Number: <span class="tmtruck"> </span> </td>
                    <td> Driver Name: <span class="tmdriver"> </span> </td>
                  </tr>
                  <tr>
                    <td> Oil: <span class="tmoil"> </span> </td>
                    <td> Oil Total : <span class="tmoiltotal"> </span> </td>
                    
                  </tr>
                  <tr>
                    <td> Oil Paid : <span class="tmoilpaid"> </span> </td>
                    <td> Oil Remaining: <span class="tmoilremaining"> </span> </td>
                  </tr>
                  <tr>
                    <td> Tyre: <span class="tmtyre"> </span> </td>
                    <td> Tyre Total: <span class="tmtyretotal"> </span> </td>
                  </tr>
                  <tr>
                    <td> Tyre Paid: <span class="tmtyrepaid"> </span> </td>
                    <td> Tyre Remaining: <span class="tmtyreremaining"> </span> </td>
                  </tr>
                  <tr>
                    <td colspan="4"> Other Work: <span class="tmother"> </span> </td>
                  </tr>
                  <tr>
                  
                    <td> Shop Name: <span class="tmothershop"> </span> </td>
                    <td> Other Total: <span class="tmothertotal"> </span> </td>
                  </tr>
                  <tr>
                    <td> Other Paid: <span class="tmotherpaid"> </span> </td>
                    <td> Other Remaining: <span class="tmotherremaining"> </span> </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      