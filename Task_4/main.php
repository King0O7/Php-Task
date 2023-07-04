<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
        <link rel="stylesheet" href="login.css">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
    </style>    
</head>
<body>
    <main>
        <div class="container">
        <div class="content">
            <form class="form" method="post" action=" " >
                <table class="table">
                    <th colspan="2">
                        <h1>Login</h1>
                    </th>
                    <tr>
                        <td colspan="2">
                            <input type="email" placeholder="E-mail" name="email" id="email" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="password" placeholder="Password" name="psw" id="psw" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <div class="btn">
                                <button type="submit" name="login">Login</button>
                            </div>
                        </td>
                    </tr>
                </table>
            </form>
                <p class="login">
                    Don't have an account ? <a href="register.php">Register here</a>
                  </p>

        </div>
        </div>
    </main>

</body>
</html>

<?php
session_start();
if(isset($_SESSION['login'])){
 header("location:dashboard.php");
   }
include "function.php";
if(array_key_exists("login",$_POST)){
    login();
}
?>
