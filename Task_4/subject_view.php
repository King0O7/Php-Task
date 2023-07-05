<?php
include "function.php";
session_start();
include "db.php";
$email = $_SESSION['email'];
$query3 = "SELECT Access_Type.access_type,Final.image, Final.first_name FROM Final INNER JOIN User_Type ON Final.id = User_Type.user_id INNER JOIN Access_Type ON User_Type.access_id = Access_Type.id WHERE Final.email = '$email'";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_assoc($result3);
if(array_key_exists("home",$_POST)){
    dashboard();
}
elseif(array_key_exists("add_sub",$_POST)){
    addsubject();
} elseif(array_key_exists("logout",$_POST)){
    logout();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject</title>
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
    h2{
        margin: 10px;
    }
    .menu form {
        margin-top: 10px;
    }

    .menu input {
        margin: 5px;
        padding: 5px;
    }
    .content{
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .section{
        display: flex;
        justify-content: center;
    }
    table, th, td{
        border: 1px solid;
        text-align: center;
        margin-top: 20px;
        padding: 5px 20px;
    }
    a{
        text-decoration: none;
        color: black;
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

<?php
    include "db.php";
    $query1 = "Select * from subjects";
    $result1 = mysqli_query($connection,$query1);
   if(mysqli_num_rows($result1)>0){
       ?>
       <?php if($row3['access_type'] == "Admin" || $row3['access_type'] == "Teacher"){?>
       <div class="content">
        <h2>List of Subjects</h2>
            <form action="" method="post">
                <label for="subject">Add New Subject : </label>    
                <input type="text" name="subject">
                <input type="submit" name="add_sub" value="Add Subject">
            </form>
        </div>
        <?php } ?>
       <div class="section">
       <?php   echo "<table>
               <thead>
                   <tr>        
                       <th>ID</th>
                       <th>Subject</th> ";
                       if ($row3['access_type'] == "Admin" || $row3['access_type'] == "Teacher"){
                    echo" <th>Edit</th>
                       <th>Delete</th>";}
                    echo"</tr>
               </thead> ";
               while($row = mysqli_fetch_assoc($result1)){
                   ?>
                   <tr>
                       <td><?php echo $row['subject_id'];?></td>
                       <td><?php echo $row['subject_name'];?></td>   
                       <?php if ($row3['access_type'] == "Admin" || $row3['access_type'] == "Teacher"){?>
                            <td><button><a href="subject_edit.php?edit=<?php echo $row['subject_id']; ?>">Edit</a></button></td>
                            <td><button><a href="subject_delete.php?delete=<?php echo $row['subject_id']; ?>">Delete</a></button></td>
                       <?php } ?>
                   </tr>
         <?php  }
           echo "</table>";?>
       </div>
 <?php  }
       else{
           echo "No records Found!!";
       } ?>