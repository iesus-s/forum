<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jesus.angel</title>
    <title rel="stylesheet" type="text/css" href="style.css"></title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css?v=1"> 
</head>
<body>
    <!-- forgot password form -->
    <form action="../posts/post_forgot.php" method="POST">
        <h1>forgot password</h1>
        <?php if(isset($_GET['error'])) {   ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?> 
        <label> email: </label>
        <input type="email" name="email" placeholder="email"><br><br> 
    </form>  
    <br>
    <form action="../index.php" method="get">
        <button type="submit">request password reset</button>
    </form>
    <br>
    <form action="../index.php" method="get">
        <button type="submit">cancel</button>
    </form>
</body>
</html>