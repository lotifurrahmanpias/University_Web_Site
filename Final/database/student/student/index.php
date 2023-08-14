<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form class="index" action="login.php" method="POST">
        <h2>LOGIN</h2>
   
        <div class="error">
            <?php if (isset($_GET['error'])) { ?>
                <p class = "error"><?php echo $_GET['error']; ?> </p>
           <?php } ?>

           <!-- <p class = "error">Password is required! </p> -->


        <label>Student Id</label>
        <input type="id" name="userid" placeholder="Your Student Id" ><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password (Birth Certificate or NID)" ><br>
        <button type="submit">Login</button>
        </div>
     </form>
</body>
</html>