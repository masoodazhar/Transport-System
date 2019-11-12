function abc()
  {
    var get = $('.arv').val();
    $('.arive').val(get);
  }

  
  function print_dailyexpence() {
   
    var content = document.getElementById('print_dailyexpence_page').innerHTML;
    var mywindow = window.open('', 'Print', 'height=600,width=800');

    mywindow.document.write('<html><head><title>Print</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(content);
    mywindow.document.write('</body></html>');

    mywindow.document.close();
    mywindow.focus()
    mywindow.print();
    mywindow.close();
    return true;
}
$(document).ready(function (){
    
  var ltweight = 0;
  var ltrateparton = 0;
  var ltrateparton = 0;

  $('.ltweight , .ltrateparton').keyup(function(){

      ltweight = $.trim($('.ltweight').val());
      ltweight = parseInt(ltweight==''?0:ltweight);

      ltrateparton = $.trim($('.ltrateparton').val());
      ltrateparton = parseInt(ltrateparton==''?0:ltrateparton);

      lttotalamount = ltweight*ltrateparton;

      $('.lttotalamount').val(lttotalamount);

  });
  

  $('.stillremainingamount_of_truck_typing').keyup(function(){
    var still_remain_truck = $.trim($('.stillremainingamount_of_truck').text());
    still_remain_truck = parseInt(still_remain_truck==''?0:still_remain_truck);

    typing_value = $.trim($(this).val());
    typing_value = parseInt(typing_value==''?0:typing_value);
    // alert("typed: "+typing_value + " remaing: "+still_remain_truck);
    if(typing_value>still_remain_truck){
     
      $(this).val(still_remain_truck);
      $('.setremainamount').text(still_remain_truck);
      $('.settypedamount').text(typing_value);
      $('.show-error').fadeIn();
    }else{
     
      $('.show-error').fadeOut('slow');
    }
  });


$('.typetruckname').keyup(function(){
    tname = $(this).val();
    var url = base_url+'Truck/checktruck';
    $.ajax({
      url: url,
      type:'POST',
      data:{tname:tname},
      success:function(data){
       
        if(data==1){
          $('.tsubmitsuccess').prop('type','button');
          $('.tsubmitsuccess').hide();
          $('.tsubmiterror').show();
        }else{
          $('.tsubmitsuccess').prop('type','submit');
          $('.tsubmitsuccess').show();
          $('.tsubmiterror').hide();
        }
      }
    });

});

  $('.view').click(function(){
    id = $(this).data('id');
    // alert(base_url+'tyre/get_single_detail');
    $.ajax({
     type: 'POST',
     data: {id:id},
     url: base_url+'tyre/get_single_detail',
     success: function(data){
        $('.setdata').html(data);
     }
    });
  });

  $('.oil_view').click(function(){
    id = $(this).data('id');
    // alert(base_url+'oil/get_single_detail');
    $.ajax({
     type: 'POST',
     data: {id:id},
     url: base_url+'oil/get_single_detail',
     success: function(data){
      // alert(data);
      $('.setdata').html(data);
     }
    });
  });

  $('.pump_view').click(function(){
    id = $(this).data('id');
    // alert(base_url+'pumpdetail/get_single_detail');
    $.ajax({
     type: 'POST',
     data: {id:id},
     url: base_url+'pumpdetail/get_single_detail',
     success: function(data){
      // alert(data);
      $('.setdata').html(data);
     }
    });
  }); 

  $('.get_truck_maintain').click(function(){
    var id = $(this).next('input').val();
    var url = base_url+'main/get_truck_maintainance';
   
    $.ajax({
      url:url,
      method:'POST',
      data:{id:id},
      success:function(data){
   
        data = JSON.parse(data);
        $('.tmtruck').text(data.tnumber==null?'':data.tnumber);
        $('.tmdriver').text(data.tname==null?'No Driver':data.tname);
        $('.tmoil').text(data.toname=='null'?'No Oil Change':data.toname);
        $('.tmoiltotal').text(data.tmot_amount==''?0:data.tmot_amount);
        $('.tmoilpaid').text(data.tmop_amount==''?'0':data.tmop_amount);
        $('.tmoilremaining').text(data.tmor_amount==''?0:data.tmor_amount);
        $('.tmtyre').text(data.ttname==''?'No Tyre Change':data.ttname);
        $('.tmtyretotal').text(data.tmtt_amount==''?0:data.tmtt_amount);
        $('.tmtyrepaid').text(data.tmtp_amount==''?0:data.tmtp_amount);
        $('.tmtyreremaining').text(data.tmtr_amount);
        $('.tmother').text(data.tmodescripiton==''?'No Other Work':data.tmodescripiton);
        $('.tmothershop').text(data.tsname==''?'No Shop':data.tsname);
        $('.tmothertotal').text(data.tmototal_amount==''?0:data.tmototal_amount);
        $('.tmotherpaid').text(data.tmtop_amount==''?0:data.tmtop_amount);
        $('.tmotherremaining').text(data.tmtor_amount==''?0:data.tmtor_amount);
   
      }
    });
   });
   
                        $('select.othermaterialtruckids').change(function(){
                          var  id = $(this).children("option:selected").val();
                          // alert(id);
                          var url = base_url+'material/checkdateontruckatsamedateinothermaterial';
                          var redirect = base_url+'material/add_material';
                          
                          $.ajax({
                            url: url,
                            type: 'POST',
                            data: {id:id},
                            success:function(data){
                              
                             data = JSON.parse(data);
                             
                             if(data.tomcurrentdate==0){
                            
                              
                             }else{
                              alert('Truck is already available on same date.');
                              window.location.assign(redirect);
                             }
                            }
                          });
                      });

	//Add truck start///////////////////////////////////////////

	var  method_Select = $('.selectinstall').children("option:selected").val();
        $('select.selectinstall').change( function () {
          method_Select = $(this).children("option:selected").val();
          // alert(method_Select);
          if(method_Select == 'installment')
          {
           $('.install_duration').show();
           $('.paid_amount').show();
          }

          else if(method_Select == 'lumpsum')
          {
            $('.install_duration').hide();
            $('.paid_amount').hide();
          }
        });

        $('#paidamount').on('keyup',  function () {
          var totalprice = $('#totalprice').val();

            if(parseInt($(this).val())>totalprice){
              $(this).val(totalprice);
              alert('can not greater than total Amount');
            }

          paid = $(this).val();
          $('.repayment').val(parseInt(totalprice-paid));
          // alert(totalprice-paid);
        });

	      $('#truckform').on('submit' , function(){
	      	var trapdname = $('.trapdname').val();
	        if($('.repayment').val() > 0 && trapdname === '')
	        {
	          $('#truckremain').modal('show');
	          return false;
	        }
	        else
	        {
	          return true;
	        }
	      });


        
	      // $('#returnform').on('submit' , function(){
	      // 	var trapdname = $('.trapdname').val();
	      //   if($('.trremainingamount').val() > 0 && trapdname === '')
	      //   {
	      //     $('#retripremain').modal('show');
	      //     return false;
	      //   }
	      //   else
	      //   {
	      //    return true;
	      //   }
	      // });

        //Add truck End///////////////////////////////////////////

        //Add tyre start////////////////
        var tyre_remain = 0;
        var qpair = 0;
        var paid = 0;
        var paidamount = 0;
        var totalamount = 0;

        $('.perprice, .qpair').on('keyup',  function () {
          qpair = $.trim($('.qpair').val());
          qpair = parseInt(qpair==''?0:qpair);

          paid = $.trim($('.perprice').val());
          paid = parseInt(paid==''?0:paid);
          
          $('.tprice').val(qpair*paid);

          paidamount = $.trim($('.ttpaid').val());
          paidamount = parseInt(paidamount==''?0:paidamount);

          totalamount = $.trim($('.tprice').val());
          totalamount = parseInt(totalamount==''?0:totalamount);

          tyre_remain = totalamount-paidamount;

          $('.ttremaining').val(tyre_remain);
        });

        $('.ttpaid').keyup(function(){
          paidamount = $.trim($('.ttpaid').val());
          paidamount = parseInt(paidamount==''?0:paidamount);

          totalamount = $.trim($('.tprice').val());
          totalamount = parseInt(totalamount==''?0:totalamount);

          tyre_remain = totalamount-paidamount;
          
          $('.ttremaining').val(tyre_remain);
        });

        //add tyre end////////////////

        //add oil start//////////////
        var toquantity = 0;
        var tototalprice = 0;
        var price_gallon = 0;
        var topaid = 0;
        var oilremain = 0;

        $('.tototalprice , .toquantity').keyup(function () {

          toquantity = $.trim($('.toquantity').val());
          toquantity = parseInt(toquantity==''?0:toquantity);

          tototalprice = $.trim($('.tototalprice').val());
          tototalprice = parseInt(tototalprice==''?0:tototalprice);

          if(toquantity != 0 && tototalprice != 0)
          {
            price_gallon = tototalprice / toquantity;
          }
          else
          {
            price_gallon = 0;
          }
          $('.topricegallon').val(price_gallon);
          // alert(totalprice-paid);
        });

        $('.topaid , .tototalprice').keyup(function(){

          tototalprice = $.trim($('.tototalprice').val());
          tototalprice = parseInt(tototalprice==''?0:tototalprice);

          topaid = $.trim($('.topaid').val());
          topaid = parseInt(topaid==''?0:topaid);

          oilremain = tototalprice-topaid;

          $('.toremaining').val(oilremain);

        });

        //add oil end///////////////

        //truck maintainance///////
        //oil///
        $('select.oilselect').change( function () {
          var method_Select = $(this).children("option:selected").val();
          // alert(method_Select);
          
           $('.tamount').show();
           $('.toltr').show();
           $('.tdate').show();
           $('.tpamount').show();
           $('.tramount').show();

        });

        $('.opamount').on('keyup',  function () {
          var otamount = $('.otamount').val();
          paid = $(this).val();
          $('.oramount').val(parseInt(otamount-paid));
          // alert(totalprice-paid);
        });
        //end oil//
        
        //tyre////

        $('select.tyreselect').change( function () {
          var method_Select = $(this).children("option:selected").val();
          // alert(method_Select);

           $('.ttamount').show();
           $('.ttpair').show();
           $('.ttdate').show();
           $('.ttpamount').show();
           $('.ttramount').show();

        });

        $('.tpaida').on('keyup',  function () {
          var ttotala = $('.ttotala').val();
          paid = $(this).val();
          $('.tremaina').val(parseInt(ttotala-paid));
          // alert(totalprice-paid);
        });

        //end tyre//

        //start other/////

        $('.tmtop_amount').on('keyup',  function () {
          var ttotalo = $('.tmototal_amount').val();
          paid = $(this).val();
          $('.tmtor_amount').val(parseInt(ttotalo-paid));
          // alert(totalprice-paid);
        });

        //end other//////

        //end truck maintainance///



        
        base_url = $('body').prop('class');
      $('select.tocity').change(function(){
          var id = $(this).val();
           url = base_url+'Dailytrip/station';
          $.ajax({
              url: url,
              type: "POST",
              data: {myId:id},
              success: function(data)
              {
                parsed = JSON.parse(data);
                arra=[];
                 arra.push('<option value="0">Choose Station</option>');
                $.each(parsed,function(s,data){
                  arra.push('<option value="'+data.tstid+'">'+data.tstname+'</option>');
                });
                // alert(arra);
                $('select.tostation').html(arra);
              }
          })
        });

       $('.add_comission').on('click',function(){
          $('.add_comissions').append('<div class="row"><div class="col-md-1"></div><div class="col-md-3"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">description</label><input type="text" class="form-control" name="toedescription[]" value=""></div></div><div class="col-sm-3 toeamountparent"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="number" class="form-control toeamount" name="toeamount[]" value=""></div></div><input type="hidden" class="form-control" name="toeidentity[]" value="comission-0"><a href="#" class="remove_comission my-2" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
        });


//=====================================START OF DAILY TRIP INFORMATION====================================

                        var tdcash=0;
                        var tddriver=0;
                        var tdcheaque=0;
                        var tdhjani=0;
                        var tdbrokery=0;

                var tdtotalamount=0;
                var tdvfrieght=0;
                var tdadvcomission=0;
                var tdpendcomission=0;
                var tdcustom=0;
                var tdexweight=0;
                var tdunloading=0;
                var tdinaam=0;
                var tddehari=0;
                var tdemptycontainer=0;
                var tdmushiana=0;
                var tdrecieveamount=0;
                var detect_from_advancebilty=0;

                var totalofDaily = 0;
                var toeamountofDaily = 0;

                $('.tdrecieveamount, .tdcash, .tddriver ,.tdcheaque ,.tdhjani ,.tdbrokery ,.tdvfrieght, .tdadvcomission, .tdpendcomission, .tdcustom, .tdexweight, .tdunloading,.tdinaam, .tddehari, .tdemptycontainer ,.tdmushiana').keyup(function(){
                  tdcash = $.trim($('.tdcash').val());
                  tdcash = parseInt(tdcash==''?0:tdcash);

                  tddriver = $.trim($('.tddriver').val());
                  tddriver = parseInt(tddriver==''?0:tddriver);

                  tdcheaque = $.trim($('.tdcheaque').val());
                  tdcheaque = parseInt(tdcheaque==''?0:tdcheaque);

                  tdhjani = $.trim($('.tdhjani').val());
                  tdhjani = parseInt(tdhjani==''?0:tdhjani);

                  tdbrokery = $.trim($('.tdbrokery').val());
                  tdbrokery = parseInt(tdbrokery==''?0:tdbrokery);

                  tdvfrieght = $.trim($('.tdvfrieght').val());
                  tdvfrieght = parseInt(tdvfrieght==''?0:tdvfrieght);

                  tdadvcomission = $.trim($('.tdadvcomission').val());
                  tdadvcomission = parseInt(tdadvcomission==''?0:tdadvcomission);
                  
                  tdpendcomission = $.trim($('.tdpendcomission').val());
                  tdpendcomission = parseInt(tdpendcomission==''?0:tdpendcomission);

                  tdcustom = $.trim($('.tdcustom').val());
                  tdcustom = parseInt(tdcustom==''?0:tdcustom);

                  tdexweight = $.trim($('.tdexweight').val());
                  tdexweight = parseInt(tdexweight==''?0:tdexweight);

                  tdunloading = $.trim($('.tdunloading').val());
                  tdunloading = parseInt(tdunloading==''?0:tdunloading);

                  tdinaam = $.trim($('.tdinaam').val());
                  tdinaam = parseInt(tdinaam==''?0:tdinaam);

                  tddehari = $.trim($('.tddehari').val());
                  tddehari = parseInt(tddehari==''?0:tddehari);

                  tdemptycontainer = $.trim($('.tdemptycontainer').val());
                  tdemptycontainer = parseInt(tdemptycontainer==''?0:tdemptycontainer);

                  tdmushiana = $.trim($('.tdmushiana').val());
                  tdmushiana = parseInt(tdmushiana==''?0:tdmushiana);

                  tdrecieveamount = $.trim($('.tdrecieveamount').val());
                  tdrecieveamount = parseInt(tdrecieveamount==''?0:tdrecieveamount);



                  total_of_driver_to_brokry_in_dailytrip = tdcash+tddriver+tdcheaque+tdhjani+tdbrokery;
                  $('.tdtotalamount').val(total_of_driver_to_brokry_in_dailytrip);

                  total_of_vfeight_tomunshiana = tdvfrieght+tdadvcomission+tdpendcomission+tdcustom+tdexweight+tdunloading+tdinaam+tddehari+tdemptycontainer+tdmushiana+tdrecieveamount;
                  detect_from_advancebilty = total_of_vfeight_tomunshiana-total_of_driver_to_brokry_in_dailytrip;

                  
                  detected_from_descrip_and_advance = parseInt($('.comisionsum').val())+parseInt(detect_from_advancebilty);
                  $('.tdremainingamount').val(detected_from_descrip_and_advance);

                  if($('.tdremainingamount').val() > 0)
                    {
                     $('.tdpaymentstatus').val('Pending');
                    }
                    else if($('.tdremainingamount').val() < 0)
                    {
                     $('.tdpaymentstatus').val('Remaining');
                    }
                    else
                    {
                     $('.tdpaymentstatus').val('Paid');
                    }


                 });
                 //=========================================END OF DAILY INFO WITH ADVANCE BUILTY AND V-FREIGHT ETC
                //=========================================START OF DAILY DESCRIPTION AND AMOUNT 
                var $dailycomissionform = $('.dailycomissionform');
  
                $dailycomissionform.delegate('.toeamount', 'change', function (e)
                {
                  comisionsumofdaily =parseInt($('.comisionsum').val());
  
                      e.stopImmediatePropagation();
  
                      totalofDaily = 0;
                      $('.toeamount').each(function(){
  
                       toeamountofDaily =  $.trim($(this).val());
                       toeamountofDaily = parseInt(toeamountofDaily==''?0:toeamountofDaily);
                       totalofDaily +=toeamountofDaily;
                      });
  
                      $('.comisionsum').val(totalofDaily);
                    //   alert(detect_from_advancebilty);
                    // alert($('.comisionsum').val());
                    remainings = parseInt($('.comisionsum').val())+parseInt(detect_from_advancebilty);
  
                   
  
                    $('.tdremainingamount').val(remainings);
                
            });
            // ========================================= BY REMOVING DAILY TRIP DESCRIPTION WIHT AMOUNT


              //=========================================START OF DAILY DESCRIPTION AND AMOUNT 
              var $tripformlast = $('.tripform-last');
                
              $tripformlast.delegate('.toeamountlast', 'change', function (e)
              {
                // var remaining = $.trim($('.remainrate').val());
                // remaining = parseInt(remaining==''?0:remaining);

                    e.stopImmediatePropagation();

                    var totalofDaily = 0;
                    $('.toeamountlast').each(function(){

                      var toeamountofDaily =  $.trim($(this).val());
                      toeamountofDaily = parseInt(toeamountofDaily==''?0:toeamountofDaily);
                      totalofDaily +=toeamountofDaily;
                    });
                    
                  var total = totalofDaily;

                  // alert(total);

                  $('.remainrate').val(total);
              
              });
              // ========================================= BY REMOVING DAILY TRIP DESCRIPTION WIHT AMOUNT


            $('div.add_comissions').delegate('a.remove_comission' ,'click', function(){
              
              toeamountofDaily = $.trim($(this).siblings('.toeamountparent').find('input.toeamount').val());
              toeamountofDaily = parseInt(toeamountofDaily==''?0:toeamountofDaily);
              totalofDaily -=toeamountofDaily;
              // alert(toeamountofDaily)
              $('.comisionsum').val(totalofDaily);
                      
              remainings = parseInt(detect_from_advancebilty)+parseInt($('.comisionsum').val());
              $('.tdremainingamount').val(remainings);
               $(this).parent('div.row').remove();
    
           });

//=====================================END OF DAILY TRIP INFORMATION====================================


//=====================================START OF OTHER INFORMATION====================================

                        var tomdriver=0;
                        var tomhjani=0;
                        var tomcheaque=0;

                        var tomtotalamount=0;

                        var tomvfrieght=0;
                        var tomextrafareamount=0;

                        var tomadvancecommission=0;
                        var tomremainingcommission=0;
                        var tomkanta=0;
                        var tommunshiana=0;
                        var tomdehari=0;
                        var tomremainrecieve=0;
                        var detect_from_advancebilty_inothermaterial=0;

                        var totalofother = 0;
                        var toeamountofother = 0;

                        $('.tomdriver, .tomhjani, .tomcheaque, .tomvfrieght, .tomextrafareamount, .tomadvancecommission, .tomremainingcommission, .tomkanta, .tommunshiana, .tomdehari, .tomremainrecieve').keyup(function(){
                        tomdriver = $.trim($('.tomdriver').val());
                        tomdriver = parseInt(tomdriver==''?0:tomdriver);

                        tomhjani = $.trim($('.tomhjani').val());
                        tomhjani = parseInt(tomhjani==''?0:tomhjani)

                        tomcheaque = $.trim($('.tomcheaque').val());
                        tomcheaque = parseInt(tomcheaque==''?0:tomcheaque)



                        total_of_driver_to_check_in_othermaterial = tomdriver+tomhjani+tomcheaque;
                        $('.tomtotalamount').val(total_of_driver_to_check_in_othermaterial);

                        tomvfrieght = $.trim($('.tomvfrieght').val());
                        tomvfrieght = parseInt(tomvfrieght==''?0:tomvfrieght)

                        tomextrafareamount = $.trim($('.tomextrafareamount').val());
                        tomextrafareamount = parseInt(tomextrafareamount==''?0:tomextrafareamount)

                        tomadvancecommission = $.trim($('.tomadvancecommission').val());
                        tomadvancecommission = parseInt(tomadvancecommission==''?0:tomadvancecommission)

                        tomremainingcommission = $.trim($('.tomremainingcommission').val());
                        tomremainingcommission = parseInt(tomremainingcommission==''?0:tomremainingcommission)

                        tomkanta = $.trim($('.tomkanta').val());
                        tomkanta = parseInt(tomkanta==''?0:tomkanta)

                        tommunshiana = $.trim($('.tommunshiana').val());
                        tommunshiana = parseInt(tommunshiana==''?0:tommunshiana)

                        tomdehari = $.trim($('.tomdehari').val());
                        tomdehari = parseInt(tomdehari==''?0:tomdehari)

                        tomremainrecieve = $.trim($('.tomremainrecieve').val());
                        tomremainrecieve = parseInt(tomremainrecieve==''?0:tomremainrecieve)

                       
                        total_of_driver_to_brokry_in_other = tomvfrieght+tomextrafareamount+tomadvancecommission+tomremainingcommission+tomkanta+tommunshiana+tomdehari+tomremainrecieve;
                        detect_from_advancebilty_inothermaterial = total_of_driver_to_brokry_in_other-total_of_driver_to_check_in_othermaterial;


                        detected_from_descrip_and_advance = parseInt($('.comisionsum').val())+parseInt(detect_from_advancebilty_inothermaterial);
                        $('.tomremainingamount').val(detected_from_descrip_and_advance);

                        if($('.tomremainingamount').val() > 0)
                        {
                         $('.tompaymentstatus').val('Pending');
                        }
                        else if($('.tomremainingamount').val() < 0)
                        {
                         $('.tompaymentstatus').val('Remaining');
                        }
                        else
                        {
                         $('.tompaymentstatus').val('Paid');
                        }


                        });
                        //=========================================END OF DAILY INFO WITH ADVANCE BUILTY AND V-FREIGHT ETC
                        //=========================================START OF DAILY DESCRIPTION AND AMOUNT 
                        var $othercomissionform = $('.othercomissionform');

                        $othercomissionform.delegate('.toeamount', 'change', function (e)
                        {
                        comisionsumofother =parseInt($('.comisionsum').val());

                        e.stopImmediatePropagation();

                        totalofother = 0;
                        $('.toeamount').each(function(){

                        toeamountofother =  $.trim($(this).val());
                        toeamountofother = parseInt(toeamountofother==''?0:toeamountofother);
                        totalofother +=toeamountofother;
                        });

                        $('.comisionsum').val(totalofother);
                        remainingsother = parseInt($('.comisionsum').val())+parseInt(detect_from_advancebilty_inothermaterial);



                        $('.tomremainingamount').val(remainingsother);

                        });
                        // ========================================= BY REMOVING OTHER DESCRIPTION WIHT AMOUNT

                        $('div.add_parchoons').delegate('a.remove_parchoon' ,'click', function(){

                        toeamountofother = $.trim($(this).siblings('.toeamountparent').find('input.toeamount').val());
                        toeamountofother = parseInt(toeamountofother==''?0:toeamountofother);
                        totalofother -=toeamountofother;
                        // alert(toeamountofother)
                        $('.comisionsum').val(totalofother);

                        remainingsother = parseInt(detect_from_advancebilty_inothermaterial)+parseInt($('.comisionsum').val());
                        $('.tomremainingamount').val(remainingsother);
                        $(this).parent('div.row').remove();

                        });

        $('.add_parchoon').on('click',function(){
          $('.add_parchoons').append('<div class="row"><div class="col-md-1"></div><div class="col-md-3"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">description</label><input type="text" class="form-control" name="toedescription[]" value=""></div></div><div class="col-sm-3 toeamountparent"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="number" class="form-control toeamount" name="toeamount[]" value=""></div></div><input type="hidden" class="form-control" name="toeidentity[]" value="parchoon-0"><a href="#" class="remove_parchoon my-2" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
        });

//=====================================END OF OTHER INFORMATION====================================

//==================== START SUMMARRY JQUERY ====================////
                var vfreight = 0;
                var frate = 0;
                var rvfrieght = 0;
                var ttddehari = 0;
                var ewfare = 0;
                var ttdshifting = 0;
                var ttdpointprize = 0;
                var ttdtotalincometwo = 0;

                $('select.trucks').change(function(){
                  var id = $(this).val();
                  $.ajax({
                      url: base_url+"trip/material",
                      type: "POST",
                      data: {mId:id},
                      success: function(data)
                      {
                        parsed = JSON.parse(data);
                        if(parsed != null)
                        {
                          $('.mtrl').val(' Yes');
                          $('.frate').val(parsed.tomvfrieght)
                          $('.ewfare').val(parsed.tomextrafareamount);
                        }
                        else
                        {
                          $('.mtrl').val(' No');
                          $('.frate').val('0');
                          $('.ewfare').val('0');
                        }
                        // $('select.tostation').html(arra);
                      }
                  });
                  $.ajax({
                      url: base_url+"trip/daily",
                      type: "POST",
                      data: {mId:id},
                      success: function(data)
                      {
                        parsed = JSON.parse(data);
                        if(parsed.totalweight == null){
                          
                          $('.fweight').val(parsed.tdweight);
                          

                        }else{
                          
                          $('.fweight').val(parsed.totalweight);

                        }
                        
                        $('.tocty').val(parsed.tcname);
                        $('.tostation').val(parsed.tstname);
                        $('.vfreight').val(parsed.tdvfrieght);
                        $('.tostationid').val(parsed.tstid);
                        $('.ttddehari').val(parsed.tddehari);
                        $('.dehariinitial').val(parsed.tddehari);
                        trdehari = $.trim($('.trdehari').val());
                        trdehari = parseInt(trdehari==''?0:trdehari);

                        dehariinitial = $.trim($('.dehariinitial').val());
                        dehariinitial = parseInt(dehariinitial==''?0:dehariinitial);
                        $('.ttddehari').val(dehariinitial+trdehari);
                      }
                  }).done(function(){

                    vfreight = $.trim($('.vfreight').val());
                  vfreight = parseInt(vfreight==''?0:vfreight);

                  frate = $.trim($('.frate').val());
                  frate = parseInt(frate==''?0:frate);

                  rvfrieght = $.trim($('.rvfrieght').val());
                  rvfrieght = parseInt(rvfrieght==''?0:rvfrieght);

                  ttddehari = $.trim($('.ttddehari').val());
                  ttddehari = parseInt(ttddehari==''?0:ttddehari);

                  ewfare = $.trim($('.ewfare').val());
                  ewfare = parseInt(ewfare==''?0:ewfare);

                  ttdshifting = $.trim($('.ttdshifting').val());
                  ttdshifting = parseInt(ttdshifting==''?0:ttdshifting);

                  ttdpointprize = $.trim($('.ttdpointprize').val());
                  ttdpointprize = parseInt(ttdpointprize==''?0:ttdpointprize);

                  ttdtotalincometwo = vfreight+frate+rvfrieght+ttddehari+ewfare+ttdshifting+ttdpointprize;
                  // alert(ttdshifting);
                  $('.ttdtotalincometwo').val(ttdtotalincometwo);
                  });

                  

                });


                $('.add_pump').on('click',function(){
                  $('.add_pumps').append('<div class="row"><div class="col-sm-1"></div><div class="col-sm-3"><div class="form-group">'+$('div.pmp').html()+'</div></div><div class="col-sm-2"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Diesel In liter</label><input type="Number" class="form-control" name="ttddieselliter"></div></div><div class="col-sm-2"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="Number" class="form-control" name="ttddieselprice"></div></div><div class="col-sm-3"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Paid Amount</label><input type="number" class="form-control" name="tpdpaidamount[]"></div></div><a href="#" class="remove_pump my-4" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
                });

                $('div.add_pumps').delegate('a.remove_pump' ,'click', function(){

                  $(this).parent('div.row').remove();

                });

                $('.add_voucher').on('click',function(){
                  $('.add_vouchers').append('<div class="row"><div class="col-md-1"></div><div class="col-md-3"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">description</label><input type="text" class="form-control" name="toedescription[]" value=""></div></div><div class="col-sm-3 toeamountparent"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="number" class="form-control toeamountlast" name="toeamount[]" value=""></div></div><input type="hidden" class="form-control" name="toeidentity[]" value="voucher-0"><a href="#" class="remove_voucher my-2" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
                });

                var ttdprizeamount = 0;
                var ttdhohajijani = 0;
                var ttdweightexpense = 0;
                var ttdcunloading = 0;
                var ttdtmaintainance = 0; 
                var ttdpolice = 0;
                var ttdhjbrokery = 0;
                var ttdiamount = 0;
                var ttdtdamount = 0;
                var ttdtsamount = 0;
                var ttddescamount = 0;
                var ttddsamount = 0; 
                var ttddaoamount = 0;
                var ttddexpamount = 0;
                var ttddacamount = 0;
                var ttdmunshiana = 0; 
                var ttdfoodexpense = 0;
                var ttdtotalexpense = 0;
                var remainrate = 0;
                var avpa = 0;

                $(' .ttddacamount , .ttdmunshiana , .ttdfoodexpense , .ttdiamount , .ttdtdamount , .ttdtsamount , .ttddescamount , .ttddsamount , .ttddaoamount , .ttddexpamount ,.ttdprizeamount , .ttdhohajijani , .ttdweightexpense , .ttdcunloading , .ttdtmaintainance , .ttdpolice , .ttdhjbrokery').keyup(function(){

                   ttdprizeamount = $.trim($('.ttdprizeamount').val());
                   ttdprizeamount = parseInt(ttdprizeamount==''?0:ttdprizeamount);

                   ttdhohajijani = $.trim($('.ttdhohajijani').val());
                   ttdhohajijani = parseInt(ttdhohajijani==''?0:ttdhohajijani);

                   ttdweightexpense = $.trim($('.ttdweightexpense').val());
                   ttdweightexpense = parseInt(ttdweightexpense==''?0:ttdweightexpense);

                   ttdcunloading = $.trim($('.ttdcunloading').val());
                   ttdcunloading = parseInt(ttdcunloading==''?0:ttdcunloading);

                   ttdtmaintainance = $.trim($('.ttdtmaintainance').val());
                   ttdtmaintainance = parseInt(ttdtmaintainance==''?0:ttdtmaintainance);

                   ttdpolice = $.trim($('.ttdpolice').val());
                   ttdpolice = parseInt(ttdpolice==''?0:ttdpolice);

                   ttdhjbrokery = $.trim($('.ttdhjbrokery').val());
                   ttdhjbrokery = parseInt(ttdhjbrokery==''?0:ttdhjbrokery);

                   ttdiamount = $.trim($('.ttdiamount').val());
                   ttdiamount = parseInt(ttdiamount==''?0:ttdiamount);

                   ttdtdamount = $.trim($('.ttdtdamount').val());
                   ttdtdamount = parseInt(ttdtdamount==''?0:ttdtdamount);

                   ttdtsamount = $.trim($('.ttdtsamount').val());
                   ttdtsamount = parseInt(ttdtsamount==''?0:ttdtsamount);

                   ttddescamount = $.trim($('.ttddescamount').val());
                   ttddescamount = parseInt(ttddescamount==''?0:ttddescamount);

                   ttddsamount = $.trim($('.ttddsamount').val());
                   ttddsamount = parseInt(ttddsamount==''?0:ttddsamount);

                   ttddaoamount = $.trim($('.ttddaoamount').val());
                   ttddaoamount = parseInt(ttddaoamount==''?0:ttddaoamount);

                   ttddexpamount = $.trim($('.ttddexpamount').val());
                   ttddexpamount = parseInt(ttddexpamount==''?0:ttddexpamount);

                   ttddacamount = $.trim($('.ttddacamount').val());
                   ttddacamount = parseInt(ttddacamount==''?0:ttddacamount);

                   ttdmunshiana = $.trim($('.ttdmunshiana').val());
                   ttdmunshiana = parseInt(ttdmunshiana==''?0:ttdmunshiana);

                   ttdfoodexpense = $.trim($('.ttdfoodexpense').val());
                   ttdfoodexpense = parseInt(ttdfoodexpense==''?0:ttdfoodexpense);

                   ttdtotalexpense = ttdfoodexpense+ttdweightexpense+ttdprizeamount+ttdhohajijani+ttdtmaintainance+ttdcunloading+ttdmunshiana+ttddacamount+ttddexpamount+ttddaoamount+ttddsamount+ttddescamount+ttdtsamount+ttdtdamount+ttdiamount+ttdhjbrokery+ttdpolice;

                   $('.ttdtotalexpense').val(ttdtotalexpense);

                   remainrate = $.trim($('.remainrate').val());
                   remainrate = parseInt(remainrate==''?0:remainrate);

                   avpa = $.trim($('.avpa').val());
                   avpa = parseInt(avpa==''?0:avpa);

                   $('.remainrate').val(totalincome-ttdtotalexpense-returnamount);

                   $('.advdriver').val($('.remainrate').val()-avpa);
                });

                $('.avpa').keyup(function(){
                   avpa = $.trim($('.avpa').val());
                   avpa = parseInt(avpa==''?0:avpa);

                   $('.advdriver').val($('.remainrate').val()-avpa);
                });

                var takehaji = 0;
                var vpc = 0;
                var creditamount = 0; 
                var totalincome = 0;

                $(' .takehaji , .vpc , .creditamount').keyup(function(){

                   vpc = $.trim($('.vpc').val());
                   vpc = parseInt(vpc==''?0:vpc);

                   takehaji = $.trim($('.takehaji').val());
                   takehaji = parseInt(takehaji==''?0:takehaji);

                   creditamount = $.trim($('.creditamount').val());
                   creditamount = parseInt(creditamount==''?0:creditamount);

                   totalincome = vpc+takehaji+creditamount;

                   $('.ttlincome').val(totalincome);

                   $('.remainrate').val(totalincome-ttdtotalexpense-returnamount);

                   $('.advdriver').val($('.remainrate').val()-avpa);
                });

                var ttdtotalexpense = 0;
                var returnamount = 0;
                var ttlincome = 0; 
                var remainingamount = 0;

                $(' .ttdtotalexpense , .returnamount , .ttlincome').on('keyup' , function(){

                   ttdtotalexpense = $.trim($('.ttdtotalexpense').val());
                   ttdtotalexpense = parseInt(ttdtotalexpense==''?0:ttdtotalexpense);

                   returnamount = $.trim($('.returnamount').val());
                   returnamount = parseInt(returnamount==''?0:returnamount);

                   ttlincome = $.trim($('.ttlincome').val());
                   ttlincome = parseInt(ttlincome==''?0:ttlincome);

                   remainingamount = ttlincome-ttdtotalexpense-returnamount;

                   $('.remainrate').val(remainingamount);

                   $('.advdriver').val($('.remainrate').val()-avpa);
                });

            $('select.vpaamount').on('change' , function(){
            advancevpa = $.trim($('.avpa').val());
            advancevpa = parseInt(advancevpa==""?0:advancevpa);
            biltyvpa = $.trim($('.bvpa').val());
            biltyvpa = parseInt(biltyvpa==""?0:biltyvpa);
            var marge = advancevpa+biltyvpa;
            var own = $(this).val();
            // alert(own);
            if(own === 'pending')
            {
              $('.vpa').val(marge);
            }
            else
            {
              $('.vpa').val(advancevpa);
            }
          });

            $('select.vpbamount').change(function(){
            vpa = $.trim($('.vpa').val());
            vpa = parseInt(vpa==""?0:vpa);
            prate = $.trim($('.prate').val());
            prate = parseInt(prate==""?0:prate);
            var sam = vpa+prate;
            var ownvpb = $(this).val();
            if(ownvpb === 'pending')
            {
              $('.vpb').val(sam);
            }
            else
            {
              $('.vpb').val(vpa);
            }
          });

            $('select.vpcamount').change(function(){
            vpb = $.trim($('.vpb').val());
            vpb = parseInt(vpb==""?0:vpb);
            rvfrieght = $.trim($('.rvfrieght').val());
            rvfrieght = parseInt(rvfrieght==""?0:rvfrieght);
            var samc = vpb+rvfrieght;
            var ownvpc = $(this).val();
            if(ownvpc === 'pending')
            {
              $('.vpc').val(samc);
              $('.ttlincome').val(samc);
            }
            else
            {
              $('.vpc').val(vpb);
              $('.ttlincome').val(vpb);
            }
          });

            $('div.add_vouchers').delegate('a.remove_voucher' ,'click', function(){
              $(this).parent('div.row').remove();

              var totalofDaily = 0;
              $('.toeamountlast').each(function(){

                var toeamountofDaily =  $.trim($(this).val());
                toeamountofDaily = parseInt(toeamountofDaily==''?0:toeamountofDaily);
                totalofDaily +=toeamountofDaily;
              });
              
            var total = totalofDaily;

            // alert(total);

            $('.remainrate').val(total);

            });

          $('.ttddieselprice , .ttddieselliter').keyup(function(){
              ttddieselprice = $.trim($('.ttddieselprice').val());
              ttddieselprice = parseInt(ttddieselprice==''?0:ttddieselprice);

              ttddieselliter = $.trim($('.ttddieselliter').val());
              ttddieselliter = parseInt(ttddieselliter==''?0:ttddieselliter);
              
              prliteramount = ttddieselprice*ttddieselliter;
              $('#prliteramount').val(prliteramount);
          });

//==================== END SUMMARY JQUERY ======================////

//=====================================START OF RETURN TRIP INFORMATION====================================
                var trtotalamount = 0;
                var trdriver = 0;
                var trzaheer = 0;
                var trbrokery = 0;
                var trhjani = 0; // OFR ADDRETURN TRIM
                var total_of_hj = 0;
                
                var trvfrieght = 0;
                var trinam = 0;
                var tradvancecomission = 0;
                var trpendingcomission = 0;
                var trkanta = 0;
                var trcustom = 0;
                var trpoint = 0; // OFR ADDRETURN TRIM
                var trdehari = 0;
                var trdehari1 = 0;
                var trshifting = 0;
                var trloading = 0;
                var trextraweight = 0; // OFR ADDRETURN TRIM
                var trtokarachi = 0;
                var trrecievedamount = 0;
                var trremainingamount = 0;
                var totalofreturn = 0;
                var toeamountofreturn = 0;
                var after_subtract_advance_bilty = 0;
                var comisionsumofreturn = 0;
                var tdehari = 0;

                $('.trkanta , .trcustom , .trpoint , .trdehari , .trshifting , .trloading , .trextraweight , .trtokarachi , .trrecievedamount ,.trdriver, .trzaheer, .trbrokery, .trhjani , .trvfrieght , .trinam , .tradvancecomission , .trpendingcomission').keyup(function(){
                  
                      trtotalamount = parseInt($('.trtotalamount').val());
                      
                      trhjani = $.trim($('.trhjani').val());
                      trhjani = parseInt(trhjani==''?0:trhjani);

                      
                      trdriver = $.trim($('.trdriver').val());
                      trdriver = parseInt(trdriver==''?0:trdriver);

                      trzaheer = $.trim($('.trzaheer').val());
                      trzaheer = parseInt(trzaheer==''?0:trzaheer);

                      trbrokery = $.trim($('.trbrokery').val());
                      trbrokery = parseInt(trbrokery==''?0:trbrokery);

                      total_of_hj = trdriver+trzaheer+trbrokery+trhjani;

                      $('.trtotalamount').val(total_of_hj);

                      trvfrieght = $.trim($('.trvfrieght').val());
                      trvfrieght = parseInt(trvfrieght==''?0:trvfrieght);

                      $('.rvfrieght').val(trvfrieght);

                      trinam = $.trim($('.trinam').val());
                      trinam = parseInt(trinam==''?0:trinam);

                      tradvancecomission = $.trim($('.tradvancecomission').val());
                      tradvancecomission = parseInt(tradvancecomission==''?0:tradvancecomission);

                      trpendingcomission = $.trim($('.trpendingcomission').val());
                      trpendingcomission = parseInt(trpendingcomission==''?0:trpendingcomission);

                      trkanta = $.trim($('.trkanta').val());
                      trkanta = parseInt(trkanta==''?0:trkanta);

                      trcustom = $.trim($('.trcustom').val());
                      trcustom = parseInt(trcustom==''?0:trcustom);

                      trpoint = $.trim($('.trpoint').val());
                      trpoint = parseInt(trpoint==''?0:trpoint);

                      $('.ttdpointprize').val(trpoint);

                      trdehari = $.trim($('.trdehari').val());
                      trdehari = parseInt(trdehari==''?0:trdehari);

                      dehariinitial = $.trim($('.dehariinitial').val());
                      dehariinitial = parseInt(dehariinitial==''?0:dehariinitial);

                      $('.ttddehari').val(dehariinitial+trdehari);

                      trshifting = $.trim($('.trshifting').val());
                      trshifting = parseInt(trshifting==''?0:trshifting);

                      $('.ttdshifting').val(trshifting);

                      trloading = $.trim($('.trloading').val());
                      trloading = parseInt(trloading==''?0:trloading);

                      trextraweight = $.trim($('.trextraweight').val());
                      trextraweight = parseInt(trextraweight==''?0:trextraweight);

                      trtokarachi = $.trim($('.trtokarachi').val());
                      trtokarachi = parseInt(trtokarachi==''?0:trtokarachi);

                      trrecievedamount = $.trim($('.trrecievedamount').val());
                      trrecievedamount = parseInt(trrecievedamount==''?0:trrecievedamount);

                      trremainingamount = trvfrieght+trinam+trkanta+trcustom+trdehari+trshifting+trloading+tradvancecomission+trpendingcomission+trextraweight+trtokarachi+trrecievedamount;
                      after_subtract_advance_bilty = trremainingamount - trtotalamount;

                      detected_from_descrip_and_advance = parseInt($('.comisionsum').val())+parseInt(after_subtract_advance_bilty);
                      $('.trremainingamount').val(detected_from_descrip_and_advance);

                      if($('.trremainingamount').val() > 0)
                        {
                         $('.trpaymentstatus').val('Pending');
                        }
                        else if($('.trremainingamount').val() < 0)
                        {
                         $('.trpaymentstatus').val('Remaining');
                        }
                        else
                        {
                         $('.trpaymentstatus').val('Paid');
                        }

                      vfreight = $.trim($('.vfreight').val());
                      vfreight = parseInt(vfreight==''?0:vfreight);

                      frate = $.trim($('.frate').val());
                      frate = parseInt(frate==''?0:frate);

                      rvfrieght = $.trim($('.rvfrieght').val());
                      rvfrieght = parseInt(rvfrieght==''?0:rvfrieght);

                      ttddehari = $.trim($('.ttddehari').val());
                      ttddehari = parseInt(ttddehari==''?0:ttddehari);

                      ewfare = $.trim($('.ewfare').val());
                      ewfare = parseInt(ewfare==''?0:ewfare);

                      ttdshifting = $.trim($('.ttdshifting').val());
                      ttdshifting = parseInt(ttdshifting==''?0:ttdshifting);

                      ttdpointprize = $.trim($('.ttdpointprize').val());
                      ttdpointprize = parseInt(ttdpointprize==''?0:ttdpointprize);

                      ttdtotalincometwo = vfreight+frate+rvfrieght+ttddehari+ewfare+ttdshifting+ttdpointprize;

                      $('.ttdtotalincometwo').val(ttdtotalincometwo);
                }); 

                var ttdtyresell = 0;
                var ttdtotalincometie = 0;

                $('.ttdtyresell').keyup(function(){
                  ttdtyresell = $.trim($('.ttdtyresell').val());
                  ttdtyresell = parseInt(ttdtyresell==''?0:ttdtyresell);
                  
                  ttdtotalincometie = ttdtotalincometwo+ttdtyresell;

                  $('.ttdtotalincometwo').val(ttdtotalincometie);
                });

                $('.add_return').on('click',function(){
                  $('.add_returns').append('<div class="row"><div class="col-md-1"></div><div class="col-md-3"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">description</label><input type="text" class="form-control" name="toedescription[]" value=""></div></div><div class="col-sm-3 toeamountparent"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="number" class="form-control toeamount" name="toeamount[]" value=""></div></div><input type="hidden" class="form-control" name="toeidentity[]" value="return-0"><a href="#" class="remove_return my-2" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
                });

                //=========================================START OF DAILY DESCRIPTION AND AMOUNT 
                        var $tripform = $('#tripform');

                        $tripform.delegate('.toeamount', 'change', function (e)
                        {
                        comisionsumofreturn =parseInt($('.comisionsum').val());

                        e.stopImmediatePropagation();

                        totalofreturn = 0;
                        $('.toeamount').each(function(){

                        toeamountofreturn =  $.trim($(this).val());
                        toeamountofreturn = parseInt(toeamountofreturn==''?0:toeamountofreturn);
                        totalofreturn +=toeamountofreturn;
                        });

                        $('.comisionsum').val(totalofreturn);
                        remainingsreturn = parseInt($('.comisionsum').val())+parseInt(after_subtract_advance_bilty);



                        $('.trremainingamount').val(remainingsreturn);

                        });
                        // ========================================= BY REMOVING OTHER DESCRIPTION WIHT AMOUNT

                        $('div.add_returns').delegate('a.remove_return' ,'click', function(){
                        toeamountofreturn = $.trim($(this).siblings('.toeamountparent').find('input.toeamount').val());
                        toeamountofreturn = parseInt(toeamountofreturn==''?0:toeamountofreturn);
                        totalofreturn -=toeamountofreturn;
                        // alert(toeamountofother)
                        $('.comisionsum').val(totalofreturn);

                        remainingsreturn = parseInt(after_subtract_advance_bilty)+parseInt($('.comisionsum').val());
                        $('.trremainingamount').val(remainingsreturn);
                        $(this).parent('div.row').remove();

                        });
                        $('select.dailytriptruckid').change(function(){
                           id = $(this).children("option:selected").val();
                            // alert(id);
                            cudate = $('.currentdate').val();
                            // alert(cudate);
                            var url = base_url+'dailytrip/checkdateontruckatsamedate';
                            var redirect = base_url+'dailytrip/add_dailytrip';
                          // alert(url);
                            $.ajax({
                              url: url,
                              type: 'POST',
                              data: {id:id},
                              success:function(data){
                                
                               data = JSON.parse(data);
                               if(data.tdcurrentdate==0){
                              
                                
                               }else{
                                alert('Truck is already available on same date.');
                                window.location.assign(redirect);
                               }
                              }
                            });
                        });
//=======================================END OF RETURN TRIP INFORMATION=====================================

});