<!--connection to db -->
<?php
session_start();
$Email=$_SESSION['email'];
include 'c.php';

error_reporting(E_PARSE | E_ERROR);
?>
<?php
$f=mysqli_query($con,"select * from login where email='$Email'");
$ff=mysqli_fetch_array($f);
$CoID=$ff['Uid'];
$count = mysqli_query($con, "select seat.bus_id,prefix,count(*) as total  from  bus inner join seat on bus.bus_id=seat.bus_id where Available='0' and
company_id='$CoID' group by prefix order  by bus_id;");
?>
<!--<!--posting from cmt to insert to employee table-->
<?php
/*if(isset($_POST["sd"])){
    $em=$_POST['em'];
    $cn=$_POST['Cn'];
    $qs = mysqli_query($con,"insert into employee(Name,mobile) VALUES('$em','$cn')");
    if($qs) {
        header("Location:cmt.php");
    }
    else {
        echo "fail employee query";
    }}
*/?>
<!--inserting Bus data to multiple table from the cmt page-->
<?php
$f=mysqli_query($con,"select * from login where email='$Email'");
$ff=mysqli_fetch_array($f);
$Name=$ff['Username'];
$CoID=$ff['Uid'];
$i=1;
$po=5;
    if(isset($_POST["submit"])){
    $bid=$_POST['BID'];
    $bus_id=$_POST['BuID'];
    $li=$_POST['Li'];
    $type=$_POST['type'];
    $pre=$_POST['Pre'];
    $RN=$_POST['route'];
    $Time=$_POST['time'];
        $date=$_POST['date'];
    $pri=$_POST['p'];

    $query=mysqli_query($con,"insert into company(company_id,Name,business_id) VALUES('$CoID','$Name','$bid')");
    $q5 = mysqli_query($con,"insert into route(Name,time,date) VALUES('$RN','$Time','$date')");
    $q2 = mysqli_query($con, "insert into bus(bus_id,License,TYPE,company_id,price) VALUES('$bus_id','$li','$type','$CoID','$pri')");
        while($i<=$po){
            $q3 = mysqli_query($con, "insert into seat(bus_id,prefix,postfix) VALUES('$bus_id','$pre','$i')");
            $i=$i+1;
        }
    $q4 = mysqli_query($con, "insert into travel(bus_id,Name,time,date) VALUES('$bus_id','$RN','$Time','$date')");
    if($q2 && $q4 && $q5) {

                header("Location:cmt.php");
        echo "Succcesful registry";
            }
            else {
                    echo "fail Bus query";
                }}
?>


<html>
<head><title> Company panel </title>
    <?php include ("head.php");?>
</head>

<h1 align="center">welcome company</h1>
<div class="row">
    <div class="col-md-3">

<!--Accordion wrapper-->
<div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="false">

    <!-- Accordion card -->
    <div class="card">

        <!-- Card header -->
        <div class="card-header" role="tab" id="headingOne">
            <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                <h5 class="mb-0">
                    ADD NEW BUS DETAILS <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>

        <!-- Card body -->
        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx" >
            <div class="card-body">

                <table>
                    <form action="cmt.php" method="post">
                        <tr><td>Business_ID</td>
                            <td><input type="text" name="BID" placeholder="BID"></td><br/>
                        </tr>
                        <tr><td>New BusID</td>
                            <td><input type="number" min="1" max="99999" maxlength="5" name="BuID" placeholder="BusID" required ></td><br/>
                        </tr>
                        <tr><td>License</td>
                            <td><input type="text" name="Li" placeholder="License"></td><br/>
                        </tr>
                        <tr><td>Type</td>
                            <td><select name="type">
                                    <option value="dq">Select</option>
                                    <option value="AC">AC</option>
                                    <option value="Non-AC">Non-AC</option>
                                </select></td></tr>
                        <tr><td>Prefix</td>
                            <td><input type="text" name="Pre" placeholder="character" required ></td><br/>
                        </tr>
                        <tr><td>Price</td>
                            <td><input type="number" min="1" max="3000" maxlength="4" name="p" placeholder="price"></td><br/>
                        </tr>
                        <tr><td>Route</td>
                            <td><input type="text" name="route" placeholder="Route" required ></td><br/>
                        </tr>
                        <tr><td>Time</td>
                            <td><input type="time" name="time" ></td><br/>
                        </tr>
                        <tr><td>Date</td>
                            <td><input type="date" name="date" min="2018-03-30" ></td><br/>
                        </tr>
                        <tr><td>&nbsp;</td>
                        <td><input type="submit" name="submit" value="Add" ></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>

    <!-- Accordion card -->
    <!-- Accordion card -->
    <!--<div class="card">-->

        <!-- Card header -->
        <!--<div class="card-header" role="tab" id="headingTwo">
            <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <h5 class="mb-0">
                    ADD EMPLOYEE DETAILS <i class="fa fa-angle-down rotate-icon"></i>
                </h5>
            </a>
        </div>-->

        <!-- Card body -->
        <!--<div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
            <div class="card-body">

                <table align="center">
                    <form action="cmt.php" method="post">
                        <tr><td>New employee</td>
                            <td><input type="text" name="em" placeholder="Employee_name" required ></td><br/>
                        </tr>
                        <tr><td>Contact No</td>
                            <td><input type="number" min="1" max="99999999999" maxlength="11" name="Cn" placeholder="number"></td><br/>
                        </tr>
                        <tr><td>&nbsp;</td>
                            <td><input type="submit" name="sd" value="Submit" ></td>
                        </tr>
                    </form>
                </table>
            </div>
        </div>
    </div>
-->
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
                            <th>Bus_ID</th>
                            <th>Seat</th>
                            <th>NO</th>
                        </tr>

                        <tr><?php
                            while($row=mysqli_fetch_array($count)):;    ?>
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

    <!-- Accordion card -->
</div></div>
<div class="col-md-8">
<figure class="align-content-sm-around">
    <img src="concorde-II-floor-plan-7.jpg"  width="700" height="450">
</figure>

</div></div>

<table align="bottom" >
    <form action="sesion.php" method="post">
        <tr>
            <td align="bottom"><input align="bottom" type="submit" name="submit" value="Log out" ></td>
        </tr>
    </form>
</table>



<?php include ("bootstrapScript.php");?>
</body>
</html>


