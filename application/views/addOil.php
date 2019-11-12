
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">New Oil</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?=base_url()?>oil/oil_validation">
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="toname" value="<?php echo set_value('toname'); ?>">
                    <span class="text-danger"><?php echo form_error('toname'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">No. Of Gallon Or Drum </label>
                    <input type="text" class="form-control toquantity" name="toquantity" value="<?php echo set_value('toquantity'); ?>">
                    <span class="text-danger"><?php echo form_error('toquantity'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Total Amount</label>
                    <input type="text" class="form-control tototalprice" name="tototalprice" value="<?php echo set_value('tototalprice'); ?>">
                    <span class="text-danger"><?php echo form_error('tototalprice'); ?></span>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="">Price per Gallon or Drum</label>
                    <input type="text" class="form-control topricegallon" name="topricegallon"  readonly="readonly" value="<?php echo set_value('topricegallon'); ?>" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Paid Amount</label>
                    <input type="text" class="form-control topaid" name="topaid" value="<?php echo set_value('topaid'); ?>">
                    <span class="text-danger"><?php echo form_error('topaid'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="">Remaining Amount</label>
                    <input type="text" class="form-control toremaining" readonly="readonly" name="toremaining" value="<?php echo set_value('toremaining'); ?>">
                    <span class="text-danger"><?php echo form_error('toremaining'); ?></span>
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                   <select class="selectpicker"  data-style="select-with-transition" title="Shop" data-size="5" tabindex="-98" name="toshopid">
                      <?php foreach ($shop as $shops) {
                        echo '<option value="'.$shops->sid.'">'.$shops->tsname.'</option>';
                      } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('toshopid'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Description</label>
                    <textarea class="form-control" name="todescription"><?php echo set_value('todescription'); ?></textarea>
                  </div>
                </div>
              </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" name="addoil" class="btn btn-info btn-round" data-dismiss="modal">
                <input type="reset" class="btn btn-danger btn-round"  data-dismiss="modal">
              </div>
                </form>
               </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
