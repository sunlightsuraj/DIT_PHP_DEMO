<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="generator" content="Bootply" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->

<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script src="js/jquery.form.min.js"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function submit_form(frm,event,target){
        //function to submit form
        event.preventDefault();
        var options = {
            target: target,    // target element(s) to be updated with server response
            //beforeSubmit:  alert('submitting'),  // pre-submit callback
            //success:       alert('success'),  // post-submit callback
            resetForm: true        // reset the form after successful submit
        };
        $(frm).ajaxSubmit(options);
        // always return false to prevent standard browser submit and page navigation
        return false;
    }

    function userinfo(url,args,target,event){
        if(event != null && event != ''){
            event.preventDefault();
        }
        $.post(url,args)
            .done(function(response){
                if(target != null && target != ''){
                    $(target).hide("slide",{direction: "left"},100,function(){
                        $(target).html(response);
                        $(target).show("slide",{direction: "right"},100);
                    });
                }
            });
    }
</script>
<!-- CSS code from Bootply.com editor -->

<style type="text/css">
    .navbar-static-top {
        margin-bottom:20px;
    }

    i {
        font-size:16px;
    }

    .nav > li > a {
        color:#787878;
    }

    footer {
        margin-top:20px;
        padding-top:20px;
        padding-bottom:20px;
        background-color:#efefef;
    }

    /* count indicator near icons */
    .nav>li .count {
        position: absolute;
        bottom: 12px;
        right: 6px;
        font-size: 10px;
        font-weight: normal;
        background: rgba(51,200,51,0.55);
        color: rgba(255,255,255,0.9);
        line-height: 1em;
        padding: 2px 4px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        -ms-border-radius: 10px;
        -o-border-radius: 10px;
        border-radius: 10px;
    }

    /* indent 2nd level */
    .list-unstyled li > ul > li {
        margin-left:10px;
        padding:8px;
    }

    .glyp-point {
        cursor: pointer;
    }

    #stuff1 {
      background: rgb(170, 187, 97);
        background: rgba(170, 187, 97, 0.5);
       /* background: none repeat scroll 0 0 #FFFFFF;
        border-radius: 10px 10px 10px 10px;
        clear: both;
        margin-top: 20px;
        margin-left:5%;
        margin-right:5%;
        opacity: 0.8;
        overflow: hidden;
        padding: 40px 20px 0;
        width: 900px;*?
    }
</style>

