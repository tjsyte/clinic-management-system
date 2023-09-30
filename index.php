<?php
session_start(); 
include('db_config.php');

if(isset($_SESSION['username'])) {
  header("Location: welcome.php"); 
}

if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($db, $sql);

  if(mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username; 
    header("Location: welcome.php");
  } else {
    $error = "Invalid username or password";
  }
}

if(isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $user_type = $_POST['user_type'];
  $sql = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$password', '$user_type')";
  $result = mysqli_query($db, $sql);

  if($result) {
    $_SESSION['username'] = $username;
  } else {
    $error = "Error registering user";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login and Registration</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
    body {
      background-image: url('images/background.jpg');
      font-family: Arial, sans-serif;
    }
    
    .container {
      background-color: #2c3e50;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      margin: auto;
      max-width: 400px;
      padding: 20px;
      text-align: center;
      margin-top: 50px;
      box-shadow: rgba(0, 0, 0, 0.05) 0 54px 55px,
      rgba(0, 0, 0, 0.05) 0 -12px 30px,
      rgba(0, 0, 0, 0.05) 0 4px 6px,
      rgba(0, 0, 0, 0.05) 0 12px 3px,
      rgba(0, 0, 0, 0.05) 0 -3px 5px;
    }

    h2 {
      color: #fff;
      margin-bottom: 20px;
      text-shadow: rgba(0, 0, 0, 0.05) 0 54px 55px,
      rgba(0, 0, 0, 0.05) 0 -12px 30px,
      rgba(0, 0, 0, 0.05) 0 4px 6px,
      rgba(0, 0, 0, 0.05) 0 12px 3px,
      rgba(0, 0, 0, 0.05) 0 -3px 5px;
    }

    .nav-link {
      background-color: #1abc9c;
      color: #fff;
    }

    .nav-link:hover {
      background-color: #1abc9c;
      color: #fff;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 10px;
      color: #1abc9c;
      text-align: left;
    }

    .form-control {
      box-shadow: rgba(0, 0, 0, 0.05) 0 54px 55px,
      rgba(0, 0, 0, 0.05) 0 -12px 30px,
      rgba(0, 0, 0, 0.05) 0 4px 6px,
      rgba(0, 0, 0, 0.05) 0 12px 3px,
      rgba(0, 0, 0, 0.05) 0 -3px 5px;
    }

    .btn-primary {
      background-color: #1abc9c;
      border: none;
      border-radius: 5px;
      color: #FFFFFF;
      cursor: pointer;
      font-size: 16px;
      margin-top: 20px;
      padding: 10px;
      width: 60%;
      box-shadow: rgba(0, 0, 0, 0.05) 0 54px 55px,
      rgba(0, 0, 0, 0.05) 0 -12px 30px,
      rgba(0, 0, 0, 0.05) 0 4px 6px,
      rgba(0, 0, 0, 0.05) 0 12px 3px,
      rgba(0, 0, 0, 0.05) 0 -3px 5px;
    }

    .btn-primary:hover {
      background-color: #38A3A5;
      color: #fff;
    }

    .error {
      color: red;
    }
  </style> 
</head>
  <body>
    <div class="container">
        <h2>Login or Register</h2>
        <?php if(isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <form method="post" action="">
                    <div class="form-group"><br>
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
            </div>
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
              <form method="post" action="">
                <div class="form-group"><br>
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" name="username" id="username" required placeholder="Enter your username">
                </div>
                <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" name="password" id="password" required placeholder="Enter your password">
                </div>
                <div class="form-group">
                  <label for="user_type">User Type:</label>
                  <select class="form-control" name="user_type" id="user_type" required>
                    <option value="pharmacist">Pharmacist</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
              </form>
            </div>
        </div>
    </div>
  </body>
</html>