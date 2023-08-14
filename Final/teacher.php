<?php
session_start();
// session_destroy();
$_SESSION['teacher_id'] = '';
include_once "function.php"

?>


<?php

if (strlen($_SESSION['teacher_id']) > 0) {
    header('Location:add_marks.php');
}

// if ($_SESSION['teacher_id'] != 'd') {
//     header('Location:add_marks.php');
// }


// $log = <<< DELEMETER
// <h1>Login</h1>
// <form id="LoginForm" method="POST" action="">
//                             <input type="text" placeholder="Username" name="username"> <br> <br> <br>
//                             <input type="password" placeholder="Password" name="password">
//                             <br> <br> <br>
//                             <button type="submit" name="login" class="btn">Login</button>
//                             <!-- <a href="#">Forgot Password</a> -->
//                         </form>
// DELEMETER;
// echo $log;

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM teacher WHERE email= '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['email'] = $email;
        header('Location: add_marks.php');
    } else {
       echo "<p style=color:red;margin-right:-200px;margin-top:490px;><b>Invaild Email or Password !</b> </p>" ;
    }
    header("refresh:1 url=teacher.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="teacher.css">
    <title>Login</title>
</head>


<body>

    <form style="margin-left:-160px; margin-top:0px;" class="index" action="" method="POST">
        <h2>LOGIN</h2>
        <div class="error">

            <label>Teacher Email</label>
            <input type="text" name="email" placeholder="Teacher email" required><br>

            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit" name="login">Login</button>
            <p  >Don't have account?</p>


        </div>
        
    </form>
    <a style=" margin-left:-220px; margin-top:277px;" href="t_reg.php"><button>Register</button></a>

  

    
</body>

</html>