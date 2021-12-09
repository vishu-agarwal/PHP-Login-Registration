<?php
include "connection.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Login</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    form {
        border: 3px solid #f1f1f1;
    }

    input[type=email],
    input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
    }

    button:hover {
        opacity: 0.8;
    }

    .signup {
        width: auto;
        padding: 10px 18px;
        background-color: orange;
        font-size:larger ;
    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 10%;
        border-radius: 50%;
    }

    .container {
        padding: 16px;
    }

    span.psw {
        float: right;
        padding-top: 16px;
        font-size: larger;
        
    }

    /* Change styles for span and cancel button on extra small screens */
    @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }

        .signup {
            width: 100%;

        }
    }
    </style>
</head>

<body>

    <h2 ><center>Login Form</center></h2>

    <form action="login.php" method="post">
        <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
       
            <label for="uname"><b>Username</b></label>
            <input type="email" placeholder="Enter Username" name="uname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
           <!-- <input type="text" placeholder="Enter Username" name="uname" required>-->
           <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            <label for="psw"><b>Password</b></label>
            <!--<input type="password" placeholder="Enter Password" name="pswd" required>-->
            <input type="password" placeholder="Enter Password" name="pswd"  class="form-control" id="exampleInputPassword1" required>

            <button type="submit" name ="login" >Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#d5f5d6">
        <a href="reg.php"><button type="button"  name ="signup"  class="signup">SignUp</button></a>
            <span class="psw"><b>Forgot <a href="forget.php">Password ?</a></b></span>
        </div>
    </form>
    <?php
    if(isset($_POST['login']))
    {
    
        $uname = $_POST["uname"];
       
        $pswd = $_POST["pswd"];
       
        
           $query = "select * from user where email = '$uname';";
            $res = mysqli_query($con,$query);
            $ar = mysqli_fetch_array($res);

        if ($ar)
       
        {
            $query2 = "select * from user where email = '$uname' and password = '$pswd';";
            $res2 = mysqli_query($con,$query2);
            $ar2 = mysqli_fetch_array($res2);
            if (!$ar2)
       
            {
                
                ?>
                <script type = "text/javascript">
                    
                    alert("username and Password does not match!!!!");
                </script>
         <?php
            }
            else
            {
                $_SESSION['user']=$uname;
                ?>
                <script type = "text/javascript">
                    window.location = "home.php";
                </script>
                <?php
            }

           
        }
        else
       
            {
                ?>
                <script type = "text/javascript">
                    alert("username  does not exist!!!!");
                </script>
         <?php
            }

    }
        ?>
</body>

</html>