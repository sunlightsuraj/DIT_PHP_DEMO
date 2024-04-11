<div class="container">
    <div class="body-wrapper" style="margin: 5% 30% 0 30%">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    Create New Account
                </h4>
            </div>
            <div class="panel-body">
                <form method="post" action="user_registration.php">
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <label>First Name</label>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            <input type="text" name="f_name" class="form-control">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <label>Last Name</label>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            <input type="text" name="l_name" class="form-control">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <label>Gender</label>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            <select name="gender" class="form-control">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <label>User Name</label>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            <input type="text" name="user_name" class="form-control">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <label>Password</label>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            <input type="password" name="pass" class="form-control">
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-5 col-md-5">
                            <label>Confirm Password</label>
                        </div>
                        <div class="col-sm-7 col-md-7">
                            <input type="password" name="c_pass" class="form-control">
                        </div>
                    </div><br>
                    <button class="btn btn-primary btn-block pull-right">Sign Up</button>
                </form>
            </div>
        </div>
    </div>
</div>