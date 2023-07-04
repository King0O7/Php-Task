<?php 
session_start();
$connection = mysqli_connect('localhost','root','root','task_4');
$email = $_SESSION['email'];
$query3 = "SELECT Access_Type.access_type,Final.image, Final.first_name FROM Final INNER JOIN User_Type ON Final.id = User_Type.user_id INNER JOIN Access_Type ON User_Type.access_id = Access_Type.id WHERE Final.email = '$email'";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_array($result3);

$id = $_GET['edit'];   
$query1 = "SELECT * FROM standards WHERE standard_id= '$id'";
$result = mysqli_query($connection,$query1);
$row = mysqli_fetch_assoc($result);

include "function.php";
if(array_key_exists('std_update',$_POST)){
    std_update();
}
elseif(array_key_exists("home",$_POST)){
    dashboard();
}elseif(array_key_exists("std",$_POST)){
    standard();
}
?>
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
    .section{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
    form{
        text-align: center;
        margin: 10px;
    }
</style>
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
                    <input type="submit" name="std" value="Standard List">
                    <input type="submit" name="logout" value="Logout">
                </form>
            </div>
        </div>
    </div>
<div class="section">
    <h2>Update Data</h2>
<form action="" method="post" enctype="multipart/form-data">

<label>Standard ID :</label>
<input disabled="disabled" value="<?php echo $row['standard_id'] ?>" name="id" > <br> <br>

<label>Standard :</label>
<input type="int" value="<?php echo $row['standard']?>" name="std_name"> <br> <br>

<input type="submit" value="Update Data" name="std_update">

</form>

</div>


