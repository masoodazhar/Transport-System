
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <!-- <a href="<?php echo base_url() ?>main/remainingreportview/4/1" class="btn btn-info"><i class="material-icons">remove_red_eye</i>View and Close Remaining </a> -->
                
              </div>



               <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Truck Remaining Amount Detail</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables3">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Payment payee Name</th>
                          <th>Trcuk Number</th>
                          <th>Recieveable Amount</th>
                          <th>Payable Date</th>
                          <th>Still Recieveable</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($truckremaining as $results) { ?>
                        <tr>
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo $results->tremainingamount; ?></td>
                          <td><?php echo $results->trapddate; ?></td>
                          <td>
                          <?php 
                             $a = $this->main_model->get_truck_remaining_after_paid_amount($results->trapdid);
                             

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
                            <a href="<?php echo base_url()?>main/remainingreportview/4/<?php echo $results->trapdid ;?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i>   View  and Recieve
                            </a> 
                            <!-- <a href="" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a> -->
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
      <button class="btn btn-primary openmodal_for_data" style="display:none;" type="button" data-toggle="modal" data-target="#my-modal">Content</button>
      
      
     <div class="row">
       <div class="col-sm-8">
       <div class="modal col-sm-8 offset-sm-2 my-4" style="height:700px;" role="document" id="my-modal">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="my-modal-title">View all Details</h5>
              <button class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <span class="setalldata">
              <div class="row">
                <div class="col-sm-12" style="text-align:center">
                 <img src="<?=base_url()?>assets/img/loading.gif" style="width:50px;" class="img-fluid">
                 <p>Loading .....</p>
                </div>
              </div>
            </span>
            </div>
          </div>
        </div>
       </div>
     </div>
        
     
    