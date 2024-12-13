<?php

// include the database connection file
include "../db_conn.php";
session_start();

// Ensure the user is logged in
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) { 
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
        <div class="header">
            <h1>public forum</h1>
        </div>

        <form action="home.php" method="GET">
            <button type="submit">homepage</button>
        </form>
        <br>
        <!-- log out button -->
        <form action="../logout.php" method="get">
            <button type="submit">log out</button>
        </form>
        <br>

        <!-- Message Form --> 
        <form action="../posts/post_message.php" method="POST">
            <textarea name="message" rows="4" cols="50" placeholder="write your message here..." required></textarea><br>
            <button type="submit">post message</button>
        </form> 

        <!-- display messages -->
        <div class="messages">
            <h2>messages</h2>
            <hr>
            <?php
            // query to fetch messages from the database
            $sql = "SELECT users.profile_pic, messages.m_user, messages.message, 
                messages.m_id, messages.timestamp FROM messages JOIN users ON 
                messages.m_id = users.id ORDER BY messages.timestamp DESC";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output each message
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<div class="user">';
                    // display username
                    echo '<p style="font-weight: bold">' . htmlspecialchars($row['m_user']) . '</p>';
                    // display user picture
                    $profile_pic = !empty($row['profile_pic']) ? $row['profile_pic'] : '../pic_uploads/default.png';                    
                    echo '<div class="message">';
                    echo '<img src="' . htmlspecialchars($profile_pic) . '" alt="profile picture" style="width:50px; height:50px;">';
                    // display user message
                    echo '<p>' . htmlspecialchars($row['message']) . '</p>';
                    echo '<small>' . $row['timestamp'] . '</small>';
                    echo '</div><hr>';
                }
            } else {
                echo '<p>no messages yet.</p>';
            }
            ?>
        </div>
    </body>
    </html> 
    <?php
} else {
    // if not logged in, redirect to login page
    header("Location: ../index.php");
    exit();
}
