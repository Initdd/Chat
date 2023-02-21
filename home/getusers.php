<?php
    if (isset($_SESSION["user"])==false)
        header("location: ../error/403.html");

    include "../log/DB.php";

    $sql = "SELECT * FROM messages;";
    $result = mysqli_query($conn, $sql);

    $users = [$_SESSION["user"]];

    while ($array = mysqli_fetch_assoc($result)) {
        if ($array["source"] == $_SESSION["user"]) {
            if (!in_array($array["dest"], $users))
                array_push($users, $array["dest"]);
            #echo "<li class='user'><a href='#'>".$array["dest"]."</a><i class='fa-solid fa-circle-user'></i></li>";
        }elseif ($array["dest"] == $_SESSION["user"]) {
            if (!in_array($array["dest"], $users))
                array_push($users, $array["dest"]);
            #echo "<li class='user'><a href='#'>".$array["source"]."</a><i class='fa-solid fa-circle-user'></i></li>";
        }
    }

    foreach ($users as $user)
        if ($user != $_SESSION["user"])
            echo "<li class='user'><a href='../message/index.php?u=$user'><i class='fa-solid fa-circle-user'></i><span> </span>$user</a></li>";
        else
            echo "<li class='user'><a id='me' href='../message/index.php?u=$user'><i class='fa-solid fa-circle-user'></i><span> </span>$user</a></li>";

?>