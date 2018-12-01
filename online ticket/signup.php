<!--connection to db -->
<?php
include 'c.php';
error_reporting(E_PARSE | E_ERROR);
?>
<!--inserting data into login table-->
<?php
if(isset($_POST["submit"])){
$Username=$_POST['Username'];
$Email=$_POST['email'];
$Password=$_POST['Password'];
$RE_Pass=$_POST['RE_Pass'];

if($Password==$RE_Pass){
$query=mysqli_query($con,"insert into login(Username,email,pass) VALUES('$Username','$Email','$Password')");

    session_start();
    $_SESSION["email"]=$Email;
    header("Location:u2.php");
}
else{
    echo $_SESSION['message']="password doesn't match!sign up again";
}
}

?>

