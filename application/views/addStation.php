

<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">New Station</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>station/station_validation">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="tstname">
                    <span class="text-danger"><?php echo form_error('tstname'); ?></span>
                  </div>
                  <div class="row">

                    <div class="col-sm-6">
                     <div class="form-group">
                      <select class="selectpicker" data-style="select-with-transition" title="Choose City" data-size="5" tabindex="-98" name="tcid">
                            <?php if(count($showcity) > 0) { foreach ($showcity as $crow) {
                                echo '<option value="'.$crow->tcid.'">'.$crow->tcname.'</option>';
                              }} ?> 
                    </select>
                    <span class="text-danger"><?php echo form_error('tcid'); ?></span>
                  </div>
                </div>
                <div class="col-sm-6">
                     <div class="form-group">
                     <label for="exampleEmail" class="bmd-label-floating">Broker Name</label>
                    <input type="text" class="form-control" name="tbname">
                    <span class="text-danger"><?php echo form_error('tbname'); ?></span>
                  </div>
                </div>

              </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Contact Number</label>
                    <input type="text" class="form-control" name="tstcontact">
                    <span class="text-danger"><?php echo form_error('tstcontact'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Adress</label>
                    <input type="text" class="form-control" name="tstaddress">
                    <span class="text-danger"><?php echo form_error('tstadress'); ?></span>
                  </div>
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Description</label>
                    <input type="text" class="form-control" name="tstdescription">
                  </div>
                  <div class="modal-footer justify-content-center">
                  <input type="submit" class="btn btn-info btn-round" data-dismiss="modal" name="addstation">
                  <a href="<?php echo base_url()?>station" class="btn btn-danger btn-round" data-dismiss="modal">close</a>
                  </div>
                </form>
               </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
