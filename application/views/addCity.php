
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">New City</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>city/city_validation">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="tcname" value="<?php echo set_value('tcname'); ?>">
                    <span class="text-danger"><?php echo form_error('tcname'); ?></span>
                  </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round" name="addcity" data-dismiss="modal">
                <a href="#" class="btn btn-danger btn-round">Close</a>
              </div>
                </form>
               </div>

              </div>
            </div>
            
          </div>
        </div>
      </div>