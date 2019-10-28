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

<?php 
if($emplyee_data->empstatus==1){
?>
.profile-employee li p{
    padding: 5px;
    background:green;
    text-align: center;
}
<?php
  }else{
?>
.profile-employee li p{
    padding: 5px;
    background: red;
    text-align: center;
}
<?php
  } 
  
?>
</style>
<div class="content">
        <div class="container-fluid">
        
        
      <div class="row w-100">
        <div class="col-md-3">
            <div class="card border-info mx-sm-1 p-3">
                <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-calendar" aria-hidden="true"></span></div>
                <div class="text-info text-center mt-3"><h4>Total Month Spended</h4></div>
                <div class="text-info text-center mt-2"><h2><?=count($get_all_salary_of_one_employee);?></h2></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>Sum Of Salary</h4></div>
                <div class="text-success text-center mt-2"><h2>Rs.<?php echo $this->Employee_models->sum_of_one_employee_salary($emplyee_data->empid)>0?$this->Employee_models->sum_of_one_employee_salary($emplyee_data->empid):0; ?></h2></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-warning mx-sm-1 p-3">
                <div class="card border-warning shadow text-warning p-3 my-card" ><span class="fa fa-area-chart" aria-hidden="true"></span></div>
                <div class="text-warning text-center mt-3"><h4>Advance Amount Returned</h4></div>
                <div class="text-warning text-center mt-2"><h2>Rs. <?php echo $this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid)>0?$this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid):0; ?></h2></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-danger mx-sm-1 p-3">
                <div class="card border-danger shadow text-danger p-3 my-card" ><span class="fa fa-credit-card" aria-hidden="true"></span></div>
                <div class="text-danger text-center mt-3"><h4>Still Advance Remaining</h4></div>
                <div class="text-danger text-center mt-2"><h2>Rs. <?php echo $advance_payment_held_by_employee-$this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid); ?></h2></div>
            </div>
        </div>
        
     </div>
                 
          <div class="row">
            
            <div class="col-md-12">
                  
              <div class="card ">
              
                <div class="card-header card-header-rose card-header-text">
                  
                 
                            <div class="row">
                              <div class="col-sm-4">
                                <div class="card-text mycard-text">
                                  <h4 class="card-title">
                                    <ul class="profile-employee">
                                      <li><img width="70" height="70" src="<?php echo $emplyee_data->empimage==NULL? base_url().'uploads/'.'noimage.png': base_url().'uploads/'.$emplyee_data->empimage; ?>"></li>
                                      <li>
                                         <p >Account Status: <?php if($emplyee_data->empstatus==1){echo 'Active';}else{echo 'Deactive';} ?></p>
                                         <h2> <?=$emplyee_data->empname;?> </h2>
                                      </li>
                                    </ul>
                                  </h4>
                                </div>
                              </div>
                              <div class="col-sm-4">
                                <div class="card-text" style="background: black;">
                                  <h4 class="card-title">Total Advance held <?php if($advance_payment_held_by_employee>0){echo '<a  onclick="openWin(this.id)" href="#" id="'.base_url().'Employee/advancedetails/'.$emplyee_data->empid.'"> <i class="material-icons" data-toggle="modal" data-target="#modelId" style="color:red;">remove_red_eye</i> '.$advance_payment_held_by_employee.'</a>';}else{echo 0;} ?></h4>
                                </div> 
                              </div>
                              <div class="col-sm-4">
                                <div class="card-text" style="background: #056e20;">
                                  <h4 class="card-title">Employee Monthly Salary Befor Detection <b>Rs. <?=$emplyee_data->empsalary;?></b></h4>
                                </div>
                              </div>
                            </div>
                 
                          
                  
                  
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="<?php echo base_url()?>Employee/addsalary">
                  <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group is-focused">
                        <label for="exampleEmail" class="bmd-label-floating">have to detect from Monthly salary </label>
                        <input type="text" class="form-control saladvanceinstallment" name="saladvanceinstallment"
                         value="<?php
                         if($advance_payment_held_by_employee-$this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid)>0){
                            if($advance_payment_held_by_employee-$this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid)<$advanceinstallmentpermonth){
                                echo $advance_payment_held_by_employee-$this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid);
                            }else{
                              echo $advanceinstallmentpermonth;
                            }
                          
                         }else{
                           echo 0;
                         }
                         
                         ?>">
                        <span class="text-danger"><?php echo form_error('saladvanceinstallment'); ?></span>
                        <!-- <input type="text" name="empname" value="fsdfsdfs<?=$advance_payment_held_by_employee;?>"> -->
                        <input type="hidden" value="<?= $emplyee_data->empid; ?>" name="salempid">
                        <!-- <input type="text" class="form-control" name="saladid" value=""> -->
                        <span class="text-danger"><?php echo form_error('empname'); ?></span>
                      </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group is-focused">
                        <label for="exampleEmail" class="bmd-label-floating">Payment Date</label>
                        <input type="date" class="form-control saldate" name="saldate" value="<?php echo set_value('saldate'); ?>">
                        <span class="text-danger"><?php echo form_error('saldate'); ?></span>
                      </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group  ">
                        <label for="exampleEmail" class="bmd-label-floating">Employee Salary After detection</label>
                        <input type="hidden" class="oraginalSalary" value="<?=$emplyee_data->empsalary?>">
                        <input type="text" class="form-control saltotalsalary" name="saltotalsalary"
                         value="<?php
                           if($advance_payment_held_by_employee-$this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid)>0){

                            if($advance_payment_held_by_employee-$this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid)<$advanceinstallmentpermonth){
                              echo $emplyee_data->empsalary-($advance_payment_held_by_employee-$this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid));  
                              // echo $advance_payment_held_by_employee-$this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid);
                            }else{
                              echo $emplyee_data->empsalary-$advanceinstallmentpermonth;
                            }
                          
                         }else{
                           echo $emplyee_data->empsalary;
                         }
                          
                          
                          ?>
                         ">
                        <span class="text-danger"><?php echo form_error('saltotalsalary'); ?></span>
                      </div>
                    </div>

                    
                  </div>
                  <div class="row">

                    <div class="col-sm-4">
                          <div class="form-group">
                          <label for="exampleEmail" class="bmd-label-floating">Bonus</label>
                          <input type="number" class="form-control salbonus" name="salbonus" value=" <?php echo set_value('salbonus'); ?>">
                          <span class="text-danger"><?php echo form_error('salbonus'); ?></span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                          <div class="form-group">
                          <label for="exampleEmail" class="bmd-label-floating">Eidi</label>
                          <input type="number" class="form-control saleidi" name="saleidi" value=" <?php echo set_value('saleidi'); ?>">
                          <span class="text-danger"><?php echo form_error('saleidi'); ?></span>
                        </div>
                    </div>


                 </div>
                 <div class="row">

                            <div class="col-sm-12">
                                  <div class="form-group">
                                  <label for="exampleEmail" class="bmd-label-floating">Details</label>
                                  <textarea rows="" cols="" class="form-control saldetail" name="saldetail"></textarea>
                                  <span class="text-danger"><?php echo form_error('saldetail'); ?></span>
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

              <!-- <div class="row my-8">
          <div class="col-sm-3">
                  <div class="card-text all-card-header" style="">
                    <h4 class="card-title text-bold"><span class="text-bold">Total Month: </span> <?=count($get_all_salary_of_one_employee);?></h4>
                  </div>
          </div>
          <div class="col-sm-3">
                  <div class="card-text all-card-header" style="">
                    <h4 class="card-title text-bold"><span class="text-bold">Sum of salary: </span>Rs.<?php echo $this->Employee_models->sum_of_one_employee_salary($emplyee_data->empid); ?></h4>
                  </div>
          </div>
          <div class="col-sm-3">
                  <div class="card-text all-card-header" style="">
                    <h4 class="card-title text-bold"><span class="text-bold">Advance Returned: </span> Rs. <?php echo $this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid); ?></h4>
                  </div>
          </div>
          <div class="col-sm-3">
                  <div class="card-text all-card-header" style="">
                    <h4 class="card-title text-bold"><span class="text-bold">Advance Remaining: </span> Rs. <?php echo $this->Employee_models->sum_of_one_employee_advance_returned($emplyee_data->empid); ?></h4>
                  </div>
          </div>
              
        </div>

            </div> -->
            
      




<div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Employee/List</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table salarytable" id="datatables">
                      <thead>
                        <tr>
                       
                          <th> Total Salary </th>
                          <th> Advance Detected </th>
                          <th>Payment Date</th>
                          <th>Bonus</th>
                          <th>Eidi</th>                        
                          <th width="15%" class="text-right">Actions</th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php  foreach ($get_all_salary_of_one_employee as $results) { ?>
                        
                        <tr >
                        <td> <?=$results->saltotalsalary?> </td>
                        <td> <?=$results->saladvanceinstallment?> </td>
                        <td> <?=$results->saldate?> </td>
                        <td> <?=$results->salbonus?> </td>
                        <td> <?=$results->saleidi?> </td>
                         <td>
                            <a href="<?= base_url()?>Employee/salary/<?= $results->salempid?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">edit</i>
                            </a> 
                            <a href="<?= base_url()?>Employee/salary/<?= $results->salempid?>" rel="tooltip" class="btn btn-danger">
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




    <!-- Button trigger modal -->

    <!-- <table>
                        <thead>
                          <tr>
                            <th>Held Amount</th>
                            <th>Return Pay method</th>
                            <th>Monthly Return Amount</th>
                            <th>Details</th>
                          </tr>
                        </thead>
                        <tbody>
                         <tr>
                            <td>Held Amount</td>
                            <td>Return Pay metdod</td>
                            <td>Montdly Return Amount</td>
                            <td>Details</td>
                          </tr>
                        </tbody>
                        </table> -->
    <!-- Modal -->
