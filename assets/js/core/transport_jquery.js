// function abc()
//   {
//     var get = $('.arv').val();
//     $('.arive').val(get);
//   }

//   var myWindow;

//   function openWin(linke) {
//     myWindow = window.open(linke, "myWindow", "width=1000,height=1000");

//     console.log( myWindow.parent);
//   }
function id_to_windowname(text) {
  text = text.replace(/\./g, '__dot__');
  text = text.replace(/\-/g, '__dash__');
  return text;
}
function showAdminPopup(triggeringLink, name_regexp, add_popup) {
  var name = triggeringLink.id.replace(name_regexp, '');
  name = id_to_windowname(name);
  var href = triggeringLink.href;
  if (add_popup) {
      if (href.indexOf('?') === -1) {
          href += '?_popup=1';
      } else {
          href += '&_popup=1';
      }
  }
  var win = window.open(href, name, 'height=500,width=800,resizable=yes,scrollbars=yes');
  win.focus();
  return false;
}

// window.removeEventListener("message", receiveMessage);
function showRelatedObjectPopup(triggeringLink) {
  return showAdminPopup(triggeringLink, /^(change|add|delete)_/, false);
}

$(document).ready(function (){


 
  // $('.related-widget-wrapper-link').click(function(e) {
  //   e.preventDefault();
  //   // if (this.href) {
  //   //     var event = $.Event('django:show-related', {href: this.href});
  //   //     $(this).trigger(event);
  //   //     if (!event.isDefaultPrevented()) {
  //   //         showRelatedObjectPopup(this);
  //   //     }
  //   // }
  //   alert();
  // });

  $('body').delegate('.related-widget-wrapper-link','click', function(e) {
    e.preventDefault();
    if (this.href) {
        var event = $.Event('django:show-related', {href: this.href});
        $(this).trigger(event);
        if (!event.isDefaultPrevented()) {
            showRelatedObjectPopup(this);
           
        }
    }
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


        
	      $('#returnform').on('submit' , function(){
	      	var trapdname = $('.trapdname').val();
	        if($('.trremainingamount').val() > 0 && trapdname === '')
	        {
	          $('#retripremain').modal('show');
	          return false;
	        }
	        else
	        {
	          return true;
	        }
	      });

        //Add truck End///////////////////////////////////////////

        //Add tyre start////////////////

        $('.perprice').on('keyup',  function () {
          var qpair = $('.qpair').val();
          paid = $(this).val();
          $('.tprice').val(parseInt(qpair*paid));
          // alert(totalprice-paid);
        });

        //add tyre end////////////////

        //add oil start//////////////

        $('.tototalprice').on('keyup',  function () {
          var quantity = $('.toquantity').val();
          tototalprice = $(this).val();
          $('.topricegallon').val(parseInt(tototalprice/quantity));
          // alert(totalprice-paid);
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





      
//=====================================START OF DAILY TRIP INFORMATION====================================
      

      //  var allfields =0;
      //  var tdvfrieght =0;
      //  var tdadvcomission =0;
      //  var tdpaidcomission =0;
      //  var tdcustom =0;
      //  var tdincometax =0;
      //  var tdunloading =0;
      //  var tdinam =0;
      //  var tddehari =0;
      //  var tdemptycontainer =0;
      //  var tdmushiana =0;
      //  var tdrecieveamount =0;
      //  var advancebilty = 0;
      //  var remaining = 0;
      //  var comisionsum=0;
      //  var tdbrokery=0;

      // $('.tdvfrieght, .tdadvcomission, .tdbrokery, .tdtotalamount, .tdpendcomission, .tdcustom , .tdincometax, .tdunloading, .tdinam, .tddehari, .tdemptycontainer , .tdmushiana , .tdrecieveamount').keyup(function(){
        
      //   advancebilty = $.trim($('.tdtotalamount').val());
      //   advancebilty = parseInt(advancebilty==''?0:advancebilty);

      //   tdvfrieght = $.trim($('.tdvfrieght').val());
      //   tdvfrieght = parseInt(tdvfrieght==""?0:tdvfrieght);

      //   tdadvcomission = $.trim($('.tdadvcomission').val());
      //   tdadvcomission = parseInt(tdadvcomission==""?0:tdadvcomission);

      //   tdpendcomission = $.trim($('.tdpendcomission').val());
      //   tdpendcomission = parseInt(tdpendcomission==""?0:tdpendcomission);

      //   tdcustom = $.trim($('.tdcustom').val());
      //   tdcustom = parseInt(tdcustom==""?0:tdcustom);

      //   tdincometax = $.trim($('.tdincometax').val());
      //   tdincometax = parseInt(tdincometax==""?0:tdincometax);
        
      //   tdunloading = $.trim($('.tdunloading').val());
      //   tdunloading = parseInt(tdunloading==""?0:tdunloading);

      //   tdinam = $.trim($('.tdincometax').val());
      //   tdinam = parseInt(tdinam==""?0:tdinam);

      //   tddehari = $.trim($('.tddehari').val());
      //   tddehari = parseInt(tddehari==""?0:tddehari);

      //   tdemptycontainer = $.trim($('.tdemptycontainer').val());
      //   tdemptycontainer = parseInt(tdemptycontainer==""?0:tdemptycontainer );

      //   tdmushiana = $.trim($('.tdmushiana').val());
      //   tdmushiana = parseInt(tdmushiana==""?0:tdmushiana);

      //   tdrecieveamount = $.trim($('.tdrecieveamount').val());
      //   tdrecieveamount = parseInt(tdrecieveamount==""?0:tdrecieveamount);

      //   comisionsum = $.trim($('.comisionsum').val());
      //   comisionsum = parseInt(comisionsum==""?0:comisionsum);

      //   tdbrokery = $.trim($('.tdbrokery').val());
      //   tdbrokery = parseInt(tdbrokery==""?0:tdbrokery);
        
      //   allfields = tdvfrieght+tdadvcomission+tdpendcomission+tdcustom+tdincometax+tdunloading+tdinam+tddehari+tdemptycontainer+tdmushiana+tdrecieveamount+tdbrokery;
        
      //   remaining = advancebilty>0?advancebilty-allfields:allfields;
        
        
      //   $('.tdremainingamount').val(remaining-comisionsum);

      //   if(remaining > 0)
      //   {
      //   	$('.tdpaymentstatus').val('Pending');
      //   }
      //   else if(remaining < 0)
      //   {
      //   	$('.tdpaymentstatus').val('Remaining');
      //   }
      //   else
      //   {
      //   	$('.tdpaymentstatus').val('Paid');
      //   }
      // });


      // =========================== START AFTER PLUS SIGN CALCULATION ======================
          //     var $form = $('.comissionform');
      	  //     var rem_val = 0;
          //     var comisionsum = 0;
          //     var total = 0;
          //     var toeamount = 0;

          //     $form.delegate('.toeamount', 'change', function (e)
          //     {
          //       comisionsum =parseInt($('.comisionsum').val());

          //           e.stopImmediatePropagation();

          //           total = 0;
          //           $('.toeamount').each(function(){

          //            toeamount =  $.trim($(this).val());
          //            toeamount = parseInt(toeamount==''?0:toeamount);
          //            total +=toeamount;
          //           });

          //           $('.comisionsum').val(total);
                  
          //         remainings = parseInt(remaining)-parseInt($('.comisionsum').val());

                 

          //         $('.tdremainingamount').val(remainings);
          //         $('.trdateofpay').val(remainings);
          //         $('.trremainingamount').val(remaining);
              
          // });

          
      // =========================== END AFTER PLUS SIGN CALCULATION ======================
        
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
          $('.add_comissions').append('<div class="row"><div class="col-md-1"></div><div class="col-md-3"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">description</label><input type="text" class="form-control" name="toedescription[]" value=""></div></div><div class="col-sm-4 toeamountparent"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="number" class="form-control toeamount" name="toeamount[]" value=""></div></div><input type="hidden" class="form-control" name="toeidentity[]" value="comission-0"><a href="#" class="remove_comission my-2" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
        });
        // $('.add_comission').on('click',function(){
        //   $('.add_comissions').append('<div class="row"><div class="col-md-1"></div><div class="col-md-3"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">description</label><input type="text" class="form-control" name="toedescription[]" value=""></div></div><div class="col-sm-4 toeamountparent"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="number" class="form-control toeamount" name="toeamount[]" value=""></div></div><input type="hidden" class="form-control" name="toeidentity[]" value="comission-0"><a href="#" class="remove_comission my-2" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
        // });

//=======================================START REMOVING THE EXTRA TEXTBOX CALCULATION INFORMATION=====================================
     
      //  $('div.add_comissions').delegate('a.remove_comission' ,'click', function(){
      //     toeamount = $.trim($(this).siblings('.toeamountparent').find('input.toeamount').val());
      //     toeamount = parseInt(toeamount==''?0:toeamount);
      //     total -=toeamount;
      //     alert(toeamount)
      //     $('.comisionsum').val(total);
                  
      //   	remainings = parseInt(remaining)-parseInt($('.comisionsum').val());
      //     $('.tdremainingamount').val(remainings);
      //     $('.trdateofpay').val(remainings);
      //     $('.trremainingamount').val(remaining);
      //  		$(this).parent('div.row').remove();

      //  });

//=======================================END REMOVING THE EXTRA TEXTBOX CALCULATION INFORMATION=====================================
        
//=====================================START OF OTHER MATERIALS INFORMATION====================================
      
//                 var trtotalamount=0;
//                 var trdr= 0;
//                 var trzr=0;
//                 var trcheaque=0;

//                 var total_of_hj=0;
//                 var trzj = 0; // OFR ADDRETURN TRIM

//                 $('.trdr, .trzr, .trcheaque, .trzj').keyup(function(){
                  
//                       trtotalamount = parseInt($('.trtotalamount').val());
                      
//                       trzj = $.trim($('.trzj').val());
//                       trzj = parseInt(trzj==''?0:trzj);

                      
//                       trdr = $.trim($('.trdr').val());
//                       trdr = parseInt(trdr==''?0:trdr);

//                       trzr = $.trim($('.trzr').val());
//                       trzr = parseInt(trzr==''?0:trzr);

//                       trcheaque = $.trim($('.trcheaque').val());
//                       trcheaque = parseInt(trcheaque==''?0:trcheaque);

//                       total_of_hj = trdr+trzr+trcheaque+trzj;

//                       $('.trtotalamount').val(total_of_hj);

//                 });



//               var trvfrieght=0;
//               var trextraweight=0;
//               var tradvancecomission=0;
//               var trpendingcomission=0;
//               var trkanta=0;
//               var trotherinfo=0;
//               var trdehari=0;

//               var total_all=0;
//               var trrecievedamount=0;
//               var trdateofpay=0;
//               $('.trrecievedamount, .trvfrieght, .trextraweight, .tradvancecomission, .trpendingcomission, .trkanta, .trotherinfo, .trdehari').keyup(function(){
//                 trdateofpay = parseInt($('.trdateofpay').val());
//                 trtotalamount = parseInt($('.trtotalamount').val());

                
//                 trrecievedamount = $.trim($('.trrecievedamount').val());
//                 trrecievedamount = parseInt(trrecievedamount==''?0:trrecievedamount);


//                 trvfrieght = $.trim($('.trvfrieght').val());
//                 trvfrieght = parseInt(trvfrieght==''?0:trvfrieght);

//                 trextraweight = $.trim($('.trextraweight').val());
//                 trextraweight = parseInt(trextraweight==''?0:trextraweight);

//                 tradvancecomission = $.trim($('.tradvancecomission').val());
//                 tradvancecomission = parseInt(tradvancecomission==''?0:tradvancecomission);

//                 trpendingcomission = $.trim($('.trpendingcomission').val());
//                 trpendingcomission = parseInt(trpendingcomission==''?0:trpendingcomission);

//                 trkanta = $.trim($('.trkanta').val());
//                 trkanta = parseInt(trkanta==''?0:trkanta);

//                 trotherinfo = $.trim($('.trotherinfo').val());
//                 trotherinfo = parseInt(trotherinfo==''?0:trotherinfo);

//                 trdehari = $.trim($('.trdehari').val());
//                 trdehari = parseInt(trdehari==''?0:trdehari);

                
//                total_all = trvfrieght+trextraweight+tradvancecomission+trpendingcomission+trkanta+trotherinfo+trdehari+trrecievedamount;
//                remaining = trtotalamount-total_all;
//                $('.trdateofpay').val(remaining);

//               });



// //=====================================START OF OTHER MATERIALS INFORMATION====================================


// //=====================================START OF RETURN TRIP INFORMATION====================================

//                 var trvfrieght=0;
//                 var inam=0;
//                 var tradvancecomission=0;
//                 var trpendingcomission=0;
//                 var trkanta=0;
//                 var trincometax=0;
//                 var trdehari=0;

//                 var trshifting=0;
//                 var trloading=0;
//                 var trextraweight=0;
//                 var trtokarachi=0;


//                 var total_all=0;
//                 var trrecievedamount=0;
//                 var trremainingamount=0;
//                 $('.inam, .trincometax, .trrecievedamount, .trshifting,.trtokarachi, .trloading, .trvfrieght, .trextraweight, .tradvancecomission, .trpendingcomission, .trkanta, .trotherinfo, .trdehari').keyup(function(){
//                   trremainingamount = parseInt($('.trremainingamount').val());
//                   trtotalamount = parseInt($('.trtotalamount').val());

                  
//                   trrecievedamount = $.trim($('.trrecievedamount').val());
//                   trrecievedamount = parseInt(trrecievedamount==''?0:trrecievedamount);

//                   inam = $.trim($('.inam').val());
//                   inam = parseInt(inam==''?0:inam);

//                   trincometax = $.trim($('.trincometax').val());
//                   trincometax = parseInt(trincometax==''?0:trincometax);

//                   trshifting = $.trim($('.trshifting').val());
//                   trshifting = parseInt(trshifting==''?0:trshifting);

//                   trloading = $.trim($('.trloading').val());
//                   trloading = parseInt(trloading==''?0:trloading);

//                   trtokarachi = $.trim($('.trtokarachi').val());
//                   trtokarachi = parseInt(trtokarachi==''?0:trtokarachi);


                  
                 

//                   trvfrieght = $.trim($('.trvfrieght').val());
//                   trvfrieght = parseInt(trvfrieght==''?0:trvfrieght);

//                   trextraweight = $.trim($('.trextraweight').val());
//                   trextraweight = parseInt(trextraweight==''?0:trextraweight);

//                   tradvancecomission = $.trim($('.tradvancecomission').val());
//                   tradvancecomission = parseInt(tradvancecomission==''?0:tradvancecomission);

//                   trpendingcomission = $.trim($('.trpendingcomission').val());
//                   trpendingcomission = parseInt(trpendingcomission==''?0:trpendingcomission);

//                   trkanta = $.trim($('.trkanta').val());
//                   trkanta = parseInt(trkanta==''?0:trkanta);

//                   trotherinfo = $.trim($('.trotherinfo').val());
//                   trotherinfo = parseInt(trotherinfo==''?0:trotherinfo);

//                   trdehari = $.trim($('.trdehari').val());
//                   trdehari = parseInt(trdehari==''?0:trdehari);

                
                  
//                 total_all = trvfrieght+inam+trextraweight+tradvancecomission+trpendingcomission+trkanta+trincometax+trshifting+trloading+trtokarachi+trotherinfo+trdehari+trrecievedamount;
//                 remaining = trtotalamount-total_all;
//                 $('.trremainingamount').val(remaining);

//                 });
               


//=====================================END OF RETURN TRIP INFORMATION====================================

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

          $('#comissionform').on('submit' , function(){
          var trapdname = $('.trapdname').val();
          if($('.tdremainingamount').val() != 0 && trapdname === '')
          {
            $('#comissionremain').modal('show');
            return false;
          }
          else
          {
            return true;
          }
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

                        $('#parchoonform').on('submit' , function(){
                        var trapdname = $('#trapdname').val();
                        if($('.tomremainingamount').val() != 0 && trapdname === '')
                        {
                          $('#parchoonremain').modal('show');
                          return false;
                        }
                        else
                        {
                          return true;
                        }
                      });

        $('.add_parchoon').on('click',function(){
          $('.add_parchoons').append('<div class="row"><div class="col-md-1"></div><div class="col-md-3"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">description</label><input type="text" class="form-control" name="toedescription[]" value=""></div></div><div class="col-sm-3 toeamountparent"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="number" class="form-control toeamount" name="toeamount[]" value=""></div></div><input type="hidden" class="form-control" name="toeidentity[]" value="parchoon-0"><a href="#" class="remove_parchoon my-2" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
        });

//=====================================END OF OTHER INFORMATION====================================

//==================== START SUMMARRY JQUERY ====================////

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
                        $('.ttddehari').val(parsed.tddehari);
                        $('.dehariinitial').val(parsed.tddehari);
                        trdehari = $.trim($('.trdehari').val());
                        trdehari = parseInt(trdehari==''?0:trdehari);

                        dehariinitial = $.trim($('.dehariinitial').val());
                        dehariinitial = parseInt(dehariinitial==''?0:dehariinitial);

                        $('.ttddehari').val(dehariinitial+trdehari);
                        // $('.ttdshifting1').val(parsed.tddehari);
                        // $('.ttdpointprize1').val(parsed.tddehari); 
                        // arra=[];
                        // $.each(parsed,function(s,data){
                        //   arra.push();
                        //   arra.push();
                          
                        // });
                      }
                  })
                });


                $('.add_pump').on('click',function(){
                  $('.add_pumps').append('<div class="row"><div class="col-sm-1"></div><div class="col-sm-3"><div class="form-group">'+$('div.pmp').html()+'</div></div><div class="col-sm-2"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Diesel In liter</label><input type="Number" class="form-control" name="ttddieselliter"></div></div><div class="col-sm-2"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="Number" class="form-control" name="ttddieselprice"></div></div><div class="col-sm-3"><div class="form-group">'+$('.pmpstatus').html()+'</div></div><a href="#" class="remove_pump my-4" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
                });

                $('div.add_pumps').delegate('a.remove_pump' ,'click', function(){

                  $(this).parent('div.row').remove();

                });

                $('.add_voucher').on('click',function(){
                  $('.add_vouchers').append('<div class="row"><div class="col-md-1"></div><div class="col-md-3"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">description</label><input type="text" class="form-control" name="toedescription[]" value=""></div></div><div class="col-sm-3 toeamountparent"><div class="form-group"><label for="exampleEmail" class="bmd-label-floating text-uppercase">Amount</label><input type="number" class="form-control toeamount" name="toeamount[]" value=""></div></div><input type="hidden" class="form-control" name="toeidentity[]" value="voucher-0"><a href="#" class="remove_voucher my-2" title="Add new field"><i class="material-icons">remove_circle</i></a></div>');
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
            }
            else
            {
              $('.vpc').val(vpb);
            }
          });

            $('div.add_vouchers').delegate('a.remove_voucher' ,'click', function(){
              $(this).parent('div.row').remove();

            });

          $('#tripform').on('submit' , function(){
          var trapdname = $('#trapdname').val();
          if($('.trremainingamount').val() != 0 && trapdname === '')
          {
            $('#retripremain').modal('show');
            return false;
          }
          else
          {
            return true;
          }
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

//=======================================END OF RETURN TRIP INFORMATION=====================================

});