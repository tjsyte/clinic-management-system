<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/f889e2aa12.js" crossorigin="anonymous"></script>
</head>

<style>

body {
	background-image: url('images/background.jpg');
}

img {
    width: 20px;
    margin-right: 10px;
}

form {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
}

label {
    font-weight: bold;
}

input[type=text], input[type=password], select {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type=submit] {
    background-color: #1abc9c;
    color: #fff;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

button[type=submit]:hover {
    background-color: #17a68f;
}

</style>

<body>
    <div class="container">
        <?php
            include('db_config.php');
            
            if(isset($_POST['submit'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $user_type = $_POST['user_type'];
                
                $query = "INSERT INTO users (username, password, user_type) VALUES ('$username', '$password', '$user_type')";
                
                if(mysqli_query($db, $query)) {
                    header('Location: users.php?msg=success');
                    exit;
                } else {
                    header('Location: users.php?msg=error');
                    exit;
                }
            }
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h2>ADD USER</h2>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label>User Type:</label>
                <select name="user_type" class="form-control" required>
                    <option value="">Select User Type</option>
                    <option value="pharmacist">Pharmacist</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary"><img src="images/add-circle.svg"> Submit</button>
            <a href="users.php" class="btn btn-secondary"><img src="images/cross.svg"> Cancel</a>
        </form>
    </div>
</body>
</html>
