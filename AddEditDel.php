<?php
include 'connection.php';
if (isset($_SESSION['user']))
  {
    $uname = $_SESSION['user'];
  }

if ($action1 = $_REQUEST["edit"])
{
    ?>
    <script>
        $(document).ready(function(){
          $("#myForm :input").prop("disabled", false);
            
        });
    </script>  
    <?php
    header("location:home.php");
}
else if ($action1 = $_REQUEST["delete"])
{
    $query="update user set biodata = Null where email = '$uname';";
   $res = mysqli_query($con,$query);
  
    ?>
    <script>
        $(document).ready(function(){
          $("#myForm ").prop("disabled", false);
          
        });
    </script>
    
    
    <?php

header("location:home.php");
 
}
mysqli_close($con);

?>