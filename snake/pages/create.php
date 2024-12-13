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
    <!-- create account form -->
    <form action="../posts/post_create.php" method="POST">
        <h1>create an account</h1>
        <?php if(isset($_GET['error'])) {   ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label> username: </label>
        <input type="text" name="username" placeholder="username"><br><br>
        <label> password: </label>
        <input type="password" name="password" placeholder="password"><br><br>
        <label> confirm password: </label>
        <input type="password" name="cpassword" placeholder="password"><br><br>
        <button type="submit"> submit </button> 
    </form>  
    <br>
    <form action="../index.php" method="get">
        <button type="submit">cancel</button>
    </form>
</body>
</html>