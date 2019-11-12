
     <style type="text/css">
       .nav-pills .nav-item i
       {
          display: inline-block;
          font-size: 22px;
          padding: 11px 0;
          line-height: 0;
       }
       .btn-group
       {
        margin: 6px 0px;
       }
       .btn
       {
        padding: 13px 20px;
       }
       i
       {
        font-size: 20px;
       }
     </style>


      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="row">
                    <div class="col-md-3 text-center border-bottom"><span class="btn btn-info">New Messages</span></div>
                    <div class="col-md-4 border-left border-bottom">
                     <div class="btn-group float-left">
                        <button type="button" class="btn btn-info"><i class="material-icons">folder</i></button>
                        <button type="button" class="btn btn-info"><i class="material-icons">attach_file</i></button>
                        <button type="button" class="btn btn-info"><i class="material-icons">more_horiz</i></button>
                     </div>
                     <div class="btn-group float-right">
                        <button type="button" class="btn btn-info"><i class="material-icons">chevron_left</i></button>
                        <button type="button" class="btn btn-info"><i class="material-icons">chevron_right</i></button>
                     </div>
                    </div>
                    <div class="col-md-5 border-left border-bottom"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div id="navigation-pills">
                    <div class="row">
                         <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="nav nav-pills nav-pills-rose flex-column">

                                        <li class="nav-item">
                                            <a class="nav-link <?php if($category==1){ echo 'active'; }?> " href="<?= base_url()?>main/all_notification/1">
                                              <i class="material-icons float-left">local_shipping</i>
                                              Truck Details
                                              <span class="float-right badge badge-default"><?=$truck_no_of_notyfy;?></span></a>
                                        </li>


                                        <!-- <li class="nav-item">
                                            <a class="nav-link <?php if($category==1){ echo 'active'; }?> " href="<?= base_url()?>main/tripnotification/1">
                                              <i class="material-icons float-left">markunread</i>
                                              Trip Detail
                                              <span class="float-right badge badge-default"><?=$number_of_notific;?></span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link  <?php if($category==2){ echo 'active'; }?>  " href="<?= base_url()?>main/othermaterialnotification/2" >
                                              <i class="material-icons float-left">mail_outline</i>
                                              Other Materials
                                              <span class="float-right badge badge-default"><?=$number_of_notific;?></span></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link  <?php if($category==3){ echo 'active'; }?>" href="<?= base_url()?>main/trucknotification/3" >
                                              <i class="material-icons float-left">star_border</i>
                                              Truck Buy/Sale
                                              <span class="float-right badge badge-default"><?=$number_of_notific;?></span></a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link  <?php if($category==4){ echo 'active'; }?>" href="<?= base_url()?>main/trucknotification/4" >
                                              <i class="material-icons float-left">T</i>
                                              Tyres Notifications
                                              <span class="float-right badge badge-default">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " href="#tab1" data-toggle="tab">
                                              <i class="material-icons float-left">O</i>
                                              Oil Notifications
                                              <span class="float-right badge badge-default">0</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tab1" data-toggle="tab">
                                              <i class="material-icons float-left">delete_outline</i>&nbsp;
                                              TRASH
                                              <span class="float-right badge badge-default">0</span></a>
                                        </li> -->
                                    </ul>
                                </div>
                                <div class="col-md-4 border-left">
                                    <div class="row">
                                      <div class="col-md-1">
                                        <i class="material-icons" style="padding: 10px 0px;">search</i>
                                      </div>
                                      <div class="col-md-10">
                                        <input type="text" name="" placeholder="Search" class="form-control">
                                      </div>
                                    </div>
                                    <div style="overflow-y: scroll; height: 250px;" class="email-list-item peers fxw-nw p-20 bdB bgcH-grey-100 cur-p">

                                      <div class="peer mR-10"><div class="checkbox checkbox-circle checkbox-info peers ai-c"><input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer"><label for="inputCall1" class="peers peer-greed js-sb ai-c"></label></div></div><div class="peer peer-greed ov-h">
                                        <div class="peers ai-c">

                                        <?php
                                        if($category==1){
                                            foreach ($truck_notification_rows as $key) {

                                                if($key->tnstatus==1){
                                                ?>

                                                  <div class="peer peer-greed messageclass" style=" border: 1px solid #fcd8d8;  padding: 8px 0px 0px 8px; background: white;"><h6> Truck No :  <?= $key->tntnumber?>  <span class="float-right mx-4"><small> <a href="#" data-toggle="modal" data-target="#truck_notify_update" class="truck_notify_update">Update</a> | <a href="#" class="Truck_no_click">View Detail</a> <input type="hidden" value="<?=$key->tnid; ?>"></small></span></h6>

                                                  </div>
                                                <?php
                                                }
                                                else{
                                                ?>
                                                 <div class="peer peer-greed messageclass" style=" border: 1px solid #ccc;  padding: 8px 0px 0px 8px; background: #ccc;"><h6> Truck No:  <?= $key->tntnumber?>   <span class="float-right mx-4"><small><a href="#" data-toggle="modal" data-target="#truck_notify_update" class="truck_notify_update">Update</a> | <a href="#" class="Truck_no_click">Trip Detail</a><input type="hidden" value="<?=$key->tnid; ?>"></small> </span></h6>

                                                  </div>
                                                <?php
                                                }
                                            }

                                          }

                                          if($category==2){
                                            foreach ($othermaterialnotification as $key) {

                                                if($key->tnstatus==0){
                                                ?>

                                                  <div class="peer peer-greed messageclass" style=" border: 1px solid #fcd8d8;  padding: 8px 0px 0px 8px; background: white;"><h6> Recieveable amount is:  <?= $key->tomremainingamount?>  <span class="float-right mx-4"><small> <a href="">Other Detail</a></small></span></h6>
                                                  <input type="hidden" class="notifyId" value="<?=$key->tnid; ?>">
                                                    <input type="hidden" class="tncategory" value="<?=$key->tncategory; ?>">
                                                    <input type="hidden" class="tnfromid" value="<?=$key->tnfromid; ?>">
                                                    <input type="hidden" class="ttripdetail" value="tothermaterial">
                                                    <input type="hidden" class="tnfromid" value="tomid">

                                                  </div>
                                                <?php
                                                }
                                                else{
                                                ?>
                                                 <div class="peer peer-greed messageclass" style=" border: 1px solid #ccc;  padding: 8px 0px 0px 8px; background: #ccc;"><h6> Recieveable amount was:  <?= $key->tomremainingamount?>   <span class="float-right mx-4"><small><a href="">Other  Detail</a></small></span></h6>
                                                 <input type="hidden" class="notifyId" value="<?=$key->tnid; ?>">
                                                    <input type="hidden" class="tncategory" value="<?=$key->tncategory; ?>">
                                                    <input type="hidden" class="tnfromid" value="<?=$key->tnfromid; ?>">
                                                    <input type="hidden" class="ttripdetail" value="tothermaterial">
                                                    <input type="hidden" class="tnfromid" value="tomid">
                                                  </div>
                                                <?php
                                                }
                                            }

                                          }





                                         ?>

                                        </div>


                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-5 border-left">
                                    <div class="tab-content displayMessage" style="text-align:center">
                                    <center><h2>No Message</h2></center>
                                          <div class="display_loading" style="display:none;">
                                          <center><h2>Fetching Data.......</h2></center>
                                          <img  src="<?=base_url()?>assets/img/loading.gif" width="100">
                                          </div>

                                        <!-- <div class="tab-pane active" id="tab1">
                                            Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits.
                                            <br>
                                            <br> Dramatically visualize customer directed convergence without revolutionary ROI.
                                        </div>
                                        <div class="tab-pane" id="tab2">
                                            Efficiently unleash cross-media information without cross-media value. Quickly maximize timely deliverables for real-time schemas.
                                            <br>
                                            <br>Dramatically maintain clicks-and-mortar solutions without functional solutions.
                                        </div>
                                        <div class="tab-pane" id="tab3">
                                            Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate one-to-one customer service with robust ideas.
                                            <br>
                                            <br>Dynamically innovate resource-leveling customer service for state of the art customer service.
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                         </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>




            <div id="truck_notify_update" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title" id="my-modal-title">Update Trcu Insurence etc..</h2>

                    <button class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <form method="POST" action="<?=base_url()?>main/update_truck_dates">
                  <div class="modal-body">

                   <div class="row">
                   <input type="hidden" name="tnid" class="set_notify_id">
                   <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Insurence Expiry Date</label>
                        <input type="text" name="tninsuranceexpirydate" id="tninsuranceexpirydate_set" class="form-control datepicker" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-muted"></small>
                      </div>
                     </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Permit Expiry Date</label>
                        <input type="text" name="tnpermitexpirydate" id="tnpermitexpirydate_set" class="form-control datepicker" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-muted"></small>
                      </div>
                     </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Fitness Expiry Date</label>
                        <input type="text" name="tnfitnessexpirydate" id="tnfitnessexpirydate_set" class="form-control datepicker" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-muted"></small>
                      </div>
                     </div>
                     <div class="col-sm-3">
                      <div class="form-group">
                        <label for="">Fitness Expiry Date</label>
                        <input type="text" name="tntexexpirydate" id="tntexexpirydate_set" class="form-control datepicker" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-muted"></small>
                      </div>
                     </div>

                   </div>

                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Update">
                  </div>
                  </form>
                </div>
              </div>
            </div>
