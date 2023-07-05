<?php
session_start();
include "db.php";
$email = $_SESSION['email'];
$query3 = "SELECT Access_Type.access_type,Final.image, Final.first_name FROM Final INNER JOIN User_Type ON Final.id = User_Type.user_id INNER JOIN Access_Type ON User_Type.access_id = Access_Type.id WHERE Final.email = '$email'";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_assoc($result3);
include "function.php";
if(array_key_exists("assign_chap",$_POST)){
    assign_chap_to_sub();
}elseif(array_key_exists("home",$_POST)){
    dashboard();
}elseif(array_key_exists("logout",$_POST)){
    logout();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Chapter</title>
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    .container {
        background-color: #28292d;
    }

    .profile {
        display: flex;
        align-items: center;
    }

    .profile h3 {
        margin-left: 15px;
    }

    .header {
        display: flex;
        justify-content: space-between;
        margin: 0 auto;
        color: whitesmoke;
    }
    .image img {
        border-radius: 50%;
    }
    .content{
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }   
    h1{
        margin: 10px;
    }
    .menu form {
        margin-top: 10px;
    }

    .menu input {
        margin: 5px;
        padding: 5px;
    }
    .section{
        text-align: center;
    }
    </style>
</head>
<body>
<div class="container">
        <div class="header">
            <div class="profile">
                <h4 class="image">
                    <?php
                    if ($row3["image"]) {
                        $image_path = './Profile_images/' . $row3['image'];
                        echo '<img src="' . $image_path . '" width="60" height="60" alt="Profile Image">';
                    } else {
                        echo 'No image available';
                    }
                    ?></h4>
                <h3><?php echo "$row3[first_name]"; ?></h3>
            </div>
            <div class="menu">
                <form action="" method="post">
                    <input type="submit" name="home" value="Home">
                    <input type="submit" name="logout" value="Logout">
                </form>
            </div>
        </div>
    </div>
    <div class="section">
        <h1>Assign Chapter to Subject</h1>
        <form action="" method="POST">
            <label for="subject">Select Subject</label>
            <select name="subject_id" id="subject_id"> <!-- Updated name attribute -->
                <?php 
                include "db.php";
                $query ="SELECT * FROM subjects";
                $result1 = mysqli_query($connection, $query);
                foreach ($result1 as $subjects):?>
                    <option value="<?php echo $subjects['subject_id']; ?>"><?php echo $subjects['subject_name']; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            
            <label for="chapter">Select Chapter</label>
            <select name="chapter_id" id="chapter_id"> <!-- Updated name attribute -->
                <?php 
                include "db.php";
                $query ="SELECT * FROM chapters";
                $result2 = mysqli_query($connection, $query);
                foreach ($result2 as $chapters):?>
                    <option value="<?php echo $chapters['chapter_id']; ?>"><?php echo $chapters['chapter_name']; ?></option>
                <?php endforeach; ?>
            </select><br><br>   
            <input type="submit" name="assign_chap" value="Assign">
        </form>
    </div>
</body>
</html>
