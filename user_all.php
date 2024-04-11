<!DOCTYPE html>
<html lang="en">
<head>
    <title>User</title>
    <?php
    include('head.php');
    ?>
</head>
<body>
<div class="container">
    <div class="body-wrapper" id="user_list">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    User List
                </h4>
            </div>
            <div class="list-group" id="user-tab">
                <?php
                include('user_all_list.php');
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>