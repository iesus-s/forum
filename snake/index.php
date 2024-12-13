<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jesus.angel</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css?v=1"> 
</head>
<body> 
    <!-- login form -->
    <form action="posts/post_login.php" method="POST">
        <h1> log in</h1>
        <?php if(isset($_GET['error'])) {   ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>
        <?php if(isset($_GET['success'])) {   ?>
            <p class="success"> <?php echo $_GET['success']; ?></p>
        <?php } ?>
        <label> username: </label>
        <input type="text" name="username" placeholder="username"><br><br>
        <label> password: </label>
        <input type="password" name="password" placeholder="password"><br><br>
        <button type="submit"> login </button> 
    </form>  
    <br>
    <form action="pages/create.php" method="get">
        <button type="submit">create account</button>
    </form> 
</body>
</html>