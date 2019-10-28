
<style>
 .my-card
{
    position:absolute;
    left:43%;
    top:-30%;
    border-radius:50%;
    width:50px;

}
.profile-employee {
  padding: 4px;
}

.profile-employee li{
  display: inline-block;
    list-style: none;
    float: left;
    padding: 5px;
}

.profile-employee li img{
    border: solid 2px;
    border-radius: 40px;
    /* float: left;*/
}
.mycard-text{
  padding:0px !important;
}

.profile-employee li h2{
     margin-top: 0px;
    font-size: 18px;
    vertical-align: bottom;
    text-transform: capitalize;
}
</style>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="#" class="btn btn-info hajijaniFormSubmitted"  data-toggle="modal" data-target="#modelId"><i class="material-icons">add</i> Close Remaining </a>
                
              </div>


              <div class="row w-100">
                          <div class="col-md-4">
                              <div class="card border-info mx-sm-1 p-3">
                                  <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-money" aria-hidden="true"></span></div>
                                  <div class="text-info text-center mt-3"><h4>Total Amount having Haji Jani </h4></div>
                                  <div class="text-info text-center mt-2"><h2>Rs. <?=$sum_of_have_haji_jani;?></h2><a href="<?php echo  base_url()?>main/remainingreport/">Check Recieveable amount details </a></div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="card border-success mx-sm-1 p-3">
                                  <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                                  <div class="text-success text-center mt-3"><h4>Returned From Haji Jani</h4></div>
                                  <div class="text-success text-center mt-2"><h2>Rs. <?=$get_sum_all_returened_from_hajijani;?></h2><a href="<?php echo base_url()?>main/payablereport/">Check Payable amount details </a></div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="card border-danger mx-sm-1 p-3">
                                  <div class="card border-danger shadow text-danger p-3 my-card"><span class="fa fa-calendar" aria-hidden="true"></span></div>
                                  <div class="text-danger text-center mt-3"><h4>Still Remaining From Haji Jani</h4></div>
                                  <div class="text-danger text-center mt-2"><h2>Rs. <?=$sum_of_have_haji_jani-$get_sum_all_returened_from_hajijani;?></h2><a href="<?php echo base_url()?>main/hajijani/">Check Payable amount details </a></div>
                              </div>
                          </div>
                          
                          
                      </div>
                      <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Amount Details of Haji Jani in Returned </h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables5">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Amount Returned </th>
                          <th>Payment Date</th>
                          <th>Details</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($get_all_returened_from_hajijani_list as $results) { ?>
                        <tr> 
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->hjamount; ?></td>
                          <td><?php echo $results->hjdate; ?></td>
                          <td><?php echo $results->hjdetails; ?></td>
                          
                          <td class="td-actions text-right">
                            <a href="" rel="tooltip" class="btn btn-success">
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
  
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Amount Details of Haji Jani in Perchoon </h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Taken From </th>
                          <th>Total Amount</th>
                          <th>Payment Date</th>
                          <th>Details</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($get_haji_amount_from_remaining_closed as $results) { ?>
                        <tr> 
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->trapdname; ?></td>
                          <td><?php echo abs($results->trapdcamount); ?></td>
                          <td><?php echo $results->trapdcdate; ?></td>
                          <td><?php echo $results->trapdcdescription; ?></td>
                          
                          <td class="td-actions text-right">
                            <a href="" rel="tooltip" class="btn btn-success">
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



              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Amount Details of Haji Jani in Commission </h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables1">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Truck Numer</th>
                          <th>Haji Jani Amount</th>
                          <th>Departure Date</th>
                          <th>Payment Date</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($get_haji_amount_from_tdailytrip as $results) { ?>
                        <tr> 
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo abs($results->tdhjani); ?></td>
                          <td><?php echo $results->tddeparturedate; ?></td>
                          <td><?php echo $results->tdpaymetndate; ?></td>
                          
                          <td class="td-actions text-right">
                            <a href="" rel="tooltip" class="btn btn-success">
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



              
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Amount Details of Haji Jani in Voucher </h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables2">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Truck Numer</th>
                          <th>Haji Jani Amount</th>
                          <th>Departure Date</th>
                          <th>Arrival Date</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($get_haji_amount_from_ttripdetaail as $results) { ?>
                        <tr> 
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo abs($results->ttdhohajijani); ?></td>
                          <td><?php echo $results->ttddeparturedate; ?></td>
                          <td><?php echo $results->ttdarrivaldate; ?></td>
                          
                          <td class="td-actions text-right">
                            <a href="" rel="tooltip" class="btn btn-success">
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




              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Amount Details of Haji Jani in Return Trip </h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables3">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Truck Numer</th>
                          <th>Haji Jani Amount</th>
                          <th>Arrival Date</th>
                          <th>Payment Date</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($get_haji_amount_from_treturntrip as $results) { ?>
                        <tr> 
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo abs($results->trhajijani); ?></td>
                          <td><?php echo $results->trarrivingdate; ?></td>
                          <td><?php echo $results->trdateofpay; ?></td>
                          
                          <td class="td-actions text-right">
                            <a href="" rel="tooltip" class="btn btn-success">
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



              

              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Amount Details of Haji Jani in Perchoon </h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables4">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Truck Numer</th>
                          <th>Haji Jani Amount</th>
                          <th>Payment Date</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $id=1; foreach ($get_haji_amount_from_tothermaterial as $results) { ?>
                        <tr> 
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?php echo $results->tnumber; ?></td>
                          <td><?php echo abs($results->tomhjani); ?></td>
                          <td><?php echo $results->tompaymentdate; ?></td>
                          
                          <td class="td-actions text-right">
                            <a href="" rel="tooltip" class="btn btn-success">
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


      <!-- Button trigger modal -->
    
      
      <!-- Modal -->
      <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form method="POST" action="<?=base_url()?>main/addhajijani">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Enter Amount From Haji Jani</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                  <label for="exampleEmail" class="bmd-label-floating">Amount</label>
                                  <input type="text" class="form-control" name="hjamount" value="<?php echo set_value('hjamount'); ?>">
                                  <span class="text-danger"><?php echo form_error('hjamount'); ?></span>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                    <label for="exampleEmail" class="">Date</label>
                                    <input type="text" class="form-control datepicker" name="hjdate" value="<?php echo set_value('hjdate'); ?>">
                                    <span class="text-danger"><?php echo form_error('hjdate'); ?></span>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                            <div class="form-group">
                                  <label for="exampleEmail" class="bmd-label-floating">Detail</label>
                                  <textarea rows="" cols="" class="form-control" name="hjdetails"></textarea>
                              </div>
                            </div>
                          </div>
              
            </div>
            <div class="modal-footer">
              <input type="submit" name="" class="btn btn-secondary mx-2" value="Save">
              <button type="button" class="btn btn-secondary mx-2" data-dismiss="modal">Close</button>
              
            </div>
          </div>
          </form>
        </div>
      </div>

     <span class="hajijaniFormSubmittedgetvalue"><?php if(isset($hajijaniFormSubmitted)){echo $hajijaniFormSubmitted;} ?></span>