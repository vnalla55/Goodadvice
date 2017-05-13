/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function glyphicon_delete_click_forpackagecontent(obj)
{



    selected_edit_id = obj.attr("alt");






}
function packagecontentinfoupdate(e) {
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
       
        calltheiosloadingoverlay();
            var subscription_package_id = $("#packagelistforpackagecontent").val();

            var subscription_package_content_title = $("#contenttitle").val();
            var subscription_package_content = $('#content').code();
           
            $.ajax
                    ({
                        url: baseurl + 'index.php/package/updatepackagecontent/' + selected_edit_id,
                        type: 'POST',
                        data: "subscription_package_id=" + subscription_package_id + "&subscription_package_content_title=" + subscription_package_content_title + "&subscription_package_content=" + subscription_package_content ,
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
function packagecontentinfoadd(e)
{
    e.preventDefault();

    if (xmlHttp.readyState == 0 || xmlHttp.readyState == 4) {
        calltheiosloadingoverlay();
       var subscription_package_id = $("#packagelistforpackagecontent1").val();

            var subscription_package_content_title = $("#contenttitle1").val();
            var subscription_package_content = $('#content1').code();
            $.ajax
                    ({
                        url: e.currentTarget.action,
                        type: 'POST',
                         data: "subscription_package_id=" + subscription_package_id + "&subscription_package_content_title=" + subscription_package_content_title + "&subscription_package_content=" + subscription_package_content ,
            success: function (msg)
                        {
                            overlayios.hide();
                           
                                document.getElementById("packagecontentaddform").reset();
                                 $('#content1').code('');
                                 
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
function glyphicon_edit_click_forpackagecontent(obj)
{

//document.getElementById("lotteryeditform").reset();

    selected_edit_id = obj.attr("alt");

   
    $.ajax
            ({
                url: baseurl + 'index.php/package/editpackagecontent/' + selected_edit_id,
                type: 'POST',
                dataType: 'json',
                success: function (msg)
                {
                    
                    $("#packagelistforpackagecontent").val(msg.	subscription_package_id);
                    $("#contenttitle").val(msg.subscription_package_content_title);
                    
                      $('#content').code(msg.subscription_package_content);


                }
            });




}
$( document ).ready(function() {
   
    
    
    
    $('#yesforpackagecontent').click(function () {
        // update the block message 
        calltheiosloadingoverlay();

        $.ajax
                ({
                    url: baseurl + 'index.php/package/deletepackagecontent/' + selected_edit_id,
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




