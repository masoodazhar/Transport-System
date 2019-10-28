      <footer class="footer">
        <div class="container-fluid">
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">Umer &amp; co: </a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  
  <!--   Core JS Files   -->
  
  
<script src="<?php echo base_url()?>assets/js/jquery-1.11.1.min.js"></script>
    
<script src="<?php echo base_url()?>assets/js/jquery-ui.1.11.2.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery.canvasjs.min.js"></script>
  <!-- <script src="<?php echo base_url()?>assets/js/core/jquery.min.js"></script> -->
  <script src="<?php echo base_url()?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->     
  <script src="<?php echo base_url()?>assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="<?php echo base_url()?>assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="<?php echo base_url()?>assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="<?php echo base_url()?>assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="<?php echo base_url()?>assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="<?php echo base_url()?>assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="<?php echo base_url()?>assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="<?php echo base_url()?>assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="<?php echo base_url()?>assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="<?php echo base_url()?>assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="<?php echo base_url()?>assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="<?php echo base_url()?>assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="<?php echo base_url()?>assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Chartist JS -->
  <script src="<?php echo base_url()?>assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url()?>assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url()?>assets/js/material-dashboard.min.js" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url()?>assets/demo/demo.js"></script>

  <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    
  <!-- Sharrre libray -->
  <script src="<?php echo base_url()?>assets/demo/jquery.sharrre.js"></script>
  <script src="<?php echo base_url()?>assets/js/core/transport_jquery.js"></script>
  <script>
    $(document).ready(function() {

      var hajijaniFormSubmittedgetvalue = $('.hajijaniFormSubmittedgetvalue').text();
      if(hajijaniFormSubmittedgetvalue=='false'){
        $('.hajijaniFormSubmitted').click();
      }
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  <!-- Sharrre libray -->
  <script src="<?php echo base_url()?>assets/demo/jquery.sharrre.js"></script>
  <script>
    $(document).ready(function() {

                        $('#allnameOfremainingamount').on('change',function(){
                          var id = $(this).children('option:selected').val();
                          var base_url = '<?=base_url();?>';
                          // alert(base_url);
                          window.location.assign(base_url+'/close/add_close/'+id);
                        });


      $('#facebook').sharrre({
        share: {
          facebook: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('facebook');
        },
        template: '<i class="fab fa-facebook-f"></i> Facebook',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      $('#google').sharrre({
        share: {
          googlePlus: true
        },
        enableCounter: false,
        enableHover: false,
        enableTracking: true,
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('googlePlus');
        },
        template: '<i class="fab fa-google-plus"></i> Google',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      $('#twitter').sharrre({
        share: {
          twitter: true
        },
        enableHover: false,
        enableTracking: false,
        enableCounter: false,
        buttons: {
          twitter: {
            via: 'CreativeTim'
          }
        },
        click: function(api, options) {
          api.simulateClick();
          api.openPopup('twitter');
        },
        template: '<i class="fab fa-twitter"></i> Twitter',
        url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
      });

      // Facebook Pixel Code Don't Delete
      ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
          n.callMethod ?
            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
      }(window,
        document, 'script', '//connect.facebook.net/en_US/fbevents.js');

      try {
        fbq('init', '111649226022273');
        fbq('track', "PageView");

      } catch (err) {
        console.log('Facebook Track Error:', err);
      }

    });
    
    $(document).ready( function () {
    $('#datatables').DataTable();
    } );
    $(document).ready( function () {
    $('#datatables1').DataTable();
    } );
    $(document).ready( function () {
    $('#datatables2').DataTable();
    } );
    $(document).ready( function () {
    $('#datatables3').DataTable();
    } );
    $(document).ready( function () {
    $('#datatables4').DataTable();
    } );
    $(document).ready( function () {
    $('#datatables5').DataTable();
    } );
    $(document).ready( function () {
    $('#truckdetail').DataTable();
    } );
  </script>
  <noscript>
    <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
  </noscript>
  <script>
    $(document).ready(function() {
      // initialise Datetimepicker and Sliders
      md.initFormExtendedDatetimepickers();
      if ($('.slider').length != 0) {
        md.initSliders();
      }
    });
  </script>
   <script>
                $(document).ready(function() {
                  $().ready(function() {
                    $sidebar = $('.sidebar');

                    $sidebar_img_container = $sidebar.find('.sidebar-background');

                    $full_page = $('.full-page');

                    $sidebar_responsive = $('body > .navbar-collapse');

                    window_width = $(window).width();

                    fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                    if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                      if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                      }

                    }

                    $('.fixed-plugin a').click(function(event) {
                      // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                      if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                          event.stopPropagation();
                        } else if (window.event) {
                          window.event.cancelBubble = true;
                        }
                      }
                    });

                    $('.fixed-plugin .active-color span').click(function() {
                      $full_page_background = $('.full-page-background');

                      $(this).siblings().removeClass('active');
                      $(this).addClass('active');

                      var new_color = $(this).data('color');

                      if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                      }

                      if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                      }

                      if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                      }
                    });

                    $('.fixed-plugin .background-color .badge').click(function() {
                      $(this).siblings().removeClass('active');
                      $(this).addClass('active');

                      var new_color = $(this).data('background-color');

                      if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                      }
                    });

                    $('.fixed-plugin .img-holder').click(function() {
                      $full_page_background = $('.full-page-background');

                      $(this).parent('li').siblings().removeClass('active');
                      $(this).parent('li').addClass('active');


                      var new_image = $(this).find("img").attr('src');

                      if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                          $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                          $sidebar_img_container.fadeIn('fast');
                        });
                      }

                      if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                          $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                          $full_page_background.fadeIn('fast');
                        });
                      }

                      if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                      }

                      if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                      }
                    });

                    $('.switch-sidebar-image input').change(function() {
                      $full_page_background = $('.full-page-background');

                      $input = $(this);

                      if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                          $sidebar_img_container.fadeIn('fast');
                          $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                          $full_page_background.fadeIn('fast');
                          $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                      } else {
                        if ($sidebar_img_container.length != 0) {
                          $sidebar.removeAttr('data-image');
                          $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                          $full_page.removeAttr('data-image', '#');
                          $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                      }
                    });

                    $('.switch-sidebar-mini input').change(function() {
                      $body = $('body');

                      $input = $(this);

                      if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                      } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                          $('body').addClass('sidebar-mini');

                          md.misc.sidebar_mini_active = true;
                        }, 300);
                      }

                      // we simulate the window Resize so the charts will get updated in realtime.
                      var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                      }, 180);

                      // we stop the simulation of Window Resize after the animations are completed
                      setTimeout(function() {
                        clearInterval(simulateWindowResize);
                      }, 1000);

                    });
                  });
                });
              </script>
              <!-- Sharrre libray -->
              <script src="../assets/demo/jquery.sharrre.js"></script>
              <script>
                $(document).ready(function() {


                  $('#facebook').sharrre({
                    share: {
                      facebook: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    click: function(api, options) {
                      api.simulateClick();
                      api.openPopup('facebook');
                    },
                    template: '<i class="fab fa-facebook-f"></i> Facebook',
                    url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                  });

                  $('#google').sharrre({
                    share: {
                      googlePlus: true
                    },
                    enableCounter: false,
                    enableHover: false,
                    enableTracking: true,
                    click: function(api, options) {
                      api.simulateClick();
                      api.openPopup('googlePlus');
                    },
                    template: '<i class="fab fa-google-plus"></i> Google',
                    url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                  });

                  $('#twitter').sharrre({
                    share: {
                      twitter: true
                    },
                    enableHover: false,
                    enableTracking: false,
                    enableCounter: false,
                    buttons: {
                      twitter: {
                        via: 'CreativeTim'
                      }
                    },
                    click: function(api, options) {
                      api.simulateClick();
                      api.openPopup('twitter');
                    },
                    template: '<i class="fab fa-twitter"></i> Twitter',
                    url: 'https://demos.creative-tim.com/material-dashboard-pro/examples/dashboard.html'
                  });

                  // Facebook Pixel Code Don't Delete
                  ! function(f, b, e, v, n, t, s) {
                    if (f.fbq) return;
                    n = f.fbq = function() {
                      n.callMethod ?
                        n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                  }(window,
                    document, 'script', '//connect.facebook.net/en_US/fbevents.js');

                  try {
                    fbq('init', '111649226022273');
                    fbq('track', "PageView");

                  } catch (err) {
                    console.log('Facebook Track Error:', err);
                  }


//===================================START Employee Advance TABLE===========================
    var check = '<?=$modelsinvalid?>';
      $('.loseadvance').click(function(){
        check = false;
        // $('.showiferror').removeClass('show');
        // $('.showiferror').css('display','none');
      });
      // alert(check);
      if(check){
        $('.showiferror').addClass('show');
        $('.showiferror').css('display','block');
      }


      $('.advancemodalbtn').click(function(){
        id = $(this).siblings('input').val();
        name = $(this).parent('td').parent('tr').children('td').eq(2).text();
        $('.set-empname').text(name);
        $('.setempid').val(id);
      });
    //===================================END Employee Advance TABLE===========================

     //===================================START Employee EDIT TABLE===========================
        var current_row_id='';
        var current_td_value='';
        var current_td_column_name='';
        var imagename = '';
        $('.employeetable').children('tbody').children('tr').find('td').dblclick(function(){
          current_td_value = $(this).text();
          current_row_id = $(this).siblings('td').find('input').val();
          current_td_column_name = $(this).prop('class');
         
          if(current_td_column_name=='empimage'){
           
            // // $(this).text('');
            // image = $(this).children('img').prop('src');
            // // alert(image);
            // var urls = image.split("/");
            // imagename = urls.pop();
            // restVar = urls.join("/");
            // alert(lastVar);
            // alert(restVar);
            $(this).append('<form classs="saveimage" method="POST" enctype="multipart/form-data" action="<?= base_url()?>Employee/uploadImage" ><input type="hidden" value="'+current_row_id+'" name="id"><input type="file" name="empimage" value="'+current_td_value+'" class="currentvalue"><button>save</button></form>');

          } else if(current_td_column_name=='empname'){
            $(this).text('');
            $(this).append('<input type="text" value="'+current_td_value+'" class="currentvalue"><button>save</button>');

          }else if(current_td_column_name=='empcontact'){
            $(this).text('');
            $(this).append('<input type="text" value="'+current_td_value+'" class="currentvalue"><button>save</button>');

          }else if(current_td_column_name=='empdateofjoin'){
            $(this).text('');
            $(this).append('<input type="text" value="'+current_td_value+'" class="currentvalue"><button>save</button>');

          }else if(current_td_column_name=='empsalary'){
            $(this).text('');
            $(this).append('<input type="text" value="'+current_td_value+'" class="currentvalue"><button>save</button>');

          }
          
         
        });




        $('.employeetable').children('tbody').children('tr').find('td').delegate(':button','click',function(){
         
            current_td_value = $(this).siblings('.currentvalue').val();
            current_td_column_name = $(this).parent('td').prop('class');
            var updateurl = '<?= base_url()?>Employee/updateemployee';
            
            if(current_td_column_name=='empimage'){
             // $(this).text('');
                  image = $(this).siblings('img').prop('src');
                
                  var urls = image.split("/");
                  imagepath = urls.join("/");

                  var urls_of_new_imgae = current_td_value.split('\\');
                  current_td_value = urls_of_new_imgae.pop();

                  // $('.load').submit();
                  

              }else{
                  $(this).parent('td').text(current_td_value);
              }
            $.ajax({
              url:updateurl,
              type:'POST',
              data:{id:current_row_id, val:current_td_value,column:current_td_column_name},
              success:function(data){
                $('.saveimage').submit();
              } 
            });

            
        });
     //===================================END Employee EDIT TABLE===========================

       //===================================START Employee SALARY TABLE===========================
    

                  var saltotalsalary=0;
                  saltotalsalary = $.trim($('.oraginalSalary').val());
                  saltotalsalary = parseInt(saltotalsalary==""?0:saltotalsalary);
                  var salbonus=0;
                  var saleidi=0;
                  $('.salbonus, .saleidi, .saladvanceinstallment').keyup(function(){

                    salbonus = $.trim($('.salbonus').val());
                    salbonus = parseInt(salbonus==""?0:salbonus);

                    saleidi = $.trim($('.saleidi').val());
                    saleidi = parseInt(saleidi==""?0:saleidi);

                    saladvanceinstallment = $.trim($('.saladvanceinstallment').val());
                    saladvanceinstallment = parseInt(saladvanceinstallment==""?0:saladvanceinstallment);

                   

                    fillandfinal = saltotalsalary+salbonus+saleidi-saladvanceinstallment;
                    //  = saladvanceinstallment+saltotalsalarys;
                    $('.saltotalsalary').val(fillandfinal);
                  });
                  
                  
                  
                  
                  //===================================END Employee SALARY TABLE===========================

                  //===================================START ACTIVE DEACTIVE EMPLOYEE TABLE===========================
    
                  $('.active_eactive').click(function(){
                   checkValue = $(this).text();
                   id = $(this).siblings('input').val();
                
                   if(checkValue=='Deactivate'){
                    $(this).text('Activate');
                    $(this).removeClass('btn-warning');
                   
                    $(this).addClass('mx-2');
                    $(this).addClass('btn-success');
                    $(this).parent('td').parent('tr').css('background', 'cadetblue').css('color','white');
                    
                    modal = $(this).parent('td').children('a.advancemodalbtn').attr('data-toggle','');
                  
                    $.ajax({
                      url:'<?=base_url()?>Employee/active_deactive_employee',
                      type:'POST',
                      data:{id:id,status:0},
                      success:function(){
                        
                      }
                    });
                   }else{

                    $(this).text('Deactivate');
                    $(this).removeClass('mx-2');
                    $(this).addClass('btn-warning');
                    $(this).removeClass('btn-success');
                    $(this).parent('td').parent('tr').css('background', 'white').css('color','black');
                    modal = $(this).parent('td').children('a.advancemodalbtn').attr('data-toggle','modal');
                    $.ajax({
                      url:'<?=base_url()?>Employee/active_deactive_employee',
                      type:'POST',
                      data:{id:id,status:1},
                      success:function(){
                        
                      }
                    });
                   }
                  });
                 
                  
                  var adinstallment=0;
                  var adadvance=0;
                  $('.adinstallment, .adadvance').keyup(function(){

                    
                    
                    adadvance = $.trim($('.adadvance').val());
                    adadvance = parseInt(adadvance==''?0:adadvance)

                    adinstallment = $.trim($('.adinstallment').val());
                    adinstallment = parseInt(adinstallment==''?0:adinstallment)

                    if(adinstallment>adadvance){
                      alert('Installment can not be greater than Advance');
                      $('.adinstallment').val(adadvance)
                    }else{
                      
                    }

                  });
                  
                  // start Salary Date validation two month salary payed on same date


                  
                  $('.saldate').change(function(){

                    cureent_date = $(this).val();
                    allDate = []
                    $('.salarytable').children('tbody').children('tr').each(function(){
                      date = $(this).find('td').eq(2).text();
                      allDate.push(date);
                    });
                  
                    // if(allDate.indexOf(cureent_date)!=-1){
                    //   alert('This date is already available. please select an other date');
                    //   $(this).val('');
                    // }
                  });
                  // end of salary two month o=paid on same date
                  
                  //===================================END ACTIVE DEACTIVE EMPLOYEE TABLE===========================
       




                });
              </script>
              <noscript>
                <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
              </noscript>
              <script>
                $(document).ready(function() {
                  // Javascript method's body can be found in assets/js/demos.js
                  md.initDashboardPageCharts();

                  md.initVectorMap();

                });
              </script>
   
</body>

</html>