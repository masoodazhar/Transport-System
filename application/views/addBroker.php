
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">

                  <!-- <?php
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
                  ?> -->
                  <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">New Broker Data</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?=base_url()?>broker/broker_validation">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="tbname" value="<?php echo set_value('tbname'); ?>">
                    <span class="text-danger"><?php echo form_error('tbname'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">N.I.C</label>
                    <input type="number" class="form-control" name="tbnic" pattern="^T[0-3]\d[0-1]\d{10}$" value="<?php echo set_value('tbnic'); ?>">
                    <span class="text-danger"><?php echo form_error('tbnic'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Contact</label>
                    <input type="number" class="form-control" name="tbcontact" value="<?php echo set_value('tbcontact'); ?>">
                    <span class="text-danger"><?php echo form_error('tbcontact'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="examplePass" class="bmd-label-floating">Address</label>
                    <input type="text" class="form-control" name="tbaddress" value="<?php echo set_value('tbaddress'); ?>">
                    <span class="text-danger"><?php echo form_error('tbaddress'); ?></span>
                  </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" name="addbroker" class="btn btn-info btn-round" data-dismiss="modal">
                <a href="<?php echo base_url().'broker' ?>" class="btn btn-danger btn-round" data-dismiss="modal">close</a>
              </div>
                </form>
                </div>
              <!-- <?php } ?> -->
               
              </div>
            </div>
            
          </div>
        </div>
      </div>
