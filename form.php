<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
</head>

<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>

</html>
<?php
$con = mysqli_connect("localhost", "root", "", "login");
if (!$con) {
    die("Could not connect to the database");
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) > 0) {
        // The user exists, so we can log them in
        session_start();
        $_SESSION['username'] = $username;
        header("Location: home.php");
    } else {
        // The user does not exist, so we can display an error message
        echo "Invalid username or password";
    }
}
?>