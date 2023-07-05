<?php
session_start();
include "db.php";
$email = $_SESSION['email'];
$query3 = "SELECT Access_Type.access_type,Final.image, Final.first_name FROM Final INNER JOIN User_Type ON Final.id = User_Type.user_id INNER JOIN Access_Type ON User_Type.access_id = Access_Type.id WHERE Final.email = '$email'";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_assoc($result3);
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
    .image img{
        border-radius: 50%;
    }
    .dt{
        display: flex;
        justify-content: center;
    }
    .details{
        text-align: center;
        margin: 20px;
        border: 1px solid black;
        width: 33%;
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
<?php
include "function.php";
if(array_key_exists("list",$_POST)){
    listuser();
}elseif(array_key_exists("home",$_POST)){
    dashboard();
}elseif(array_key_exists("list",$_POST)){
    listuser();
}elseif(array_key_exists("logout",$_POST)){
    logout();
}
include "db.php";
if ($connection->connect_error){
die("Could not connect to the server: " . $connection->connect_error);
}
$id = $_GET['view'];
$query = "SELECT * FROM Final WHERE id = '$id' ";
$result = mysqli_query($connection,$query);
if (mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
        ?>
        <div class="dt">
        <div class="details">
            <div class="image">
            <?php
                    if ($row['image']) {
                        $image_path = './Profile_images/' . $row['image'];
                        echo '<img src="' . $image_path . '" width="100" height="100" alt="Profile Image">';
                    } else {
                        echo 'No image available';
                    }
                    ?>
            </div>
            <h1><?php echo $row['first_name']." ". $row['last_name'];?></h1>
            <h3>ID : <?php echo $row['id']?></h3>
            <h3>Email : <?php echo $row['email']?></h3>
            <h3>State : <?php echo $row['state']?></h3>
            <h3>User Name : <?php echo $row['user_name']?></h3>
        </div>
        </div>
<?php
    }
}
else{
    echo "NO RECORDS FOUND!!";
}
?>
