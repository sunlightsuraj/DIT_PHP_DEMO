<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 4/1/15
 * Time: 7:34 AM
 */
?>
<script type="text/javascript">
    $(function() {
        $( ".datepicker" ).datepicker({
            dateFormate: "yy-mm-dd"
        });
    });

    function status_post(frm,evnt){
        evnt.preventDefault();
        var msg;
        msg = frm.status.value;
        if(msg != '' && msg != null){
            $.post('status_post.php',{'status':msg},function(response){
                if(response != ''){
                    $("#status_list").prepend(response);
                    frm.status.value = '';
                }
            },'html');
        }
    }

    $(document).ready(function () {
        $(".status_like").click(function (event) {
            event.preventDefault();
            var status = $(this).attr("data-value");
            $.post('status_like_comment.php',{'status':status,'type':'like'}, function (response) {
                $("#s_l_"+status).html(response);
            });
        });
    });
</script>
</body>
</html>