/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function glyphicon_delete_click_forpackage(obj)
{



    selected_edit_id = obj.attr("alt");






}
function packageinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
       
        calltheiosloadingoverlay();
         var fd = new FormData(document.getElementById("packageupdateform"));
        var subscription_package_name = $("#packagename").val();

            
          
            

            var frequency = $("#frequency").val();
            var service_id = $("#serviceid").val();
            var secret = $("#secret").val();
            var time = $("#packagetime").val();
            var no_of_contents=$("#packagenoofcontents").val();
          var day_of_week='';
           var day_of_month='';
            if (frequency == 'weekly' )
            {
               day_of_week= $("#packageupdateday").val();
            }
            else if(frequency == 'monthly')
            {
                day_of_month=$("#packageupdatedayofmonth").val();
            }
           
var package_description=$("#packagedescription").val();
  fd.append('time', time);
            fd.append('subscription_package_name', subscription_package_name);
              fd.append('frequency', frequency);
              fd.append('service_id', service_id);
                fd.append('secret', secret);
                 fd.append('day_of_week', day_of_week);
                  fd.append('day_of_month', day_of_month);
                   fd.append('package_description', package_description);
                    fd.append('no_of_contents', no_of_contents);

        $.ajax({
            url: baseurl + 'index.php/package/updatepackage/' + selected_edit_id,
            type: "post",
            data: fd,
            processData: false,
            contentType: false,
          success: function (msg)
                        {
                            datatableglobalobject.ajax.reload(  );
                        
                          $('.close').trigger('click');
overlayios.hide();
                          
                            showthemessagethecommonmethod(msg) ;
                            
                        },
                        error: function (a, b, c)
                        {
                             overlayios.hide();
                        iosOverlay({
		text: "Error!",
		duration: 2e3,
		icon: baseurl+"resource/iosoverlay/img/cross.png"
	});
                        }

                    });



       


    }

    return false;


}
function packageinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        calltheiosloadingoverlay();
         var fd = new FormData(document.getElementById("packageaddform"));
        var subscription_package_name = $("#packagename1").val();

            var frequency = $("#frequency1").val();
            var service_id = $("#serviceid1").val();
            var secret = $("#secret1").val();
            var time = $("#packagetime1").val();
            var package_description=$('#packagedescription1').val();
             var no_of_contents=$("#packagenoofcontents1").val();
          var day_of_week='';
           var day_of_month='';
            if (frequency == 'weekly' )
            {
               day_of_week= $("#packageaddday1").val();
            }
            else if(frequency == 'monthly')
            {
                day_of_month=$("#packageadddayofmonth1").val();
            }
             fd.append('time', time);
             fd.append('subscription_package_name', subscription_package_name);
              fd.append('frequency', frequency);
              fd.append('service_id', service_id);
                fd.append('secret', secret);
                 fd.append('day_of_week', day_of_week);
                  fd.append('day_of_month', day_of_month);
                   fd.append('package_description', package_description);
                     fd.append('no_of_contents', no_of_contents);
            $.ajax
                    ({
                        url: e.currentTarget.action,
                        type: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function (msg)
                        {
                            overlayios.hide();
                           
                                document.getElementById("packageaddform").reset();
                                document.getElementById("previewpackageicon1").src = "";

                                  $('#changeablepackageadd2').html('');
                                datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                           
                                showthemessagethecommonmethod(msg) ;
                                

                            

                        },
                        error: function (a, b, c)
                        {
                             overlayios.hide();
                        iosOverlay({
		text: "Error!",
		duration: 2e3,
		icon: baseurl+"resource/iosoverlay/img/cross.png"
	});
                        }

                    });


      

    }

    return false;

}
function glyphicon_edit_click_forpackage(obj)
{

//document.getElementById("lotteryeditform").reset();

    selected_edit_id = obj.attr("alt");

   
    $.ajax
            ({
                url: baseurl + 'index.php/package/editpackage/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    
                    $("#packagename").val(msg.subscription_package_name);
                    $("#frequency").val(msg.frequency);
                    $("#packagetime").val(msg.time);
                    $("#serviceid").val(msg.service_id);
                    $("#secret").val(msg.secret);
                     $("#packagedescription").val(msg.package_description);
                     $("#packagenoofcontents").val(msg.no_of_contents);
                     $("input[name='previouspackageicon']").val(msg.package_icon);
                      document.getElementById("previewpackageicon").src = "/sms_test/images/" + msg.package_icon;

                    
                   var newdiv='';
                   
                   if (msg.frequency == 'daily')
                    {
                       $('#changeablepackageupdate2').html('');
                    }
                    else if (msg.frequency == 'weekly')
                    {
                        
                       newdiv = '<label>Day</label><select id="packageupdateday" class="form-control" required><option value="sunday">Sunday</option><option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thrusday</option><option value="friday">Friday</option><option value="saturday">Saturday</option></select>';
          
            $('#changeablepackageupdate2').html(newdiv);
             $("#packageupdateday").val(msg.day_of_week);

                    }
                    else if (msg.frequency == 'monthly')
                    {
                          newdiv = '<label>Day of Month</label><select id="packageupdatedayofmonth" class="form-control" required><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option></select>';
          
            $('#changeablepackageupdate2').html(newdiv);
             $("#packageupdatedayofmonth").val(msg.day_of_month);
                    }



                }
            });




}
$( document ).ready(function() {
     $("#packageiconfile1").change(function () {
        readURL(this, 'previewpackageicon1');
    });
     $("#packageiconfile").change(function () {
        readURL(this, 'previewpackageicon');
    });
    $(".timepicker").datetimepicker(
                                     { format: "HH:mm:ss ", useSeconds: true, showMeridian:true, pickDate: false,   }
                                     ); 
    
    
      $("#frequency1").change(function () {
        if (document.getElementById('frequency1').value == 'weekly') {

            var newdiv = '<label>Day</label><select id="packageaddday1" class="form-control" required><option value="sunday">Sunday</option><option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thrusday</option><option value="friday">Friday</option><option value="saturday">Saturday</option></select>';
          
            $('#changeablepackageadd2').html(newdiv);
           
        }
     
        else if (document.getElementById('frequency1').value == 'daily')
        {
             
         
            //var newdiv1 = '<label> Daily Time</label> <div class="input-group date timepicker" > <input id="packagedailytime1" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>  </div>';
  //$('#changeablepackageadd1').html(newdiv1);
            // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeablepackageadd2').html('');
           
        }
        else if (document.getElementById('frequency1').value == 'monthly')
        {
             var newdiv = '<label>Day of Month</label><select id="packageadddayofmonth1" class="form-control" required><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option></select>';
          
            $('#changeablepackageadd2').html(newdiv);
        }
    });
    
     $("#frequency").change(function () {
        if (document.getElementById('frequency').value == 'weekly') {

            var newdiv = '<label>Day</label><select id="packageupdateday" class="form-control" required><option value="sunday">Sunday</option><option value="monday">Monday</option><option value="tuesday">Tuesday</option><option value="wednesday">Wednesday</option><option value="thursday">Thrusday</option><option value="friday">Friday</option><option value="saturday">Saturday</option></select>';
          
            $('#changeablepackageupdate2').html(newdiv);
           
        }
     
        else if (document.getElementById('frequency').value == 'daily')
        {
             
         
            //var newdiv1 = '<label> Daily Time</label> <div class="input-group date timepicker" > <input id="packagedailytime1" type="text" class="form-control" required/> <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span> </span>  </div>';
  //$('#changeablepackageadd1').html(newdiv1);
            // document.getElementById('changeableelementslotteryannouncmentadd1').innerHTML=newdiv; 
            $('#changeablepackageupdate2').html('');
           
        }
        else if (document.getElementById('frequency').value == 'monthly')
        {
             var newdiv = '<label>Day of Month</label><select id="packageupdatedayofmonth" class="form-control" required><option value="1">01</option><option value="2">02</option><option value="3">03</option><option value="4">04</option><option value="5">05</option><option value="6">06</option><option value="7">07</option><option value="8">08</option><option value="9">09</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option></select>';
          
            $('#changeablepackageupdate2').html(newdiv);
        }
    });
    
    $('#yesforpackage').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/package/deletepackage/' + selected_edit_id,
                    type: 'POST',
                    success: function (msg)
                    {
                      

datatableglobalobject.ajax.reload(  );
                        
                         $('.close').trigger('click');
                          overlayios.hide();
                        showthemessagethecommonmethod(msg) ;
                       


                    },
                    error: function (a, b, c)
                    {
                         overlayios.hide();
                        iosOverlay({
		text: "Error!",
		duration: 2e3,
		icon: baseurl+"resource/iosoverlay/img/cross.png"
	});
                    }

                });
    });
   
});




