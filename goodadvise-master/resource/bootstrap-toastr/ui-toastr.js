var UIToastr = function () {

    return {
        //main function to initiate the module
        init: function ( type,title, msg ) {
			

            var i = -1,
                toastCount = 0,
                $toastlast;

           // $('#showtoast').click(function (msg, title, type) {
                var shortCutFunction = type;
               // var msg = $('#message').val();
                //var title = $('#title').val() || '';
                var $showDuration = 1000;//$('#showDuration');
                var $hideDuration = 1000;//$('#hideDuration');
                var $timeOut = 5000;//$('#timeOut');
                var $extendedTimeOut = 1000;//$('#extendedTimeOut');
                var $showEasing ='swing';// $('#showEasing');
                var $hideEasing = 'linear';//$('#hideEasing');
                var $showMethod ='fadeIn';//$('#showMethod');
                var $hideMethod = 'fadeOut';//$('#hideMethod');
                var toastIndex = toastCount++;

                toastr.options = {
                    closeButton: true,
                    debug: false,
                    positionClass:  'toast-top-right',
                    onclick: null
                };

               

             
            //    $("#toastrOptions").text("Command: toastr[" + shortCutFunction + "](\"" + msg + (title ? "\", \"" + title : '') + "\")\n\ntoastr.options = " + JSON.stringify(toastr.options, null, 2));

                var $toast = toastr[shortCutFunction](msg, title); // Wire up an event handler to a button in the toast, if it exists
                $toastlast = $toast;
                if ($toast.find('#okBtn').length) {
                    $toast.delegate('#okBtn', 'click', function () {
                        alert('you clicked me. i was toast #' + toastIndex + '. goodbye!');
                        $toast.remove();
                    });
                }
                if ($toast.find('#surpriseBtn').length) {
                    $toast.delegate('#surpriseBtn', 'click', function () {
                        alert('Surprise! you clicked me. i was toast #' + toastIndex + '. You could perform an action here.');
                    });
                }

                $('#clearlasttoast').click(function () {
                    toastr.clear($toastlast);
                });
          //  });
           // $('#cleartoasts').click(function () {
//                toastr.clear();
//            });

        }

    };

}();