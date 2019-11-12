
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title"> VOUCHER </h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal tripform-last" id="tripform" method="POST" action="<?=base_url()?>trip/summary_validation">

                <div class="row">                  
                  <div class="col-sm-1"></div>
                   <div class="col-sm-3">
                    <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Serial No:</label>
                     <?php 
                      echo '<input type="text" readonly="readonly" class="form-control" name="ttdsno" value="'.$showtrip.'" >';
                     ?>
                    </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Parchoon</label>
                    <input type="text" class="form-control mtrl" readonly="readonly" name="ttdomaterial">
                   </div>
                  </div>

                 <div class="col-md-4">
                  <div class="form-group">
                  <label for="exampleEmail" class="text-uppercase">departure date</label>
                   <input type="text" class="form-control datepicker" name="ttddeparturedate" value="<?php echo set_value('ttddeparturedate'); ?>">
                   <span class="text-danger"><?php echo form_error('ttddeparturedate'); ?></span>
                  </div>
               </div>

               </div>

              <div class="row">

                <div class="col-sm-1"></div>
                 <div class="col-md-3">
                  <div class="form-group arvs">
                   <label for="exampleEmail" class="text-uppercase">Arrival date</label> 
                   <input type="text" class="form-control datepicker arv" onfocusout="abc()" name="ttdarrivaldate" value="<?php echo set_value('ttdarrivaldate'); ?>">
                   <span class="text-danger"><?php echo form_error('ttdarrivaldate'); ?></span>
                  </div>
               </div>   
                  
               <div class="col-sm-3">
                <div class="form-group">
                <label for="exampleEmail" class="text-uppercase">From City</label>
                <input type="text" class="form-control" readonly="readonly" name="ttdfrom" value="&nbsp;Karachi">
                <span class="text-danger"><?php echo form_error('ttdfrom'); ?></span>
                </div>
               </div>

               <div class="col-sm-4">
                <div class="form-group">
                <label for="exampleEmail" class="text-uppercase">To City</label>
                 <input type="text" class="form-control tocty" readonly="readonly" name="ttdto">
                </div>
               </div>

                </div>

                <div class="row">
                  
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                          <select class="selectpicker trucks" data-style="select-with-transition" title="Choose Truck" data-size="5" name="tid" tabindex="-98">
                              <?php if(count($showtruck) > 0) { foreach ($showtruck as $trow) {
                                echo '<option value="'.$trow->tid.'">'.$trow->tnumber.'</option>';
                              }} ?> 
                          </select>
                          <span class="text-danger"><?php echo form_error('tid'); ?></span>
                   </div>
                  </div>

                  <a href="<?php echo base_url()?>truck/add_truck" class="my-4" target="_blank" title="Add new truck"><i class="material-icons">add_circle</i></a>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Station</label>
                    <input type="text" class="form-control tostation" readonly="readonly">
                    <input type="hidden" class="form-control tostationid" readonly="readonly" name="ttdstation">
                   </div>
                  </div>
                
                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">weight <sup>In Ton</sup></label>
                    <input type="number" class="form-control fweight" name="ttdweight" readonly="readonly">
                   </div>
                  </div>

                </div>

                <hr style="border: solid 1px black;">

                <div class="row">



                  <div class="col-sm-1"></div>
                  <div class="col-md-3">
                  <div class="form-group">
                   <label for="exampleEmail" class="text-uppercase" >Arrival DATE</label>
                   <input type="text" class="form-control arive" readonly="readonly" name="trarrivingdate" value="<?php echo set_value('trarrivingdate'); ?>">
                   <span class="text-danger"><?php echo form_error('trarrivingdate'); ?></span>
                  </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <select class="selectpicker" data-style="select-with-transition" title="Choose City" name="fromtcid" data-size="5" tabindex="-98">
                            <?php 
                            if(count($showcity) > 0) 
                              { 
                                foreach ($showcity as $tocrow) 
                                {
                                  echo '<option value="'.$tocrow->tcid.'">'.$tocrow->tcname.'</option>';
                              }
                            } 
                            ?> 
                          </select>
                          <span class="text-danger"><?php echo form_error('fromtcid'); ?></span>
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <select class="selectpicker tocity" data-style="select-with-transition" title="Choose City" name="totcid" data-size="5" tabindex="-98">
                            <?php 
                            if(count($showcity) > 0) 
                              { 
                                foreach ($showcity as $tocrow) 
                                {
                                  echo '<option value="'.$tocrow->tcid.'">'.$tocrow->tcname.'</option>';
                              }
                            } 
                            ?> 
                          </select>
                          <a href="<?php echo base_url()?>city/add_city" target="_blank" title="Add new city"><i class="material-icons">add_circle</i></a>
                          <span class="text-danger"><?php echo form_error('totcid'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                    <div class="form-group">
                    <select class="selectpicker" data-style="select-with-transition" title="Choose station" name="tstid" data-size="5" tabindex="-98">
                      <?php
                        foreach ($showstation as $transport) 
                        {
                          echo '<option value="'.$transport->tstid.'">'.$transport->tstname.'</option>';
                        }
                      ?>
                    </select>
                          
                          <span class="text-danger"><?php echo form_error('tstid'); ?></span>
                    </div>
                  </div>

                  <a href="<?php echo base_url()?>station/add_station" class="my-2" title="Add new station" target="_blank"><i class="material-icons">add_circle</i></a>

                  <div class="col-sm-3">                
                    <div class="form-group">
                      <label for="exampleEmail" class="bmd-label-floating text-uppercase">Return Weight <sup>In Ton</sup></label>
                      <input type="number" class="form-control"  name="trweight" value="<?php echo set_value('trweight'); ?>">
                    </div>
                  </div>

                  <div class="col-sm-4">                
                    <div class="form-group">
                      <label for="exampleEmail" class="bmd-label-floating text-uppercase">Return Item</label>
                      <input type="text" class="form-control reamount" name="tritem" value="<?php echo set_value('tritem'); ?>">
                    </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Driver</label>
                    <input type="number" class="form-control trdriver" name="trdriver" value="<?php echo set_value('trdriver'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Zaheer</label>
                    <input type="number" class="form-control trzaheer" name="trzaheer" value="<?php echo set_value('trzaheer'); ?>">
                   </div>
                  </div>

                  
                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Haji Jani</label>
                    <input type="number" class="form-control trhjani" name="trhajijani" value="<?php echo set_value('trhajijani'); ?>">
                   </div>
                 </div>

                </div> 

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Brokery</label>
                    <input type="number" class="form-control trbrokery" name="trbrokery" value="<?php echo set_value('trbrokery'); ?>">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class=" text-uppercase">Advance\Bilty</label>
                    <input type="text" readonly="readonly" class="form-control trtotalamount" name="trtotalamount">
                    <span class="text-danger"><?php echo form_error('trtotalamount'); ?></span>
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">V.frieght</label>
                    <input type="number" class="form-control trvfrieght" name="trvfrieght" value="<?php echo set_value('trvfrieght'); ?>">
                    <span class="text-danger"><?php echo form_error('trvfrieght'); ?></span>
                   </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Inaam</label>
                    <input type="number" class="form-control trinam" name="trinaam" value="<?php echo set_value('trinaam'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Advance Comission</label>
                    <input type="number" class="form-control tradvancecomission" name="tradvancecomission" value="<?php echo set_value('tradvancecomission'); ?>">
                   </div>
                 </div>
                
                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Comission pending</label>
                    <input type="number" class="form-control trpendingcomission" name="trpendingcomission" value="<?php echo set_value('trpendingcomission'); ?>">
                   </div>
                  </div>

                  </div>

                   <div class="row">
                  
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Kanta</label>
                    <input type="number" class="form-control trkanta" name="trkanta" value="<?php echo set_value('trkanta'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Custom</label>
                    <input type="number" class="form-control trcustom" name="trcustom" value="<?php echo set_value('trcustom'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">point prize</label>
                    <input type="number" class="form-control trpoint" name="trpointprize" value="<?php echo set_value('trpointprize'); ?>">
                   </div>
                  </div>

                  </div>

                  <div class="row">

                  <div class="col-sm-1"></div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Dehari</label>
                    <input type="number" class="form-control trdehari" name="trdehari" value="<?php echo set_value('trdehari'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Shifting</label>
                    <input type="number" class="form-control trshifting" name="trshifting" value="<?php echo set_value('trshifting'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Loading</label>
                    <input type="number" class="form-control trloading" name="trloading" value="<?php echo set_value('trloading'); ?>">
                   </div>
                  </div>

                  </div>

                  <div class="row">

                  <div class="col-sm-1"></div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Extra Weight</label>
                    <input type="number" class="form-control trextraweight" name="trextraweight" value="<?php echo set_value('trextraweight'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">To Karachi</label>
                    <input type="text" class="form-control trtokarachi" name="trtokarachi" value="<?php echo set_value('trtokarachi'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-4">
                     <div class="form-group">
                      <label for="exampleEmail" class="text-uppercase">Recieved Amount</label>
                      <input type="number" class="form-control trrecievedamount" name="trrecievedamount" value="<?php echo set_value('trrecievedamount'); ?>">
                     </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-sm-1"></div>

                    <div class="col-sm-3">
                     <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description</label>
                    <input type="text" class="form-control" name="toedescription[]" value="<?php //echo set_value('toedescription'); ?>">
                     </div>
                    </div>

                   <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="text" class="form-control toeamount" name="toeamount[]" value="<?php //echo set_value('toeamount'); ?>">
                   </div>
                  </div>

                  <input type="hidden" class="form-control" name="toeidentity[]" value="return-0">

                  <a href="#" class="add_return my-4" title="Add new field"><i class="material-icons">add_circle</i></a>

                    </div>

                    <input type="hidden" value="0" class="form-control comisionsum">
                  
                    <div class="add_returns"></div>

                    <div class="row">
                      <div class="col-sm-1"></div>

                      <div class="col-sm-3">
                     <div class="form-group">
                      <label for="exampleEmail" class="text-uppercase">Remaining Amount</label>
                      <input type="number" class="form-control trremainingamount" name="trremainingamount" readonly="readonly" value="<?php echo set_value('trremainingamount'); ?>">
                     </div>
                    </div>

                      <div class="col-sm-3">
                     <div class="form-group">
                      <label for="exampleEmail" class="text-uppercase">Paid \ Pending</label>
                      <input type="text" class="form-control trpaymentstatus" name="trpaymentstatus" readonly="readonly" value="<?php echo set_value('trpaymentstatus'); ?>">
                     </div>
                    </div>

                      <div class="col-md-4">
                      <div class="form-group">
                       <label for="exampleEmail" class="text-uppercase">Date Of Pay</label>
                       <input type="text" class="form-control datepicker" name="trdateofpay" value="<?php echo set_value('trdateofpay'); ?>">
                      </div>
                     </div>

                    </div>

                  <hr style="border: solid 1px black;">

                  <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group pmp">
                    <select class="form-control" data-style="select-with-transition" data-size="5" name="tpid[]" tabindex="-98">
                     <option>CHOOSE PUMP</option>
                     <?php if(count($showpump) > 0) { foreach ($showpump as $prow) {
                      echo '<option value="'.$prow->tpid.'">'.$prow->tpname.'</option>';
                     }} ?> 
                    </select>
                   </div>
                  </div>

                  <div class="col-sm-2">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Diesel In liter</label>
                    <input type="Number" class="form-control ttddieselliter" name="tpdliter[]" value="<?php //echo set_value('tpdliter'); ?>">
                   </div>
                  </div>

                  <div class="col-sm-2">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Total Amount</label>
                    <input type="Number" class="form-control ttddieselprice" name="tpdamount[]" value="<?php //echo set_value('tpdamount'); ?>">
                   </div>
                  </div>

                  <input type="hidden" id="prliteramount" name="tpdprliteramount[]" value="<?php //echo set_value('tpdprliteramount'); ?>">

                  <div class="col-sm-3">
                   <div class="form-group pmpstatus">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Paid Amount</label>
                    <input type="number" class="form-control" name="tpdpaidamount[]" value="<?php //echo set_value('tpdpaidamount'); ?>">
                   </div>
                  </div>

                  <a href="#" class="add_pump my-4" title="Add new field"><i class="material-icons">add_circle</i></a>
                  
                </div>

                <div class="add_pumps"></div>

                <hr style="border: solid 1px black;">

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating  text-uppercase">Oil</label>
                    <input type="number" class="form-control ttdoilamount" name="ttdoil" value="7000">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">tirp Prize</label>
                    <input type="number" class="form-control ttdprizeamount" name="ttdprizeamount" value="3000">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Brokery</label>
                    <input type="number" class="form-control ttdbrokery" name="ttdbrokery" value="1500">
                   </div>
                 </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">(Hand over) Haji jani</label>
                    <input type="number" class="form-control ttdhohajijani" name="ttdhohajijani">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">weight expense</label>
                    <input type="number" class="form-control ttdweightexpense" name="ttdweightexpense">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Container unloading</label>
                    <input type="number" class="form-control ttdcunloading" name="ttdcunloading">
                   </div>
                 </div>

                 </div>

                 <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">M.K Autos</label>
                    <input type="number" class="form-control ttdtmaintainance" name="ttdtmaintainance">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Hub + other police</label>
                    <input type="number" class="form-control ttdpolice" name="ttdpolice">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">(HJ) Brokery</label>
                    <input type="number" class="form-control ttdhjbrokery" name="ttdhjbrokery">
                   </div>
                 </div>

                 </div>

                 <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description</label>
                    <input type="text" class="form-control ttdinam" name="ttddescription">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control ttdiamount" name="ttdinamount">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Inaam</label>
                    <input type="number" class="form-control" name="ttdinaam">
                   </div>
                 </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Decription( Truck Debit )</label>
                    <input type="text" class="form-control ttddother" name="ttddescriptiontdebit">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control ttdtdamount" name="ttdtdebitamount">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description ( On Vehicle)</label>
                    <input type="text" class="form-control ttdtruckservice" name="ttddescriptiononvehicle">
                   </div>
                 </div>

                </div>

                <div class="row">
                  
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control ttdtsamount" name="ttdonvechicleamount">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description</label>
                    <input type="text" class="form-control ttdtruckservice" name="ttddescription2">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control ttddescamount" name="ttd2amount">
                   </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description ( Driver salary )</label>
                    <input type="text" class="form-control ttdtruckservice" name="ttddescdriversalary">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control ttddsamount" name="ttdsalaryamount">
                   </div>
                  </div>
                  
                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description ( Driver account open )</label>
                    <input type="text" class="form-control ttd" name="ttddescdaopen">
                   </div>
                 </div>

               </div>

               <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control ttddaoamount" name=" ttddaoamount">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description ( Driver expense & medicine )</label>
                    <input type="text" class="form-control ttdtruckservice" name="ttddescdexpense">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control ttddexpamount" name="ttdexpenseamount">
                   </div>
                  </div>

                </div>

                <div class="row">
                  
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description ( driver account closed )</label>
                    <input type="text" class="form-control ttdtruckservice" name="ttddescdaclosed">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control ttddacamount" name="ttddacamount">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Munshiana</label>
                    <input type="number" class="form-control ttdmunshiana" name="ttdmunshiana">
                   </div>
                  </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">food expense</label>
                    <input type="number" class="form-control ttdfoodexpense" name="ttdfoodexpense">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">total expense</label>
                    <input type="number" class="form-control ttdtotalexpense" name="ttdfirsttotalexpense" readonly="readonly" value="0">
                    <!-- <input type="hidden" class="form-control tohide" name=""> -->
                   </div>
                 </div>

                </div>

                <hr style="border: solid 1px black;">

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Driver advance</label>
                    <input type="number" class="form-control avpa" name="ttddriveradvance" value="30000">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Bilty recieving (port)</label>
                    <input type="number" class="form-control bvpa" name="ttdbiltyrecievingport">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Fare Rate</label>
                    <input type="number" class="form-control vfreight" name="ttdfarerate" readonly="readonly">
                   </div>
                 </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <select class="selectpicker vpaamount" data-style="select-with-transition" title="Choose Paid \ pending" data-size="5" name="ttdfarestatus" tabindex="-98">
                     <option value="paid">Paid</option> 
                     <option value="pending">Pending</option>
                    </select>
                   </div>
                  </div>

                  <input type="hidden" class="form-control vpa" readonly="readonly">

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Parchoon recieving</label>
                    <input type="number" class="form-control prate" name="ttdparchoonrecieving" value="0">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Fare Rate</label>
                    <input type="number" class="form-control frate" readonly="readonly" name="ttdfareratetwo">
                   </div>
                  </div>

                  </div>

                 <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <select class="selectpicker vpbamount" data-style="select-with-transition" title="Choose paid \ pending" data-size="5" name="ttdfarestatustwo" tabindex="-98">
                     <option value="paid">Paid</option> 
                     <option value="pending">Pending</option>
                    </select>
                   </div>
                  </div>

                  <input type="hidden" class="form-control vpb" readonly="readonly">

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Returning v.frieght</label>
                    <input type="number" class="form-control rvfrieght" name="ttdreturnvfreight" readonly="readonly">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <select class="selectpicker vpcamount" data-style="select-with-transition" title="Choose paid \ pending" data-size="5" name="ttdrvfreightstatus" tabindex="-98">
                     <option value="paid">Paid</option> 
                     <option value="pending">Pending</option>
                    </select>
                   </div>
                  </div>

                </div>

                <div class="row">

                  <input type="hidden" class="form-control vpc" readonly="readonly">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Taken from Haji jani</label>
                    <input type="number" class="form-control takehaji" name="ttdtakenhajijani" value="0">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Dehari</label>
                    <input type="number" class="form-control ttddehari" readonly="readonly" name="ttddehari">
                    <input type="hidden" class="form-control dehariinitial" name="">
                   </div>
                  </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Extra weight fare</label>
                    <input type="number" class="form-control ewfare" readonly="readonly" name="ttdextraweightfare">
                   </div>
                 </div>

                </div>

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Shifting</label>
                    <input type="number" readonly="readonly" class="form-control ttdshifting" name="ttdshifting" >
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Trip point prize</label>
                    <input type="number" class="form-control ttdpointprize" name="ttdtrippointprize" readonly="readonly">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">other Description ( Credit )</label>
                    <input type="text" class="form-control" name="ttddescriptioncredit">
                   </div>
                 </div>

               </div>
               <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control creditamount" name="ttdcreditamount" value="0">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Othe description ( Return )</label>
                    <input type="text" class="form-control" name="ttddescriptionreturn">
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control returnamount" name="ttdreturnamount" value="0">
                   </div>
                 </div>

               </div>

                <div class="row">
                  
                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Description</label>
                    <input type="text" class="form-control" name="toedescription[]" value="">
                   </div>
                  </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label>
                    <input type="number" class="form-control toeamountlast" name="toeamount[]" value="">
                   </div>
                  </div>

                  <input type="hidden" class="form-control" name="toeidentity[]" value="voucher-0">

                  <a href="#" class="add_voucher my-2" title="Add new field"><i class="material-icons">add_circle</i></a>
                  
                </div>

                <div class="add_vouchers"></div>

                <hr style="border: solid 1px black;">

                <div class="row">

                  <div class="col-sm-1"></div>
                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Total income</label>
                    <input type="number" class="form-control ttlincome" readonly="readonly" name="ttdtotalincomeone" value="0">
                   </div>
                 </div>

                  <div class="col-sm-3">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">Remaining Amount</label>
                    <input type="number" class="form-control remainrate" name="ttdremainingamount" readonly="readonly" >
                   </div>
                 </div>

                  <div class="col-sm-4">
                   <div class="form-group">
                    <label for="exampleEmail" class="text-uppercase">After adv to driver</label>
                    <input type="number" class="form-control advdriver" name="ttdafteradvancetodriver" readonly="readonly" >
                   </div>
                 </div>

               </div>

              </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round" name="addtripsummary" data-dismiss="modal">
                <a href="<?=base_url()?>trip" class="btn btn-danger btn-round">close</a>
              </div>

                </form>
               </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
