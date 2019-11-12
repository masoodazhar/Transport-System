<style>
td>.row{
    display: inline-block;
    float: left;
    padding: 0px;
    margin: 0px;
}

</style>
<div class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Create Login</h4>
                  </div>
                </div>
                <div class="card-body ">
                <form class="form-horizontal" method="POST" action="<?php echo base_url()?>Login_Controller/addCreateuser">
                  <div class="row">
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Employee</label>
                          <select class="tlempid selectpicker" title="Select Employee" name="tlempid">
                              <?php
                                foreach($get_all_employee as $row){
                              ?>
                                  <option value="<?=$row->empid?>"><?=$row->empname?></option>
                              <?php
                                }
                              ?>
                          </select>
                        <span class="text-danger"><?php echo form_error('tcname'); ?></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                          <label for="exampleEmail" class="bmd-label-floating">Login Name</label>
                          <input type="text" class="form-control" name="tlusername" value="<?php echo set_value('tlusername'); ?>">
                          <span class="text-danger"><?php echo form_error('tlusername'); ?></span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="form-group">
                        <label for="exampleEmail" class="bmd-label-floating">Password</label>
                        <input type="text" class="form-control" name="tlpassword" value="<?php echo set_value('tlpassword'); ?>">
                        <span class="text-danger"><?php echo form_error('tlpassword'); ?></span>
                      </div>
                    </div>
                  </div>


                  <div class="row">
                     <div class="col-sm-12">
                     <div class="card ">
                <div class="card-header ">
                  <h4 class="card-title">Assign Access To Current Employee -
                    <small class="description">Authentication</small>
                  </h4>
                </div>
                <div class="card-body ">
                  <ul class="nav nav-pills nav-pills-warning" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active show" data-toggle="tab" href="#link1" role="tablist">
                        TRUCK MENTAIN
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                        TRIP DETAIL
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                        TRIP
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link4" role="tablist">
                        EMPLOYEE
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link5" role="tablist">
                        OFFICE EXPENCE
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link6" role="tablist">
                        PUMP STATION
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#link7" role="tablist">
                        LOCAL TRIP
                      </a>
                    </li>
                  </ul>
                  <div class="tab-content tab-space">
                    <div class="tab-pane active show" id="link1">

                    <div class="row">
                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="truc"> TRUCK
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="truckkmentainance"> TRUCK METAINANCE
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="tyre"> TYRE
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="oil"> OIL
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>


                    </div>
                    <div class="tab-pane" id="link2">


                    <div class="row">
                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="city"> CITY
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="transporter">TRANSORTER
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="shop"> SHOP
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="pumpstation"> PUMP STATION
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>


                    </div>
                    <div class="tab-pane" id="link3">

                    <div class="row">
                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="comission"> COMISSION
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="parchoon">PARCHOON
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="voucher"> VOUCHER
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>


                    </div>
                    <div class="tab-pane" id="link4">


                    <div class="row">
                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="employee"> EMPLOYEE
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>


                    </div>

                    <div class="tab-pane" id="link5">


                      <div class="row">
                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="officeexpence"> OFFICE EXPENCE
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div></div>

                    <div class="tab-pane" id="link6">


                      <div class="row">
                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="pumpdetail"> PUMP STATION
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>

                    </div>
                    <div class="tab-pane" id="link7">


                      <div class="row">
                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox" value="localtrip"> LOCAL TRIP
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>

                    </div>



                  </div>
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

          </div>
          <div class="card">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">opacity</i>
                  </div>
                  <h4 class="card-title">User Login List</h4>
                </div>
                <div class="card-body">
                  <div class="material-datatables">
                    <table class="table" id="datatables">
                      <thead>
                        <tr>
                          <th class="text-center">#</th>
                          <th>Employee Name &b Password</th>
                          <th>username</th>
                          <th>Authentication</th>
                          <th>ions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $id=1; foreach ($get_all_login as $results) {
                          ?>

                          <tr>
                          <form method="get" action="<?=base_url()?>/Login_Controller/updatelogin/<?=$results->tlid;?>">
                            <td class="text-center"><?php echo $id; ?></td>
                            <td><?php echo $results->empname; ?>
                            <input type="hidden" name="old" value="<?php echo $results->tlpassword; ?>"></td>

                          </td>
                            <td><input type="text" name="tlusername" value="<?php echo $results->tlusername; ?>"></td>
                            <td> <input type="text" placeholder="New Password" name="tlpassword" > </td>
                           <td>
                                <?php
                                  foreach(json_decode($results->tlauth) as $auth){
                                ?>
                                 <?php
                                  }
                                ?>


                                  <div class="row">
                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("truck", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="truck"> TRUCK

                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("truckkmentainance", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="truckkmentainance"> TRUCK METAINANCE
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("tyre", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="tyre"> TYRE
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("oil", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="oil"> OIL
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>

                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("city", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="city"> CITY
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("transporter", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="transporter">TRANSORTER
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("shop", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="shop"> SHOP
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("pumpstation", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="pumpstation"> PUMP STATION
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>


                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("comission", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="comission"> COMISSION
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("parchoon", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="parchoon">PARCHOON
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("voucher", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="voucher"> VOUCHER
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>

                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("employee", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="employee"> EMPLOYEE
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>

                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("officeexpence", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="officeexpence"> OFFICE EXPENCE
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>
                    </div>


                    <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                      <div class="col-sm-10 checkbox-radios">
                        <div class="form-check form-check-inline">
                          <label class="form-check-label">
                            <input class="form-check-input" name="tlauth[]" type="checkbox"
                            <?php
                                      if($results->tlauth !=null && in_array("pumpdetail", json_decode($results->tlauth)))
                                      {
                                      echo 'checked=checked';
                                      }
                            ?>
                            value="pumpdetail"> PUMP STATION
                            <span class="form-check-sign">
                              <span class="check"></span>
                            </span>
                          </label>
                        </div>
                      </div>


                      <label class="col-sm-2 col-form-label label-checkbox">&nbsp</label>
                        <div class="col-sm-10 checkbox-radios">
                          <div class="form-check form-check-inline">
                            <label class="form-check-label">
                              <input class="form-check-input" name="tlauth[]" type="checkbox"
                              <?php
                                        if($results->tlauth !=null && in_array("localtrip", json_decode($results->tlauth)))
                                        {
                                        echo 'checked=checked';
                                        }
                              ?>
                              value="localtrip">Local TRIP
                              <span class="form-check-sign">
                                <span class="check"></span>
                              </span>
                            </label>
                          </div>
                        </div>




                            </td>
                            <td class="td-actions text-right">
                              <button type="submit" rel="tooltip" class="btn btn-success">
                                <i class="material-icons">edit</i>
                              </button>
                              <a href="#" rel="tooltip" class="btn btn-danger">
                                <i class="material-icons">delete</i>
                              </a>
                            </td>
                            </form>
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
