<?php
 // include ' connection.php';
  include 'connection.php';
  session_start();
  
  if (isset($_SESSION['user']))
  {
    $uname = $_SESSION['user'];
    $query = "select name from user where email = '$uname';";
    $res = mysqli_query($con,$query);
    $ar = mysqli_fetch_array($res);
    $name = $ar[0];
    //$act = "";
    
    /*if (isset($_POST["edit"]))
    {*/
            
          if (isset($_POST["upload"]))
          {
            //storing all necessary data into the respective variables.
            
                $file = $_FILES['uploadfile'];
                $file_name = $file['name'];
                $file_type = $file ['type'];
                $file_size = $file ['size'];
                $file_path = $file ['tmp_name'];
                
                $target_file = "./image/".basename($_FILES["uploadfile"]["name"]);
                $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
                $uploadOk = 1;
                
                //Restriction to the image. You can upload any types of file for example video file, mp3 file, .doc or .pdf just mention here in OR condition. 
                // Check file size
                if ($file_size>= 10485760)
                {
                  ?>
                <script type="text/javascript">
                alert("Sorry, your file is too large.must be less than 10 MB!!");
                </script>
                <?php
                // a "Sorry, your file is too large.";
                  $uploadOk = 0;
                }
                // Allow certain file formats
                //$FileType != "jpeg" &&  $FileType != "jpg" && $FileType != "png" && 
                else if( $FileType != "pdf") 
                {
                  ?>
                <script type="text/javascript">
                alert("Sorry, only  PDF files are allowed.");
                </script>
                <?php
                  //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                  $uploadOk = 0;
                }
                
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) 
                {
                  ?>
                <script type="text/javascript">
                alert("File not Uploaded!!!!");
                </script>
                <?php
                } 
                else 
                {              
                      if(move_uploaded_file ($file_path,'./image/'.$file_name))//"images" is just a folder name here we will load the file.
                      {
                          $query="update user set biodata = '$file_name' where email = '$uname';";//mysql command to insert file name with extension into the table. Use TEXT datatype for a particular column in table.
                          $res = mysqli_query($con,$query);
                          if(!$res)
                          {
                          
                          ?>
                          <script type="text/javascript">
                          alert("File not Uploaded!!!!");
                          </script>
                          <?php
                          
                          }
                      }
                  }
                
          }
  } 
  //}
  else
  {
        ?>
    <script type="text/javascript">
    window.location = "login.php";
    </script>
    <?php
  }
 
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Home</title>

    <style>
    .container1 {
        padding-top: 15px;

        padding-bottom: 15px;

        background-color: #fffca6;

        font-size: larger;

    }

    .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
    }

    img.avatar {
        width: 20%;
        border-radius: 50%;
    }

    a {
        text-decoration: none;

    }
    </style>
</head>

<body>

    <div class="container container1">
        <div class="row">

            <nav class="navbar navbar-expand navbar-dark bg-dark">
                <div class="container-fluid ">
                    <a class="navbar-brand" href="logout.php"><button type="button" class="btn btn-light btn-lg fw-bolder">Sign
                            Out</button></a>


                </div>
                <div class="d-flex d-grid gap-2 d-md-flex justify-content-md-end">
                
                <form class = "d-grid gap-2 d-md-flex justify-content-md-end"  method = "post">
                    <button type="submit" value="submit" name="edit" id = "editid" class="btn btn-primary btn-lg fw-bolder" >Edit</button>
                    <button type="submit" value="submit" name="display" id = "dispId" class="btn btn-primary btn-lg fw-bolder">Display</button>
                </div>
                </form>

            </nav>
        </div>
        <div >
            <div class="imgcontainer">
                <img src="bioimg.jpg" alt="Avatar" class="avatar">
            </div>
            <center><b>
                    <h3 class="navbar-brand fs-1 fw-bolder" ">WELCOME  <?php echo strtoupper($name);?> !</h3></b></center>
        </div>
          <div id = "choosefile">
              <form action=" home.php" method="post" enctype="multipart/form-data" id="myForm">
                  <div class="input-group input-group-lg mb-3 ">
                      <input type="file" class="form-control  " name="uploadfile" id="inputGroupFile02" required />

                      <button type="submit" value="submit" name="upload" class="btn btn-success input-group-text fw-bolder">Upload</button>
                  </div>
              </form>
        </div>
        <div>
            <?php
                     

                  
                        if (isset($_POST["display"]))

                        {
                              //$q =  "SELECT biodata FROM user where biodata is Null and email = '$uname';";
                              //$res_q = mysqli_query($con,$q);
  
                    
                              //To retrieve uploaded file immediately or write code in separate .php file if you wanna later or by clicking.
                                
                              $result =  "SELECT biodata FROM user where email = '$uname' and biodata is not Null;";
                              $res2 = mysqli_query($con,$result);
                              if (!$res2)
                              {
                                ?>
                                <center><b>
                                <h3 class="navbar-brand fs-1 fw-bolder" ">OPPs! first upload your biodata...</h3></b></center>
                                <?php
                              }
                              else
                              {
                              //if (mysqli_num_rows($res2)>0)
                              //{ 
                                
                               // while($row =  mysqli_fetch_array($res2))
                                //{
                                  //if ($FileType = "jpeg" && $FileType = "jpg" && $FileType = "png" && $FileType != "pdf")//||$file_type="png")
                                  //{
                                      //echo "<img src='./image/".$row['biodata']."' height = '700px' width = '100%'>";
                                  
                                  //}
                                  //else {
                                    $row =  mysqli_fetch_array($res2);
                                    if ($row['biodata'] != Null)
                                    {
                                  ?> 

                                          <iframe src="./image/<?php echo $row['biodata']; ?>" width="100%" height="900px">
                                          </iframe>
                                          <script>
                                        
                                              $("#myForm :input").prop("disabled", true);
                                            
                                          </script> 

                                          <?php
                                  }
                                  else{
                                    ?>
                                <center><b>
                                <h3 class="navbar-brand fs-1 fw-bolder" ">OPPs! first upload your biodata...</h3></b></center>
                                <?php
                                  }
                               // }
                              //}
                            } 
                        }            
                  
              ?>
        </div>
        

    </div>

</body>

</html>


