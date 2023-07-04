<?php 

session_start();
$connection = mysqli_connect('localhost', 'root', 'root', 'task_4');
$email = $_SESSION['email'];
$query3 = "SELECT Access_Type.access_type,Final.image, Final.first_name FROM Final INNER JOIN User_Type ON Final.id = User_Type.user_id INNER JOIN Access_Type ON User_Type.access_id = Access_Type.id WHERE Final.email = '$email'";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_assoc($result3);
$id = $_GET['update'];
   
$query1 = "SELECT * FROM Final WHERE id= '$id'";
$result = mysqli_query($connection,$query1);
$row = mysqli_fetch_assoc($result);
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
    h1{
        margin: 10px;
    }
    .section{
        display: flex;
        justify-content: center;
    }
    table, th, td{
        border: 1px solid;
        text-align: center;
        margin-top: 20px;
    }
    a{
        text-decoration: none;
        color: black;
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
        margin: 10px;
        text-align: center;
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
                    <input type="submit" name="list" value="List of all User">
                    <input type="submit" name="logout" value="Logout">
                </form>
            </div>
        </div>
    </div>
<div class="section">
    <h1>Update Data</h1>
<form action="" method="post" enctype="multipart/form-data">

<label>ID :</label>
<input type="number" value="<?php echo $row['id'] ?>" name="id" readonly> <br> <br>

<label>First Name :</label>
<input type="text" value="<?php echo $row['first_name']?>" name="fname"> <br> <br>

<label>Last Name :</label>
<input type="text" value="<?php echo $row['last_name']?>" name="lname"> <br> <br>

<label>Email :</label>
<input type="email" value="<?php echo $row['email']?>" name="email" readonly> <br> <br>

<label>State :</label>
<input type="text" value="<?php echo $row['state']?>" name="state"> <br> <br>

<label>User Name :</label>
<input type="text" value="<?php echo $row['user_name']?>" name="uname"> <br> <br>

<label>Password :</label>
<input type="text" value="<?php echo $row['password']?>" name="psw"> <br> <br>

<input type="file" name="img"> <br> <br>


<input type="submit" value="Update Data" name="update">

</form>

</div>
<?php
include "function.php";
if(array_key_exists('update',$_POST)){
    update();
}
elseif(array_key_exists("home",$_POST)){
    dashboard();
}
elseif(array_key_exists("list",$_POST)){
    listuser();
}
?>

