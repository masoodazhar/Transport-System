
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <a href="<?php echo base_url() ?>material/add_material" class="btn btn-info"><i class="material-icons">add</i> Add New</a>
                
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
                        <table class="table table-striped"  border="1" width="100%">
                          <tr>
                            <td colspan="8"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                          </tr>
                          <tr>
                            <td colspan="8"><span  class="text-bold" >S.No#</span> <?= $serialnumber; ?> </td>
                             
                          </tr>
                          <tr>

                              <td colspan="2"> 
                                 <span  class="text-bold" >Departure Date:  </span>
                                 <span class=""> <?= $material_result->ttddeparturedate; ?></span>
                              </td>
                              <td colspan="2">
                                <span  class="text-bold" > Truck Number :  </span>
                                <span> <?= $material_result->tnumber; ?></span>
                              </td>
                              <td colspan="2">
                                <span  class="text-bold" >Weight Space <sup>(Tan)</sup> :  </span>
                                <span> <?= $material_result->tomweightspace; ?></span>
                              </td>
                            
                              <td colspan="4">
                                <span  class="text-bold" > Weight <sup>(Tan)</sup> :  </span>
                                <span> <?= $material_result->tomweight; ?></span>
                              </td>
                              

                          </tr>
                          <tr>
                           
                           <td colspan="2">
                              <span  class="text-bold" > Transpoter Name:  </span>
                              <span> <?= $material_result->tomtransporter; ?></span>
                            </td>
                             
                            <td colspan="2">
                                <span  class="text-bold" > Location:  </span>
                                <span> <?= $material_result->tomlocation; ?></span>
                            </td>
                             
                            <td colspan="2">
                              <span  class="text-bold" > Payment Method :  </span>
                              <span> <?= $material_result->tompaymentmethod; ?> </span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Total Amount :  </span>
                              <span> <?= $material_result->tomtotalamount; ?></span>
                            </td>
                          </tr>

                          <tr>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Remaining Amount :  </span>
                              <span> <?= $material_result->tomremainingamount; ?></span>
                            </td>
                            

                            <td colspan="2">
                              <span  class="text-bold" > Advance Commission :  </span>
                              <span> <?= $material_result->tomadvancecommission; ?></span>
                            </td>

                             <td colspan="2">
                              <span  class="text-bold" > Remaining Commission  :  </span>
                              <span> <?= $material_result->tomremainingcommission; ?></span>
                            </td>
                            
                            <td colspan="2">
                              <span  class="text-bold" > Payment Date :  </span>
                              <span> <?= $material_result->tompaymentdate; ?> </span>
                            </td>
                              
                          </tr>

                          <tr>
                            <td colspan="8">
                              <span  class="text-bold" > Descrition :  </span>
                              <span> <?= $material_result->tomdescription; ?> </span>
                            </td>
                          </tr>
                         
                          

                        </table>


                </div>
              </div>
            </div>
          </div>
        </div>
      </div>