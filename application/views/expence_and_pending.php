<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">DAILY ENTRY <small>( roze namchah )</small></h4>
                  </div>
                </div>
                <div class="card-body">
                <h2>Manage All Payment, Recieveable, Payable, Office Expence and Haji Jani</h2>
               </div>

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
                  
                


<div class="row">
                          <div class="col-md-3">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="dashboard_2.html#pablo">
                                  <img class="img" src="<?=base_url()?>/assets/img/remaining.jpg">
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                  </button>
                                  <a href="<?=base_url();?>main/remainingreport/" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="View Details">
                                  <i class="material-icons">edit</i>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                  </button>
                                </div>
                                <h4 class="card-title">
                                  <a href="dashboard_2.html#pablo">RECIEVEABLE AMOUNT</a>
                                </h4>
                                <div class="card-description">
                                  Manage All Remaining Amount.<br>
                                  View Details of seperate truck and trip on date 
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="price">
                                  <h4>Rs. <?=$totalremaining-$totalremaining_closed?></h4>
                                </div>
                                <div class="stats">
                                  <p class="card-category"><i class="material-icons">remove_red_eye</i>  View Details</p>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="dashboard_2.html#pablo">
                                  <img class="img" src="<?=base_url()?>/assets/img/pending.jpg">
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                  </button>
                                
                                  <a href="<?=base_url();?>main/payablereport" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="View Details">
                                  <i class="material-icons">edit</i>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Edit">
                                     <i class="material-icons">close</i>
                                     </button>
                                </div>
                                <h4 class="card-title">
                                  <a href="dashboard_2.html#pablo">TOTAL PAYABLE AMOUNT</a>
                                </h4>
                                <div class="card-description">
                                  Manage All Payable  Amount.<br>
                                  View Details of seperate truck and trip on date 
                                 </div>
                              </div>
                              <div class="card-footer">
                                <div class="price">
                                  <h4>Rs. <?php echo abs($totalpending+$totalpending_closed);?></h4>
                                </div>
                                <div class="stats">
                                <p class="card-category"><i class="material-icons">remove_red_eye</i>  View Details</p>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-3">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="dashboard_2.html#pablo">
                                  <img class="img" src="<?=base_url()?>/assets/img/office.jpg">
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                  </button>
                                  <a href="<?=base_url();?>Employee/officexpence" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="View Details">
                                    <i class="material-icons">edit</i>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                  </button>
                                </div>
                                <h4 class="card-title">
                                  <a href="dashboard_2.html#pablo">OFFICE EXPENCE</a>
                                </h4>
                                <div class="card-description">
                                  Manage All Office Expence.<br>
                                  View Details of seperate Expence and Payment on date 
                                </div>
                              </div>
                              <div class="card-footer">
                                <div class="price">
                                  <h4>Go a head. Details</h4>
                                </div>
                                <div class="stats">
                                <p class="card-category"><i class="material-icons">remove_red_eye</i>  View Details</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        

                        


                            
                          <div class="col-md-3">
                            <div class="card card-product">
                              <div class="card-header card-header-image" data-header-animation="true">
                                <a href="dashboard_2.html#pablo">
                                  <img class="img" src="<?=base_url()?>/assets/img/haji.png">
                                </a>
                              </div>
                              <div class="card-body">
                                <div class="card-actions text-center">
                                  <button type="button" class="btn btn-danger btn-link fix-broken-card">
                                    <i class="material-icons">build</i> Fix Header!
                                  </button>
                                  <button type="button" class="btn btn-default btn-link" rel="tooltip" data-placement="bottom" title="View">
                                    <i class="material-icons">art_track</i>
                                  </button>
                                  <a href="<?=base_url();?>main/hajijani" class="btn btn-success btn-link" rel="tooltip" data-placement="bottom" title="View Details">
                                    <i class="material-icons">edit</i>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" rel="tooltip" data-placement="bottom" title="Remove">
                                    <i class="material-icons">close</i>
                                  </button>
                                </div>
                                <h4 class="card-title">
                                  <a href="dashboard_2.html#pablo">HAVING HAJI JANI</a>
                                </h4>
                                <div class="card-description">
                                  Manage All Haji Jani Payments.<br>
                                  View Details of Haji Jani truck and trip on date 
                                 </div>
                              </div>
                              <div class="card-footer">
                                <div class="price">
                                  <h4>Rs. <?= $sum_of_have_haji_jani;?></h4>
                                </div>
                                <div class="stats">
                                <p class="card-category"><i class="material-icons">remove_red_eye</i>  View Details</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        </div>
                      </div>

                </div>
        </div>
   </div>
</div>







