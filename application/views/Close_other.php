
<style>
  .text-bold{
    font-weight:bold;
    color: white;
  }
  .all-card-header{
    background: #e91e63;
    padding: 30px;
    box-shadow: 0px 0px 6px;
    height: 95px;
  }
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
ul.all_details li {
    display: inline-block;
    padding: 0px 14px 0 5px;
    margin: 0px;
}


ul.all_detailsv li {
    display: inline-block;
    padding: 0px 15px 0 15px;
    margin: 0px;
}
</style>



<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              
        
        
            </div>
                 
          <div class="row">
            
            <div class="col-md-12">
                  
              <div class="card ">
              
                <div class="card-header card-header-rose card-header-text">
                  
                 
                            <div class="row">
                              <div class="col-sm-4">
                                <div class="card-icon">
                                    <i class="material-icons">emoji_transportation</i>
                                </div>
                              </div>
                             
                            </div>
                 
                          
                  
                  
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="<?php echo base_url()?>Close_other/save_close_data">
                 
                    <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating" ></label>
                                        <select data-style="select-with-transition" class="selectpicker" name="cototype" title="Select Category" id="change_category">
                                                <?php foreach ($choosen_cate as $key => $value) { 
                                                    $selected = '';
                                                    if($category==$key){
                                                        $selected = 'selected="selected"';
                                                    }else{
                                                        $selected ='';
                                                    }
                                                   echo ' <option '.$selected.' value="'.$key.'">'.$value.'</option>';
                                                } ?>
                                                
                                               
                                        </select>
                                    <span class="text-danger"><?php echo form_error('saleidi'); ?></span>
                                </div>
                            </div>
                            <?php if($category=='oil'){ ?>
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleEmail" class="bmd-label-floating"></label>
                                            <select data-style="select-with-transition" class="selectpicker" name="coto_foreignid"  title="Select Category" id="search_remaining">
                                            <?php foreach ($oil_data as $key => $value) { 
                                                $selected = '';
                                                if($id==$value->toshopid){
                                                    $selected = 'selected="selected"';
                                                }else{
                                                    $selected ='';
                                                }
                                                ?>
                                                <option <?=$selected?> value="<?=$value->toshopid?>"><?=$value->tsname?></option>
                                            <?php } ?>
                                                
                                                
                                            </select>
                                        <span class="text-danger"><?php echo form_error('saleidi'); ?></span>
                                    </div>
                                </div>
                            <?php }else if($category=='tyre'){ ?>
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleEmail" class="bmd-label-floating"></label>
                                            <select data-style="select-with-transition" class="selectpicker" name="coto_foreignid" title="Select Category" id="search_remaining">
                                            <?php foreach ($tyre_data as $key => $value) {
                                                 $selected = '';
                                                 if($id==$value->ttshopid){
                                                     $selected = 'selected="selected"';
                                                 }else{
                                                     $selected ='';
                                                 }
                                                
                                                ?>
                                                <option <?=$selected?> value="<?=$value->ttshopid?>"><?=$value->tsname?></option>
                                            <?php } ?>
                                                
                                                
                                            </select>
                                        <span class="text-danger"><?php echo form_error('saleidi'); ?></span>
                                    </div>
                                </div>
                            <?php }else if($category=='pump'){ ?>
                                
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="exampleEmail" class="bmd-label-floating"></label>
                                            <select data-style="select-with-transition" class="selectpicker" name="coto_foreignid" title="Select Category" id="search_remaining">
                                            <?php foreach ($pump_data as $key => $value) {
                                                 $selected = '';
                                                 if($id==$value->tpid){
                                                     $selected = 'selected="selected"';
                                                 }else{
                                                     $selected ='';
                                                 }
                                                
                                                ?>
                                                <option <?=$selected?> value="<?=$value->tpid?>"><?=$value->tpname?></option>
                                            <?php } ?>
                                                
                                                
                                            </select>
                                        <span class="text-danger"><?php echo form_error('saleidi'); ?></span>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleEmail"  class="bmd-label-floating ">Amount</label>
                                        <input type="number" name="cotoamount" value="<?php echo set_value('cotoamount'); ?>" class="form-control">
                                    <span class="text-danger"><?php echo form_error('cotoamount'); ?></span>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="exampleEmail" class="bmd-label-floating">Date</label>
                                    <input type="text"  name="cotodate" value="<?php echo set_value('cotodate'); ?>" class="form-control datepicker">
                                    <span class="text-danger"><?php echo form_error('cotodate'); ?></span>
                                </div>
                            </div>
                        
                    </div>
                    
                <div class="row">
                   <div class="col-md-12">
                   <div class="modal-footer justify-content-center">
                        <input type="submit" class="btn btn-info btn-round" data-dismiss="modal">
                        <a href="#" class="btn btn-danger btn-round">Close</a>
                    </div>
                   </div>
               </div>
               </div>
               </form>
              </div>
            



        <div class="row w-100">
            <div class="col-md-4">
                <div class="card border-info mx-sm-1 p-3">
                    <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-money" aria-hidden="true"></span></div>
                    <div class="text-info text-center mt-3"><h4>Oil Remaining Deatils</h4></div>
                    <div class="text-info text-center mt-2">
                        
                        <table class="table table-striped">
                        <tr>
                            <th>Amount Was</th>
                            <th>Paid Amount</th>
                            <th>Still Remaining</th>
                        </tr>
                        <tr>
                            <td>Rs. <b><?=$get_total_oil_remaining;?></b></td>
                            <td>Rs. <b><?=$get_total_paid_amount_oil;?></b></td>
                            <td>Rs. <b><?=$get_total_oil_remaining-$get_total_paid_amount_oil;?></b></td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card border-success mx-sm-1 p-3">
                    <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                    <div class="text-success text-center mt-3"><h4>Total Remaining Amount of Tyre</h4></div>
                    <div class="text-success text-center mt-2">
                        
                        <table class="table table-striped">
                        <tr>
                            <th>Amount Was</th>
                            <th>Paid Amount</th>
                            <th>Still Remaining</th>
                        </tr>
                        <tr>
                            <td>Rs. <b><?=$get_total_tyre_remaining;?></b></td>
                            <td>Rs. <b><?=$get_total_paid_amount_tyre;?></b></td>
                            <td>Rs. <b><?=$get_total_tyre_remaining-$get_total_paid_amount_tyre;?></b></td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-primary mx-sm-1 p-3">
                    <div class="card border-success shadow text-primary p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                    <div class="text-primary text-center mt-3"><h4>Total Payable Amount of Pumps</h4></div>
                    <div class="text-primary text-center mt-2">
                    <table class="table table-striped">
                        <tr>
                            <th>Amount Was</th>
                            <th>Paid Amount</th>
                            <th>Still Remaining</th>
                        </tr>
                        <tr>
                            <td>Rs. <b><?=$get_sum_of_pump;?></b></td>
                            <td>Rs. <b><?=$get_total_paid_amount_pump;?></b></td>
                            <td>Rs. <b><?=$get_sum_of_pump-$get_total_paid_amount_pump;?></b></td>
                        </tr>
                        </table>
                    </div>
                </div>
            </div>




              <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">emoji_transportation</i>
                  </div>
                  <h4 class="card-title">Truck/s</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Material Name</th>
                          <th>Paid Amount</th>
                          <th>Date</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $id=1; foreach ($get_all_oil_remaining_by_id_details as $row) { 
                         
                        ?>
                        <tr >
                          <td class="text-center"><?php echo $id; ?></td>
                          <td><?=$row->productname?></td>
                          <td><?=$row->cotoamount?></td>
                          <td><?=$row->cotodate?></td>
                          <td class="td-actions text-right">
                            <a href="#' ?>" rel="tooltip" class="btn btn-info">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="#" rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a>
                          </td>
                        </tr>
                        <?php
                          $id++;  
                          }
                        
                       
                      ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>