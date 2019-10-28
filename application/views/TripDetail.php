
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>trip/add_trip" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
              </div>
              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">map</i>
                  </div>
                  <h4 class="card-title">Trip Summary</h4>
                </div>
                <div class="card-body">
 <style>
  
  .text-bold{
    font-weight: bold;
    padding: 10px;
  }

  td{
    border-left: solid 2px;

  }
  .underscore{
    border-bottom: 1px solid;
    width: 100%;
  }
 </style>
                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="8"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                          </tr>
                          <tr>
                            <td colspan="6"><span  class="text-bold" >S.No#</span> <?=$trip_result->ttdsno?> </td>
                             <td colspan="2"><span  class="text-bold" >Other Material : </span> 
                              <?php
                              if($trip_result->ttdothermaterial>0){
                                echo '<a class="btn btn-default" href="'.base_url().'material/material_detail/'.$trip_result->ttdid.'/'.$trip_result->ttdsno.'"> YES</a>';
                              }else{
                                 echo 'NO';
                              }
                              ?>
                             </td>
                          </tr>
                          <tr>
                              <td colspan="2"> 
                                 <span  class="text-bold" >Departure Date:  </span>
                                 <span class=""><?=$trip_result->ttddeparturedate;?></span>
                              </td>

                             <td colspan="2"> 
                                 <span  class="text-bold" >Arrival Date: </span>
                                 <span><?=$trip_result->ttdarrivaldate;?></span>
                              </td>

                              <td colspan="2">
                                <span  class="text-bold" >From City:  </span>
                                 <span> <?=$trip_result->tcname;?></span>
                              </td>

                              <td colspan="2">
                                 <span  class="text-bold" >To City:  </span>
                                 <span> <?=$trip_result->tcname;?></span>
                              </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold" > Truck Number :  </span>
                              <span> <?=$trip_result->tnumber;?></span>
                            </td>
                            <td colspan="2">
                              <span  class="text-bold" >Weight <sup>(Tan)</sup> :  </span>
                              <span><?=$trip_result->ttdweight;?></span>
                            </td>
                            
                            <td colspan="4">
                              <span  class="text-bold" > Return Weight <sup>(Tan)</sup> :  </span>
                              <span> <?=$trip_result->ttdreturnweight;?></span>
                            </td>
                             
                             
                            
                            
                          </tr>

                          <tr>
                            <td colspan="8">
                              <span  class="text-bold" > Payment Method :  </span>
                              <span> <?=$trip_result->ttdpaymentmethod;?> </span>
                            </td>

                            
                          </tr>

                          <tr>
                              
                            <td colspan="2">
                              <span  class="text-bold" > Total Amount :  </span>
                              <span> <?=$trip_result->ttdtotalamount;?></span>
                            </td>

                            <td colspan="2">
                              <span  class="text-bold" > Truck Rent :  </span>
                              <span> <?=$trip_result->ttdtruckrent;?></span>
                            </td>

                            <td colspan="2">
                              <span  class="text-bold" > Recieve Amount :  </span>
                              <span><?=$trip_result->ttdadvancerecieveamount;?></span>
                            </td>

                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span> <?=$trip_result->ttdremainingamount;?></span>
                            </td>
                              
                          </tr>
                            <tr>
                              

                            <td colspan="2">
                              <span  class="text-bold" > Diesel in liter :  </span>
                              <span> <?=$trip_result->ttddieselltr;?></span>
                            </td>

                            <td colspan="2">
                              <span  class="text-bold" > Diesel Amount :  </span>
                              <span> <?=$trip_result->ttddieselamount;?></span>
                            </td>

                            <td colspan="2">
                              <span  class="text-bold" > Diesel per liter :  </span>
                              <span> <?=$trip_result->ttddieselprltr;?></span>
                            </td>

                            <td colspan="2">
                              <span  class="text-bold" > Oil Amount <sup>(Fix)</sup> :  </span>
                              <span> <?=$trip_result->ttdoilamount;?> </span>
                            </td>
                              
                          </tr>

                          <tr>
                              

                            <td colspan="4">
                              <span  class="text-bold" > Brokery Amount <sup>(Fix)</sup> :  </span>
                              <span> <?=$trip_result->ttdbrokeryamount;?></span>
                            </td>

                            <td colspan="4">
                              <span  class="text-bold" > Trip Prize <sup>(Fix)</sup> :  </span>
                              <span> <?=$trip_result->ttdprizeamount;?></span>
                            </td>
                              
                          </tr>
                          
                          <?php

                          foreach ($otherexpense_result as $otherRow) {
                            ?>
                            <tr>
                              <td colspan="8">
                                <span  class="text-bold" > <?= $otherRow->toedescription; ?> :  </span>
                                <span>  <?= $otherRow->toeamount; ?> </span>
                              </td>
                            </tr>

                            <?php
                          }

                          ?>

                        </table>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>