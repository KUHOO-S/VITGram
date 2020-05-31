<!doctype html>

<head>

<title>Register</title>


<link rel="stylesheet" href="../public/stylesheets/registerPage.css">

</head>

<body>
<h1>Register</h1>

<form class="myForm" method="POST" action="../public/scripts/register.php">
    <input type="text" name="fname" id="fname" placeholder="Enter First Name">
    <input type="text" name="lname" id="lname" placeholder="Enter Last Name">
    <input type="email" name="email" id="email" placeholder="xyz@abc.com">
    <input type="text" name="username" id="username" placeholder="Enter UserName">
    <input type="password" name="pass" id="pass" placeholder="Enter Password">
    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password">
    <input type="submit" name="register">
</form>

</body>
</html>
