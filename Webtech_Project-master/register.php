<?php
static $numofusers=0;  // variable to check first registration
if ($numofusers==0)
{
$conn=mysqli_connect("localhost","root","");
if($conn->connect_error)
{
    die("Could not connect");
}
else{
    echo "Connected successfully";
}

if ($conn->query("create database OSPdb"))
{
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}
$conn->close();

$conn=mysqli_connect("localhost","root","","OSPdb");
if($conn->connect_error)
{
    die("Could not connect");
}
else{
    echo "Connected successfully";
}


$sql="CREATE TABLE Users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        usename VARCHAR (20) NOT NULL,
        pass VARCHAR(16) NOT NULL,

        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";


if ($conn->$sql)
{
    echo'<script>console.log( "Table created successfully")</script>';
} else {
    echo '<script>console.log("Error creating database: " . $conn->error)</script>';
}
$conn->close();


}
function formValidation(){
	$fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
	$uid=$_POST["username"];
	$pswd=$_POST["pass1"];
	$cpswd=$_POST["cpass"];
	if(fnameValid($fname)){
		if (lnameValid($lname)){
			if (uidValid($uid)){
				if(pswdValid($pswd)){
					if(cpswdValid($cpswd,$pswd)){
						return true;
					}
				}
			}
		}
	}
	return false;
}

function fnameValid($fname){
	if(preg_match("/^[A-Za-z]+$/i",$fname))
	{
		return true;
	}
	else {
		echo '<script>alert("Name must have alphabet characters only")</script>';
		return false;
	}
}

function lnameValid($lname){
	if(preg_match("/^[A-Za-z]+$/i",$lname))
	{
		return true;
	}
	else {
		echo '<script>alert("Name must have alphabet characters only")</script>';
		return false;
	}
}

function uidValid($uid){
	if(preg_match("/^[A-Za-z0-9_-/.@]+$/",$uid))
	{
		return true;
	}
	else{
		echo '<script>alert("Username can contain only uppercase, lowercase letters, numbers and symbols(\'_\',\'.\',\'-\',\'@\').)"</script>';
		return false;
	}
}

function pswdValid($pswd){
	$pswd_len = strlen($pswd);
	if ($pswd_len >= 16 || $pswd_len < 10)
	{
		echo '<script>alert("Password should not be empty / length be between 10 to 15 characters long.")</script>';
		return false;
	}
	return true;
}

function cpswdValid($cpswd,$pswd){
	if($cpswd==$pswd){
		return true;
	}
	else{
		echo '<script>alert("Confirm passowrd does not match password.")</script>';
	}
}



  if(isset($_POST['register']))
  {
    $db=mysqli_connect("localhost","root","");
    $db->select_db("OSPdb");

   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $email=$_POST['email'];
   $username=$_POST['username'];
   $password=$_POST['password'];

   if ($db->query("INSERT INTO Users
    (username,fname,lname,password)
    VALUES ($numofusers,'$fname','$lname','$email','$username',$password')"))
    {print "<script>console.log('Account created :)');</script>";
        echo"jkfhjsdhgkkjfg";
    }

	else {
		echo '<script>console.log("Error user not added to db")</script>';
	}
  }
$numofusers++;
?>
