<?php
    session_start();
    if (isset($_SESSION["user"])==false)
        header("location: ../error/403.html");

    if (!isset($_GET["u"]))
        header("location: ../error/400.html")
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
<body onload="scrollDown();">
    <div class="upper">
        <div class="title">
            <a href="../home/" class="icon1">
                <i class="fa-solid fa-arrow-rotate-left"></i>
            </a>
            <p class="username"><?php echo $_SESSION["user"]; ?></p>
            <a href="../log/logout.php" class="icon">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </a>
        </div>
    </div>
    
    <div>
        
        <div class="chat-frame" id="chat-frame">
            <!--messages-->
            <?php $target = $_GET["u"]; ?>
        </div>

        

        <script>
            var target = '<?php echo $target; ?>';
            loadDoc();
            window.setInterval(loadDoc, 500);

            window.onload(scrollDown());
            
            window.addEventListener("keydown", function (event) {
                if (event.defaultPrevented) {
                    return; // Do nothing if the event was already processed
                }
            
                switch (event.key) {
                    case "Enter":
                        send(target);
                    default:
                        return;
                }
            }, true);

            function loadDoc() {

                var data = "u="+<?php echo "'".$target."'"; ?>
                
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("chat-frame").innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "update.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(data);
                
            }

            function scrollDown() {
                var obj = document.getElementById("chat-frame");
                if( obj.scrollTop !== (obj.scrollHeight - obj.offsetHeight)){
                    var objDiv = document.getElementById("chat-frame");
                    objDiv.scrollTop = objDiv.scrollHeight;
                    var input = document.getElementById('text');
                    input.focus();
                }
            }

            
        </script>
        
        <div class="type">
                <input type="text" name="mess" id="text" class="type-text" autocomplete="off">
                <input type="submit" id="submit" name="submit" value="Send" class="type-submit" onclick="send(target);">
                <div class="down">
                    <a onclick="scrollDown();"><i class="fa-solid fa-angles-down"></i></a>
                </div>
        </div>
        <script src="func.js"></script>
    </div>

</body>
</html>