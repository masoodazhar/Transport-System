<link href="<?php echo base_url()?>assets/js/jquery-ui.1.11.2.min.css" rel="stylesheet" />
<script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>
         <script>
window.onload = function () {

// Construct options first and then pass it as a parameter
var options1 = {
	animationEnabled: true,
	title: {
		text: "Chart inside a jQuery Resizable Element"
	},
	data: [{
		type: "bar", //change it to line, area, bar, pie, etc
		legendText: "Try Resizing with the handle to the bottom right",
		showInLegend: true,
		dataPoints: [
      
			{ y: 500 },
			{ y: 6 },
			{ y: 14 },
			{ y: 12 },
			{ y: 19 },
			{ y: 14 },
			{ y: 26 },
			{ y: 10 },
			{ y: 22 }
			]
		}]
};

$("#resizable").resizable({
	create: function (event, ui) {
		//Create chart.
		$("#chartContainer1").CanvasJSChart(options1);
	},
	resize: function (event, ui) {
		//Update chart size according to its container size.
		$("#chartContainer1").CanvasJSChart().render();
	}
});

}
</script>
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
        <div class="content">
          <div class="container-fluid">
     <!--        <div class="row">
              
                        </div> -->
                        <!-- <button type="button" class="btn btn-round btn-default dropdown-toggle btn-link" data-toggle="dropdown">
7 days
</button> -->
                        <div class="row">
                          
                          <div class="col-md-4">
                            <div class="card card-chart">
                              <div class="card-header card-header-success" data-header-animation="true">
                                <div class="ct-chart" id="dailySalesChart"></div>
                              </div>
                              <div class="card-body">
                                <div class="card-actions">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                                    <i class="material-icons">refresh</i>
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </div>
                                <h4 class="card-title">Truck Binifits</h4>
                                <p class="card-category">
                                  <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">access_time</i> updated 4 minutes ago
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card card-chart">
                              <div class="card-header card-header-info" data-header-animation="true">
                                <div class="ct-chart" id="completedTasksChart"></div>
                              </div>
                              <div class="card-body">
                                <div class="card-actions">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                                    <i class="material-icons">refresh</i>
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </div>
                                <h4 class="card-title">Truck Install</h4>
                                <p class="card-category">Last Campaign Performance</p>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="card card-chart">
                              <div class="card-header card-header-rose" data-header-animation="true">
                                <div class="ct-chart" id="websiteViewsChart"></div>
                              </div>
                              <div class="card-body">
                                <div class="card-actions">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-info btn-link" rel="tooltip" data-placement="bottom" title="Refresh">
                                    <i class="material-icons">refresh</i>
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="Change Date">
                                    <i class="material-icons">edit</i>
                                  </button>
                                </div>
                                <h4 class="card-title"><a href="">Year Binifits</a></h4>
                                <p class="card-category">Last Campaign Performance</p>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">access_time</i> campaign sent 2 days ago
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- truck and station detail need update -->
                          <!-- <div class="row">
                            <div class="col-md-12">
                              <div id="resizable" style="height: 370px;border:1px solid gray;">
                                <div id="chartContainer1" style="height: 100%; width: 100%;"></div>
                              </div>
                            </div>
                       </div> -->
                       <!-- <div class="row my-4 py-4" style="background:white; text-align:center;">
                          <div class="col-md-12 ">
                              <h2>Truck and Station Details For Recieveable amount</h2>
                          </div>
                       </div> -->

                       <div class="row my-4 py-4" style="background:white;">
                          <div class="col-md-12">
                          <h4>Truck and Station Details For Receivable amount</h4>
                            <table class="table" id="datatables">
                             <thead>
                              <tr>
                                <th>S. No</th>
                                
                                <th>Station Name</th>
                                <th>Total Truck</th>
                                <th>Total Trips</th>
                                <th>Total Receivable Amount</th>
                                <th>Paid Amount</th>
                                <th>Still Receivable Amount</th>
                                <th>Action</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $id = 1;
                              foreach($get_station as $key){

                              ?>
                              <tr>
                                <td><?=$id?></td>
                                <td><?=$key->tstname;?></td>
                                <td><?=$this->main_model->get_total_trip_and_truck($key->tstid)->totaltruck?></td>
                                <td><?=$this->main_model->get_total_trip_and_truck($key->tstid)->totaltrip?></td>
                                <td><?=$this->ClosedModel->get_all_remaining_from_all_table_on_station_id($key->tstid)?></td>
                                <td><?=$this->ClosedModel->get_sumof_all_table_closed_amount_by_personid($key->tstid)?></td>
                                <td><?=$this->ClosedModel->get_all_remaining_from_all_table_on_station_id($key->tstid)-$this->ClosedModel->get_sumof_all_table_closed_amount_by_personid($key->tstid)?></td>
                                
                                <td class="td-actions text-right">
                            <a href="<?php echo base_url()?>close/add_close/<?=$key->tstid?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i> View | Close
                            </a> 
                            <!--<a href="#" rel="tooltip" class="btn btn-danger">-->
                            <!--  <i class="material-icons">delete</i>-->
                            <!--</a>-->
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





                       <div class="row my-4 py-4" style="background:white;">
                          <div class="col-md-12">
                          <h4>Truck and Station Details For Payable amount</h4>
                            <table class="table" id="datatables1">
                             <thead>
                              <tr>
                                <th>S. No</th>
                                
                                <th>Station Name</th>
                                <th>Total Truck</th>
                                <th>Total Trips</th>
                                <th>Total Payble Amount</th>
                                <th>Paid Amount</th>
                                <th>Still Payable Amount</th>
                                <th>Action</th>
                                
                              </tr>
                              </thead>
                              <tbody>
                              <?php
                              $id = 1;
                              foreach($get_station as $key){

                              ?>
                              <tr>
                                <td><?=$id?></td>
                                <td><?=$key->tstname;?></td>
                                <td><?=$this->main_model->get_total_trip_and_truck_payable($key->tstid)->totaltruck?></td>
                                <td><?=$this->main_model->get_total_trip_and_truck_payable($key->tstid)->totaltrip?></td>
                                <td><?=abs($this->ClosedModel->get_all_payable_from_all_table_on_station_id($key->tstid))?></td>
                                <td><?=$this->ClosedModel->get_sumof_all_table_closed_amount_by_personid_payable($key->tstid)?></td>
                                <td><?=abs($this->ClosedModel->get_all_payable_from_all_table_on_station_id($key->tstid)+$this->ClosedModel->get_sumof_all_table_closed_amount_by_personid_payable($key->tstid))?></td>
                                
                                <td class="td-actions text-right">
                            <a href="<?php echo base_url()?>pendingClosed/add_close/<?=$key->tstid?>" rel="tooltip" class="btn btn-success">
                              <i class="material-icons">remove_red_eye</i> View | Close
                            </a> 
                            <!--<a href="#" rel="tooltip" class="btn btn-danger">-->
                            <!--  <i class="material-icons">delete</i>-->
                            <!--</a>-->
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



                       <div class="row w-100">
                          <div class="col-md-4">
                              <div class="card border-info mx-sm-1 p-3">
                                  <div class="card border-info shadow text-info p-3 my-card" ><span class="fa fa-money" aria-hidden="true"></span></div>
                                  <div class="text-info text-center mt-3"><h4>Receivable Amount</h4></div>
                                  <div class="text-info text-center mt-2"><h2>Rs. <?=$totalremaining-$get_sumof_closed_amount; ?></h2><a href="<?php echo  base_url()?>close/add_close/">Check Receivable amount </a> | <a href="<?php echo  base_url()?>main/remainingreport/">Truck Receivable amount  </a></div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="card border-success mx-sm-1 p-3">
                                  <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                                  <div class="text-success text-center mt-3"><h4>Payable Amount</h4></div>
                                  <div class="text-success text-center mt-2"><h2>Rs. <?= abs($totalpending+$get_sumof_all_table_closed_amount_payable); ?></h2><a href="<?php echo base_url()?>pendingClosed/add_close/">Check Payable amount </a> | <a href="<?php echo  base_url()?>main/payablereport/">Truck Payable amount  </a></div>
                              </div>
                          </div>
                          <div class="col-md-4">
                              <div class="card border-success mx-sm-1 p-3">
                                  <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-calendar" aria-hidden="true"></span></div>
                                  <div class="text-success text-center mt-3"><h4>Have Haji Jani</h4></div>
                                  <div class="text-success text-center mt-2"><h2>Rs. <?=$sum_of_have_haji_jani;?></h2><a href="<?php echo base_url()?>main/hajijani/">Check Amount Details </a></div>
                              </div>
                          </div>
                          
                          
                      </div>
                        <!-- <div class="row">
                          <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card card-stats">
                              <div class="card-header card-header-warning card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">weekend</i>
                                </div>
                                <p class="card-category">Recieveable Amounts</p>
                                <h3 class="card-title">
                                   Rs. <?=$totalremaining; ?>
                                </h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons text-danger">warning</i>
                                  <a href="<?php echo  base_url()?>/main/remainingreport/">Check Recieveable amount details </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card card-stats">
                              <div class="card-header card-header-rose card-header-icon">
                                <div class="card-icon">
                                  <i class="material-icons">equalizer</i>
                                </div>
                                <p class="card-category">Payable Amount</p>
                                <h3 class="card-title">Rs. <?= abs($totalpending); ?></h3>
                              </div>
                              <div class="card-footer">
                                <div class="stats">
                                  <i class="material-icons">local_offer</i>  <a href="<?php echo base_url()?>/main/payablereport/">Check Payable amount details </a>
                                </div>
                              </div>
                            </div>
                          </div> -->
                          
                          
                        </div>
                        
                      
                      </div>
                    </div>
                  </div>
                  
           
              <!-- Button trigger modal -->
             