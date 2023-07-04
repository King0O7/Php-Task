<?php
include "function.php";
session_start();
$connection = mysqli_connect('localhost', 'root', 'root', 'task_4');
$email = $_SESSION['email'];
$query3 = "SELECT Access_Type.access_type,Final.image, Final.first_name FROM Final INNER JOIN User_Type ON Final.id = User_Type.user_id INNER JOIN Access_Type ON User_Type.access_id = Access_Type.id WHERE Final.email = '$email'";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_assoc($result3);
if(array_key_exists("assign_stud",$_POST)){
    assign_stud_to_std();
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
    <title>Assign Student</title>
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
        <h1>Assign Student to Standard</h1>
        <form action="" method="POST">
            <label for="standard">Select Standard</label>
            <select name="standard_id" id="standard_id"> 
                <?php 
                $connection = mysqli_connect('localhost', 'root', 'root', 'task_4');
                $query ="SELECT * FROM standards";
                $result1 = mysqli_query($connection, $query);
                foreach ($result1 as $standards):?>
                    <option value="<?php echo $standards['standard_id']; ?>"><?php echo $standards['standard']; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            
            <label for="student">Select Student</label>
            <select name="student_id" id="student_id"> 
                <?php 
                $connection = mysqli_connect('localhost', 'root', 'root', 'task_4');
                $check = "Student";
                
                $query = "SELECT User_Type.user_id,Final.first_name, Final.last_name FROM Final INNER JOIN User_Type ON Final.id = User_Type.user_id INNER JOIN Access_Type ON User_Type.access_id = Access_Type.id WHERE Access_Type.access_type = '$check'";

                print_r($query);
                $result1 = mysqli_query($connection, $query);
                print_r($result1);
                foreach ($result1 as $Final):?>
                    <option value="<?php echo $Final['user_id']; ?>"><?php echo $Final['first_name']; ?></option>
                <?php endforeach; ?>
            </select><br><br>
            <input type="submit" name="assign_stud" value="Assign">
        </form>
    </div>
</body>
</html>
