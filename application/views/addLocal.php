
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">DUMPER TRIP</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?=base_url()?>Localtrip/local_validation">
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail">Date</label>
                    <input type="text" class="form-control datepicker" name="ltdate">
                    <span class="text-danger"><?=form_error('ltdate'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="selectpicker" name="ltvehiclenumber"  data-style="select-with-transition" title="Select Vehicle Number" data-size="5" tabindex="-98">
                      <?php 
                       foreach ($dumper as $key) 
                       {
                         echo '<option value="'.$key->tnumber.'">'.$key->tnumber.'</option>';
                       }
                      ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('ltvehiclenumber'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="selectpicker" name="ltpoint"  data-style="select-with-transition" title="Select Load Point" data-size="5" tabindex="-98">
                      <?php 
                       foreach ($station as $row) 
                       {
                         echo '<option value="'.$row->tstid.'">'.$row->tstname.'</option>';
                       }
                      ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('ltpoint'); ?></span>
                  </div>
                </div>

              </div>

                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Loading Weight</label>
                    <input type="number" class="form-control ltweight" name="ltweight">
                    <span class="text-danger"><?php echo form_error('ltweight'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Rate Parton</label>
                    <input type="number" class="form-control ltrateparton" name="ltrateparton">
                    <span class="text-danger"><?php echo form_error('ltrateparton'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Advances</label>
                    <input type="number" class="form-control" name="ltadvances">
                    <span class="text-danger"><?php echo form_error('ltadvances'); ?></span>
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="">Amount</label>
                    <input type="number" readonly="readonly" class="form-control lttotalamount" name="lttotalamount">
                    <span class="text-danger"><?php echo form_error('lttotalamount'); ?></span>
                  </div>
                </div>

              </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" name="adddumper" class="btn btn-info btn-round" data-dismiss="modal">
                <input type="reset" class="btn btn-danger btn-round"  data-dismiss="modal">
              </div>
                </form>
               </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
