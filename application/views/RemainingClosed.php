<style>
 .my-card
{
    position:absolute;
    left:43%;
    top:-30%;
    border-radius:50%;
    width:50px;

}
.profile-employee {
  padding: 4px;
}

.profile-employee li{
  display: inline-block;
    list-style: none;
    float: left;
    padding: 5px;
}

.profile-employee li img{
    border: solid 2px;
    border-radius: 40px;
    /* float: left;*/
}
.mycard-text{
  padding:0px !important;
}

.profile-employee li h2{
     margin-top: 0px;
    font-size: 18px;
    vertical-align: bottom;
    text-transform: capitalize;
}
</style>
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Recieve Installment</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>close/close_validation">
                 <div class="row">
                  <div class="col-sm-3">
                  <div class="form-group">
                    <select class="selectpicker " id="allnameOfremainingamount" data-style="select-with-transition" title="Choose Name" data-size="5" name="trapdid" tabindex="-98">
                    <?php

                    foreach ($remainingnameids as $key) {
                      $selected='';
                      if($selected_person==$key->trapdid && $selected_person!=0){
                        $selected='selected="selected"';
                      }else{
                        $selected='';
                      }
                      echo ' <option '.$selected.' value="'.$key->trapdid.'">'.$key->trapdname.'</option>';
                    }

                    ?>
                   </select>
                    <span class="text-danger"><?php echo form_error('trapdid'); ?></span>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="form-group">
                    <select class="selectpicker " id="trapdctakenfrom" data-style="select-with-transition" title="Choose Cashier" data-size="5" name="trapdctakenfrom" tabindex="-98">
                    <option value="1">Office Staff</option>
                    <option value="2">Haji Jani</option>
                    <option value="3">Driver</option>

                   </select>
                    <span class="text-danger"><?php echo form_error('trapdid'); ?></span>
                  </div>
                </div>
                
                  <div class="col-sm-3">

                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Amount</label>
                   <input type="text" name="trapdcamount" class="form-control">
                    <span class="text-danger"><?php echo form_error('trapdcamount'); ?></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="exampleEmail" class="">Date</label>
                   <input type="text" name="trapdcdate" class="form-control datepicker">
                    <span class="text-danger"><?php echo form_error('trapdcdate'); ?></span>
                  </div>

                </div>
                <div class="col-sm-2 my-4">
                  <label class="form-check-label">
                            <input class="form-check-input" id="trapdcndate" name="xyz" type="checkbox" value=""> Next date
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                </div>
                <div class="col-sm-6 trapdcndate" style="display: none;">
                  <div class="form-group" >
                    <label for="exampleEmail" class="">Next Date</label>
                   <input type="text" name="trapdcnextdate" class="form-control datepicker">
                  </div>                  
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">

                  <div class="form-group">
                    <label for="exampleEmail" class="bmd-label-floating">Description</label>
                     <textarea class="form-control" name="trapdcdescription"></textarea>
                  </div>
                </div>
              </div>
                  <div class="modal-footer justify-content-center">
                <input type="submit" class="btn btn-info btn-round" name="addclose" data-dismiss="modal">
                <a href="#" class="btn btn-danger btn-round">Close</a>
              </div>
                </form>
               </div>

              </div>
            </div>
            

                    

                           <div class="row w-100">
                              <div class="col-md-4">
                                  <div class="card border-info mx-sm-1 p-3">
                                      <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-money" aria-hidden="true"></span></div>
                                      <div class="text-info text-center mt-3"><h4>Amount Was Remaining</h4></div>
                                      <div class="text-info text-center mt-2"><h2>Rs. <?php echo $get_sumof_closed_amount_by_personid->totalamount==''?0:$get_sumof_closed_amount_by_personid->totalamount;  ?></h2></div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="card border-success mx-sm-1 p-3">
                                      <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                                      <div class="text-success text-center mt-3"><h4>Total Paid Amount</h4></div>
                                      <div class="text-success text-center mt-2"><h2>Rs. <?php if($get_sumof_closed_amount_by_personid->paidamount){ echo $get_sumof_closed_amount_by_personid->paidamount; }else{ echo 0; } ?> </h2></div>
                                  </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="card border-danger mx-sm-1 p-3">
                                      <div class="card border-danger shadow text-danger p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                                      <div class="text-danger text-center mt-3"><h4>Still Remaining Amount</h4></div>
                                      <div class="text-danger text-center mt-2"><h2>Rs. <?php if($get_sumof_closed_amount_by_personid->remainingamount){ echo $get_sumof_closed_amount_by_personid->remainingamount; }else { echo $get_sumof_closed_amount_by_personid->totalamount==''?0:$get_sumof_closed_amount_by_personid->totalamount; } ?></h2></div>
                                  </div>
                              </div>
                          </div>


                          
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Employee/List</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                       
                          <th> Name </th>
                          <th> Total Amount </th>
                          <th> Paid Amount </th>
                          <th> Remaining Amount </th>
                          <th>Payment Date</th>
                          <th>Details</th>
                                                
                          <th width="15%" class="text-right">Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($get_all_closed_amount_by_personid as $value) {
                          # code...
                        ?>
                        <tr>
                        <td> <?= $value->trapdname; ?> </td>
                        <td>  <?= $value->trapdamount; ?> </td>
                        <td>  <?= $value->trapdcamount; ?> </td>
                        <td>  <?= $value->remainingamount; ?> </td>
                        <td> <?= $value->trapdcdate; ?> </td>
                        <td> <?= $value->trapdcdescription; ?> </td>
                         <td>
                            <a href="" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a>
                           
                          </td>
                        </tr>
                       <?php
                       }?>
                        
                      </tbody>
                    </table>
                  </div>
          </div>
          
        </div>

        
      </div>
          </div>
        </div>
      </div>