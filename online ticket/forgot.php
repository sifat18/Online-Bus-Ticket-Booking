<?php
include 'c.php';
echo "
<form action='forgot.php' method='post'>
Enter your Username<br/><input type='text' name='us' required><br/>
Enter your Email<br/><input type='email' name='em' required><br/>
<br/><input type='submit' name='sub2' value='submit'><br/>
</form>

<form action=\"index.php\" method=\"post\">
        
      <button>Sign up page</button>
    </form>

";

?>
<?php
if(isset($_POST['sub2'])){

    $us=$_POST['us'];
    $em=$_POST['em'];
    $search=mysqli_query($con,"select * from login where Username='$us'");
$sp=mysqli_num_rows($search);
if($sp!=0){
while($row=mysqli_fetch_array($search)){
    $db_email=$row['email'];
}
if($em==$db_email){
    $s2=mysqli_query($con,"select pass from login where email='$em'");
    $sp2=mysqli_fetch_array($s2);
    $sp3=$sp2['pass'];
    echo "'Your password is ' $sp3 ";
}
else{
    echo "incorrect email";
}
}
else{
    echo "Username doesn't exist";
}
}
?>
