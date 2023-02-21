<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Opsec</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <p><a href="index.html">Home</a></p>
    <h3>Register</h3>
    <?php
        if (isset($_GET['error']))

            if ($_GET['error'] == "empty")
                echo "<p class='error'>There should be no empty fields</p>";
            elseif ($_GET['error'] == "diffpass")
                echo "<p class='error'>Passwords are different</p>";
            elseif ($_GET['error'] == "exists")
                echo "<p class='error'>Username already exists</p>";

    ?>
    
    <form action="log.php" method="POST">

        Username: <input type="text" name="username">
        <br>
        <br>
        Password: <input type="password" name="passwd">
        <br>
        <br>
        Retype Password: <input type="password" name="repasswd">
        <br>
        <input type="hidden" name="log" value="register">
        <br>
        <input type="submit" name="submit" value="submit">
        <br>
    </form>
</body>
</html>