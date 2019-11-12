
<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Add Employee</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data"  action="<?php echo base_url()?>Employee/addemployee">
                  <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Employee Name</label>
                        <input type="text" class="form-control" name="empname" value="<?php echo set_value('empname'); ?>">
                        <span class="text-danger"><?php echo form_error('empname'); ?></span>
                      </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Employee Contact</label>
                        <input type="text" class="form-control" name="empcontact" value="<?php echo set_value('empcontact'); ?>">
                        <span class="text-danger"><?php echo form_error('empcontact'); ?></span>
                      </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="exampleEmail" class="">Date of Join</label>
                        <input type="text" class="form-control datepicker" name="empdateofjoin" value="<?php echo set_value('empdateofjoin'); ?>">
                        <span class="text-danger"><?php echo form_error('empdateofjoin'); ?></span>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Employee Salary</label>
                        <input type="number" class="form-control" name="empsalary" value="<?php echo set_value('empsalary'); ?>">
                        <span class="text-danger"><?php echo form_error('empsalary'); ?></span>
                      </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                        <label for="exampleEmail" class="bmd-label-floating"></label>
                        <select class="selectpicker" data-style="select-with-transition" title="Select Type" name="emptype" data-size="5" tabindex="-98">
                           <option value="staff">Staff</option>
                           <option value="conductor">Conductor</option>
                           <option value="driver">Driver</option>
                        </select>
                          
                        <span class="text-danger"><?php echo form_error('emptype'); ?></span>
                      </div>
                    </div>

                    <div class="col-sm-4">
                      <h4 class="title text-uppercase">Employee Image</h4>
                      <div class="fileinput text-center fileinput-new" data-provides="fileinput">
                        <div class="fileinput-preview fileinput-exists thumbnail" style=""></div>
                        <div>
                          <span class="btn btn-round btn-rose btn-file">
                            <span class="fileinput-new">Add Photo</span>
                            <span class="fileinput-exists">Change</span>
                            <input type="hidden" value="" name="empimage"><input type="file" name="empimage" class="form-control" onchange="selectImage(this.value)">
                          <div class="ripple-container"></div></span>
                          <br>
                          <a href="extended.html#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 45.6719px; top: 21.7813px; background-color: rgb(255, 255, 255); transform: scale(15.5098);"></div></div></a>
                        </div>
                      </div>
                      <span class="text-danger"><?php echo form_error('empimage'); ?></span>
                    </div>

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
            
            <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">location_city</i>
                  </div>
                  <h4 class="card-title">Employee/List</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table employeetable table-striped" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Employee Image</th>
                          <th>Employee Name</th>
                          <th>Employee Contact</th>
                          <th>Employee Salary</th>
                          <th>Employee type</th>
                          <!-- <th>Employee Date of join</th> -->
                          <th>Having Advance</th>
                          <th class="text-right">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(count($employees) > 0){ $id=1; foreach ($employees as $results) { ?>
                        
                        <tr style=" <?php if($results->empstatus==0){ echo 'background: cadetblue; color:white;'; }?> ">
                        
                          <td class="text-center"><?php echo $id; ?></td>
                          <td class="empimage"><img width="50" height="60" src="<?php echo $results->empimage==NULL? base_url().'uploads/'.'noimage.png': base_url().'uploads/'.$results->empimage; ?>"></td>
                          <td class="empname"><?php echo $results->empname; ?></td>
                          <td class="empcontact"><?php echo $results->empcontact; ?></td>
                          <td class="empsalary"><?php echo $results->empsalary; ?></td>
                          <td class="emptype"><?php echo $results->emptype; ?></td>
                          <!-- <td class="empdateofjoin"><?php echo $results->empdateofjoin; ?></td> -->
                          <td class="advance_taken">Rs. <?php echo $results->total_advance-$this->Employee_models->sum_of_one_employee_advance_returned($results->empid); ?></td>
                          <td class="td-actions text-right">
                            <a href="<?= base_url()?>Employee/salary/<?= $results->empid?>" rel="tooltip" class="btn btn-success">
                             Salary Info <i class="material-icons">add</i>
                            </a> 
                            <a class="btn btn-primary advancemodalbtn" data-toggle="<?php if($results->empstatus==0){ echo ''; }else{ echo 'modal';} ?>"  href='#modal-id'>Pay advance</a>
                            <!-- <a href="#"  rel="tooltip" class="btn btn-danger">
                              <i class="material-icons">delete</i>
                            </a> -->
                            <a href="#" rel="tooltip" class="btn  active_eactive <?php if($results->empstatus==0){ echo 'btn-success mx-2'; }else{ echo 'btn-warning';} ?>"><?php if($results->empstatus==0){ echo 'Activate'; }else{ echo 'Deactivate';} ?></a> 
                            <input type="hidden" value="<?= $results->empid; ?>">
                          </td>
                        </tr>
                       
                        <?php
                          $id++;  
                          }
                        }
                        else
                        {
                        ?>
                          <tr>
                            <td colspan="8" class="text-center btn-danger text-center">No Data Found</td>
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


<form method="post" action="<?=base_url()?>Employee/addadvance">
<div class="modal fade showiferror" id="modal-id">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close loseadvance" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Pay Advance to <b><span class="set-empname"></span></b></h4>
        <input type="hidden" name="empid" class="setempid">
      </div>
      <div class="modal-body">
       <div class="row">
         <div class="col-sm-6">

         <input class="form-control adadvance" value="<?php echo set_value('adadvance'); ?>" name="adadvance" placeholder="Advance Payment" type="number">
         <span class="text-danger"><?php echo form_error('adadvance'); ?></span>
         </div>
         <div class="col-sm-6">
            <select class="form-control" name="adpaymentmethod" placeholder="Advance Payment">
                        <option value="1">Monthly</option>
                        <option value="2">Fourtonight</option>
                        <option value="3">Weekly</option>
            </select>
         </div>
        </div>
        <div class="row-">
          <div class="col-sm-12">
              <input class="form-control" value="<?php echo set_value('addate'); ?>" name="addate" placeholder="Payment Date" type="date">
              <span class="text-danger"><?php echo form_error('addate'); ?></span>
          </div>
        </div>
        <div class="row">
         <div class="col-sm-12">

         <input class="form-control adinstallment" name="adinstallment" value="<?php echo set_value('adinstallment'); ?>" placeholder="Installment Payment to Pay regularly" type="number">
         <span class="text-danger"><?php echo form_error('adinstallment'); ?></span>
         </div>
         <div class="col-sm-12">
            <div class="form-group">
              <label for="my-textarea">Details</label>
              <textarea id="my-textarea" class="form-control" name="addetail" rows="3"></textarea>
            </div>
         </div>
         
        </div>

       </div>

       
       

      <div class="modal-footer">
        <button type="button" class="btn btn-default mx-2" data-dismiss="modal">Close</button>
        <input type="submit" value="submit" name="submitadvance" class="btn btn-primary">
      </div>
    </div>
  </div>
</div>
</form>


