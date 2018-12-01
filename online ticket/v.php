<!--connection to db and getting user email-->
<?php
session_start();
$Email=$_SESSION['email'];

include 'c.php';

?>
<!--inserting data from u2 into book table and other queries-->
<?php
if(isset($_POST["Book"])) {
    $R = $_POST['ro'];
    $Bi = $_POST['Bn'];
    $sii = $_POST['si'];
    $X = $_POST['no'];

    $get2=mysqli_query($con,"select price,type from bus where bus_id=$Bi");
    $pr=mysqli_fetch_array($get2);
    $price=$pr['price'];
    $K=$pr['type'];
$get=mysqli_query($con,"select date,time from travel where bus_id=$Bi");
$roww=mysqli_fetch_array($get);
$Y=$roww['time'];
    $YY=$roww['date'];

    $query = mysqli_query($con, "insert into book(email,bus_id,name,time,date,Seat,No,Type,price) VALUES('$Email','$Bi','$R','$Y','$YY','$sii','$X','$K','$price')");
    $q5 = mysqli_query($con, "update seat set Available='1' where postfix='$X' and prefix='$sii'");

}
?>




<!--fetching data from book table-->
<?php

$sql="select * from book where email='$Email'";
$q=mysqli_query($con,$sql);
?>

<html>
<head><title> Success </title>
    <?php include ("head.php");?>
</head>
<body><h1 align="center">Successful Booking</h1>
<div class="row">
    <div class="col-md-12">
        <table border="10" cellpadding="8" align="center">
            <td><h4 align="center">Details Table</h4></td>
            <tr>
                <th>Email</th>
                <th>Bus</th>
                <th>Route</th>
                <th>Time</th>
                <th>Date</th>
                <th>Seat</th>
                <th>NO</th>
                <th>Type</th>
                <th>Price</th>
            </tr>
            <!--printing data from book table-->
            <tr><?php
                while($rowj=mysqli_fetch_array($q)):;
                ?>
                <td>  <?php echo $rowj["email"]; ?></td>
                <td>  <?php echo $rowj["bus_id"]; ?></td>
                <td>  <?php echo $rowj["name"]; ?></td>
                <td>  <?php echo $rowj["time"]; ?></td>
                <td>  <?php echo $rowj["Date"]; ?></td>
                <td>  <?php echo $rowj["Seat"]; ?></td>
                <td>  <?php echo $rowj["No"]; ?></td>
                <td>  <?php echo $rowj["Type"]; ?></td>
                <td>  <?php echo $rowj["Price"]; ?></td>
            </tr>
            <?php
            endwhile;
            ?>
        </table>
    </div>
</div>
<table align="bottom" >
    <form action="sesion.php" method="post">
        <tr>
            <td align="bottom"><input align="bottom" type="submit" name="submit" value="Log out" ></td>
        </tr>
    </form>
</table>
<table>
    <form action="u2.php" method="post">
        <tr>
            <td><input type="submit" name="C" value="Cancel Booking" ></td>
        </tr>
    </form>
</table>
<?php include ("bootstrapScript.php");?>
</body>
</html>
