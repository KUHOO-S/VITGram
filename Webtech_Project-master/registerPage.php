<!doctype html>

<head>

<title>Register</title>


<link rel="stylesheet" href="registerPage.css">

</head>

<body>
<h1>Register</h1>

<form class="myForm" method="POST" action="register.php">
    <input type="text" name="fname" id="fname" placeholder="Enter First Name">
    <input type="text" name="lname" id="lname" placeholder="Enter Last Name">
    <input type="email" name="email" id="email" placeholder="xyz@abc.com">
    <input type="text" name="username" id="username" placeholder="Enter UserName">
    <input type="pass" name="pass" id="pass" placeholder="Enter Password">
    <input type="cpass" name="cpass" id="cpass" placeholder="Confirm Password">
    <input type="submit" name="register">
</form>

</body>
</html>
