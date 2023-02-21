<?php
    session_start();
    if (isset($_SESSION["user"])==false)
        header("location: ../error/403.html");

    if (!isset($_POST["u"]))
        header("location: ../error/400.html");

    include "../log/DB.php";

    $target = $_POST["u"];

    $sql = "SELECT * FROM messages WHERE (source='".$_SESSION['user']."' AND dest='$target') OR (source='$target' AND dest='".$_SESSION['user']."');";
    $result = mysqli_query($conn, $sql);

    while ($mess_array = mysqli_fetch_assoc($result))
        if ($mess_array["source"] == $_SESSION["user"])
            echo "<div class='usermsg'>".$mess_array["message"]."</div>";
        else
            echo "<div class='targetmsg'>".$mess_array['message']."<br><i class='name'>".$mess_array["source"]."</i></div>";
    ?>