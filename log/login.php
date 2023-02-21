<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Opsec</title>
</head>
<body>
    <p><a href="../index.html">Home</a></p>
    <h3>Login</h3>
    
    <?php # Errors
        if (isset($_GET['error']))

            if ($_GET['error'] == "empty")
                echo "<p class='error'>There should be no empty fields</p>";
            elseif ($_GET['error'] == "incUP")
                echo "<p class='error'>Incorrect User or Password</p>";

    ?>

    <form action="log.php" method="POST">
        Username: <input type="text" name="username">
        <br>
        <br>
        Password: <input type="password" name="passwd">
        <input type="hidden" name="log" value="login">
        <br>
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>