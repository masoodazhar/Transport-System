$(document).ready(function(){

var unform = $('.trremainingamount').val();
      $('#returnform').on('submit' , function(){
        if(unform > 0)
        {
          $('#retripremain').modal('show');
          return false;
        }
        else if(unform < 0)
        {
          $('#retripremain').modal('show');
          return false;
        }
        else
        {
          return true;
        }
      });

      var tremaining = $('#tremainingamount').val();
      $('#truckform').on('submit' , function(){
        if(tremaining > 0)
        {
          $('#truckremain').modal('show');
          return false;
        }
        else if(tremaining < 0)
        {
          $('#truckremain').modal('show');
          return false;
        }
        else
        {
          return true;
        }
      });

      //===================================START DAILY TRIP TRUCK VALIDATION FOR DISTINCT ENTRY===========================
$('.dailytriptruckid').change(function(){
    id = $(this).children("option:selected").val();
    // alert(id);
    cudate = $('.currentdate').val();
    // alert(cudate);
    var url = '<?= base_url()?>dailytrip/checkdateontruckatsamedate';
    var redirect = '<?= base_url()?>dailytrip/add_dailytrip';
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
//===================================END DAILY TRIP TRUCK VALIDATION FOR DISTINCT ENTRY===========================
//===================================START RETURN TRIP TRUCK VALIDATION FOR DISTINCT ENTRY===========================
$('.returntriptruckid').change(function(){
    id = $(this).children("option:selected").val();
    // alert(id);
    cudate = $('.currentdate').val();
    // alert(cudate);
    var url = '<?= base_url()?>returntrip/checkdateontruckatsamedate';
    var redirect = '<?= base_url()?>returntrip/add_returntrip';
  // alert(url);
    $.ajax({
      url: url,
      type: 'POST',
      data: {id:id},
      success:function(data){
        // alert(data);
       data = JSON.parse(data);
       if(data.trcurrentdate==0){
        
        
       }else{
        alert('Truck is already available on same date.');
        window.location.assign(redirect);
       }
      }
    });
});
//===================================END RETURN TRIP TRUCK VALIDATION FOR DISTINCT ENTRY===========================
//===================================START OTHER MATERIAL TRUCK VALIDATION FOR DISTINCT ENTRY===========================
$('.othermaterialtruckids').change(function(){
    var  id = $(this).children("option:selected").val();
  
    var url = '<?= base_url()?>material/checkdateontruckatsamedateinothermaterial';
    var redirect = '<?= base_url()?>material/add_material';
    
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

$('.mtrl').click(function(){
  window.location.assign('<?=base_url()?>material');
});
//===================================END OTHER MATERIAL TRUCK VALIDATION FOR DISTINCT ENTRY===========================
//=====================================START OF NOTIFICATON INFORMATION====================================
      $('.messageclass').click(function(){
        $(this).css({'background':'#cccc'});
        tnid = $(this).children('input').eq(0).val();
        category = $(this).children('input').eq(1).val();
        fromid = $(this).children('input').eq(2).val();
        tablename = $(this).children('input').eq(3).val();
        columname = $(this).children('input').eq(4).val();
        //alert(columname);
        urls = '<?php echo base_url(); ?>main/viewnotifications';
        
        
        // alert(url);
        $.ajax({
          url: urls,
          type: 'POST',
          data:{tnid:tnid, category:category, fromid:fromid, tablename:tablename, columname:columname},
          success:function(data){
            var datamessage = '';
          data =  JSON.parse(data);
          
            if(data[0].tncategory=='trip'){
              datamessage = 'in <b>Daily '+data[0].tncategory+'</b> you have to revieve amount <code> ('+data[0].ttdremainingamount+')</code> on dated: '+data[0].  ttdarrivaldate+'<br>';
            }else if(data[0].tncategory=='truck'){
              datamessage = 'in <b>'+data[0].tncategory+'</b> Service . you have to revieve amount <code> ('+data[0].tremainingamount+')</code> on dated: '+data[0].crnt_date+'<br>';
            }else if(data[0].tncategory=='othermaterial'){
              datamessage = 'in <b>'+data[0].tncategory+'</b> you have to revieve amount <code> ('+data[0].tomremainingamount+')</code> on dated: '+data[0].tompaymentdate+'<br>';
            }
          
           $('.displayMessage').html(datamessage);
          }
        });
      });
//=====================================END OF NOTIFICATON INFORMATION====================================
 
//=====================================START OF DAILY TRIP INFORMATION====================================
       var allfields =0;
       var tdvfrieght =0;
       var tdadvcomission =0;
       var tdpaidcomission =0;
       var tdpendcomission =0;
       var tdincometax =0;
       var tdunloading =0;
       var tdotherinfo =0;
       var tddehari =0;
       var advancebilty=0;
       var tdmushiana =0;
      $('.tdvfrieght, .tdadvcomission, .tdpaidcomission, .tdpendcomission, .tdincometax, .tdunloading, .tdotherinfo, .tddehari, .tdmushiana').keyup(function(){
        advancebilty = parseInt($('.tdtotalamount').val());

        tdvfrieght = $.trim($('.tdvfrieght').val());
        tdvfrieght = parseInt(tdvfrieght==""?0:tdvfrieght);

        tdadvcomission = $.trim($('.tdadvcomission').val());
        tdadvcomission = parseInt(tdadvcomission==""?0:tdadvcomission);

        tdpaidcomission = $.trim($('.tdpaidcomission').val());
        tdpaidcomission = parseInt(tdpaidcomission==""?0:tdpaidcomission);

        tdpendcomission = $.trim($('.tdpendcomission').val());
        tdpendcomission = parseInt(tdpendcomission==""?0:tdpendcomission);

        tdincometax = $.trim($('.tdincometax').val());
        tdincometax = parseInt(tdincometax==""?0:tdincometax);

        tdunloading = $.trim($('.tdunloading').val());
        tdunloading = parseInt(tdunloading==""?0:tdunloading);
        
        tdotherinfo = $.trim($('.tdotherinfo').val());
        tdotherinfo = parseInt(tdotherinfo==""?0:tdotherinfo);

        tddehari = $.trim($('.tddehari').val());
        tddehari = parseInt(tddehari==""?0:tddehari);
        
        allfields = tdvfrieght+tdadvcomission+tdpaidcomission+tdpendcomission+tdincometax+tdunloading+tdotherinfo+tddehari;
        
        remaining = advancebilty-allfields;
        
        tdmushiana = $.trim($('.tdmushiana').val());
        remaining = remaining-tdmushiana;
        $('.tdremainingamount').val(remaining);
      });

//=======================================END OF DAILY TRIP INFORMATION=====================================

//=====================================START OF RETURN TRIP INFORMATION====================================
       var ttlamount =0;
       var trvfrieght =0;
       var trbrokery =0;
       var tradvancecomission =0;
       var trpendingcomission =0;
       var trtaxamount =0;
       var trweighttax =0;
       var trdehari =0;
       var trtotalamount=0;
       var trloading =0;
       var trextraweight =0;
       var trtokarachi =0;

      $('.trvfrieght, .trbrokery, .tradvancecomission, .trpendingcomission, .trtaxamount, .trloading, .trweighttax, .trdehari, .trextraweight, .trtokarachi').keyup(function(){
        trtotalamount = parseInt($('.trtotalamount').val());

        trvfrieght = $.trim($('.trvfrieght').val());
        trvfrieght = parseInt(trvfrieght==""?0:trvfrieght);

        trbrokery = $.trim($('.trbrokery').val());
        trbrokery = parseInt(trbrokery==""?0:trbrokery);

        tradvancecomission = $.trim($('.tradvancecomission').val());
        tradvancecomission = parseInt(tradvancecomission==""?0:tradvancecomission);

        trpendingcomission = $.trim($('.trpendingcomission').val());
        trpendingcomission = parseInt(trpendingcomission==""?0:trpendingcomission);

        trtaxamount = $.trim($('.trtaxamount').val());
        trtaxamount = parseInt(trtaxamount==""?0:trtaxamount);

        trloading = $.trim($('.trloading').val());
        trloading = parseInt(trloading==""?0:trloading);
        
        trweighttax = $.trim($('.trweighttax').val());
        trweighttax = parseInt(trweighttax==""?0:trweighttax);

        trdehari = $.trim($('.trdehari').val());
        trdehari = parseInt(trdehari==""?0:trdehari);

        trextraweight = $.trim($('.trextraweight').val());
        trextraweight = parseInt(trextraweight==""?0:trextraweight);

        trtokarachi = $.trim($('.trtokarachi').val());
        trtokarachi = parseInt(trtokarachi==""?0:trtokarachi);
        
        ttlamount = trvfrieght+trbrokery+tradvancecomission+trpendingcomission+trtaxamount+trloading+trweighttax+trdehari+trextraweight+trtokarachi;
        
        remaining = trtotalamount-ttlamount;
        
        $('.trrecievedamount').val(remaining);

        $('.trrecievedamount').parent().addClass('is-filled');

        checkremaining = parseInt($('.trrecievedamount').val());
        $('.trpaymentstatus').parent().addClass('is-filled');
        if(checkremaining>0)
        {
          $('.trpaymentstatus').val('Pending');
        }
        else if(checkremaining<0)
        {
          $('.trpaymentstatus').val('Remaining');
        }
        else
        {
          $('.trpaymentstatus').val('Paid');
        }

      });

//=======================================END OF RETURN TRIP INFORMATION=====================================
 
//=====================================START OF DAILY TRIP INFORMATION====================================
      var allfields1 =0;
      var tomtotalamount=0;
      var tomvfrieght=0;
      var tomextrafareamount=0;
      var tomadvancecommission=0;
      var tomremainingcommission=0;
      var tomremainingfarepaid=0;
      var tomremainingamount=0;

      $('.tomvfrieght, .tomextrafareamount, .tomadvancecommission, .tomremainingcommission, .tomremainingfarepaid').keyup(function(){
        tomtotalamount = parseInt($('.tomtotalamount').val());

        tomvfrieght = $.trim($('.tomvfrieght').val());
        tomvfrieght = parseInt(tomvfrieght==""?0:tomvfrieght);

        tomextrafareamount = $.trim($('.tomextrafareamount').val());
        tomextrafareamount = parseInt(tomextrafareamount==""?0:tomextrafareamount);

        tomadvancecommission = $.trim($('.tomadvancecommission').val());
        tomadvancecommission = parseInt(tomadvancecommission==""?0:tomadvancecommission);

        tomremainingcommission = $.trim($('.tomremainingcommission').val());
        tomremainingcommission = parseInt(tomremainingcommission==""?0:tomremainingcommission);

        
        allfields1 = tomvfrieght+tomextrafareamount+tomadvancecommission+tomremainingcommission;
        
        remaining1 = tomtotalamount-allfields1;
        
        tomremainingfarepaid = $.trim($('.tomremainingfarepaid').val());
        remaining1 = remaining1-tomremainingfarepaid;
        $('.tomremainingamount').val(remaining1);
        $('.tomremainingamount').parent().addClass('is-filled');

        checkremaining = parseInt($('.tomremainingamount').val());
        $('.tompaymentstatus').parent().addClass('is-filled');
        if(checkremaining>0){
          $('.tompaymentstatus').val('Pending');
        }else{
          $('.tompaymentstatus').val('Paid');
        }
      });


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

        $('select.oilselect').change( function () {
          var method_Select = $(this).children("option:selected").val();
          // alert(method_Select);
          if(method_Select >= 1)
          {
           $('.tamount').show();
           $('.toltr').show();
           $('.tdate').show();
           $('.tpamount').show();
           $('.tramount').show();
          }

          else if(method_Select < 1)
          {
            $('.tamount').hide();
            $('.toltr').hide();
            $('.tdate').hide();
            $('.tpamount').hide();
            $('.tramount').hide();
          }
        });

        $('select.tyreselect').change( function () {
          var method_Select = $(this).children("option:selected").val();
          // alert(method_Select);
          if(method_Select >= 1)
          {
           $('.ttamount').show();
           $('.ttpair').show();
           $('.ttdate').show();
           $('.ttpamount').show();
           $('.ttramount').show();
          }

          else if(method_Select < 1)
          {
            $('.ttamount').hide();
            $('.ttpair').hide();
            $('.ttdate').hide();
            $('.ttpamount').hide();
            $('.ttramount').hide();
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

        $('.perprice').on('keyup',  function () {
          var qpair = $('.qpair').val();
          paid = $(this).val();
          $('.tprice').val(parseInt(qpair*paid));
          // alert(totalprice-paid);
        });

        $('.tototalprice').on('keyup',  function () {
          var quantity = $('.toquantity').val();
          tototalprice = $(this).val();
          $('.topricegallon').val(parseInt(tototalprice/quantity));
          // alert(totalprice-paid);
        });

        $('.opamount').on('keyup',  function () {
          var otamount = $('.otamount').val();
          paid = $(this).val();
          $('.oramount').val(parseInt(otamount-paid));
          // alert(totalprice-paid);
        });

        $('.tpaida').on('keyup',  function () {
          var ttotala = $('.ttotala').val();
          paid = $(this).val();
          $('.tremaina').val(parseInt(ttotala-paid));
          // alert(totalprice-paid);
        });

        $('.add_fields').on('click',function(){
          $('.add_field').append('<div class="row"><label class="col-sm-2 col-form-label">Description</label><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" name="toedescription[]"></div></div><label class="col-sm-2 col-form-label">Amount</label><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control toeamount" name="toeamount[]"></div></div></div>');
        });

         $('.add_returnother').on('click',function(){
          $('.add_returnothers').append('<div class="row"><label class="col-sm-2 col-form-label">Description</label><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" name="toedescription[]"></div></div><label class="col-sm-2 col-form-label">Amount</label><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control toeamount" name="toeamount[]"></div></div><label class="col-sm-1 col-form-label">Operator</label><div class="col-sm-2"><div class="form-group"><input type="text" class="form-control" name="toesign[]" value="" placeholder="+ Or -"></div></div><input type="hidden" class="form-control" name="toeidentity[]" value="remain-0"></div>');
        });

        $('select.fromcity').change(function(){
          $('.retocity').val($(this).val());
          var Selected = $(this).children("option:selected").val();
         // var values = $("select.tocity>option").map(function() { return $(this).val(); });
          
          $('select.tocity>option').each(function() {
           console.log(Selected);
           //console.log($(this).val());
              if ( $(this).val() == Selected ) {
                console.log($(this).children("option").find('[value="1"]').text());
              }
          });

        });
        
        $('select.tocity').change(function(){
          var id = $(this).val();
          $('.refromcity').val(id);
          $.ajax({
              url: "<?php echo base_url()?>trip/station",
              type: "POST",
              data: {myId:id},
              success: function(data)
              {
                // alert(data);
                parsed = JSON.parse(data);
                arra=[];
                 arra.push('<option value="0">Choose station</option>');
                $.each(parsed,function(s,data){
                  arra.push('<option value="'+data.tstid+'">'+data.tstname+'</option>');
                });
                // alert(arra);
                $('select.tostation').html(arra);
              }
          })
        });

          $('select.trucks').change(function(){
          var id = $(this).val();
          $.ajax({
              url: "<?php echo base_url()?>trip/material",
              type: "POST",
              data: {mId:id},
              success: function(data)
              {
                parsed = JSON.parse(data);
                if(parsed != '')
                {
                  $('.mtrl').val(' Yes');
                  $('.frate').val(parsed.tomvfrieght)
                  $('.ewfarehide').val(parsed.tomextrafareamount);
                }
                else
                {
                  $('.mtrl').val(' No');
                  $('.frate').val('0');
                  $('.ewfarehide').val('0');
                }
                // $('select.tostation').html(arra);
              }
          })
          $.ajax({
              url: "<?php echo base_url()?>trip/daily",
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
                $('.tostat').val(parsed.tstname);
                $('.vfreight').val(parsed.tdvfrieght);
                $('.ttddehari1').val(parsed.tddehari); 
                // arra=[];
                // $.each(parsed,function(s,data){
                //   arra.push();
                //   arra.push();
                  
                // });
              }
          })
        });

          $('.reamount').on('keyup keydown' , function(){
            ewfarehide = $.trim($('.ewfarehide').val());
            ewfarehide = parseInt(ewfarehide==""?0:ewfarehide);
            reamount = $.trim($(this).val());
            reamount = parseInt(reamount==""?0:reamount);
            var conti = ewfarehide+reamount;
            $('.ewfare').val(conti);
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

        $('.damount').on('keydown keyup',function(){
          var dltr = $('.dliter').val();
          var damnt = $(this).val();
          $('.dpliter').val(parseInt(damnt/dltr));
        });
        
        var vali='';
        var count=0;
        $('select.ab').change(function(){
          vali = $(this).val();
          var totalam = parseInt($('.atamount').val());
          var unload = $('#ttdunloadingamount').val() ;
            // alert(unload);
            unload = parseInt(unload==''?0:unload);
           count = 0;
          if(vali == 'pending')
          {
          
            var recieveam =  prompt('Recieved Amount');
            $('.hideamount').val(recieveam);
            $('.ramount').val(parseInt(totalam-recieveam+unload));
            $('.remainingpending').text('Recieveable Amount');
          }
          else if(vali == 'paid'){
              var advance =  prompt('Advance Amount');
              amount = totalam-parseInt(advance);
              $('.hideamount').val(advance);
              $('.ramount').val(parseInt(amount-unload));
              $('.remainingpending').text('Payable Amount');
          }
          else
          {
           
            $('.ramount').val(null);
            var totalam = $('.atamount').val();
            $('.ramount').val(parseInt(totalam+unload));
          }
          var remaining=0;

        });

count = 0;
          $('#ttdunloadingamount').keyup(function(){
               unload = $(this).val();
               unload = parseInt(unload==''?0:unload);
               if(count==0){
                 remaining = parseInt($('.ramount').val());
               }
           
               if(vali == 'paid' && remaining <0){
                
                $('.ramount').val(remaining+unload);
                $('.remainingpending').text('Payable Amount');
               
               }else{
                $('.ramount').val(remaining+unload);
                $('.remainingpending').text('Recieveable Amount');
               
               }
              
                remainingfortext = parseInt($('.ramount').val());
              if(remainingfortext<0){
                  $('.remainingpending').text('Payable Amount');
              }else{
                $('.remainingpending').text('Recieveable Amount');
              }

               count++;
              
               
          });
          // $('.ramount').live('change', function(){
          //   alert();
          // });


        $('#ttdtruckrent').keyup(function(){

            var totalam = $('.atamount').val();

            if(parseInt($(this).val())>totalam){
              $(this).val(totalam);
              alert('can not greater than total Amount');
            }

        });
        $('.atamount').on('keyup' , function(){
           var totalam = $(this).val();
           var unload = $('#ttdunloadingamount').val();
           var recieveam = $('.hideamount').val();
           $('.ramount').val(parseInt(totalam-recieveam+unload));
        });

        $('#ttdothermaterial').change(function(){
          if($(this).is(':checked')){
            $(this).val(1);
          }else{
            $(this).val(0);
          }
        });

        $('#ttdreturnstatus').change(function(){
          if($(this).is(':checked')){
            $(this).val(1);
            $('#tripreturn').modal('show');
          }
          else
          {
            $(this).val(0);
          }
        });

        

          // form suubmit fill model details
        // $('#tripform').submit(function(q){
          

        //   ramount = parseInt($('.ramount').val());
        //   trapdname = $('#trapdname').val();
        //   if(ramount!=0 && trapdname==''){
           
        //     $('#tripremainclick').click();
        //      return false;
        //   }else{
        //     return true;
        //   }
        // });

        //form suubmit fill model details
        // $('#truckform').submit(function(event){
        //   event.preventDefault();
        //   ramount = $('#tremainingamount').val();
        //   alert(ramount);
        //   trapdname = $('#trapdname').val();
        //   if(ramount > 0 && trapdname == '')
        //   {
        //     $('#truckremaining').click();
        //     return false;
        //   }
        //   else
        //   {
        //     return true;
        //   }
        // });

        
        $('select.paymethod').change(function(){
          var sel = $(this).val();
          if($(this).val() == 'installment')
          { 
            $('.tomremain_amount').show();
          }
          else
          {
            $('.tomremain_amount').hide();
          }
        });

        // $('.tripdetailtable').delegate('td', 'dblclick', function(){
        //   value = $(this).children('span').eq(1).text();
        //    $(this).children('span').eq(1).remove('');
        //    $(this).children('span').append('<input type="text" class="aftervlue" value="'+value+'">');
         
        // });
        // $('.aftervlue').live('change', function(){
        //  alert();
         
        // });

        $('#trapdcndate').on('change' , function(){
          if($(this).is(':checked'))
          {
            $('.trapdcndate').show();
          }
          else
          {
           $('.trapdcndate').hide(); 
          }
        });

      //=====================================START OF TRIP SUMMARY INFORMATION====================================
       var allfields2 =0;
       var ttdtmaintainance =0;
       var ttdcunloading =0;
       var ttdweightexpense =0;
       var ttdprizeamount =0;
       var ttdhohajijani =0;
       var ttdpolice =0;
       var ttdfoodexpense =0;
       var tohide = 0;
       var totalsum = 0;
       

      $('.ttdtmaintainance, .ttdcunloading, .ttdweightexpense, .ttdprizeamount, .ttdhohajijani, .ttdpolice, .ttdfoodexpense').keyup(function(){

        ttdtmaintainance = $.trim($('.ttdtmaintainance').val());
        ttdtmaintainance = parseInt(ttdtmaintainance==""?0:ttdtmaintainance);

        ttdcunloading = $.trim($('.ttdcunloading').val());
        ttdcunloading = parseInt(ttdcunloading==""?0:ttdcunloading);

        ttdweightexpense = $.trim($('.ttdweightexpense').val());
        ttdweightexpense = parseInt(ttdweightexpense==""?0:ttdweightexpense);

        ttdprizeamount = $.trim($('.ttdprizeamount').val());
        ttdprizeamount = parseInt(ttdprizeamount==""?0:ttdprizeamount);

        ttdhohajijani = $.trim($('.ttdhohajijani').val());
        ttdhohajijani = parseInt(ttdhohajijani==""?0:ttdhohajijani);

        ttdpolice = $.trim($('.ttdpolice').val());
        ttdpolice = parseInt(ttdpolice==""?0:ttdpolice);

        ttdfoodexpense = $.trim($('.ttdfoodexpense').val());
        ttdfoodexpense = parseInt(ttdfoodexpense==""?0:ttdfoodexpense);

        tohide = $.trim($('.tohide').val());
        tohide = parseInt(tohide==""?0:tohide);

        allfields2 = ttdtmaintainance+ttdcunloading+ttdweightexpense+ttdprizeamount+ttdhohajijani+ttdpolice+ttdfoodexpense+tohide;

         $('.ttl').val(allfields2);

      });

          var $form = $('#tripform');
      
          $form.delegate('.toeamount', 'change', function ()
          {
              var $summands = $form.find('.toeamount');
              var sum = 0;
              $summands.each(function ()
              {
                  var value = Number($(this).val());
                  if (!isNaN(value)) sum += value;
              });
              $('.tohide').val(sum);
              // alert(sum);
          });
          var $tohide = $('.tohide');
          $tohide.data("value", $tohide.val());

          setInterval(function() {
              var data = $tohide.data("value"),
                  val = $tohide.val();

              if (data !== val) {
                  $tohide.data("value", val);
                  $('.ttl').val(allfields2+parseInt($tohide.val()));
              }
          }, 100);
       
       var vpc1 = 0;
       var takehaji = 0;
       var credit = 0;
       var ttlincome = 0;
       var returnamount = 0;
       var remainrate = 0;
       var advancevpa = 0;
       var advdriver = 0;

      $('.vpc, .creditamount, .takehaji , .returnamount , .remainrate').keyup(function(){

        vpc1 = $.trim($('.vpc').val());
        vpc1 = parseInt(vpc1==""?0:vpc1);

        takehaji = $.trim($('.takehaji').val());
        takehaji = parseInt(takehaji==""?0:takehaji);

        creditamount = $.trim($('.creditamount').val());
        creditamount = parseInt(creditamount==""?0:creditamount);

        ttlincome = vpc1+takehaji+creditamount;
        $('.ttlincome').val(ttlincome);

        returnamount = $.trim($('.returnamount').val());
        returnamount = parseInt(returnamount==""?0:returnamount);

        remainrate = ttlincome-allfields2-returnamount;
        $('.remainrate').val(remainrate);

        advdriver = remainrate-30000;

        $('.advdriver').val(advdriver);

      });

      var totalexpense = 0;
      var oil = 0;
      var brokery = 0;
      var truckservice = 0;
      var daccount = 0;
      var dmedicine = 0;
      var damount = 0;
      var dother = 0;

      $('.ttdtmaintainance, .ttdtruckservice, .ttdoilamount, .ttdbrokery, .ttdweightexpense, .ttdprizeamount, .ttdpolice, .ttdfoodexpense,.ttddaccount, .ttddmedicine, .ttdinam, .ttddother, .damount').keyup(function(){

        oil = $.trim($('.ttdoilamount').val());
        oil = parseInt(oil==""?0:oil);

        brokery = $.trim($('.ttdbrokery').val());
        brokery = parseInt(brokery==""?0:brokery);

        truckservice = $.trim($('.ttdtruckservice').val());
        truckservice = parseInt(truckservice==""?0:truckservice);

        daccount = $.trim($('.ttddaccount').val());
        daccount = parseInt(daccount==""?0:daccount);

        dmedicine = $.trim($('.ttddmedicine').val());
        dmedicine = parseInt(dmedicine==""?0:dmedicine);

        damount = $.trim($('.damount').val());
        damount = parseInt(damount==""?0:damount);

        dother = $.trim($('.ttddother').val());
        dother = parseInt(dother==""?0:dother);

        inam = $.trim($('.ttdinam').val());
        inam = parseInt(inam==""?0:inam);

        totalexpense = oil+brokery+truckservice+daccount+dmedicine+damount+dother+inam+ttdtmaintainance+ttdweightexpense+ttdprizeamount+ttdpolice+ttdfoodexpense;

        $('.totalexpense').val(totalexpense);

      });

      var totalincomes = 0;

      $('.ttdpointprize , .ewfare , .ttddehari , .ttddehari1 , .frate , .rvfrieght , .vfreight').keyup(function(){

        ttddehari = $.trim($('.ttddehari').val());
        ttddehari = parseInt(ttddehari==""?0:ttddehari);

        ttddehari1 = $.trim($('.ttddehari1').val());
        ttddehari1 = parseInt(ttddehari1==""?0:ttddehari1);

        frate = $.trim($('.frate').val());
        frate = parseInt(frate==""?0:frate);

        rvfrieght = $.trim($('.rvfrieght').val());
        rvfrieght = parseInt(rvfrieght==""?0:rvfrieght);

        vfreight = $.trim($('.vfreight').val());
        vfreight = parseInt(vfreight==""?0:vfreight);        

        totalincomes = ttddehari+ttddehari1+ewfare+ttdpointprize+frate+rvfrieght+vfreight;

        $('.totalincome').val(totalincomes);

      });
        
        //=======================================END OF TRIP SUMMARY INFORMATION=====================================
  
});