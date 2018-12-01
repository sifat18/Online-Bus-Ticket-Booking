<!--connection to db and getting user email-->
<?php
include 'c.php';
?>
<!--dividing users according to there type-->
<?php
if(isset($_POST["submit"])){
    $Email=$_POST['Email'];
    $Password=$_POST['Password'];

    $query=mysqli_query($con,"Select email,pass,Type from login");
    while($row=mysqli_fetch_array($query)){
        $db_email=$row["email"];
        $db_pass=$row["pass"];
        $db_Type=$row["Type"];
        if($Email==$db_email && $Password==$db_pass){
            session_start();
            $_SESSION["email"]=$db_email;
            $_SESSION["type"]=$db_Type;
            if($_SESSION["type"]=='admin'){
                header("Location:home_admin.php");
            }
            elseif($_SESSION["type"]=='company'){

                header("Location:cmt.php");
            }
            else{

                header("Location:u2.php");
            }

    }
}}
?>