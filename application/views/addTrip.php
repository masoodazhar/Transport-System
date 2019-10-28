

<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">TRIP DETAIL/s</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form class="form-horizontal" method="POST" id="tripform" action="<?php echo base_url()?>trip/trip_validation">
                    <div class="row">

                      <label class="col-sm-2 col-form-label">Serial No.</label>
                      <div class="col-sm-4">
                       <div class="form-group">
                        <?php 

                          echo '<input type="text" class="form-control" name="ttdsno" value="'.$showtrip.'" >';
                        ?>
                       </div>
                      </div>

                      <!-- <div class="form-check col-sm-3 my-4 ">
                          <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" value=""> Return
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                  </div> -->

                  <div class="form-check col-sm-6 my-4 ">
                          <label class="form-check-label">
                            <input class="form-check-input" id="ttdothermaterial" name="ttdothermaterial" type="checkbox" value=""> Other Material
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                  </div>

                    </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">Departure Date</label>
                 <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" class="form-control datepicker" name="ttddeparturedate" value="<?php echo set_value('ttddeparturedate'); ?>">
                   <span class="text-danger"><?php echo form_error('ttddeparturedate'); ?></span>
                  </div>
          		 </div>

               <label class="col-sm-2 col-form-label">Arrival Date</label>
                 <div class="col-md-4">
                  <div class="form-group">
                   <input type="text" class="form-control datepicker" name="ttdarrivaldate" value="<?php echo set_value('ttdarrivaldate'); ?>">
                   <span class="text-danger"><?php echo form_error('ttdarrivaldate'); ?></span>
                  </div>
               </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">From: </label>
                  <div class="col-sm-4">
                   <div class="form-group">
                            <select class="selectpicker fromcity" data-style="select-with-transition" title="Choose City" name="ttdfromtcid" data-size="5" tabindex="-98">
                            <?php if(count($showcity) > 0) { foreach ($showcity as $fromcrow) {
                                echo '<option value="'.$fromcrow->tcid.'">'.$fromcrow->tcname.'</option>';
                              }
                            } 
                              ?> 
                          </select>
                          <a href="<?php echo base_url()?>city/add_city" target="_blank" title="Add new city"><i class="material-icons">add_circle</i></a>
                          <span class="text-danger"><?php echo form_error('ttdfromtcid'); ?></span>
                   </div>
                  </div>

                 <label class="col-sm-2 col-form-label">To: </label>
                  <div class="col-sm-4">
                   <div class="form-group">
                            <select class="selectpicker tocity" data-style="select-with-transition" title="Choose City" name="ttdtotcid" data-size="5" tabindex="-98">
                            <?php 
                            if(count($showcity) > 0) 
                              { 
                                foreach ($showcity as $tocrow) 
                                {
                                  echo '<option value="'.$tocrow->tcid.'">'.$tocrow->tcname.'</option>';
                              }
                            } 
                            ?> 
                          </select>
                          <a href="<?php echo base_url()?>city/add_city" target="_blank" title="Add new city"><i class="material-icons">add_circle</i></a>
                          <span class="text-danger"><?php echo form_error('ttdtotcid'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">Truck Number</label>
                  <div class="col-sm-4">
                   <div class="form-group">
                            <select class="selectpicker" data-style="select-with-transition" title="Choose Truck" data-size="5" name="ttdtid" tabindex="-98">
                              <?php if(count($showtruck) > 0) { foreach ($showtruck as $trow) {
                                echo '<option value="'.$trow->tid.'">'.$trow->tnumber.'</option>';
                              }} ?> 
                          </select>
                          <a href="<?php echo base_url()?>truck/add_truck" target="_blank" title="Add new truck"><i class="material-icons">add_circle</i></a>
                          <span class="text-danger"><?php echo form_error('ttdtid'); ?></span>
                   </div>
                  </div>

                   <label class="col-sm-2 col-form-label">Station</label>
                  <div class="col-sm-4">
                   <div class="form-group">
                            <select class="tostation" data-style="select-with-transition" title="Choose station" name="ttdtstid" data-size="5" tabindex="-98" style="width: 90%; border: none; border-bottom: 1px solid #ccc;">
                            
                          </select>
                          <a href="<?php echo base_url()?>station/add_station" title="Add new station" target="_blank"><i class="material-icons">add_circle</i></a>
                          <span class="text-danger"><?php echo form_error('ttdtstid'); ?></span>
                   </div>
                  </div>
                </div>

                <div class="row">
                 <label class="col-sm-2 col-form-label">Truck Detail</label>
                 <div class="col-sm-2">
                   <div class="form-group">
                          	<select class="selectpicker" data-style="select-with-transition" title="Choose condition" name="ttdtruckdetail" data-size="5" tabindex="-98">
                            <option value="lcontainer">Load container</option>
                            <option value="icontainer">Inside container</option>
                          </select>
                          <span class="text-danger"><?php echo form_error('ttdtruckdetail'); ?></span>
                   </div>
                  </div>
                  <label class="col-sm-2 col-form-label">weight</label>
                 	<div class="col-sm-2">
                   <div class="form-group">
                   	<input type="text" class="form-control" name="ttdweight" value="<?php echo set_value('ttdweight'); ?>">
                    <span class="text-danger"><?php echo form_error('ttdweight'); ?></span>
                   </div>
                  </div>
                  <div class="form-check col-sm-4 my-4 ">
                          <label class="form-check-label">
                            <input class="form-check-input" id="ttdreturnstatus" name="ttdreturnstatus" type="checkbox" value=""> Return
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                  </div>
                 </div>
                    

                <div class="row">
          		   
                  <label class="col-sm-2 col-form-label">Total amount</label>
                  <div class="col-sm-4">
                   <div class="form-group">
                    <input type="text" class="form-control atamount" name="ttdtotalamount" value="<?php echo set_value('ttdtotalamount'); ?>">
                    <span class="text-danger"><?php echo form_error('ttdtotalamount'); ?></span>
                   </div>
                  </div>
                   <label class="col-sm-2 col-form-label">Paid \ Pending</label>
                  <div class="col-sm-4">
                   <div class="form-group">
                            <select class="selectpicker ab" data-style="select-with-transition" title="choose" data-size="5" name="ttdpaymentmethod" tabindex="-98">
                            <option value="paid">Paid</option> 
                            <option value="pending">Pending</option>
                          </select>
                          <span class="text-danger"><?php echo form_error('ttdpaymentmethod'); ?></span>
                   </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">Truck Rent</label>
                  <div class="col-sm-4">
                   <div class="form-group">
                    <input type="text" class="form-control" id="ttdtruckrent" name="ttdtruckrent" value="<?php echo set_value('ttdtruckrent'); ?>">
                    <span class="text-danger"><?php echo form_error('ttdtruckrent'); ?></span>
                   </div>
                  </div>

                  <label class="col-sm-2 col-form-label">Pump station</label>
                  <div class="col-sm-4">
                   <div class="form-group">
                            <select class="selectpicker" data-style="select-with-transition" title="Choose Pump" data-size="5" name="ttdtpid" tabindex="-98">
                              <?php if(count($showpump) > 0) { foreach ($showpump as $prow) {
                                echo '<option value="'.$prow->tpid.'">'.$prow->tpname.'</option>';
                              }} ?> 
                          </select>
                          <a href="<?php echo base_url()?>pump/add_pump" target="_blank" title="Add new truck"><i class="material-icons">add_circle</i></a>
                          <span class="text-danger"><?php echo form_error('ttdtpid'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">

                  <label class="col-sm-1 col-form-label">Diesel in Liter</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control dliter" name="ttddieselltr" value="<?php echo set_value('ttddieselltr'); ?>">
                    <span class="text-danger"><?php echo form_error('ttddieselltr'); ?></span>
                   </div>
                  </div>
                  
                  <label class="col-sm-1 col-form-label">Diesel Amount</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control damount" name="ttddieselamount" value="<?php echo set_value('ttddieselamount'); ?>">
                    <span class="text-danger"><?php echo form_error('ttddieselamount'); ?></span>
                   </div>
                  </div>

                  <label class="col-sm-1 col-form-label">Diesel per liter</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control dpliter" name="ttddieselprltr" value="<?php echo set_value('ttddieselprltr'); ?>">
                    <span class="text-danger"><?php echo form_error('ttddieselprltr'); ?></span>
                   </div>
                  </div>

                  <label class="col-sm-1 col-form-label">Oil Amount</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" readonly="readonly" class="form-control" name="ttdoilamount" value=" &nbsp;7,000">
                   </div>
                  </div>
                  
                </div>

                <div class="row">
                  <label class="col-sm-1 col-form-label">Trip Prize</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control" readonly="readonly" name="ttdprizeamount" value="&nbsp; 3,000">
                   </div>
                 </div>
                  <label class="col-sm-1 col-form-label">Brokery</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control" readonly="readonly" name="ttdbrokeryamount" value="&nbsp; 1,500">
                   </div>
                 </div>
                   <label class="col-sm-1 col-form-label">Agent Comission</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control" name="ttdagentcommissionamount" value="<?php echo set_value('ttdagentcommissionamount'); ?>">
                    <span class="text-danger"><?php echo form_error('ttdagentcommissionamount'); ?></span>
                   </div>
                  </div>

                  <label class="col-sm-1 col-form-label">Advance Recieve</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control" name="ttdadvancerecieveamount" value="<?php echo set_value('ttdadvancerecieveamount'); ?>">
                    <span class="text-danger"><?php echo form_error('ttdadvancerecieveamount'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">
                  

                  <label class="col-sm-1 col-form-label">Tax</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control" name="ttdtaxamount" value="<?php echo set_value('ttdtaxamount'); ?>">
                    <span class="text-danger"><?php echo form_error('ttdtaxamount'); ?></span>
                   </div>
                  </div>

                  <label class="col-sm-2 col-form-label">Un-Loading</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control" id="ttdunloadingamount" name="ttdunloadingamount" value="<?php echo set_value('ttdunloadingamount'); ?>">
                    <span class="text-danger"><?php echo form_error('ttdunloadingamount'); ?></span>
                   </div>
                  </div>

                  <label class="col-sm-2 col-form-label remainingpending">Remaining amount</label>
                  <div class="col-sm-2">
                   <div class="form-group">
                    <input type="text" class="form-control ramount" readonly="readonly" name="ttdremainingamount" value="<?php echo set_value('ttdremainingamount'); ?>">
                    <span class="text-danger"><?php echo form_error('ttdremainingamount'); ?></span>
                    <input type="hidden" class="form-control hideamount" >
                    <input type="hidden" class="form-control retocity"  name="ttdreturnto" >
                    <input type="hidden" class="form-control refromcity"  name="ttdreturnfrom">
                   </div>
                   
                  </div>
                  <a href="#"  data-toggle="modal" id="tripremainclick" data-target="#tripremain" class="my-4" title="Add details"><i class="material-icons">add_circle</i></a>
                  </div>
                

                <div class="row">
                  
                  <label class="col-sm-2 col-form-label">Description</label>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <input type="text" class="form-control" name="toedescription[]" value="">
                    <!-- <span class="text-danger"><?php echo form_error('toedescription'); ?></span> -->
                   </div>
                  </div>

                  <label class="col-sm-2 col-form-label">Amount</label>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <input type="text" class="form-control" name="toeamount[]" value="">
                    <!-- <span class="text-danger"><?php echo form_error('toeamount'); ?></span> -->
                   </div>
                  </div>

                  <a href="#" class="add_fields my-4" title="Add new field"><i class="material-icons">add_circle</i></a>
                  
                </div>

                <div class="add_field"></div>

                <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round" name="addtrip">
                <a href="<?php echo base_url()?>trip" class="btn btn-danger btn-round">Close</a>
              </div>
              <!-- Classic Modal -->
                      <div class="modal fade" id="tripremain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title">Remaining Amount Detail</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Concern Person</label>
                                    <input type="text" value="" class="form-control" id="trapdname" name="trapdname">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Contact</label>
                                    <input type="text" value="" class="form-control" name="trapdcontact" id="totalprice">
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="">Return Date</label>
                                    <input type="text" class="form-control datepicker" name="trapddate">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Description</label>
                                    <textarea class="form-control" name="trapddescription"></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <input type="hidden" class="form-control" name="trapdtypeid" value="trip-0">
                                  </div>
                                </div>
                                </div>
                              </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal">Done</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  End Modal -->
                      <!-- return Modal -->
                      <div class="modal fade" id="tripreturn" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title">Return Trip Detail</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <label class="col-form-label">From: </label>
                                  
                                   <div class="form-group">
                                            <select class="selectpicker" data-style="select-with-transition" title="Choose City" name="ttdreturnfrom" data-size="5" tabindex="-98">
                                            <?php if(count($showcity) > 0) { foreach ($showcity as $fromcrow) {
                                                echo '<option value="'.$fromcrow->tcid.'">'.$fromcrow->tcname.'</option>';
                                              }
                                            } 
                                              ?> 
                                          </select>
                                  </div>
                                </div>

                                  <div class="col-md-6">
                                 <label class="col-form-label">To: </label>
                                   <div class="form-group">
                                            <select class="selectpicker" data-style="select-with-transition" title="Choose City" name="ttdreturnto" data-size="5" tabindex="-98">
                                            <?php 
                                            if(count($showcity) > 0) 
                                              { 
                                                foreach ($showcity as $tocrow) 
                                                {
                                                  echo '<option value="'.$tocrow->tcid.'">'.$tocrow->tcname.'</option>';
                                              }
                                            } 
                                            ?> 
                                          </select>
                                   </div>
                                 </div>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                  <label class="col-form-label">Return weight</label>
                                  
                                   <div class="form-group">
                                    <input type="text" class="form-control"  name="ttdreturnweight" value="0">
                                   </div>
                                  
                                </div>
                                <div class="col-md-6">
                                  <label class="col-form-label">Return Station</label>
                                  
                                   <div class="form-group">
                                            <select class="selectpicker" data-style="select-with-transition" title="Choose Station" name="ttdreturnstation" data-size="5" tabindex="-98">
                                            <?php 
                                            if(count($showstation1) > 0) 
                                              { 
                                                foreach ($showstation1 as $statcrow) 
                                                {
                                                  echo '<option value="'.$statcrow->tstid.'">'.$statcrow->tstname.'</option>';
                                              }
                                            } 
                                            ?> 
                                          </select>
                                   </div>
                                  
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <input type="hidden" class="form-control" name="trapdtypeid" value="trip-0">
                                  </div>
                                </div>
                                </div>
                              </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal">Done</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  return Modal -->
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>