<?php
if (isset($_POST['userid']) && isset($_POST['password'])){
    
    header("Locaion: index.php?error=User Id is required");

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $userid = validate($_POST['userid']);
    $pass = validate($_POST['password']);

    if(empty($userid)){
        header("Locaion: index.php?error=User Id is required");
        exit();
    }else if(empty($pass)){
        header("Locaion: index.php?error=Password is required");
        exit();
    }else{
        echo "Valid input";
    }

}else{
    header("Locaion: index.php");
    exit();
}
?>