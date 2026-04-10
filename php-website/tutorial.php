    <?php
    //Shift 1 + Enter key for html setup shortcut
    //single line comment
    /*multi line comment*/
    //to open in browser type: localhost/folder-name/
    echo "Hello World! <br>"; //to print something on the screen
    echo "<br>"; //to break the line

    $age = 16; //variable declaration and assignment
    if($age >= 18){ //if condition
        echo "You are an adult.";
    } else { //else condition
        echo "You are a minor.";
    }
    ?>

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button onclick="alert('Hello World')">Click Me</button> <!-- to create a button that shows an alert when clicked -->
    <br>
    <!-- Cannot validate since a PHP installation could not be found. Use the setting 'php.validate.executablePath' to configure the PHP executable. -->
    <p id="text">"hello"</p>
    <button onclick="changeText()">Click Me</button>
    <script>
    function changeText() {
        document.getElementById("text").innerHTML = "Text Changed!";
    }
    </script>


</body>
</html>

webdev-php activity task<br>
```
<?php
session_start();

/*
ASSOCIATIVE ARRAY OF USERS
key = username
value = password
*/
$users = [
    "student1" => password_hash("pass123", PASSWORD_DEFAULT),
    "username" => password_hash("12345", PASSWORD_DEFAULT),
    "sevilla" => password_hash("zeus123", PASSWORD_DEFAULT)
    //key => value //hash the password for security/securely store password
];

$error = "";

if(isset($_POST['login'])){ //check if the login button is clicked

    $username = $_POST['username']; //this will get the value of the username input field
    $password = $_POST['password'];

    /*
    Check if username exists in the array
    and if the password matches
    */
    //&& logical operator means "and", == both conditions must be true

    if(isset($users[$username]) && password_verify($password, $users[$username])){ //password_verify checks if the password matches the hashed password in the array
        
        
        // save username in session
        $_SESSION['user'] = $username;

        // redirect to exam page
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
by group 1

Exam.php
```
<?php
session_start();

/*
Prevent user from opening exam.php directly
without logging in
*/
if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}

/*
ANSWER KEYS
These arrays contain the correct answers
*/

$mc_answers = [
    "mc1" => "A",
    "mc2" => "B",
    "mc3" => "C",
    "mc4" => "A",
    "mc5" => "D"
];

$tf_answers = [
    "tf1" => "True",
    "tf2" => "False",
    "tf3" => "True",
    "tf4" => "False",
    "tf5" => "True"
];

$id_answers = [
    "id1" => "<?php",
    "id2" => "echo",
    "id3" => "PHP",
    "id4" => "Live Server",
    "id5" => "$"
];

$score = 0;

if(isset($_POST['submit_exam'])){

    /*
    CHECK MULTIPLE CHOICE
    */
    foreach($mc_answers as $key => $correct){
        if(isset($_POST[$key]) && $_POST[$key] == $correct){
            $score++;
        }
    }

    /*
    CHECK TRUE OR FALSE
    */
    foreach($tf_answers as $key => $correct){
        if(isset($_POST[$key]) && $_POST[$key] == $correct){
            $score++;
        }
    }

    /*
    CHECK IDENTIFICATION
    */
    foreach($id_answers as $key => $correct){
        if(isset($_POST[$key]) && strtolower($_POST[$key]) == strtolower($correct)){
            $score++;
        }
    }

    /*
    Essay is not automatically graded
    */
}

//for logout to destroy session and redirect to login page
if(isset($_POST['logout'])){
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Exam Page</title>
</head>

<body>

<h2>Online Exam</h2>

<form method="POST">

<!-- MULTIPLE CHOICE -->
<h3>Multiple Choice</h3>

1. What does HTML stand for?<br>
<input type="radio" name="mc1" value="A"> Hyper Text Markup Language<br>
<input type="radio" name="mc1" value="B"> Home Tool Markup Language<br>
<input type="radio" name="mc1" value="C"> Hyperlinks Text Management<br>
<input type="radio" name="mc1" value="D"> Hyper Tool Multi Language<br><br>

2. CSS is used for?<br>
<input type="radio" name="mc2" value="A"> Programming<br>
<input type="radio" name="mc2" value="B"> Styling<br>
<input type="radio" name="mc2" value="C"> Database<br>
<input type="radio" name="mc2" value="D"> Networking<br><br>

3. PHP is mainly used for?<br>
<input type="radio" name="mc3" value="A"> Design<br>
<input type="radio" name="mc3" value="B"> Hardware<br>
<input type="radio" name="mc3" value="C"> Web development<br>
<input type="radio" name="mc3" value="D"> Animation<br><br>

4. Which is a server side scripting language?<br>
<input type="radio" name="mc4" value="A"> PHP<br>
<input type="radio" name="mc4" value="B"> Javascript<br>
<input type="radio" name="mc4" value="C"> Excel<br>
<input type="radio" name="mc4" value="D"> Word<br><br>

5. Which stores data?<br>
<input type="radio" name="mc5" value="A"> Monitor<br>
<input type="radio" name="mc5" value="B"> Keyboard<br>
<input type="radio" name="mc5" value="C"> CPU<br>
<input type="radio" name="mc5" value="D"> Database<br><br>


<!-- TRUE OR FALSE -->
<h3>True or False</h3>

1. HTML is a programming language.<br>
<input type="radio" name="tf1" value="True">True
<input type="radio" name="tf1" value="False">False
<br><br>

2. PHP can be written alongside with HTML.<br>
<input type="radio" name="tf2" value="True">True
<input type="radio" name="tf2" value="False">False
<br><br>

3. PHP runs on the server.<br>
<input type="radio" name="tf3" value="True">True
<input type="radio" name="tf3" value="False">False
<br><br>

4. PHP cannot run in browsers.<br>
<input type="radio" name="tf4" value="True">True
<input type="radio" name="tf4" value="False">False
<br><br>

5. Database stores data.<br>
<input type="radio" name="tf5" value="True">True
<input type="radio" name="tf5" value="False">False
<br><br>


<!-- IDENTIFICATION -->
<h3>Identification</h3>

<h4>Use text upper or lower case.</h4>

1. To write PHP Code start with what tag?:
<input type="text" name="id1"><br><br>

2. To show output in browser we use what tag?:
<input type="text" name="id2"><br><br>

3. Server-side scripting language:
<input type="text" name="id3"><br><br>

4. The extension used to show webpage in browser:
<input type="text" name="id4"><br><br>

5. A variable always starts with what:
<input type="text" name="id5"><br><br>


<!-- ESSAY -->
<h3>Essay</h3>

1. Explain what PHP is.<br>
<textarea name="essay1" rows="4" cols="50"></textarea>
<br><br>

2. Why is database important in web development?<br>
<textarea name="essay2" rows="4" cols="50"></textarea>
<br><br>


<button type="submit" name="submit_exam">Submit Exam</button>
<br>
<button type="submit" name="logout">Logout</button>

</form>


<?php
if(isset($_POST['submit_exam'])){
    echo "<h3>Total Score: $score / 15</h3>";
}
?>

</body>
</html>
```
