
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



    <div class="row w-100">

        <div class="col-md-6">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-money" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>  Total  <?php echo $page==1?' Of Income':'Of Office Expence' ?> </h4> </div>
                <div class="text-success text-center mt-2"><h2>Rs. <?=$get_all_office_income_expence_total;?></h2></div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-success mx-sm-1 p-3">
                <div class="card border-success shadow text-success p-3 my-card"><span class="fa fa-calendar" aria-hidden="true"></span></div>
                <div class="text-success text-center mt-3"><h4>  Search For the Month </h4> </div>
                <div class="text-success text-center mt-2"><h2><?=$month;?></h2></div>

            </div>
        </div>

        </div>

     </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card-icon">
                <button href="" onclick="jQuery('#print_dailyexpence_page').print()" class="btn btn-info print_dailyexpence"><i class="material-icons">print</i> Download PDF</button>

              </div>
              <div class="card" id="print_dailyexpence_page">
                <div class="card-header card-header-rose card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">print</i>
                  </div>
                  <h4 class="card-title">Print Preview</h4>
                </div>
                <div class="card-body">


                        <table class="tripdetailtable table table-striped"  border="1" width="100%">
                          <tr>
                              <td colspan="2"><span  class="text-bold text-uppercase" >Al-Faraz Freight Service </td>
                              <td colspan="2"><span  class="text-bold text-uppercase" > <?php echo $page==1?'Printpreview Of Income Details':'Printpreview Of Office Expence Details' ?> </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                              <span  class="text-bold text-uppercase" >Total <?php echo $page==1?' Of Income':'Of Office Expence' ?></span>
                              <span> Rs. <?=$get_all_office_income_expence_total;?> </span>
                            </td>

                            <td colspan="2">
                              <span  class="text-bold text-uppercase" >Selected Month Name</span>
                              <span> <?=$month;?> </span>
                            </td>

                          </tr>
                          <?php foreach($get_all_office_income_expence as $result){?>
                          <tr>
                            <td>
                              <span  class="text-bold" >Things Name :  </span>
                              <span> <?=$result->oethings;?> </span>
                            </td>
                            <td>
                              <span  class="text-bold" > Amount :  </span>
                              <span> <?=$result->oeamount;?></span>
                            </td>

                            <td>
                              <span  class="text-bold" > Date :  </span>
                              <span> <?=$result->oedate;?></span>
                            </td>

                            <td>
                              <span  class="text-bold" > Details:  </span>
                              <span>  <?=$result->oedetail;?> </span>
                            </td>


                          </tr>

                          <?php } ?>




                        </table>



                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
