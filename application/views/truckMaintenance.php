
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Truck Maintenane</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?=base_url()?>main/maintenance_validation">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="text-center font-weight-bold"> OIL & TYRE </h3>
                  </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="selectpicker" name="tmtruck_id" data-style="select-with-transition" title="Truck" data-size="5" tabindex="-98">
                      <?php foreach ($truck as $trucks ) {
                         echo '<option value='.$trucks->tid.'>'.$trucks->tnumber.'</option>';
                      } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('tmtruck_id'); ?></span>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="selectpicker" name="tmdriver_id" data-style="select-with-transition" title="Driver" data-size="5" tabindex="-98">
                      <?php foreach ($driver as $drivers ) {
                         echo '<option value='.$drivers->did.'>'.$drivers->tname.'</option>';
                      } ?>
                    </select>
                    <span class="text-danger"><?php echo form_error('tmdriver_id'); ?></span>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="selectpicker oilselect" name="tmoil_id" data-style="select-with-transition" title="Oil" data-size="5" tabindex="-98">
                      <?php foreach ($oil as $oils ) {
                         echo '<option value='.$oils->toid.'>'.$oils->toname.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <select class="selectpicker tyreselect" name="tmtyre_id" data-style="select-with-transition" title="Tyre" data-size="5" tabindex="-98">
                      <?php foreach ($tyre as $tyres ) {
                         echo '<option value='.$tyres->ttid.'>'.$tyres->ttname.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                </div>

               <div class="row">

                <div class="col-md-3 toltr" style="display: none !important;">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">oil liter</label>
                    <input type="text" class="form-control" name="tmoil_liter" >
                  </div>
                </div>
                <div class="col-md-2 tamount" style="display: none !important;">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Total Amount</label>
                    <input type="text" class="form-control otamount" name="tmot_amount" >
                  </div>
                </div>
                <div class="col-md-2 tpamount" style="display: none !important;">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Paid Amount</label>
                    <input type="text" class="form-control opamount" name="tmop_amount">
                  </div>
                </div>
                <div class="col-md-2 tramount" style="display: none !important;">
                  <div class="form-group">
                    <label for="exampleEmail" class="">Remaining Amount</label>
                    <input type="text" class="form-control oramount" name="tmor_amount" readonly="readonly">
                  </div>
                </div>
                <div class="col-md-3 tdate" style="display: none !important;">
                  <div class="form-group">
                    <input type="text" class="form-control datepicker" name="tmoc_date" placeholder="Change Date">
                  </div>
                </div>
                </div>
                
                <div class="row">
                <div class="col-md-3 ttpair" style="display: none !important;">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Tyre Pairs</label>
                    <input type="text" class="form-control" name="tmtyre_pair" >
                  </div>
                </div>
                <div class="col-md-2 ttamount" style="display: none !important;">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Total Amount</label>
                    <input type="text" class="form-control ttotala" name="tmtt_amount" >
                  </div>
                </div>
                <div class="col-md-2 ttpamount" style="display: none !important;">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Paid Amount</label>
                    <input type="text" class="form-control tpaida" name="tmtp_amount" >
                  </div>
                </div>
                <div class="col-md-2 ttramount" style="display: none !important;">
                  <div class="form-group">
                    <label for="exampleEmail">Remaining Amount</label>
                    <input type="text" class="form-control tremaina" name="tmtr_amount" readonly="readonly">
                  </div>
                </div>
                <div class="col-md-3 ttdate" style="display: none !important;">
                  <div class="form-group">
                    <input type="text" class="form-control Datepicker" name="tmtc_date" placeholder="Change Date">
                  </div>
                </div>
                </div>

                <hr style="border: 1px black solid;">

                <div class="row">

                  <div class="col-md-12">
                    <h3 class="text-center font-weight-bold"> OTHER </h3>
                  </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <select class="selectpicker" name="tmshopid" data-style="select-with-transition" title="Shop" data-size="5" tabindex="-98">
                      <?php foreach ($shop as $shop ) {
                         echo '<option value='.$shop->sid.'>'.$shop->tsname.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Description</label>
                    <textarea class="form-control" name="tmodescripiton"></textarea>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Total Amount</label>
                    <input type="text" class="form-control tmototal_amount" name="tmototal_amount" >
                  </div>
                </div>

                </div>

                <div class="row">

                  <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Paid Amount</label>
                    <input type="text" class="form-control tmtop_amount" name="tmtop_amount" >
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail">Remaining Amount</label>
                    <input type="text" class="form-control tmtor_amount" name="tmtor_amount" readonly="readonly">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <input type="text" class="form-control datepicker" name="tmtoc_date" placeholder="work Date">
                  </div>
                </div>

              </div>
              </div>
              
                  <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round" name="addmaintenance" data-dismiss="modal">
                <input type="reset" class="btn btn-danger btn-round"  data-dismiss="modal">
              </div>
                </form>
               </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
