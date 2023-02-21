<?php
    // check if logged in
    session_start();
    if (isset($_SESSION["user"])==false)
        header("location: ../error/403.html");

    
    //begin
    include "../log/DB.php";

    $mess = $_POST["mess"];
    $target = $_POST["target"];
    $user = $_SESSION["user"];

    if ($mess != "") {
        $sql = "INSERT INTO messages (source, dest, message) VALUES ('$user', '$target', '$mess');";
        $result = mysqli_query($conn, $sql);
    }
            

?>