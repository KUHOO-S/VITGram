<?php
#FORM VALIDATION AND ADDITION TO SQL
?>


<?php
static $numofusers=0;  // variable to check first registration
if ($numofusers==0)
{
$conn=mysqli_connect("localhost","kuhooadmin","abc123",);
if(!$conn)
{
    die("Could not connect");
}
else{
    echo "Connected successfully";
}

if (mysqli_query($conn, "CREATE DATABASE OSPdb"))
{
    echo "db created successfully";
} else {
    echo 'Error creating database: " . mysqli_error($conn)';
}
mysqli_close($conn);

$conn=mysqli_connect("localhost","kuhooadmin","abc123","OSPdb");
if(!$conn)
{
    die("Could not connect");
}
else{
    echo "Connected successfully";
}


$sql="CREATE TABLE Users (
        id INT(6) UNSIGNED PRIMARY KEY,
        firstname VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        usename VARCHAR (20) NOT NULL,
        pass VARCHAR(16) NOT NULL,

        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";


if (mysqli_query($conn, $sql))
{
    echo"Table created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);


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

?>
