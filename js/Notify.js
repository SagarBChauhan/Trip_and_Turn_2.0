
    $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function progress(start_state, start_msg, end_state, end_msg , exit_status){
    var notify = $.notify('<strong>'+start_state+'</strong> '+start_msg+'..', {
	allow_dismiss: false,
	showProgressbar: true
    });

    setTimeout(function() {
            notify.update({'type': exit_status, 'message': '<strong>'+end_state+'</strong> '+end_msg+'!', 'progress': 25});
    }, 4500);
    }
    //progress('Loading','Loading your profile please do not close','Almost done','Thanks for waiting','success' )

//      $.notify({
//                icon:'<?php echo $_SESSION['dp'];?>',
//                title: 'sss',
//                message:'message'
//        },{
//                type: 'minimalist',
//                delay: 5000,
//                animate: {
//                    enter: 'animated fadeInDown',
//                    exit: 'animated fadeOutUp'
//            },
//                icon_type: 'image',
//                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
//                        '<img data-notify="icon" class="img-circle rounded-circle pull-left">' +
//                        '<span data-notify="title">{1}</span>' +
//                        '<span data-notify="message">{2}</span>' +
//                '</div>'
//        });
//

        function profile(ic,ti,msg,bgColor,color,ur,tar){
        $(document).ready(function() {
            setTimeout(function() {
        $.notify({
                // options
                icon: ic,
                title: ti,
                message: msg,
        //	url: ur,
                target: tar
        },{
                // settings
                element: 'body',
                position: null,
                type: "info",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                        from: "top",
                        align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'image',
                template: '<div data-notify="container" class="col-xs-11 bg-'+bgColor+' text-'+color+' col-sm-3 alert alert-{0}" style="background:'+bgColor+';" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close text-light" data-notify="dismiss">×</button>' +
                        '<img data-notify="icon" class="shadow  img-circle rounded-circle pull-left" style="height:50px; width:50px; object-fit:cover;"> <span class="ml-3" data-notify="title">{1}</span><br><hr>' +
                        '<span data-notify="message">{2}</span>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>' 
        });
            },0);
        });
        }
        //profile('<?php echo "upload/Image/dp/default-avatar.png";?>','Sagar','Please update your profile picture','primary','light','localhost','_blank')

        function profile_Upload_alert(ic,ti,msg,ur,tar,bgColor,color){
        $(document).ready(function() {
            setTimeout(function() {
        $.notify({
                // options
                icon: ic,
                title: ti,
                message: msg,
        //	url: ur,
                target: tar
        },{
                // settings
                element: 'body',
                position: null,
                type: "info",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                        from: "top",
                        align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'image',
                template: '<div data-notify="container" class="col-xs-11 bg-'+bgColor+' text-'+color+' col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close text-light" data-notify="dismiss">×</button>' +
                        '<img data-notify="icon" class="shadow  img-circle rounded-circle pull-left" style="height:50px; width:50px; object-fit:cover;"> <span class="ml-3" data-notify="title">{1}</span><br><hr>' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        '<button type="button" aria-hidden="true" class="ml-3 hidden mt-3 btn btn-warning" data-notify="dismiss" data-toggle="modal" data-target="#dpModel">Update</button>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>' 
        });
            },0);
        });
        };
        //profile_Upload_alert('<?php echo "upload/Image/dp/default-avatar.png";?>','Sagar','Please update your profile picture','localhost','_blank','primary','light')
        
        function en(ic,ti,msg,ur,tar,bgColor,color){
        $(document).ready(function() {
            setTimeout(function() {
        $.notify({
                // options
                icon: ic,
                title: ti,
                message: msg,
        //	url: ur,
                target: tar
        },{
                // settings
                element: 'body',
                position: null,
                type: "info",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: false,
                placement: {
                        from: "top",
                        align: "right"
                },
                offset: 20,
                spacing: 10,
                z_index: 1031,
                delay: 5000,
                timer: 1000,
                url_target: '_blank',
                mouse_over: null,
                animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                },
                onShow: null,
                onShown: null,
                onClose: null,
                onClosed: null,
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 bg-'+bgColor+' text-'+color+' col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close text-light" data-notify="dismiss">×</button>' +
                        '<i class="material-icons text-white">'+ic+'</i> ' +
                        '<span data-notify="title" style="font-weight:bold;">{1}</span><hr> ' +
                        '<i class="fas fa-comment-dots text-light"></i><span data-notify="message">{2}</span>' +
                        '<a href="Enquiry_Manager.php" aria-hidden="true" class="ml-3  mt-3 btn btn-secondary btn-round text-dark" data-notify="dismiss" >Show</a>' +
                        '<div class="progress" data-notify="progressbar">' +
                        '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>' 
        });
            },0);
        });
        }
        //en('<?php echo "upload/Image/dp/default-avatar.png";?>','Sagar','Please update your profile picture','localhost','_blank','primary','light')
        
        

