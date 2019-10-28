
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">

                  <?php
                  if(isset($driver_data))
                  {
                    foreach ($driver_data as $row) {
                  ?>
                  <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Update Driver Data</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form class="form-horizontal" method="POST" action="<?=base_url()?>driver/update_validation">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="tname" value="<?php echo $row->tname; ?>">
                    <span class="text-danger"><?php echo form_error('tname'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">N.I.C</label>
                    <input type="number" class="form-control" name="tnic" pattern="^T[0-3]\d[0-1]\d{10}$" value="<?php echo $row->tnic ?>">
                    <span class="text-danger"><?php echo form_error('tnic'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Contact</label>
                    <input type="number" class="form-control" name="tcontact" value="<?php echo $row->tcontact ?>">
                    <span class="text-danger"><?php echo form_error('tcontact'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="examplePass" class="bmd-label-floating">Address</label>
                    <input type="text" class="form-control" name="taddress" value="<?php echo $row->taddress ?>">
                    <span class="text-danger"><?php echo form_error('taddress'); ?></span>
                    <input type="hidden" class="form-control" name="hidden_id" value="<?php echo $row->did ?>">
                  </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" value="Update" name="updatedriver" class="btn btn-info btn-round" data-dismiss="modal">
                <a href="<?php echo base_url().'driver' ?>" class="btn btn-danger btn-round" data-dismiss="modal">close</a>
              </div>
                </form>
                </div>
                  <?php
                    }
                  }
                  else
                  {
                  ?>
                  <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">New Driver Data</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?=base_url()?>driver/driver_validation">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="tname" value="<?php echo set_value('tname'); ?>">
                    <span class="text-danger"><?php echo form_error('tname'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">N.I.C</label>
                    <input type="number" class="form-control" name="tnic" pattern="^T[0-3]\d[0-1]\d{10}$" value="<?php echo set_value('tnic'); ?>">
                    <span class="text-danger"><?php echo form_error('tnic'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Contact</label>
                    <input type="number" class="form-control" name="tcontact" value="<?php echo set_value('tcontact'); ?>">
                    <span class="text-danger"><?php echo form_error('tcontact'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="">Date Of Joining</label>
                    <input type="text" class="form-control datepicker" name="tdoj" value="<?php echo set_value('tdoj'); ?>">
                    <span class="text-danger"><?php echo form_error('tdoj'); ?></span>
                  </div>
                 <div class="form-group">
                    <select class="selectpicker" data-style="select-with-transition" title="Choose one" data-size="5" tabindex="-98" name="tdcid">
                          <option value="0">Driver</option>
                          <option value="1">Conductor</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('tdcid'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Sallary</label>
                    <input type="text" class="form-control" name="tsallary" value="<?php echo set_value('tsallary'); ?>">
                    <span class="text-danger"><?php echo form_error('tsallary'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="examplePass" class="bmd-label-floating">Address</label>
                    <input type="text" class="form-control" name="taddress" value="<?php echo set_value('taddress'); ?>">
                    <span class="text-danger"><?php echo form_error('taddress'); ?></span>
                  </div>
                  <div class="col-md-3 col-sm-4">
                      <h4 class="title">Avatar</h4>
                      <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail img-circle">
                          <img src="<?=base_url()?>assets/img/placeholder.jpg" alt="...">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Add Photo</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden" value="" name="..."><input type="file" name="" class="form-control">
                          <div class="ripple-container"></div></span>
                          <br>
                          <a href="extended.html#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 45.6719px; top: 21.7813px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div></div></a>
                        </div>
                      </div>
                    </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" name="adddriver" class="btn btn-info btn-round" data-dismiss="modal">
                <a href="<?php echo base_url().'driver' ?>" class="btn btn-danger btn-round" data-dismiss="modal">close</a>
              </div>
                </form>
                </div>
              <?php } ?>
               
              </div>
            </div>
            
          </div>
        </div>
      </div>
