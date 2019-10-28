

<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">LHR TO KHI</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form class="form-horizontal comissionform" method="POST" action="<?php echo base_url()?>Returntrip/returntrip_validation" id="returnform" >

                <div class="row">

                 <div class="col-sm-1"></div>
                 <div class="col-md-6">
                  <div class="form-group">
                   <label for="exampleEmail" class="text-uppercase" >Arrival DATE</label>
                   <input type="text" class="form-control datepicker" name="trarrivingdate" value="<?php echo set_value('trarrivingdate'); ?>">
                   <span class="text-danger"><?php echo form_error('trarrivingdate'); ?></span>
                  </div>
          		 </div>

                  <div class="col-sm-5">
                   <div class="form-group">
                   <!-- <input type="text" value=" " class="currentrate"> -->
                            <select class="selectpicker returntriptruckid" data-style="select-with-transition" title="Choose Truck" data-size="5" name="tid" tabindex="-98">
                              <?php if(count($showtruck) > 0) { foreach ($showtruck as $trow) {
                                echo '<option value="'.$trow->tid.'">'.$trow->tnumber.'</option>';
                              }} ?>
                          </select>
                          <a href="<?php echo base_url()?>truck/add_truck" target="_blank" title="Add new truck"><i class="material-icons">add_circle</i></a>
                          <span class="text-danger"><?php echo form_error('tid'); ?></span>
                   </div>
                  </div>

                </div>
 
                <div class="row">

                 <div class="col-sm-1"></div>
                 <div class="col-sm-6">
                   <div class="form-group">
                     <label for="exampleEmail" class="bmd-label-floating text-uppercase">Item</label>
                     <input type="text" class="form-control" name="tritem" value="<?php echo set_value('tritem'); ?>">
                     <span class="text-danger"><?php echo form_error('tritem'); ?></span>
                   </div>
                  </div>

                  <div class="col-sm-5">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Weight</label>
                    <input type="text" class="form-control" name="trweight" value="<?php echo set_value('ttrweight'); ?>">
                    <span class="text-danger"><?php echo form_error('trweight'); ?></span>
                   </div>
                  </div>
                 </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-6">
                   <div class="form-group">
                    <select class="selectpicker tocity" data-style="select-with-transition" title="Choose City" name="tcid" data-size="5" tabindex="-98">
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
                          <span class="text-danger"><?php echo form_error('tcid'); ?></span>
                   </div>
                  </div>                  

                  <div class="col-sm-5">
                   <div class="form-group">
                            <select class="tostation" data-style="select-with-transition" title="Choose station" name="tstid" data-size="5" tabindex="-98" style="width: 90%; border: none; border-bottom: 1px solid #ccc;">
                            <option class="text-uppercase">Choose Station</option>
                          </select>
                          <a href="<?php echo base_url()?>station/add_station" title="Add new station" target="_blank"><i class="material-icons">add_circle</i></a>
                          <span class="text-danger"><?php echo form_error('tstid'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Driver</label>
                    <input type="number" class="form-control trdr" name="trdr" value="<?php echo set_value('trdr'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Zaheer</label>
                    <input type="number" class="form-control trzr" name="trzr" value="<?php echo set_value('trzr'); ?>">
                   </div>
                  </div>

                  
                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Haji Jani</label>
                    <input type="number" class="form-control trzj" name="trzj">
                   </div>
                 </div>

                </div>  

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Brokery</label>
                    <input type="number" class="form-control trcheaque" name="trcheaque">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class=" text-uppercase">Advance\Bilty</label>
                    <input type="text" class="form-control trtotalamount" name="trtotalamount">
                    <span class="text-danger"><?php echo form_error('trtotalamount'); ?></span>
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">V.frieght</label>
                    <input type="text" class="form-control trvfrieght" name="trvfrieght" value="<?php echo set_value('trvfrieght'); ?>">
                    <span class="text-danger"><?php echo form_error('trvfrieght'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Inaam</label>
                    <input type="text" class="form-control inam" name="trinam" value="<?php echo set_value('trinam'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Advance Comission</label>
                    <input type="text" class="form-control tradvancecomission" name="tradvancecomission">
                   </div>
                 </div>
                
                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Comission pending</label>
                    <input type="text" class="form-control trpendingcomission" name="trpendingcomission">
                   </div>
                  </div>

                  </div>

                  <div class="row">
                  
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Kanta</label>
                    <input type="text" class="form-control trkanta" name="trkanta">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Custom</label>
                    <input type="text" class="form-control trincometax" name="trincometax">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Dehari</label>
                    <input type="text" class="form-control trdehari" name="trdehari">
                   </div>
                  </div>

                  </div>

                 <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Shifting</label>
                    <input type="text" class="form-control trshifting" name="trshifting">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Loading</label>
                    <input type="text" class="form-control trloading" name="trloading">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Extra Weight</label>
                    <input type="text" class="form-control trextraweight" name="trextraweight">
                   </div>
                  </div>

                  </div>
                  
                  <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">To Karachi</label>
                    <input type="text" class="form-control trtokarachi" name="trtokarachi">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description</label>
                    <input type="text" class="form-control" name="toedescription[]" value="">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="text" class="form-control toeamount" name="toeamount[]" value="">
                   </div>
                  </div>

                  <input type="hidden" class="form-control" name="toeidentity[]" value="remain-0">

                  <a href="#" class="add_returnother my-4" title="Add new field"><i class="material-icons">add_circle</i></a>

                  </div>
                  
                  <input type="hidden" value="0" class="form-control comisionsum">

                  <div class="add_returnothers"></div>
                  <div class="add_comissions"></div>
                  <div class="row">

                    <div class="col-sm-1"></div>
                    <div class="col-sm-3">
                     <div class="form-group">
                      <label for="exampleEmail" class="text-uppercase">Recieved Amount</label>
                      <input type="text" class="form-control trrecievedamount" name="trrecievedamount" value="0">
                     </div>
                    </div>

                    <div class="col-sm-3">
                     <div class="form-group">
                      <label for="exampleEmail" class="text-uppercase">Remaining Amount</label>
                      <input type="text" class="form-control trremainingamount" name="trremainingamount" readonly="readonly" value="0">
                     </div>
                    </div>

                    <a href="#" data-toggle="modal" data-target="#retripremain" class="my-2" title="Add details"><i class="material-icons">add_circle</i></a>

                    <div class="col-sm-4">
                     <div class="form-group">
                      <label for="exampleEmail" class="text-uppercase">Paid \ Pending</label>
                      <input type="text" class="form-control trpaymentstatus" name="trpaymentstatus" readonly="readonly">
                     </div>
                    </div>

                    </div>

                    <div class="row">
                      <div class="col-sm-1"></div>
                      <div class="col-md-3">
                      <div class="form-group">
                       <label for="exampleEmail" class="text-uppercase">Date Of Pay</label>
                       <input type="text" class="form-control datepicker" name="trdateofpay">
                      </div>
                     </div>

                    </div>


                <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round" name="addreturntrip">
                <a href="<?php echo base_url()?>returntrip" class="btn btn-danger btn-round">Close</a>
              </div>

              <!-- Classic Modal -->
                      <div class="modal fade" id="retripremain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                                    <input type="hidden" class="form-control" name="trapdtypeid" value="return-0">
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

                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>