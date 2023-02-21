<?php
    session_start();
    if (isset($_SESSION["user"])==false)
        header("HTTP/1.1 418 I'm a teapot", true, 418);
        //header("location: ../error/403.html");
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <title>Chat - local</title>
</head>
<body>
    <div class="upper">
        <div class="title">
            <p class="username"><?php echo $_SESSION["user"]; ?></p>
            <span id="span1"> </span>
            <div class="loc">
                <input type="text" id="text" onkeyup="send();" onkeydown="send();">
                <script src="script.js"></script>
                <div class="sugg" id="sugg">
                    <!--suggestions-->
                </div>
            </div>
            
            <button class="search" onclick="send();"><i class="fa-solid fa-magnifying-glass"></i></button>
            <span id="span2"> </span>
            <a href="../log/logout.php" class="icon">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
        
    </div>

    

    <div class="users">
        <ul>
            <?php include "getusers.php";?>
        </ul>
        
    </div>

</body>
</html>