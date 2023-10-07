<?php 

session_start();

$error_message = "";


if(isset($_POST['username'])){

include("config.php");

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db);
    
    // Check connection
    if(!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    // username and password sent from form 
    $username = $_POST['username']; 
    $password = $_POST['password']; 
    
    $sql = "SELECT * FROM users WHERE username='$username' and password='$password' and user_type ='personnel'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);


    // If result matched $myusername and $mypassword, table row must be 1 row
    if($count > 0) {
      
    $_SESSION['login_personnel'] = $username;
        
    header("location:personnel_dashboard.php");

    } else {


// admin login 

    $sql = "SELECT * FROM users WHERE username='$username' and password='$password' AND user_type ='admin'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

     if($count > 0) { 

      $_SESSION['login_admin'] = $username;
        
        header("location:admin_dashboard.php");

    }else{

        ?>
        
     <script type="text/javascript">
         alert('Invalid username and password');
         window.location.href = 'index.php#login';
     </script>'

<?php

        }
    
    }
    mysqli_close($conn);
}

?>
