
    <div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
               <a href="#" data-toggle="modal" data-target="#localempty" class="btn btn-info"><i class="material-icons">add</i> ADD LOCAL/EMPTY</a>
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">COMISSION</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form class="form-horizontal comissionform dailycomissionform" method="POST" id="comissionform" action="<?php echo base_url()?>Dailytrip/dailytrip_validation" enctype="multipart/form-data">

                <div class="row">

                 <div class="col-md-1"></div>
                 <div class="col-md-6">
                  <div class="form-group">
                  <label for="exampleEmail" >DEPARTURE DATE</label>
                   <input type="text" class="form-control datepicker" name="tddeparturedate" value="<?php echo set_value('tddeparturedate'); ?>">
                   <span class="text-danger"><?php echo form_error('tddeparturedate'); ?></span>
                  </div>
          		 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                            <select class="selectpicker dailytriptruckid" data-style="select-with-transition" title="Choose Truck" data-size="5" name="tid" tabindex="-98">
                              <?php if(count($showtruck) > 0) { foreach ($showtruck as $trow) {
                                echo '<option value="'.$trow->tid.'">'.$trow->tnumber.'</option>';
                              }} ?>
                          </select>
                          <span class="text-danger"><?php echo form_error('tid'); ?></span>
                   </div>
                  </div>
                  <?php
                  $now = new DateTime();
                  ?>
                  <input type="hidden" name="" class="currentdate" value="<?=$now->format('Y-m-d');?>">
                  <a class="my-2" href="#" id="<?=base_url()?>truck/add_truck" title="Add new truck" onclick="openWin(this.id);"><i class="material-icons">add_circle</i></a>

                </div>

                <div class="row">

                  <div class="col-md-1"></div>
                  <div class="col-sm-6">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">WEIGHT <sup>IN TON</sup> </label>
                    <input type="number" class="form-control" name="tdweight" value="<?php echo set_value('tdweight'); ?>">
                    <span class="text-danger"><?php echo form_error('tdweight'); ?></span>
                   </div>
                  </div>

                 <div class="col-sm-4">
                   <div class="form-group">
                            <select class="selectpicker" data-style="select-with-transition" title="Choose condition" name="tdcontainertype" data-size="5" tabindex="-98">
                            <option value="lcontainer">Load container</option>
                            <option value="icontainer">Inside container</option>
                          </select>
                          <span class="text-danger"><?php echo form_error('tdcontainertype'); ?></span>
                   </div>
                  </div>

                  </div>

                <div class="row">

                  <div class="col-md-1"></div>

                  <div class="col-sm-6">
                   <div class="form-group">
                            <select class="selectpicker tocity" data-style="select-with-transition" title="Choose To City" name="tcid" data-size="5" tabindex="-98">
                            <?php
                            if(count($showcity) > 0)
                              {
                                foreach ($showcity as $tocrow)
                                {
                                  if(ucfirst($tocrow->tcname) != "Karachi")
                                  {
                                  echo '<option value="'.$tocrow->tcid.'">'.$tocrow->tcname.'</option>';
                                }
                              }
                            }
                            ?>
                          </select>
                          <span class="text-danger"><?php echo form_error(' tcid'); ?></span>
                   </div>
                  </div>
                  <a class="my-2" href="<?php echo base_url()?>city/add_city" target="_blank" title="Add new city"><i class="material-icons">add_circle</i></a>

                  <div class="col-sm-4">
                   <div class="form-group">
                            <select class="selectpicker" data-style="select-with-transition" title="Choose Station" name="tstid" data-size="5" tabindex="-98">
                              <?php
                               foreach ($show_station as $srow)
                               {
                                 echo '<option value="'.$srow->tstid.'">'.$srow->tstname.'</option>';
                               }
                              ?>
                          </select>
                          <span class="text-danger"><?php echo form_error('tstid'); ?></span>
                   </div>
                  </div>
                  <a class="my-2" href="<?php echo base_url()?>station/add_station" title="Add new station" target="_blank"><i class="material-icons">add_circle</i></a>
                </div>

                <div class="row">

                 <div class="col-md-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">cash</label>
                    <input type="number" class="form-control tdcash" name="tdcash" value="<?php echo set_value('tdcash'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Driver</label>
                    <input type="number" class="form-control tddriver" name="tddriver" value="<?php echo set_value('tddriver'); ?>">
                   </div>
                 </div>

                 <div class="col-md-4">
                  <div class="form-group">
                   <label class="bmd-label-floating text-uppercase">Cheaque</label>
                   <input type="number" class="form-control tdcheaque" name="tdcheaque" value="<?php echo set_value('tdcheaque'); ?>">
                  </div>
                 </div>

                </div>

                <div class="row">

          		   <div class="col-md-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Haji Jani</label>
                    <input type="number" class="form-control tdhjani" name="tdhjani" value="<?php echo set_value('tdhjani'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Brokery</label>
                    <input type="number" class="form-control tdbrokery" name="tdbrokery" value="<?php echo set_value('tdbrokery'); ?>">
                   </div>
                 </div>

                 <div class="col-md-4">
                  <div class="form-group">
                   <label class="text-uppercase">Payment Date</label>
                   <input type="text" class="form-control datepicker" name="tdpaydate" value="<?php echo set_value('tdpaydate'); ?>">
                  </div>
                 </div>

                </div>

                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Advance/Bilty</label>
                    <input type="number" class="form-control tdtotalamount" readonly="readonly" name="tdtotalamount" value="<?php echo set_value('tddeparturedate'); ?>">
                    <span class="text-danger"><?php echo form_error('tdtotalamount'); ?></span>
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">INFO</label>
                    <input type="text" class="form-control" name="tdinfo" value="<?php echo set_value('tdinfo'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">v.frieght</label>
                    <input type="number" class="form-control tdvfrieght" name="tdvfrieght" value="<?php echo set_value('tdvfrieght'); ?>">
                    <span class="text-danger"><?php echo form_error('tdvfrieght'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Advance commission</label>
                    <input type="number" class="form-control tdadvcomission" name="tdadvcomission" value="<?php echo set_value('tdadvcomission'); ?>">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">commission pending</label>
                    <input type="number" class="form-control tdpendcomission" name="tdpendcomission" value="<?php echo set_value('tdpendcomission'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">custom</label>
                    <input type="number" class="form-control tdcustom" name="tdcustom" value="<?php echo set_value('tdcustom'); ?>">
                   </div>
                 </div>

                </div>

                <div class="row">

                  <div class="col-md-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Extra weight</label>
                    <input type="number" class="form-control tdexweight" name="tdexweight" value="<?php echo set_value('tdexweight'); ?>">
                   </div>
                  </div>


                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">unloading</label>
                    <input type="number" class="form-control tdunloading" name="tdunloading" value="<?php echo set_value('tdunloading'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Inam</label>
                    <input type="number" class="form-control tdinaam" name="tdinaam" value="<?php echo set_value('tdinaam'); ?>">
                   </div>
                  </div>

                  </div>

                  <div class="row">

                  <div class="col-md-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">dehari</label>
                    <input type="number" class="form-control tddehari" name="tddehari" value="<?php echo set_value('tddehari'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">empty container</label>
                    <input type="number" class="form-control tdemptycontainer" name="tdemptycontainer" value="<?php echo set_value('tdemptycontainer'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Munshiana</label>
                    <input type="number" class="form-control tdmushiana" name="tdmushiana" value="<?php echo set_value('tdmushiana'); ?>">
                   </div>
                  </div>

                  </div>

                  <div class="row">

                  <div class="col-md-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">description</label>
                    <input type="text" class="form-control" name="toedescription[]" >
                   </div>
                  </div>

                  <div class="col-sm-3 toeamountparent">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control toeamount" name="toeamount[]">
                   </div>
                  </div>

                  <input type="hidden" class="form-control" name="toeidentity[]" value="comission-0">

                  <a href="#" class="add_comission my-4" title="Add new field"><i class="material-icons">add_circle</i></a>

                  <input type="hidden" value="0" class="form-control comisionsum">

                </div>

                <div class="add_comissions"></div>

                  <div class="row">

                  <div class="col-md-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Remaining amount recieve</label>
                    <input type="number" class="form-control tdrecieveamount" name="tdremainingrecieve" value="<?php echo set_value('tdremainingrecieve'); ?>">
                   </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                   <label for="exampleEmail" class="text-uppercase">Paid Date</label>
                   <input type="text" class="form-control datepicker" name="tdpaymetndate" value="<?php echo set_value('tdpaymetndate'); ?>">
                  </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Balance</label>
                    <input type="text" class="form-control tdremainingamount" name="tdremainingamount" readonly="readonly" value="<?php echo set_value('tdremainingamount'); ?>">
                   </div>
                  </div>

                  </div>

                  <div class="row">

                  <div class="col-md-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Paid/pending</label>
                    <input type="text" class="form-control tdpaymentstatus" name="tdpaymentstatus" readonly="readonly" value="<?php echo set_value('tdpaymentstatus'); ?>">
                   </div>
                  </div>

                  <div class="col-md-3">
                  <div class="form-group">
                   <label for="exampleEmail" class="text-uppercase">Date of Pay</label>
                   <input type="text" class="form-control datepicker" name="tdpaymetndate" value="<?php echo set_value('tdpaymetndate'); ?>">
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
                            <input type="hidden" value="" name="tdimage"><input type="file" name="tdimage" class="form-control">
                          <div class="ripple-container"></div></span>
                          <br>
                          <a href="extended.html#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 45.6719px; top: 21.7813px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div></div></a>
                        </div>
                      </div>
                    </div>

                  </div>


                <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round" name="adddailytrip">
                <a href="<?php echo base_url()?>dailytrip" class="btn btn-danger btn-round">Close</a>
                </div>

                <!-- Classic Modal -->
                      <div class="modal fade" id="localempty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title">LOCAL TRIP</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Frieght</label>
                                    <input type="text" class="form-control localfrieght" name="localfrieght">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Station</label>
                                    <input type="text" class="form-control" name="localstation">
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="">Date</label>
                                    <input type="text" class="form-control datepicker" name="localdate">
                                  </div>
                                </div>
                              </div>

                              <hr style="border: 1px solid black;">
                              <h3 class="text-center"> EMPTY CONTAINER</h3>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Frieght</label>
                                    <input type="text" class="form-control emptyfrieght" name="emptyfrieght">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Station</label>
                                    <input type="text" class="form-control" name="emptystation">
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="">Date</label>
                                    <input type="text" class="form-control datepicker" name="emptydate">
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
