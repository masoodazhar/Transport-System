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
                    <h4 class="card-title">Office Expence</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>Employee/addofficeexpence">
                  
                    <div class="row">
                      <div class="col-sm-4">
                          <div class="form-group">
                            <label for="exampleEmail" class="bmd-label-floating">Description</label>
                          
                              <input list="expencelist" name="oethings" class="form-control">
                                <datalist id="expencelist">
                                    <?php foreach($allofficeexpencethings as $result){ ?>
                                        <option value="<?=$result->omnname;?>">

                                    <?php } ?>
                                </datalist>
                            <span class="text-danger"><?php echo form_error('oethings'); ?></span>
                         </div>
                      </div>
                      <div class="col-sm-4">
                          <div class="form-group">
                              <label for="exampleEmail" class="bmd-label-floating">Amount</label>
                              <input type="text" class="form-control" name="oeamount" value="<?php echo set_value('oeamount'); ?>">
                              <span class="text-danger"><?php echo form_error('oeamount'); ?></span>
                          </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="form-group">
                            <label for="exampleEmail" class="">Date</label>
                            <input type="text" class="form-control  datepicker" name="oedate" value="<?php echo set_value('oedate'); ?>">
                            <span class="text-danger"><?php echo form_error('oedate'); ?></span>
                         </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleEmail" class="bmd-label-floating"></label>
                            <select name="oetype" id="" title="Select Income/Expense" data-style="select-with-transition" class="selectpicker">
                                      <option value="0">Office Expence</option>
                                      <option value="1">Income</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('oetype'); ?></span>
                         </div>
                         
                                    </div>
                                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="exampleEmail" class="bmd-label-floating"></label>
                            <select name="oetaken" id="" title="Select Income/Expense" data-style="select-with-transition" class="selectpicker">
                                      <option value="0">Office</option>
                                      <option value="1">Haji Jani</option>
                            </select>
                            <span class="text-danger"><?php echo form_error('oetype'); ?></span>
                         </div>
                         
                                    </div>
                                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleEmail" class="bmd-label-floating">Detail</label>
                            <textarea class="form-control" name="oedetail"><?php echo set_value('oedetail'); ?></textarea>
                            <span class="text-danger"><?php echo form_error('oedetail'); ?></span>
                         </div>
                      </div>
                    </div>

                  <div class="modal-footer justify-content-center">
                      <input type="submit" class="btn btn-info btn-round" name="addcity" data-dismiss="modal">
                      <a href="#" class="btn btn-danger btn-round">Close</a>
                  </div>
                </form>
               </div>

              </div>
            </div>
            

        
    <div class="row w-100">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-money" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Total Income <small><a href="<?=base_url()?>Employee/printpreview_dailyentry/1?date=<?=$searchedmonth?>"><i class="material-icons">print</i>Print</a></small></h4></div>
                <div class="text-info text-center mt-2"><h2><b>Rs.</b> <?=$total_of_searched_amount_income;?></h2></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>  Total Expence <small><a href="<?=base_url()?>Employee/printpreview_dailyentry/2?date=<?=$searchedmonth?>"><i class="material-icons">print</i>Print</a></small></h4> </div>
                <div class="text-success text-center mt-2"><h2><b>Rs.</b> <?=$total_of_searched_amount;?></h2></div>
                
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-search" aria-hidden="true"></span></div>
                <div class="text-warning text-center mt-3"><h4>Search By Month from <strong><?=$month;?></strong> </h4></div>
                <div class="text-warning text-center mt-2">
                  <form method="get" action="<?=base_url()?>Employee/searchOfficeExpence">
                  
                  <div class="row">
                    <div class="col-sm-4">
                          <div class="form-group">
                            <label for="startdate">Start Date</label>
                            <input type="text"
                              class="form-control datepicker" name="startdate" id="startdate" aria-describedby="helpId" placeholder="">
                          </div>
                    </div>
                    <div class="col-sm-4">
                          <div class="form-group">
                            <label for="startdate">End Date</label>
                            <input type="text" class="form-control datepicker" name="enddate" id="startdate" aria-describedby="helpId" placeholder="">
                          </div>
                    </div>
                    <!-- <div class="col-sm-3">
                        <div class="form-group">
                              
                                <select name="oetype" id="" title="Select Type" class="">
                                          <option value="0">Office Expence</option>
                                          <option value="1">Income</option>
                                </select>
                        </div>         
                      </div> -->
                    <div class="col-sm-4">
                    <input type="submit" class="btn btn-primary" >
                    </div>
                  </div>

                  </form>
                </div>
            </div>
        </div>
        
     </div>
                 

      
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Total Exoence List</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                       
                          <th> Description </th>
                          <th> Amount </th>
                          <th>Payment Date</th>
                          <th>Details</th>
                                                
                          <th width="15%" class="text-right">Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php  foreach ($get_all_office_expence as $results) { ?>
                        
                        <tr>
                        <td> <?=$results->oethings?> </td>
                        <td> <?=$results->oeamount?> </td>
                        <td> <?=$results->oedate?> </td>
                        <td> <?=$results->oedetail?> </td>
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
                        }
                      ?>
                      </tbody>
                    </table>
                  </div>
          </div>
          
        </div>

        




      
      
      <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Total Income List</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables1">
                      <thead>
                        <tr>
                       
                          <th> Description </th>
                          <th> Amount </th>
                          <th>Payment Date</th>
                          <th>Details</th>
                                                
                          <th width="15%" class="text-right">Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php  foreach ($get_all_office_income as $results) { ?>
                        
                        <tr>
                        <td> <?=$results->oethings?> </td>
                        <td> <?=$results->oeamount?> </td>
                        <td> <?=$results->oedate?> </td>
                        <td> <?=$results->oedetail?> </td>
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



