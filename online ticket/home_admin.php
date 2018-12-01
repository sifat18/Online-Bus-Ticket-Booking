<?php
include 'c.php';
$count = mysqli_query($con, "select seat.bus_id,prefix,company_id,count(*) as total  from  bus inner join seat on bus.bus_id=seat.bus_id where Available='0'
 group by prefix order  by company_id;");
?>

<?php
if(isset($_POST["submit"])){
    $U=$_POST['U'];
    $type=$_POST['type'];
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];
    $RE_Pass=$_POST['RE_Pass'];
    if($Password==$RE_Pass){

    $query=mysqli_query($con,"insert into login(Username,Type,email,pass) VALUES('$U','$type','$Email','$Password')");
    if($query){
        echo $_SESSION['message']= "Success";
    }
    else{
        echo "fail query";
    }}
else {
        echo $_SESSION['message']= "Pass Mismatch.TRY AGAIN";
}
}
?>

<html>
<head><title> Admin panel </title>
    <?php include ("head.php");?>
</head>
<body >
<h1 align="center">welcome admin</h1>


<div class="col-md-4">
    <!--Accordion wrapper-->
    <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

        <div class="card">

            <!-- Card header -->
            <div class="card-header" role="tab" id="headingTwo">
                <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h5 class="mb-0">
                        Add new Company/Admin user<i class="fa fa-angle-down rotate-icon"></i>
                    </h5>
                </a>
            </div>

            <!-- Card body -->
            <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
                <div class="card-body">
                    <table align="center">
                        <form action="home_admin.php" method="post">

                            <tr><td>Add admin/company</td>
                                <td><select name="type">
                                        <option value="dq">Select</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Company">Company</option>
                                    </select></td>
                            </tr>
                            <tr><td>Username</td>
                                <td><input type="text" name="U" placeholder="Username"></td><br/>
                            </tr>
                            <tr><td>Email</td>
                                <td><input type="email" name="Email" placeholder="email"></td><br/>
                            </tr>
                            <tr><td>Password</td>
                                <td><input type="password" name="Password" placeholder="Password" required></td><br/>
                            </tr>
                            <tr><td>Verify Password</td>
                                <td><input type="password" name="RE_Pass" placeholder="Re-enter Password" required ></td><br/>
                            </tr><tr><td>&nbsp;</td>
                                <td><input  type="submit" name="submit" value="Add" ></td>
                            </tr>
                        </form >
                    </table>


                        </div>

                </div>
            </div>
        <div class="card">

            <!-- Card header -->
            <div class="card-header" role="tab" id="headingTwo">
                <a class="collapsed" data-toggle="collapse" href="#1" aria-expanded="false" aria-controls="1">
                    <h5 class="mb-0">
                       Seat Status<i class="fa fa-angle-down rotate-icon"></i>
                    </h5>
                </a>
            </div>

            <!-- Card body -->
            <div id="1" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
                <div class="card-body">
                    <div class="col-md-12">

                        <table border="10" cellpadding="8">
                            <td><h4 align="center">Seat status</h4></td>
                            <tr>
                                <th>Company_ID</th>
                                <th>Bus_ID</th>
                                <th>Seat</th>
                                <th>Total Available</th>
                            </tr>

                            <tr><?php
                                while($row=mysqli_fetch_array($count)):;    ?>
                                <td>  <?php echo $row["company_id"]; ?></td>
                                <td>  <?php echo $row["bus_id"]; ?></td>
                                <td>  <?php echo $row["prefix"]; ?></td>
                                <td>  <?php echo $row["total"]; ?></td>
                            </tr>
                            <?php endwhile;  ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>







        </div>
</div>




<table align="bottom" >
    <form action="sesion.php" method="post">
    <tr>
        <td align="bottom"><input align="bottom" type="submit" name="submit" value="Log out" ></td>
    </tr>
</form></table>
    <?php include ("bootstrapScript.php");?>
</body>
</html>

