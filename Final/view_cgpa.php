<?php
session_start();
include_once "function.php";
function getGrade($num) {
    switch($num) {
        case $num >= 80 and $num <= 100:
            return 'A+';
        case $num >= 75 and $num <= 79:
            return 'A';
        case $num >= 70 and $num <= 74:
            return 'A-';
        case $num >= 65 and $num <= 69:
            return 'B+';
        case $num >= 60 and $num <= 64:
            return 'B';
        case $num >= 55 and $num <= 59:
            return 'B-';
        case $num >= 50 and $num <= 54:
            return 'C+';
        case $num >= 45 and $num <= 49:
            return 'C';
        case $num >= 40 and $num <= 44:
            return 'D';     
        default:
        return 'Fail';
        }
}
function getGradePoint($num) {
    switch($num) {
        case $num >= 80 and $num <= 100:
            return 4.00;
        case $num >= 75 and $num <= 79:
            return 3.75;
        case $num >= 70 and $num <= 74:
            return 3.50;
        case $num >= 65 and $num <= 69:
            return 3.25;
        case $num >= 60 and $num <= 64:
            return 3.00;
        case $num >= 55 and $num <= 59:
            return 2.75;
        case $num >= 50 and $num <= 54:
            return 2.50;
        case $num >= 45 and $num <= 49:
            return 2.25;
        case $num >= 40 and $num <= 44:
            return 2.00;     
        default:
            return 0.00;
        }
}
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
        background-color: #a6cad7;
        
    
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
        padding: 12px 220px;
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
        <button class="tablinks" onclick="openCity(event, 'GPA')">Result</button>
        <button class="tablinks" onclick="openCity(event, 'logout')">Logout</button>
    </div>

    <div id="profile" class="tabcontent">

        <?php
        $tt = $_SESSION['student_id'];
        $query = "SELECT * FROM student WHERE student_id ='$tt'";

        $d = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($d)) {
            $product = <<<DELIMETER
        <img style= "border-radius: 15px; width:300px; height:300px;" src="images/studentimage.png" alt=""><br><br>
              <h2 >Name: {$row['name']}</h2>
              <h2 >ID: {$row['student_id']}</h2>
              <h2 >Email: {$row['email']}</h2>
              <h2 >Address: .........</h2><br><br><br>
              

DELIMETER;
            echo $product;
        }
        ?>
    </div>

    <div id="GPA" class="tabcontent">
        <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
        </script>
        <h2>Your Result: </h2><br>
        <?php

        $query = "SELECT * FROM marks WHERE student_id ='$tt'";

        $d = mysqli_query($conn, $query);
             $english;
                 $math;
                   $cse111;
           $cse112;
           echo "<table border=1>
           <tr>
             <th>English</th>
             <th>Math</th>
             <th>CSE111</th>
             <th>CSE112</th>
             <th>GPA</th>
             <th>CGPA</th>
           </tr>";
           
        while ($row = mysqli_fetch_array($d)) {
            $english= $row['english'];
             $math=$row['math'];
            $cse111=$row['cse111'];
             $cse112=$row['cse112'];

             $engRes = getGrade($row['english']);
             $mathRes = getGrade($row['math']);
             $cse111Res = getGrade($row['cse111']);
             $cse112Res = getGrade($row['cse112']);

             $creditSum = $row['engCredit'] + $row['mathCredit'] + $row['cse111Credit'] + $row['cse112Credit'];
             $sumOfCalculation = ($row['engCredit'] * getGradePoint($row['english'])) + ($row['mathCredit'] * getGradePoint($row['math'])) + ($row['cse111Credit'] * getGradePoint($row['cse111'])) + ($row['cse112Credit'] * getGradePoint($row['cse112']));
             $finalGPA = round(($sumOfCalculation / $creditSum), 2);

        echo "<tr>
        <td>$english</td>
        <td>$math</td>
        <td>$cse111</td>
        <td>$cse112</td>
        <td rowspan='2'>$finalGPA</td>
        <td rowspan='2'>$finalGPA</td>
      </tr>";
      echo "<tr>
        <td>$engRes</td>
        <td>$mathRes</td>
        <td>$cse111Res</td>
        <td>$cse112Res</td>
      </tr>";
        
        
        }
       echo "</table>";
      
         
        
        ?>
    
    </div>


    </div>

 
    <div id="logout" class="tabcontent">
        <div style="display: grid; justify-content:center">
        <br><br><h3>Are you sure to logout? </h3><br>
        <a style="text-decoration:none;text-align: center" href="project.html">

            <?php
            unset($_SESSION['student_id']);
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