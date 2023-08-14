<?php
session_start();
include_once "function.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
</form>
     </div>
        <form action="" id="cc" method="post"><br><br><br><br><br>
<h2 style="text-align:center">Insert Marks</h2><br>
         <div class="insert">
            <input type="text" name="student_id" placeholder="Enter student ID" required> <br> <br>

            <input type="text" name="english" placeholder="Enter English Marks" required><br> <br>

            <input type="text" name="math" placeholder="Enter Math Marks" required><br><br>

            <input type="text" name="cse111" placeholder="Enter CSE-111 Marks" required><br><br>

            <input type="text" name="cse112" placeholder="Enter CSE-112 Marks" required><br><br>

            <input style="background-color:red;width:50px;" type="submit" name="save" value="Save" id=""><br> 
            <a  href="project.html"class="hero-btn" ><b><h3>Logout</h3></b></a>

     </div>
        </form>

        



        
</body>
<style>
 body {
        font-family: Arial;
        background-color:  #a6cad7;
    
    }
    
input{
        border-radius: 5px;
        width:220px;
         height:25px;
        

       }

.insert{
 text-align: center;
}


</style>



<?php
    if (!empty($_POST['save'])) {
        $student_id  = $_POST['student_id'];
        
        $english  = $_POST['english'];
        $math  = $_POST['math'];
        $cse111  = $_POST['cse111'];
        $cse112  = $_POST['cse112'];
        $user_valdate = "SELECT *FROM marks where student_id='$student_id'";
        $tr = mysqli_query($conn, $user_valdate);
        
        $query = "INSERT INTO marks(student_id,english,math,cse111,cse112)";
        $query .= "VALUES ('$student_id','$english','$math','$cse111','$cse112')";
        $done = mysqli_query($conn, $query);
        if ($done) {
            echo "
        <script>
        alert('Data save successfully');
        </script>";
        }
    
}
    ?>
</html>