<?php   
    session_start();
    include "../db_conn.php";

    if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

        // save user id
        $user_id = $_SESSION['id'];
        $pic = "";

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../styles/style.css?v=1"> 
            <title>jesus.angel</title>
        </head>
        <body>
            <h1>hello, <?php echo $_SESSION['user_name']; ?>.</h1>
        </body>
            <!-- upload pic error -->
            <?php if(isset($_GET['error'])) {   ?>
                <p class="error"> <?php echo $_GET['error']; ?></p>
            <?php } ?>
            <?php if(isset($_GET['success'])) {   ?>
                <p class="success"> <?php echo $_GET['success']; ?></p>
            <?php } ?>

            <!-- profile pic display -->
            <?php
                $query = "SELECT profile_pic FROM users WHERE id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $stmt->bind_result($pic);
                $stmt->fetch();
                $stmt->close();
                if (!$pic) {
                    $pic = '../pic_uploads/default.png'; // default picture if no profile picture is uploaded
                }
            ?>
                <div class="profile_picture"> 
                    <img src="<?php echo htmlspecialchars($pic); ?>" 
                    alt="profile picture" style="width:150px; height:150px;">
                </div>
        <br>
            <!-- profile pic upload -->
            <form action="../posts/post_pic.php" method="POST" enctype="multipart/form-data">  
                <label for="profile_picture">profile picture:</label>
                <input type="file" name="profile_picture" id="profile_picture" accept="image/*" required>
                <button type="submit">upload</button>
            </form>
        <br>
            <!-- message form -->
            <div class="message_form">
                <form action="../posts/post_message.php" method="post">
                    <textarea name="message" rows="4" cols="50" placeholder="write your message here..." required></textarea><br>
                    <button type="submit">post message</button>
                </form>
            </div>
        <br>
            <!-- forum button -->
        <form action="forum.php" method="get">
            <button type="submit">forum</button>
        </form>
        <br>
            <!-- log out button -->
        <form action="../logout.php" method="get">
            <button type="submit">logout</button>
        </form>
        </html>

        <?php
    }
    else {
        header("Location: ./index.php");
        exit();
    }