
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">New Truck</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" id="truckform" method="POST" action="<?=base_url()?>truck/truck_validation">
                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Name</label>
                    <input type="text" value="<?php echo set_value('tname'); ?>" class="form-control " name="tname">
                    <span class="text-danger"><?php echo form_error('tname'); ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Model</label>
                    <input type="text" value="<?php echo set_value('tmodel'); ?>" class="form-control" name="tmodel">
                    <span class="text-danger"><?php echo form_error('tmodel'); ?></span>
                  </div>
                </div>
                </div>

               <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Truck Number</label>
                    <input type="text" value="<?php echo set_value('tnumber'); ?>" class="form-control typetruckname" name="tnumber">
                    <span class="text-danger"><?php echo form_error('tnumber'); ?></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Price</label>
                    <input type="number" value="<?php echo set_value('tprice'); ?>" class="form-control" name="tprice" id="totalprice">
                    <span class="text-danger"><?php echo form_error('tprice'); ?></span>
                  </div>
                </div>
                </div>

                <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                   <select class="selectpicker selectinstall" name="tmethod" data-style="select-with-transition" title="Payment Method" data-size="5" tabindex="-98">
                      <option value="lumpsum" <?php if(set_value('tmethod')=='lumpsum'){ echo 'selected'; }?> >Lump Sum </option>
                      <option value="installment"  <?php if(set_value('tmethod')=='installment'){ echo 'selected'; }?>>Installment</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('tmethod'); ?></span>
                  </div>
                </div>
                <div class="col-md-4 install_duration" style="display: none !important;">
                  <div class="form-group">
                    <select class="selectpicker" name="tinstallmethod" data-style="select-with-transition" data-size="5" tabindex="-98">
                      <option value="clear" selected="">Installment Duration</option>
                      <option value="day">Per day</option>
                      <option value="week">Per week</option>
                      <option value="month">Per month</option>
                      <option value="year">Per year</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4 paid_amount" style="display: none !important;">
                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Paid Amount</label>
                    <input type="text" value="<?php echo set_value('tpaidamount'); ?>" class="form-control paid" name="tpaidamount" id="paidamount" value="0">
                  </div>
                </div>
                </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="selectpicker" name="tbuysale" data-style="select-with-transition" data-size="5" tabindex="-98" title="Choose Sell/Buy">
                      <option value="0">Buy</option>
                      <option value="1">Sell</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('tbuysale'); ?></span>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <select class="selectpicker" name="ttdtype" data-style="select-with-transition" data-size="5" tabindex="-98" title="Choose type">
                      <option value="0">Truck</option>
                      <option value="1">Dumper</option>
                    </select>
                    <span class="text-danger"><?php echo form_error('ttdtype'); ?></span>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="exampleEmail">Reaminig Amount</label>
                    <input type="text" class="form-control repayment" name="tremainingamount" readonly="readonly" value="0">
                  </div>
                </div>
                <a href="#"  data-toggle="modal" data-target="#truckremain" id="truckremaining" class="my-4" title="Add details"><i class="material-icons">add_circle</i></a>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail">Insurance Expiry Date</label>
                    <input type="text" value="<?php echo set_value('tinsurancedate'); ?>" class="form-control datepicker" name="tinsurancedate">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail">Permit Expiry Date</label>
                    <input type="text" value="<?php echo set_value('tpermitdate'); ?>" class="form-control datepicker" name="tpermitdate">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail">Fitness Expiry Date</label>
                    <input type="text" value="<?php echo set_value('tfitnessdate'); ?>" class="form-control datepicker" name="tfitnessdate">
                    
                  </div>
                </div>
                </div>
                <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="exampleEmail">Tax Expiry Date</label>
                    <input type="text" value="<?php echo set_value('ttaxdate'); ?>" class="form-control datepicker" name="ttaxdate">
                 </div>
                </div>
                </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round tsubmitsuccess" name="addtruck" data-dismiss="modal">
                <a class="btn btn-danger btn-round tsubmiterror" style="display:none;" href="#">This Truck with the same name is already available?</a>
                <a class="btn btn-danger btn-round" href="<?=base_url()?>truck">Close</a>
              </div>

                   <!-- Classic Modal -->
                      <div class="modal fade" id="truckremain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3 class="modal-title">Remaining Amount Detail</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                <i class="material-icons">clear</i>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Concern Person</label>
                                    <input type="text" class="form-control trapdname" id="trapdname" name="trapdname">
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Contact</label>
                                    <input type="text" value="" class="form-control" name="trapdcontact" id="totalprice">
                                  </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="">Return Date</label>
                                    <input type="text" class="form-control datepicker" name="trapddate">
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Description</label>
                                    <textarea class="form-control" name="trapddescription"></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <input type="hidden" class="form-control" name="trapdtypeid" value="truck-0">
                                  </div>
                                </div>
                                </div>
                              </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-success" data-dismiss="modal">Done</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--  End Modal -->

                </form>
               </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>