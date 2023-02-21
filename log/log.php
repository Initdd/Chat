<?php

    include $_POST["log"].".php";

    include "DB.php";

    if (isset($_POST["submit"]))
      $action = $_POST["log"];

      if ($action == "register") { # Register
        $user = $_POST["username"];
        $passwd = $_POST["passwd"];
        $repasswd = $_POST["repasswd"];
        $hashpwd = password_hash($passwd, PASSWORD_DEFAULT);
        

        $query = "SELECT username FROM users WHERE username='".$user."';";
        $check = mysqli_query($conn, $query);

        if (empty($user)||empty($passwd)||empty($repasswd)) { # Empty fields
          header("location: ".$action.".php?error=empty");
          exit();

        }elseif ($passwd != $repasswd) { # Diferent passwords
          header("location: ".$action.".php?error=diffpass");
          exit();

        }elseif (mysqli_num_rows($check)!=0) {
          header("location: ".$action.".php?error=exists");
          exit();

        }elseif (mysqli_num_rows($check)==0) { # Username does't exists (Sucess)
          $query = "INSERT INTO users (username, password) VALUES ('".$user."', '".$hashpwd."');";
          $check = mysqli_query($conn, $query);
          header("location: login.php");
          exit();
        };

      }elseif ($action == "login") {
        $user = $_POST["username"];
        $passwd = $_POST["passwd"];

        $query = "SELECT username FROM users WHERE username='".$user."';";
        $check = mysqli_query($conn, $query);

        if (empty($user)||empty($passwd)) {
          header("location: login.php?error=empty");
          exit();
        }elseif (mysqli_num_rows($check)==0) {
          header("location: login.php?error=incUP");
          exit();
        }elseif (mysqli_num_rows($check)!=0) {
          $query = "SELECT password FROM users WHERE username='".$user."';";
          $check = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($check);
          $hash = $row["password"];
          $result = password_verify($passwd, $hash);

          if ($result != true) {
            header("location: login.php?error=incUP");
            exit();
          }elseif ($result == true) { # Success
            #echo "works";
            session_start();
            $_SESSION["user"] = $user;
            header("location: ../home/index.php");
          };

        }

      }

        
    
    
        
