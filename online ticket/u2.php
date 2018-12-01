<!--connection to db and getting user email-->
<?php

session_start();
$Email=$_SESSION['email'];

?>

<?php

include 'c.php';
$u=mysqli_query($con,"select * from login where email='$Email'");
$uu=mysqli_fetch_array($u);
$uuu=$uu['Username'];

error_reporting(E_PARSE | E_ERROR);

$sql="select DISTINCT name from travel";
$route=mysqli_query($con,$sql);
?>




<!--getting data from u2,join table and getting data according to the condition-->
<?php
if(isset($_GET["Sub"])) {
    $r = $_GET['rr'];

    $join="select travel.bus_id,name,time,date,type,postfix,prefix,price 
from bus inner join seat on bus.bus_id=seat.bus_id inner join travel on seat.bus_id=travel.bus_id
where seat.available='0' and name='$r'";

    $cj=mysqli_query($con,$join);
}
?>

<html>
<head><title> Customer panel  </title>
    <?php include ("head.php");?>
</head>
<body><h1 align="center">welcome <?php echo $uuu ;?></h1>
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
                            Bus Timetable <i class="fa fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx" >
                    <div class="card-body">

                        <form action="u2.php" method="get">
                            <tr><td>Route</td>
                                <select name="rr">
                                    <option value="1">Select Route</option>
                                    <?php while ($row=mysqli_fetch_array($route)):; ?>
                                        <option value="<?php echo $row[0]; ?>"><?php echo $row[0]; ?></option>
                                    <?php endwhile ; ?>
                                </select>
                            </tr>
                            <tr><td>&nbsp;</td>
                                <td><input type="submit" name="Sub" value="View Details" ></td>
                            </tr>
                        </form>


                    </div>
                </div>
            </div>
            <div class="card">

                <!-- Card header -->
                <div class="card-header" role="tab" id="headingTwo">
                    <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <h5 class="mb-0">
                            Book Tikcet <i class="fa fa-angle-down rotate-icon"></i>
                        </h5>
                    </a>
                </div>

                <!-- Card body -->
                <div id="collapseTwo" class="collapse show" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx" >
                    <div class="card-body">

                        <table align="center">
                            <form action="v.php" method="post">
                                <tr><td>Route</td>
                                    <td><input type="text" name="ro" placeholder="route" required ></td><br/>
                                </tr>
                                <tr><td>Bus</td>
                                    <td><input type="number" min="1" max="99999999999" maxlength="11" name="Bn" placeholder="number"></td><br/>
                                </tr>
                                <tr><td>Seat</td>
                                    <td><input type="text" name="si" placeholder="character" required ></td><br/>
                                </tr>
                                <tr><td>no</td>
                                    <td><input type="number" min="1" max="100" maxlength="3" name="no" placeholder="No" required ></td><br/>
                                </tr>
                                   <tr><td>&nbsp;</td>
                                    <td><input type="submit" name="Book" value="Book" ></td>
                                </tr>
                            </form>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="col-md-6">
        <div class="index_right" >
            <table border="10" cellpadding="8">
                <td><h4 align="center">Details Table</h4></td>
                <tr>
                    <th>Bus</th>
                    <th>Name</th>
                    <th>Time</th>
                    <th>Date</th>
                    <th>Type</th>
                    <th>Seat</th>
                    <th>NO</th>
                    <th>Available</th>
                    <th>Price</th>
                </tr>
                <!--fetching and printing from join table-->
                <tr><?php
                    while($rowj=mysqli_fetch_array($cj)):;
                    ?>
                    <td>  <?php echo $rowj["bus_id"]; ?></td>
                    <td>  <?php echo $rowj["name"]; ?></td>
                    <td>  <?php echo $rowj["time"]; ?></td>
                    <td>  <?php echo $rowj["date"]; ?></td>
                    <td>  <?php echo $rowj["type"]; ?></td>
                    <td>  <?php echo $rowj["prefix"]; ?></td>
                    <td>  <?php echo $rowj["postfix"]; ?></td>
                    <td>  <?php echo "YES"; ?></td>
                    <td>  <?php echo $rowj["price"]; ?></td>
                </tr>
                <?php
                endwhile;
                ?>
            </table>
        </div>
    </div>

<!--<div class="row">-->
<div class="col-md-3">
    <figure>
        <img src="32.jpg"  width="250" height="560">
    </figure>

</div></div>



<table align="bottom" >
    <form action="sesion.php" method="post">
        <tr>
            <td align="bottom"><input align="bottom" type="submit" name="submit" value="Log out" ></td>
        </tr>
    </form>
</table>
<table>
    <form action="v.php" method="post">
        <tr>
            <td><button>Booking History</button></td>

        </tr>
    </form>
</table>

<?php include ("bootstrapScript.php");?>
</body>
</html>

<!--posting from v update,delete in book and seat table-->
<?php
if(isset($_POST["C"])){
    $qb=mysqli_query($con,"select * from book where email='$Email'");
    $qb1=mysqli_fetch_array($qb);
    $X=$qb1['No'];
    $sii=$qb1['Seat'];


    $qd = mysqli_query($con,"update seat set Available='0' where postfix='$X' and prefix='$sii'");
    $queryd=mysqli_query($con,"delete from book where email='$Email'");


   }
?>