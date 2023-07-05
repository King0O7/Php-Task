<?php
function login(){
    session_start(); 
    include "db.php";
    $email = $_POST['email'];
    $psw = md5($_POST['psw']);
    $query = " SELECT * FROM Final WHERE email = '$email' && password = '$psw'";
    $result = mysqli_query($connection,$query);
    if(mysqli_num_rows($result) > 0){
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        header('Location: dashboard.php'); 
    }else{
    echo "<script>alert('Check Email id or password');</script>";
    }
}
function register(){
include "db.php";
if(!$connection){
    die("Database not connected!!");
}
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$state = $_POST['state'];
$username = $_POST['uname'];
$password =$_POST['psw'];
$cpassword = $_POST['cpsw'];
$access_id = $_POST['access_type'];

if($password!==$cpassword){
    echo "<script>alert('Password and Confirm password Does not match')</script>";
  }
else{  
    $password = md5($_POST['psw']);
    $query = "INSERT INTO Final (first_name,last_name,email,state,user_name,password) VALUES ('$firstname','$lastname','$email','$state','$username','$password')";
    $result = mysqli_query($connection,$query);
    
    if(!$result){
        die('Query Failed!!'.mysqli_error($connection));
    }
    else{
        $user_id = mysqli_insert_id($connection);
        $query1 = "SELECT id FROM Access_Type WHERE access_type = '$access_id'";
        $result1 = mysqli_query($connection,$query1);
        if(!$result1){
                    die('Query Failed!!'.mysqli_error($connection));
                }
        else{
                $row = mysqli_fetch_assoc($result1);
                $access_id = $row['id'];

                $user_table = "INSERT INTO `User_Type` (`user_id`, `access_id`) VALUES ( '$user_id', '$access_id')";
                mysqli_query($connection,$user_table);
                
                header('location:main.php');
                exit();
            }
        }
    }
}
function add_user(){
include "db.php";
if(!$connection){
    die("Database not connected!!");
}
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email = $_POST['email'];
$state = $_POST['state'];
$username = $_POST['uname'];
$password =$_POST['psw'];
$access_id = $_POST['access_type'];
  
    $password = md5($_POST['psw']);
    $query = "INSERT INTO Final (first_name,last_name,email,state,user_name,password) VALUES ('$firstname','$lastname','$email','$state','$username','$password')";
    $result = mysqli_query($connection,$query);
    
    if(!$result){
        die('Query Failed!!'.mysqli_error($connection));
    }
    else{
        $user_id = mysqli_insert_id($connection);
        $query1 = "SELECT id FROM Access_Type WHERE access_type = '$access_id'";
        $result1 = mysqli_query($connection,$query1);
        if(!$result1){
                    die('Query Failed!!'.mysqli_error($connection));
                }
        else{
                $row = mysqli_fetch_assoc($result1);
                $access_id = $row['id'];

                $user_table = "INSERT INTO `User_Type` (`user_id`, `access_id`) VALUES ( '$user_id', '$access_id')";
                mysqli_query($connection,$user_table);
                
                header('location:main.php');
                exit();
            }
        }
}
function listuser(){
    header("location:list_all_data.php");
}
function dashboard(){
    header("location:dashboard.php");
}
function adduser(){
    header("location:add_user.php");
}
function standard(){
    header("location:standard_view.php");
}
function subject(){
    header("location:subject_view.php");
}
function chapter(){
    header("location:chapter_view.php");
}
function assign_chap(){
    header("location:assign_chapter.php");
}
function assign_sub(){
    header("location:assign_subject.php");
}
function assign_stud(){
    header("location:assign_student.php");
}
function showData(){
    include "db.php";
    $query = "SELECT * FROM Access_Type";
    $result = mysqli_query($connection,$query); 
    if(!$result){
        die("Query Failed!!");
    }else{
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['access_type'];
                echo "<option value='$id'>$id</option>";
        }
    }
}
function addsubject(){
    include "db.php";
    $sub = $_POST['subject'];
    $query = "INSERT INTO `subjects` (`subject_name`) VALUES ('$sub')";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "<script>window.location.href='subject_view.php'</script>";
    } else{
        echo "something went wrong".mysqli_error($connection);
    }
}
function addstandard(){
    include "db.php";
    $std = $_POST['standard'];
    $query = "INSERT INTO `standards` (`standard`) VALUES ('$std')";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "<script>window.location.href='standard_view.php'</script>";
    } else{
        echo "something went wrong".mysqli_error($connection);
    }
}
function addchapter(){
    include "db.php";
    $chap = $_POST['chapter'];
    $query = "INSERT INTO `chapters` (`chapter_name`) VALUES ('$chap')";
    $result = mysqli_query($connection,$query);
    if($result){
        echo "<script>window.location.href='chapter_view.php'</script>";
    } else{
        echo "something went wrong".mysqli_error($connection);
    }
}
function assign_chap_to_sub(){
    $connection = mysqli_connect('localhost', 'root', 'root', 'task_4');
    $subject_id = $_POST['subject_id']; 
    $chapter_id = $_POST['chapter_id']; 
    $query ="INSERT INTO chapter_to_subject (subject_id, chapter_id) VALUES ($subject_id, $chapter_id)";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die('Query Failed'.mysqli_error($connection));
    }else{
        header("location:assign_chapter.php");
    }
}
function assign_sub_to_std(){
    $connection = mysqli_connect('localhost', 'root', 'root', 'task_4');
    $standard_id = $_POST['standard_id'];
    $subject_id = $_POST['subject_id']; 
    $query ="INSERT INTO subject_to_standard (standard_id, subject_id) VALUES ($standard_id, $subject_id)";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die('Query Failed'.mysqli_error($connection));
    }else{
        header("location:assign_subject.php");
    }
}
function assign_stud_to_std(){
    $connection = mysqli_connect('localhost', 'root', 'root', 'task_4');
    $student_id = $_POST['student_id']; 
    $standard_id = $_POST['standard_id']; 
    $query ="INSERT INTO student_to_standard (standard_id, student_id) VALUES ($standard_id, $student_id)";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die('Query Failed'.mysqli_error($connection));
    }else{
        header("location:assign_student.php");
    }
}
function sub_update(){
    include "db.php";

    $subname = $_POST['sub_name'];
    $id = $_GET['edit'];
        
    $query = "UPDATE `subjects` SET `subject_name`='$subname' WHERE subject_id = '$id' ";
    $result = mysqli_query($connection,$query);

    if($result){
        echo "<script> window.location.href='subject_view.php';</script>";
    }
    else{
        echo "Something went wrong".mysqli_error($connection);
    }
}
function chap_update(){
    include "db.php";

    $chapname = $_POST['chap_name'];
    $id = $_GET['edit'];
        
    $query = "UPDATE `chapters` SET `chapter_name`='$chapname' WHERE chapter_id = '$id' ";
    $result = mysqli_query($connection,$query);

    if($result){
        echo "<script> window.location.href='chapter_view.php';</script>";
    }
    else{
        echo "Something went wrong".mysqli_error($connection);
    }
}
function std_update(){
    include "db.php";

    $stdname = $_POST['std_name'];
    $id = $_GET['edit'];
        
    $query = "UPDATE `standards` SET `standard`='$stdname' WHERE standard_id = '$id' ";
    $result = mysqli_query($connection,$query);

    if($result){
        echo "<script> window.location.href='standard_view.php';</script>";
    }
    else{
        echo "Something went wrong".mysqli_error($connection);
    }
}
function update(){
    include "db.php";

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email = $_POST['email'];
    $state = $_POST['state'];
    $username = $_POST['uname'];
    $password = $_POST['psw'];
    $id = $_GET['update'];

    if (isset($_FILES['img'])) {
        $img_name = $_FILES['img']['name'];
        $img_tmp = $_FILES['img']['tmp_name'];

        $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);

        $new_filename = $firstname . '_'. $lastname . '.' . $img_extension;

        $destination = './Profile_images/' . $new_filename;
        move_uploaded_file($img_tmp, $destination);
        
    $query = "UPDATE `Final` SET `first_name`='$firstname',`last_name`='$lastname',`email`='$email',`state`='$state',`user_name`='$username',`password`='$password', `image`= '$new_filename' WHERE ID = '$id' ";
    $result = mysqli_query($connection,$query);

    $result = mysqli_query($connection,$query);

    if($result){
        echo "<script> window.location.href='list_all_data.php';</script>";
    }
    else{
        echo "Something went wrong".mysqli_error($connection);
    }
}
}
function logout(){
    session_start();
    session_unset();
    session_destroy();
    header("location:main.php");
    exit();
}
?>