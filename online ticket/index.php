
<html>
<head><title> Entry site   </title>

    <link rel="stylesheet" type="text/css" href="mycss.css">
    <?php include ("head.php");?>
</head>
<body>
<div class="row">
    <h1 class="col-md-12 index_main" style="font-size:250%;color: darkgray;"><b>Welcome to the BANGU Travels</b></h1>
</div>

<div class="row">
    <div class="col-md-8">

            <div class="index_left" >
                <b><p style="font-size:160%;color: #9cc1ff;"> “Travel doesn't become adventure until you leave yourself behind”</p></b> <br/>
                <b><p style="color:lightgoldenrodyellow;">“We travel not to escape life but for life not to escape us.”</p></b><br/>
                <b><p style="font-size:160%;color: #9cc1ff;">“It is not the destination where you end up but the mishaps and memories you create along the way.”</p></b><br/>
                <b><p align="left" style="color:darkgoldenrod;"> “Travel doesn't become adventure until you leave yourself behind”</p></b><br/>
                <b><p style="font-size:160%; color:darkgoldenrod;">“Stop worrying about the potholes in the road and enjoy the journey”</p></b>

            </div>

    </div>
    <div class="col-md-4">
        <!--Accordion wrapper-->
        <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

            <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingTwo">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h5 class="mb-0">
                            Sign UP <i class="fa fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
                    <div class="card-body">
                        <form  action="signup.php" method="post">
                            <p class="h4 text-center mb-4">Register</p>

                            <!-- Default input email -->
                            <label for="defaultFormLoginEmailEx" class="grey-text">Username</label>
                            <input type="text" id="defaultFormLoginEmailEx" class="form-control" name="Username" placeholder="Username" required/>
                            <br>
                            <!-- Default input password -->
                            <label for="defaultFormLoginEmailEx" class="grey-text">Email</label>
                            <input type="email" id="defaultFormLoginEmailEx" class="form-control" name="email" placeholder="email" required />
                            <br>
                            <label for="defaultFormLoginPasswordEx" class="grey-text">password</label>
                            <input type="password" id="defaultFormLoginPasswordEx" class="form-control" name="Password" placeholder="Password" required />
                            <br>
                            <!-- Default input password -->
                        <label for="defaultFormLoginPasswordEx" class="grey-text">Verify password</label>
                            <input type="password"  class="form-control" name="RE_Pass" placeholder="Re-enter Password" required >

                            <div class="text-center mt-4">
                                <button class="btn btn-indigo" type="submit" name="submit" >Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Accordion card -->
            <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingOne">
                    <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h5 class="mb-0">
                            Login <i class="fa fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx" >
                    <div class="card-body">
                        <!-- Default form login -->
                        <form  action="log.php" method="post">
                            <p class="h4 text-center mb-4">Sign in</p>

                            <!-- Default input email -->
                            <label for="defaultFormLoginEmailEx" class="grey-text">Your email</label>
                            <input type="email" id="defaultFormLoginEmailEx" class="form-control" name="Email" placeholder="email" required />

                            <br>

                            <!-- Default input password -->
                            <label for="defaultFormLoginPasswordEx" class="grey-text">Your password</label>
                            <input type="password" id="defaultFormLoginPasswordEx" class="form-control" name="Password" placeholder="Password" required >

                            <div class="text-center mt-4">
                                <button class="btn btn-indigo" type="submit" name="submit" >Login</button>
                            </div>
                            <div class="text-right mt-4">
                                <a  href="forgot.php"><u>Forgot password?Click here<u></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        </div>
</div>

<?php include ("bootstrapScript.php");?>
</body>
</html>