<?php
include "connection.php";
session_start();
    
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <title>Registration</title>

    <style>
   

    body {
        font-family: Calibri, Helvetica, sans-serif;
        background-color: rgb(252, 250, 251);
    }

    .container {
        padding: 25px;
        background-color: rgb(17, 113, 158);
        color: #f1f1f1;
        font-size: larger;

    }

    label {
        color: #f9fcf7;
        font-size: x-large;
    }
/*
    select {
        
        font-size: large;
    }

    pre {
        color: #f9fcf7;
        font: larger bold;
    }*/
    
    input[type=text],
    input[type=email],
    input[type=password]
    {
        width: 100%;
        padding: 15px;
        
        display: inline-block;
        
    }

    .imgcontainer {
        text-align: center;
    
    }
    img.avatar {
        width: 15%;
        border-radius: 50%;
    }
    /*
    border: none;
        background: #f1f1f1;
    margin: 5px 0 22px 0;
    input[type=text]:focus,
    input[type=email]:focus,
    input[type=password]:focus {
        background-color: rgb(65, 234, 250);
        outline: none;
    }*/

    div {
        padding: 0px 0;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    .registerbtn {
        background-color: #459206;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        height: 70px;
        opacity: 0.9;
        font-size: xx-large;
    }

    .registerbtn:hover {
        opacity: 1;
    }

    h3 {

        color: orange;
        font-size: x-large;
    }

    a {
        color: yellow;
    }
    </style>
</head>

<body>

    <form action="reg.php" method="post">
    <div class="imgcontainer">
            <img src="registerimg.png" alt="Avatar" class="avatar">
        </div>
        <div class="container">
       
            <center>
                <h1> Registeration Form</h1>
            </center>
            <hr>

            <label> <b>Full Name</b> </label>
            <input class="form-control" type="text" name="name" placeholder="Firstname                                                  
                                                                         Last Name" required /><br><br>
            <div class = "row">
            <div class=" col-2"><label><b>Gender</b></label> </div>
             
            <div class="form-check form-check-inline col-1">
            <input class="form-check-input" type="radio"  id="inlineRadio1" value="Male" name="gender">
            <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline col-1">
            <input class="form-check-input" type="radio"  id="inlineRadio1" value="Female" name="gender">
            <label class="form-check-label" for="inlineRadio1">Female</label>
            </div>
            <div class="form-check form-check-inline col-1">
            <input class="form-check-input" type="radio"  id="inlineRadio1" value="Other" name="gender">
            <label class="form-check-label" for="inlineRadio1">Other</label>
            </div>
             
            </div>
            <!--<input type="radio" value="Male" name="gender" checked> Male    <input type="radio" value="Female" name="gender"> Female    <input type="radio" value="Other" name="gender"> Other-->
            <div class = "row">
            <div class = "col-1">    <label><b>Phone </b> </label>  </div>
                
                <div class = "col-1 align-middle ">         
                    <select class="form-select-lg align-items-center" aria-label=".form-select-sm example">
                        <option value="+91">+91</option>
                        <option value="+021">+021</option>  
                        <option value="+90">+90</option>
                        <option value="+011">+011</option>
                        <option value="+92">+92</option>
                        <option value="+63">+63</option>
                    </select> 
                </div> 
                <div class = "col-10">
                <input class="form-control" type="text"  name="phone" placeholder="Phone No." aria-label=".form-control example">
                <!--<input type="text" name="phone" placeholder="Phone No." size="10" required />-->
                </div>
            </div> 
            
            <!--<label> <b> Current Address</b> </label>
            <textarea cols="80" rows="5" placeholder="Current Address" value="address" required></textarea>-->
            <label for="email"><b>Email</b></label>
            <!--<input type="text" placeholder="Enter Email" name="email" required />-->
            <input type="email" placeholder="Enter Email" name="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp" required>
            <div class="row">
            <div class="col-6">
                    <label for="psw"><b>Password</b></label>
                    <!--<input type="password" placeholder="Enter Password" name="password" required>-->
                    <input type="password" placeholder="Enter Password" name="password" class="form-control"
                        id="exampleInputPassword1" required>
            </div>
            <div class="col-6">
                    <label for="psw-repeat"><b>Re-type Password</b></label>
                    <!--<input type="password" placeholder="Retype Password" name="re-password" required/>-->
                    <input type="password" placeholder="Re-type Password" name="re-password" class="form-control"
                        id="exampleInputPassword1" required>
            </div>
            </div>   <br> 
            <!--<pre><label> <b>Biodata </b></label>                <input type="file" id="myFile" name="filename"></pre>-->
            <button type="submit" name="submit" class="registerbtn" value="register">Register</button>
            <h3>Already have an account ? <a href="login.php">Login</a></h3>
        </div>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
    
        $name = $_POST["name"];
        $gender = $_POST["gender"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $pswd = $_POST["password"];
        $rpass = $_POST["re-password"];
        if ($pswd == $rpass)
        {
           // $pswd=md5($pswd);
           // $sql = "insert into user(id,name, password, gender, email, phnNum, biodata) values(NULL,'$name','$pswd','$gender'',$email','$phone',NULL)";
           $query = "INSERT INTO `user`( `name`, `password`, `gender`, `email`, `phnNum`) VALUES ('$name','$pswd','$gender','$email','$phone');";
            $res=mysqli_query($con,$query);
           // $_SESSION['user']=$uname;
                ?>
    <script type="text/javascript">
    window.location = "home.php";
    </script>
    <?php
        }
        else
        {
            ?>
    <script>
    alert("Password does not match!!!!");
    </script>
    <?php
        }
    }
        ?>
</body>

</html>