Exam.php
```
<?php
session_start();


if(!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}


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

<h2>DC102 Online Exam</h2>

<form method="POST">

<!-- MULTIPLE CHOICE -->
<h3>I. Multiple Choice</h3>

1. What does PHP used to stand for?<br>
<input type="radio" name="mc1" value="A"> A. Personal Home Page<br>
<input type="radio" name="mc1" value="B"> B. Personel House Page<br>
<input type="radio" name="mc1" value="C"> C. Power Home Page<br>
<input type="radio" name="mc1" value="D"> D. Personal Home Prepages<br><br>

2. PHP is a what in Web Development?<br>
<input type="radio" name="mc2" value="A"> A. Programming LAnguage<br>
<input type="radio" name="mc2" value="B"> B. Server-Side Scripting Language<br>
<input type="radio" name="mc2" value="C"> C. Database Storage<br>
<input type="radio" name="mc2" value="D"> D. Networking Server<br><br>

3. PHP is mainly what for?<br>
<input type="radio" name="mc3" value="A"> A. Design<br>
<input type="radio" name="mc3" value="B"> B. Hardware<br>
<input type="radio" name="mc3" value="C"> C. Web development<br>
<input type="radio" name="mc3" value="D"> D. Animation<br><br>

4. Which is a server side scripting language?<br>
<input type="radio" name="mc4" value="A"> A. PHP<br>
<input type="radio" name="mc4" value="B"> B. Javascript<br>
<input type="radio" name="mc4" value="C"> C. Excel<br>
<input type="radio" name="mc4" value="D"> D. Word<br><br>

5. Which stores data?<br>
<input type="radio" name="mc5" value="A"> A. Monitor<br>
<input type="radio" name="mc5" value="B"> B. Keyboard<br>
<input type="radio" name="mc5" value="C"> C. CPU<br>
<input type="radio" name="mc5" value="D"> D. Database<br><br>


<!-- TRUE OR FALSE -->
<h3>II. True or False</h3>

6. PHP is a server-side scripting language.<br>
<input type="radio" name="tf1" value="True">True
<input type="radio" name="tf1" value="False">False
<br><br>

7. PHP can be written alongside with HTML.<br>
<input type="radio" name="tf2" value="True">True
<input type="radio" name="tf2" value="False">False
<br><br>

8. PHP runs on the server.<br>
<input type="radio" name="tf3" value="True">True
<input type="radio" name="tf3" value="False">False
<br><br>

9. PHP cannot run in browsers.<br>
<input type="radio" name="tf4" value="True">True
<input type="radio" name="tf4" value="False">False
<br><br>

10. Database stores data.<br>
<input type="radio" name="tf5" value="True">True
<input type="radio" name="tf5" value="False">False
<br><br>


<!-- IDENTIFICATION -->
<h3>III. Identification</h3>

<h4>Use text upper or lower case.</h4>

11. To write PHP Code start with what tag?:
<input type="text" name="id1"><br><br>

12. To show output in browser we use what tag?:
<input type="text" name="id2"><br><br>

13. Server-side scripting language:
<input type="text" name="id3"><br><br>

14. The extension used to show webpage in browser:
<input type="text" name="id4"><br><br>

15. A variable always starts with what:
<input type="text" name="id5"><br><br>


<!-- ESSAY -->
<h3>IV. Essay</h3>

16-20. Explain what PHP is.<br>
<!-- EX: PHP is a server-side scripting language used for web development. It allows developers to create dynamic web pages that can interact with databases and perform various functions on the server before sending the output to the browser. PHP is widely used for building websites and web applications due to its simplicity, flexibility, and extensive community support. It can be embedded into HTML code, making it easy to integrate with front-end technologies.-->
<textarea name="essay1" rows="4" cols="50"></textarea>
<br><br>

21-25. What is the difference between $_GET and $_POST in php web development?<br>

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
