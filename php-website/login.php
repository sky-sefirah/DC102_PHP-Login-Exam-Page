```
<?php
session_start(); 


$users = [
    "student1" => password_hash("pass123", PASSWORD_DEFAULT),
    "username" => password_hash("12345", PASSWORD_DEFAULT),
    "sevilla" => password_hash("zeus123", PASSWORD_DEFAULT)
];

$error = "";

if(isset($_POST['login'])){ //check if the login button is clicked

    $username = $_POST['username']; //this will get the value of the username input field
    $password = $_POST['password'];

    
    if(isset($users[$username]) && password_verify($password, $users[$username])){
        
        
        $_SESSION['user'] = $username;

        header("Location: exam.php");
        exit();

    }else{
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>

<body>

<h2>Login Page</h2>

<form action="login.php" method="POST">

Username:
<input type="text" name="username" required>
<br><br>

Password:
<input type="password" name="password" required>
<br><br>

<button type="submit" name="login">Login</button>

</form>

<p style="color:red;">
<?php echo $error; ?>
</p>

</body>
</html>
```<br>
