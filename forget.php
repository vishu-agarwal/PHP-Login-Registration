


<?php
    include 'connection.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>forget.php</title>

<style>

.imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    

    </style>

  </head>
  <body class = " row justify-content-md-center ">
    
  <form class="col-6" method = "post" action = "">
  <div class="imgcontainer">
            <img src="forgetpass.jpg" alt="Avatar" class="avatar">
        </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name = "email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <!--<input type="text" placeholder="Enter Username" name="email" required>-->
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">New Password</label>
    <input type="password" name = "npass" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" name = "cpass" class="form-control" id="exampleInputPassword1">
  </div>
 
  <button type="submit" name = "submit" class="btn btn-primary">Change Password</button>
  <a href = "login.php"><button type="button" name = "login" class="btn btn-primary">Login</button></a>
</form>

<?php
    if(isset($_POST['submit']))
    {
    
        $email = $_POST["email"];
       
        $npswd = $_POST["npass"];
        $cpswd = $_POST["cpass"];
        
           $query = "select * from user where email = '$email';";
            $res = mysqli_query($con,$query);
            $ar = mysqli_fetch_array($res);

        if ($ar)
       
        {
            if($npswd == $cpswd)
            {
                $query2 = "update user set password = '$npswd' where email = '$email';";
                $res2 = mysqli_query($con,$query2);
                if ($res2)
                {
                    ?>
                    <script type="text/javascript">
                      alert("Password update successfully !!!");
                            window.location = "login.php";
                        </script>
<?php
                }
            
            }
            else{
              ?>
          <script>
              alert("Password does not match!!!!");
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


