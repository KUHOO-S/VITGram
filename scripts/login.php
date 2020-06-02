<?php if(isset($_POST['register']))
  {
    $db=mysqli_connect("localhost","root","","OSPdb");

   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $email=$_POST['email'];
   $username=$_POST['username'];
   $password=$_POST['password'];

   if (mysqli_query($conn,"INSERT INTO Users
    (username,fname,lname,password)
    VALUES ($numofusers,'$fname','$lname','$email','$username',$password')"))
    {print "<script>console.log('Account created :)');</script>";
        echo"jkfhjsdhgkkjfg";
    }

	else {
		echo '<script>console.log("Error user not added to db")</script>';
	}
  }
?>
<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '');

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);
$email = '';
$password='';
$errors = array();
//Checking the request method post to know if the form really posts any data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$email = $_POST['email'];
	$password = $_POST['password'];

	//perfroming the validation
	if(empty($email)){
		$errors[] = "Email field is required";
	}
	if(empty($password)){
		$errors[] = "Password field is required";
	}

	//You are goo to go
	if(empty($errors)) {
		$sth = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
		$sth->bindParam(':email', $email, PDO::PARAM_STR);
		$sth->execute();
		$user = $sth->fetch(PDO::FETCH_OBJ);
		if(!empty($user)) {
			//Verifying the password
			$hashedPwdDB = $user->password;
			if (password_verify($password, $hashedPwdDB)) {
				$_SESSION['user_id'] =  $user->user_id;
				$_SESSION['name'] =  $user->name;
				$_SESSION['email'] =  $user->email;
				header("Location:dashboard.php");
				exit;
			}
			else {
				$errors[] = "Invalid login";
			}

		}
		else {
			$errors[] = "Invalid login";
		}
	}

}
