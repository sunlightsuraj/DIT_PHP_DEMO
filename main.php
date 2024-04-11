<?php
/**
 * Created by PhpStorm.
 * User: abc
 * Date: 4/1/15
 * Time: 7:27 AM
 */

if(isset($_SESSION['SESS_USERID']) && isset($_SESSION['SESS_USERID']) != ''){
    ?>
    <!--<div class="container">
        <div class="page-wrapper">-->
            <div class="col-md-2 col-lg-2">



            </div>
            <div class="col-md-7 col-lg-7">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="post" onsubmit="status_post(this,event);">
                            <div class="row">
                                <div class="col-md-10 col-lg-10">
                                    <textarea name="status" class="form-control"></textarea>
                                </div>
                                <div class="col-md-1 col-lg-1">
                                    <button type="submit" class="btn btn-default btn-sm">Post</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div id="status_list">
                    <?php
                    require_once('status_list.php');
                    ?>
                </div>
            </div>
            <div class="col-md-3 col-lg-3">

            </div>
        <!--</div>
    </div>-->
<?php
}