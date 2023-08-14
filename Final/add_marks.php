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
    <style>


/*change*/
    body {
        font-family: Arial;
        background-color:  #a6cad7;
    
    }

    /* Style the tab */
    .tab {
       
        overflow: hidden;
        border: 1px solid #CCDEE4;
        background-color: #f1f1f1;
        margin-top: -8px;
        
        
        
    }

    /* Style the buttons inside the tab */
    .tab button {
        background-color: inherit;
        float: center;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 12px 210px;
        transition: 0.3s;
        font-size: 17px;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: blue;
    }


    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

       input{
        border-radius: 5px;
        width:200px;
         height:25px;
         margin-left

       }
       .other{
        margin-left:16px;
       }

       .insert{
        text-align: center;
        
       }

       h2{
        text-align: center;
        padding:50px;

       }

       
    </style>
</head>

<body>

    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'profile')">Profile</button>
        <button class="tablinks" onclick="openCity(event, 'marks')">Insert Result</button>
        <button class="tablinks" onclick="openCity(event, 'logout')">Logout</button>
    </div>

    <div id="profile" class="tabcontent">

        <?php
        $tt = $_SESSION['email'];
        $query = "SELECT * FROM teacher WHERE email ='$tt'";

        $d = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($d)) {
            $product = <<<DELIMETER
        <img style= "border-radius: 15px; width:300px; height:300px;" src="https://i.ibb.co/cT2TNRY/Basic-Ui-186.jpg" alt=""><br><br>
        <h3>Name: {$row['name']}</h3>
        <h3>TID: {$row['teacher_id']}</h3>
        <h3>Email: {$row['email']}</h3>
        <h3 >Address: ..........</h23<br><br><br>
      </div>
DELIMETER;
            echo $product;
        }
        ?>
    </div>

    <div id="marks" class="tabcontent">
        <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        </script>
        <h2>Insert Information</h2>
        <form action="" id="cc" method="post">

         <div class="insert">
            <label for="semester"><b>Semester: </b></label>
            <input type="text" name="" placeholder="Enter Semester" required> <br> <br>
<div class="other">
            <label for="section"><b> Section:  </b></label>
            <input type="text" name="" placeholder="Enter Section" required><br> <br>

            <label for="session"><b> Session:  </b></label>
            <input type="text" name="" placeholder="Enter Session" required><br><br>
    </div>
            <a  href="add_markes2.php"class="hero-btn" ><b>Submit</b></a> 



     </div>
        </form>

    </div>

    <div id="logout" class="tabcontent">
        <div style="display: grid; justify-content:center">
        <br><br><h3>Are you sure to logout? </h3><br>
        <a style="text-decoration:none;text-align: center" href="project.html">

            <?php
            unset($_SESSION['teacher_id']);
            ?>

            <button style="background-color:red;width:55px;height:30px;border-radius: 5px;"> Yes</button><br><br>

        </a>
        </div>
    </div>

    <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

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

</body>

</html>