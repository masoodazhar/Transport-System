
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">New Tyre</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?=base_url()?>tyre/tyre_validation">
                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Name</label>
                    <input type="text" class="form-control" name="ttname">
                    <span class="text-danger"><?php echo form_error('ttname'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">No. Of Tyres <sub>(in Pair/s)</sub></label>
                    <input type="number" class="form-control qpair" name="tttyrepair">
                    <span class="text-danger"><?php echo form_error('tttyrepair'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Price per pair</label>
                    <input type="text" class="form-control perprice" name="ttprice">
                    <span class="text-danger"><?php echo form_error('ttprice'); ?></span>
                  </div>
                </div>
                </div>

                <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="">Total Price</label>
                    <input type="number" class="form-control tprice" readonly="readonly" name="tttotalprice">
                    <span class="text-danger"><?php echo form_error('tttotalprice'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Paid Amount</label>
                    <input type="text" class="form-control ttpaid" name="ttpaid">
                    <span class="text-danger"><?php echo form_error('ttpaid'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="">Remaining Amount</label>
                    <input type="text" readonly="readonly" class="form-control ttremaining" name="ttremaining">
                    <span class="text-danger"><?php echo form_error('ttremaining'); ?></span>
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                   <select class="selectpicker" name="ttshopid"  data-style="select-with-transition" title="Shop" data-size="5" tabindex="-98">
                    <?php 
                    foreach ($shop as $shops) {
                      echo '<option value="'.$shops->sid.'">'.$shops->tsname.'</option>';
                    }
                    ?>
                      
                    </select>
                    <span class="text-danger"><?php echo form_error('ttshopid'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Description</label>
                    <textarea class="form-control" name="ttdescription"></textarea>
                  </div>
                  <span class="text-danger"><?php echo form_error('ttdescription'); ?></span>
                </div>
              </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" name="addtyre" class="btn btn-info btn-round" data-dismiss="modal">
                <input type="reset" class="btn btn-danger btn-round"  data-dismiss="modal">
              </div>
                </form>
               </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
