<?php
session_start();
include "db.php";
$email = $_SESSION['email'];
$query3 = "SELECT Access_Type.access_type,Final.image, Final.first_name FROM Final INNER JOIN User_Type ON Final.id = User_Type.user_id INNER JOIN Access_Type ON User_Type.access_id = Access_Type.id WHERE Final.email = '$email'";
$result3 = mysqli_query($connection, $query3);
$row3 = mysqli_fetch_assoc($result3);
include "function.php";
if(array_key_exists("home",$_POST)){
    dashboard();
} elseif(array_key_exists("logout",$_POST)){
    logout();
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
    .menu form {
        margin-top: 10px;
    }

    .menu input {
        margin: 5px;
        padding: 5px;
    }
    h2{
        text-align: center;
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
   $query1 = "Select * from Final";
   $result1 = mysqli_query($connection,$query1);
   if(mysqli_num_rows($result1)>0){
       ?>
        <h2>List of All Users</h2>
       <div class="section">
       <?php   echo "<table>
               <thead>
                   <tr>        
                       <th>ID</th>
                       <th>Email</th>
                       <th>User Name</th>
                      <th>Update Data</th>
                      <th>Show Data</th>
                      <th>Delete</th>
                   </tr>
               </thead> ";
               while($row = mysqli_fetch_assoc($result1)){
                   ?>
                   <tr>
                       <td><?php echo $row['id'];?></td>
                       <td><?php echo $row['email'];?></td>
                       <td><?php echo $row['user_name'];?></td>
                       <td> <a href="update.php?update=<?php echo $row['id']; ?>">Edit</a></td>                    
                       <td><button><a href="view.php?view=<?php echo $row['id']; ?>">Show</a></button></td>
                       <td><button><a href="delete.php?delete=<?php echo $row['id']; ?>">Delete</a></button></td>
   
                   </tr>
         <?php  }
           echo "</table>";?>
       </div>
 <?php  }
       else{
           echo "No records Found!!";
       } ?>
</body>
</html>