
<div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Parchoon</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal comissionform othercomissionform" method="POST" action="<?php echo base_url()?>material/material_validation" id="parchoonform" enctype="multipart/form-data" >

                <div class="row">

                 <div class="col-sm-1"></div>
                 <div class="col-md-6">
                  <div class="form-group">
                   <label for="exampleEmail" class="text-uppercase">Departure date</label>
                   <input type="text" class="form-control datepicker" name="tomfromdate" value="<?php echo set_value('tomfromdate'); ?>">
                   <span class="text-danger"><?php echo form_error('tomfromdate'); ?></span>
                  </div>
               </div>

                  <div class="col-sm-5">
                   <div class="form-group">
                    <select class="selectpicker othermaterialtruckids" data-style="select-with-transition" title="Choose Truck" data-size="5" name="tid" tabindex="-98">
                     <?php if(count($show_truck) > 0) { foreach ($show_truck as $trow) {
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
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Restrict Weight <sup>IN TON</sup> </label>
                     <input type="number" class="form-control" name="tomweightspace" value="<?php echo set_value('tomweightspace'); ?>">
                     <span class="text-danger"><?php echo form_error('tomweightspace'); ?></span>
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">weight <sup>IN TON</sup> </label>
                    <input type="number" class="form-control" name="tomweight" value="<?php echo set_value('tomweight'); ?>">
                    <span class="text-danger"><?php echo form_error('tomweight'); ?></span>
                   </div>
                  </div>
                 </div>

                <div class="row">

                 <div class="col-sm-1"></div>
                  <div class="col-sm-6">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Location</label>
                    <input type="text" class="form-control" name="tomlocation" value="<?php echo set_value('tomlocation'); ?>">
                    <span class="text-danger"><?php echo form_error('tomlocation'); ?></span>
                   </div>
                  </div>


                  <div class="col-sm-4">
                   <div class="form-group">
                            <select class="selectpicker" data-style="select-with-transition" title="Choose Station" name="tomtransporter" data-size="5" tabindex="-98">
                              <?php
                               foreach ($show_station as $srow)
                               {
                                 echo '<option value="'.$srow->tstid.'">'.$srow->tstname.'</option>';
                               }
                              ?>
                          </select>
                    <span class="text-danger"><?php echo form_error('tomtransporter'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Driver</label>
                    <input type="number" class="form-control tomdriver" name="tomdriver" value="<?php echo set_value('tomdriver'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Haji jani</label>
                    <input type="number" class="form-control tomhjani" name="tomhjani" value="<?php echo set_value('tomhjani'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Cheaque</label>
                    <input type="number" class="form-control tomcheaque" name="tomcheaque" value="<?php echo set_value('tomcheaque'); ?>">
                   </div>
                 </div>

                </div>

                <div class="row">

                 <div class="col-sm-1"></div>
                 <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">date</label>
                    <input type="text" class="form-control datepicker" name="tompaydate" value="<?php echo set_value('tompaydate'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Advance/Bilty</label>
                    <input type="number" class="form-control tomtotalamount" name="tomtotalamount" value="<?php echo set_value('tompaydate'); ?>" readonly="readonly">
                    <span class="text-danger"><?php echo form_error('tomtotalamount'); ?></span>
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">v.Frieght</label>
                    <input type="number" class="form-control tomvfrieght" name="tomvfrieght" value="<?php echo set_value('tomvfrieght'); ?>">
                    <span class="text-danger"><?php echo form_error('tomvfrieght'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Extra weight fare</label>
                    <input type="number" class="form-control tomextrafareamount" name="tomextrafareamount" value="<?php echo set_value('tomextrafareamount'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Advance Comission</label>
                    <input type="number" class="form-control tomadvancecommission" name="tomadvancecommission" value="<?php echo set_value('tomadvancecommission'); ?>">
                   </div>
                 </div>

                 <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Remaining comission paid</label>
                    <input type="number" class="form-control tomremainingcommission" name="tomremainingcommission" value="<?php echo set_value('tomremainingcommission'); ?>">
                   </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Kanta</label>
                    <input type="number" class="form-control tomkanta" name="tomkanta" value="<?php echo set_value('tomkanta'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">munshiana</label>
                    <input type="number" class="form-control tommunshiana" name="tommunshiana" value="<?php echo set_value('tommunshiana'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">DEhari</label>
                    <input type="number" class="form-control tomdehari" name="tomdehari" value="<?php echo set_value('tomdehari'); ?>">
                   </div>
                  </div>

                </div>

                  <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description</label>
                    <input type="text" class="form-control" name="toedescription[]" value="">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control toeamount" name="toeamount[]" value="">
                   </div>
                  </div>

                  <input type="hidden" class="form-control" name="toeidentity[]" value="parchoon-0">

                  <a href="#" class="add_parchoon my-2" title="Add new field"><i class="material-icons">add_circle</i></a>

                </div>
                <input type="hidden" value="0" class="form-control comisionsum">

                <div class="add_parchoons"></div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Remaining amount recieving</label>
                    <input type="number" class="form-control tomremainrecieve" name="tomremainrecieve" value="<?php echo set_value('tomremainrecieve'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Date</label>
                    <input type="text" class="form-control datepicker" name="tomrrdate" value="<?php echo set_value('tomrrdate'); ?>">
                   </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="exampleEmail" class="text-uppercase">balance</label>
                     <input type="text" class="form-control tomremainingamount" readonly="readonly" name="tomremainingamount" value="<?php echo set_value('tomremainingamount'); ?>">
                    </div>
                   </div>

                  </div>

                  <div class="row">

                   <div class="col-sm-1"></div>
                   <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Paid \ pending</label>
                    <input type="text" class="form-control tompaymentstatus" name="tompaymentstatus" readonly="readonly" value="<?php echo set_value('tompaymentstatus'); ?>">
                   </div>
                  </div>

                    <div class="col-md-3">
                    <div class="form-group">
                      <label for="exampleEmail" class="text-uppercase">Date of pay</label>
                     <input type="text" class="form-control datepicker" name="tompaymentdate" value="<?php echo set_value('tompaymentdate'); ?>">
                    </div>
                   </div>

                   <div class="col-sm-4">
                      <h4 class="title text-uppercase">Cheaque Image</h4>
                      <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                        <!-- <div class="fileinput-new thumbnail">
                          <img src="<?=base_url()?>assets/img/placeholder.jpg" alt="...">
                        </div> -->
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Add Photo</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden" value="" name="tomimage"><input type="file" name="tomimage" class="form-control">
                          <div class="ripple-container"></div></span>
                          <br>
                          <a href="extended.html#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 45.6719px; top: 21.7813px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div></div></a>
                        </div>
                      </div>
                    </div>

                  </div>


                <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round" name="addmaterial">
                <a href="<?php echo base_url()?>material" class="btn btn-danger btn-round">Close</a>
              </div>

                  </form>
               </div>
              </div>
            </div>

          </div>
        </div>
      </div>
