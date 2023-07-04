<?php
include "function.php";
session_start();
$connection = mysqli_connect('localhost', 'root', 'root', 'task_4');
$email = $_SESSION['email'];
$query3 = "SELECT Access_Type.access_type,Final.image, Final.first_name FROM Final INNER JOIN User_Type ON Final.id = User_Type.user_id INNER JOIN Access_Type ON User_Type.access_id = Access_Type.id WHERE Final.email = '$email'";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_assoc($result3);
if (empty($_SESSION['login'])) {
    header("Location: main.php");
    exit;
}


if (array_key_exists("list", $_POST)) {
    listuser();
} elseif (array_key_exists("add", $_POST)) {
    adduser();
} elseif (array_key_exists("logout", $_POST)) {
    logout();
} elseif (array_key_exists("std",$_POST)){
    standard();
} elseif (array_key_exists("sub",$_POST)){
    subject();
} elseif (array_key_exists("chap",$_POST)){
    chapter();
} elseif(array_key_exists("chap_sub",$_POST)){
    assign_chap();
} elseif(array_key_exists("sub_std",$_POST)){
    assign_sub();
} elseif(array_key_exists("stud_std",$_POST)){
    assign_stud();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
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

    .menu form {
        margin-top: 10px;
    }

    .menu input {
        margin: 5px;
        padding: 5px;
    }

    .main {
        text-align: center;
        margin: 20px auto;
    }

    .navbar {
      background-color: #555;
      overflow: hidden;
    }

    .navbar input {
      float: left;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
      margin: 0 5px;
    }

    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 17px;
      border: none;
      outline: none;
      color: black;
      padding: 15.74px 16px;
      background-color: #f2f2f2;
      margin: 0 5px;
    }

    .navbar input:hover, .dropdown:hover .dropbtn {
      background-color: #f2f2f2;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    .dropdown-content input {
      float: none;
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content input:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
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
                    <input type="submit" name="list" value="List All Users">
                    <input type="submit" name="add" value="Add User">
                    <input type="submit" name="logout" value="Logout">
                </form>
            </div>
        </div>
    </div>
    <div class="navbar">
        <form action="" method="post">
            <input type="submit" name="std" value="Standard">
            <input type="submit" name="sub" value="Subject">
            <input type="submit" name="chap" value="Chapter">
        </form>
        <?php if($row3['access_type'] == "Admin" || $row3['access_type'] == "Teacher"){?>
        <div class="dropdown">
            <button class="dropbtn">Other Operations</button>
            <div class="dropdown-content">
                <form action="" method="post">
                    <input type="submit" name="chap_sub" value="Assign Chapter to Subject">
                    <input type="submit" name="sub_std" value="Assign Subject to Standard">
                    <input type="submit" name="stud_std" value="Assign Student to standard">
                </form>
            </div>
        </div>
        <?php } ?>
    </div>
    <div class="content">
        <div class="main">
            <h2>Hello <?php echo "$row3[first_name]"; ?> Your Role is <?php echo "$row3[access_type]"; ?></h2>
        </div>
    </div>
</body>

</html>