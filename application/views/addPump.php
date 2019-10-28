

<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">New Pump Station</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>pump/pump_validation">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="tpname">
                    <span class="text-danger"><?php echo form_error('tpname'); ?></span>
                  </div>
                  <div class="form-group">
                    <select class="selectpicker" data-style="select-with-transition" title="Choose City" data-size="5" tabindex="-98" name="tcid">
                            <?php if(count($showcity) > 0) { foreach ($showcity as $crow) {
                                echo '<option value="'.$crow->tcid.'">'.$crow->tcname.'</option>';
                              }} ?> 
                    </select>
                    <span class="text-danger"><?php echo form_error('tcid'); ?></span>
                  </div>
                  <div class="modal-footer justify-content-center">
                  <input type="submit" class="btn btn-info btn-round" data-dismiss="modal" name="addpump">
                  <a href="<?php echo base_url()?>pump" class="btn btn-danger btn-round" data-dismiss="modal">close</a>
                  </div>
                </form>
               </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
