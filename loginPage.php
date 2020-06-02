<!doctype html>
<head>
<title>Login</title>
<link rel="stylesheet" href="./stylesheets/loginPage.css">
</head>
<body>
<h1>Login</h1>
<form class="myForm" action="./scripts/login.php" method="POST">
    <input type="text" name="username" id="username" placeholder="UserName">
    <input type="pass" name="pass" id="pass" placeholder="Password">
    <input type="submit" name="login">
</form>
<p>New User? <a href="registerPage.php"> Register</a>
</p>
