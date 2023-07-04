<?php
include "function.php";
if(array_key_exists("add",$_POST)){
    add_user();
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration Page</title>
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');
        *{
	margin: 0;
	padding: 0;
	box-sizing: border-box;
  	font-family: 'Poppins', sans-serif;
    }
    main 
    {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: #1c1c1c;
    }
.table 
{
	position: relative;
	width: 300px;
	margin-top: 35px;
    text-align: center;
}
.table input
{
	position: relative;
    border : none;  
	width: 100%;
	padding: 20px 10px 10px;
    border-bottom: 1px solid #45f3ff;
	font-size: 1em;
    background-color: #28292d;
	letter-spacing: 0.05em;
    color: whitesmoke;
}
.table select ,label{
    position: relative;
    border : none;  
	padding: 10px auto;
    margin: 20px 5px 10px 0px;
    border-bottom: 1px solid #45f3ff;
	font-size: 1em;
    background-color: #28292d;
	letter-spacing: 0.05em;
    color: whitesmoke;
}
    .container 
    {
        position: relative;
        display: flex;
        flex-direction: column;
        width: 400px;
        height: fit-content;
        border-radius: 8px;
        overflow: hidden;
        scale: 1;
    }
    .container::before 
    {
        content: "";
        z-index: -1;
        position: absolute;
        top: -50%;
        left: -50%;
        width: 400px;
        height: 700px;
        transform-origin: bottom right;
        background: linear-gradient(0deg,transparent,#45f3ff,#45f3ff);
        animation: animate 6s linear infinite;
    }
    .container::after 
    {
        content: "";
        z-index: -1;
        position: absolute;
        top: -50%;
        left: -50%;
        width: 400px;
        height: 700px;
        transform-origin: bottom right;
        background: linear-gradient(0deg,transparent,#45f3ff,#45f3ff);
        animation: animate 6s linear infinite;
        animation-delay: -3s;
    }
    @keyframes animate 
    {
        0%
        {
            transform: rotate(0deg);
        }
        100%
        {
            transform: rotate(360deg);
        }
    }
    .content{
        display: flex;
        align-items: center;
        flex-direction: column;
        height: fit-content;
        width: 400px;
        background: #28292d;
        scale: 0.985;
    }
    .form{
        color: whitesmoke;
    }
    
    .login a{
        color: #45f3ff;
        text-decoration: none;
    }
    .btn button{
        margin: 15px 75px;
        width: 50%;
        font-size: large;
        font-weight: bold;
    }
    </style>    
</head>
<body>
    <main>
        <div class="container">
        <div class="content">
            <form class="form", method="post" action="">
                <table class="table">
                    <th colspan="2">
                        <h1>Add User</h1>
                    </th>
                    <tr class="tr">
                        <td colspan="2"> <div class="inputBox">
                                <input type="text" placeholder="First Name" name="fname" id="fname" >
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="text" placeholder="Last Name" name="lname" id="lname" >
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="email" placeholder="E-mail" name="email" id="email" >
                        </td>
                    </tr>
                    <tr>
                        <td class="inpt" colspan="2">
                            <input type="text" placeholder="State" name="state" id="state">
                        </td>
                    </tr>
                    <tr>
                        <td class="inpt" colspan="2">
                            <label for="access_type">Select Access Type : </label>
                            <select name="access_type" id="access_type">
                        <?php
                            showData();
                        ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="inpt" colspan="2">
                            <input type="text" placeholder="User Name" name="uname" id="uname">
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
                                <button type="submit" name="add" >Add User</button>
                            </div>
                        </td>
                    </tr>
                </table>

            </form>
        </div>
        </div>
    </main>
</body>
</html>