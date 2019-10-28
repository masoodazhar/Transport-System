<?php 
if(isset($_SESSION["user"])){

  $TRUCK = 'NOTALLOWED';
  $TRUCKMENTAINANCE = 'NOTALLOWED';
  $TYRE = 'NOTALLOWED';
  $OIL = 'NOTALLOWED';

  $CITY = 'NOTALLOWED';
  $SHOP = 'NOTALLOWED';
  $PUMPSTATION = 'NOTALLOWED';

  $COMISSION = 'NOTALLOWED';
  $PARCHOON = 'NOTALLOWED';
  $VOUCHER = 'NOTALLOWED';
  
  $EMPLOYEE = 'NOTALLOWED';
  $OFFICEEXPENCE = 'NOTALLOWED';
  
  
  if($_SERVER['REQUEST_URI']==''){

  }








}else{
  redirect('Login_controller');
}
// echo '<pre>';
// $all = explode('/',$_SERVER['REQUEST_URI']);
// print_r($all);
// die;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Al-Imran Frate Services
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Canonical SEO -->
  <link rel="canonical" href="../../../product/material-dashboard-pro_2.htm" />
  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?php echo base_url()?>assets/css/material-dashboard.min.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url()?>assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <!-- Google Tag Manager -->
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
  <!-- End Google Tag Manager -->
</head>
<!-- body class="sidebar-mini" -->
<body class="<?=base_url()?>">
  <!-- Extra details for Live View on GitHub Pages -->
  <!-- Google Tag Manager (noscript) -->
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
  <!-- End Google Tag Manager (noscript) -->
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="<?php echo base_url()?>assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="<?=base_url()?>/main/" class="simple-text logo-normal text-center">
         <img src="<?=base_url()?>assets/img/logo.png">
        </a>
      </div>
      <div class="sidebar-wrapper">
        <div class="user">
          <div class="photo">
               <?php 
                  if($_SESSION['auth_id_just_for_admin']==0){
                      echo '<img src="'.base_url().'uploads/noimage.png" />';          
                  }else{
                    echo '<img src="'.base_url().'uploads/'.$_SESSION['employee_image'].'" />'; 
                  }
               ?>
            
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="validation.html#collapseExample" class="username">
              <span>
              
                <?php 
                if($_SESSION['auth_id_just_for_admin']==0){
                    echo $_SESSION['user'];                
                }else{
                  echo $_SESSION['employee_name'];
                }
               ?>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="validation.html#">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="validation.html#">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="validation.html#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Settings </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <ul class="nav">
        <?php if(array_intersect(array('truck','truckkmentainance','tyre','oil'), json_decode($_SESSION['authentication']))){ ?>
          <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" href="#truckExamples" aria-expanded="false">
              <i class="material-icons">emoji_transportation</i>
              <p> TRUCK MAINTAIN
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="truckExamples" style="">
              <ul class="nav">
              <?php if(in_array('truck', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>truck">
                    <i class="material-icons">emoji_transportation</i>
                    <p> TRUCK </p>
                  </a>
              </li>
              <?php } ?>
              <!-- <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url()?>driver">
                  <i class="material-icons">how_to_reg</i>
                  <p> DRIVER </p>
                </a>
              </li> -->
              <?php if(in_array('truckkmentainance', json_decode($_SESSION['authentication']))){ ?>
               <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>main/add_maintenance">
                    <i class="material-icons">local_shipping</i>
                    <p> TRUCK MAINTAINANCE </p>
                  </a>
                </li>
              <?php } ?>
              <?php if(in_array('tyre', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>tyre">
                    <i class="material-icons">toll</i>
                    <p> TYRE </p>
                  </a>
                </li>
              <?php } ?>
              <?php if(in_array('oil', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>oil">
                    <i class="material-icons">opacity</i>
                    <p> OIL </p>
                  </a>
                </li>
              <?php } ?>
              </ul>
            </div>
          </li>
        <?php } ?>
        <?php if(array_intersect(array('city','transporter','shop','pumpstation'), json_decode($_SESSION['authentication']))){ ?>
          <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" href="#tdetailExamples" aria-expanded="false">
              <i class="material-icons">location_city</i>
              <p> TRIP DETAIL
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="tdetailExamples" style="">
              <ul class="nav">
              <?php if(in_array('city', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>city">
                    <i class="material-icons">location_city</i>
                    <p> CITY </p>
                  </a>
                </li>
              <?php } ?>
              <?php if(in_array('transporter', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>station">
                    <i class="material-icons">shop_two</i>
                    <p> TRANSPORTER </p>
                  </a>
                </li>
              <?php } ?>
              <?php if(in_array('shop', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>shop">
                    <i class="material-icons">shop</i>
                    <p> SHOP </p>
                  </a>
                </li>
              <?php } ?>
              <?php if(in_array('pumpstation', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>pump">
                    <i class="material-icons">ev_station</i>
                    <p> PUMP STATION </p>
                  </a>
                </li>
              <?php } ?>
              </ul>
            </div>
          </li>
        <?php } ?>
        <?php if(array_intersect(array('comission','parchoon','voucher'), json_decode($_SESSION['authentication']))){ ?>
          <li class="nav-item ">
            <a class="nav-link collapsed" data-toggle="collapse" href="#tripExamples" aria-expanded="false">
              <i class="material-icons">local_shipping</i>
              <p> TRIP
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="tripExamples" style="">
              <ul class="nav">
              <?php if(in_array('comission', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>dailytrip/add_dailytrip">
                    <i class="material-icons">map</i>
                    <p> COMISSION </p>
                  </a>
                </li>
              <?php } ?>
           <!-- <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>returntrip">
                    <i class="material-icons">map</i>
                    <p> LHR TO KHI </p>
                  </a>
                </li> -->
                <?php if(in_array('parchoon', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>material">
                    <i class="material-icons">check_box</i>
                    <p> PARCHOON </p>
                  </a>
                </li>
                <?php } ?>
                <?php if(in_array('voucher', json_decode($_SESSION['authentication']))){ ?>
                <li class="nav-item ">
                  <a class="nav-link" href="<?php echo base_url()?>trip/add_trip">
                    <i class="material-icons">map</i>
                    <p> VOUCHER </p>
                  </a>
                </li>
                <?php } ?>
              </ul>
            </div>
          </li>
        <?php } ?>
        <?php if(in_array('employee', json_decode($_SESSION['authentication']))){ ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url()?>Employee">
              <i class="material-icons">supervised_user_circle</i>
              <p> EMPLOYEES </p>
            </a>
          </li>
        <?php } ?>
        <?php if(in_array('officeexpence', json_decode($_SESSION['authentication']))){ ?>
          <li class="nav-item ">
            <a class="nav-link" href="<?php echo base_url()?>Employee/addofficeexpence">
              <i class="material-icons">event_note</i>
              <p> OFFICE EXPENSE </p>
            </a>
          </li>
        <?php } ?>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <!--<div class="navbar-wrapper">-->
          <!--  <div class="navbar-minimize">-->
          <!--    <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">-->
          <!--      <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>-->
          <!--      <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>-->
          <!--    </button>-->
          <!--  </div>-->
          <!--  <a class="navbar-brand" href="#">DASHBOARD</a>-->
          <!--</div>-->
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" list="tabs" class="form-control" placeholder="Search...">
                <datalist id="tabs">
                   <option value="abc"><a href="http://stackoverflow.com/questions"></a>abc</option>
                   <option value="bcd"><a href="http://stackoverflow.com/questions"></a>bcd</option>
                   <option value="cde"><a href="http://stackoverflow.com/questions"></a>cde</option>
                </datalist>
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="validation.html#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="<?=base_url()?>main/tripnotification/1" id="navbarDropdownMenuLink" >
                  <i class="material-icons">notifications</i>
                  <span class="notification"><?= $_SESSION['notification'] ;?></span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                 
                    <?php 

                    // if($totalofaperson>$paidonInstallment ){
                    //   $total = $totalofaperson-$paidonInstallment;
                    //    echo '<a class="dropdown-item" href="validation.html#">Recieve  <span class="notification">'.$total.'</span> from  '.$personName.'</a>';
                    //      }
                    
                    ?>
                 


                  <a class="dropdown-item" href="validation.html#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="validation.html#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="validation.html#">Another Notification</a>
                  <a class="dropdown-item" href="validation.html#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="validation.html#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="validation.html#">Profile</a>
                 <?php 
                  if($_SESSION['auth_id_just_for_admin']==0){
                    ?>
                 <a class="dropdown-item" href="<?= base_url()?>Login_Controller/createuser">Create User</a>
                    <?php
                  }

                 ?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?= base_url()?>Login_Controller/logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->