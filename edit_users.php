<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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

<?php
include('db_config.php');

if(isset($_POST['update'])){
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $user_type = mysqli_real_escape_string($db, $_POST['user_type']);

    $result = mysqli_query($db, "UPDATE users SET username='$username',password='$password',user_type='$user_type' WHERE user_id=$user_id");
    header("Location: users.php");
}else{
    $user_id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM users WHERE user_id=$user_id");

    while($res = mysqli_fetch_array($result)) {
        $username = $res['username'];
        $password = $res['password'];
        $user_type = $res['user_type'];
    }
}
?>

<form name="form1" method="post">
    <h2>Edit User</h2>
    <div class="form-group">
        <input type="hidden" name="user_id" value="<?php echo $_GET['id'];?>">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username;?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control" value="<?php echo $password;?>">
    </div>
    <div class="form-group">
        <label>User Type</label>
        <select name="user_type" class="form-control">
            <option value="pharmacist" <?php if($user_type == 'pharmacist'){echo 'selected';}?>>Pharmacist</option>
            <option value="admin" <?php if($user_type == 'admin'){echo 'selected';}?>>Admin</option>
        </select>
    </div>
    
    <div class="form-group">
        <button type="submit" name="update" class="btn btn-primary"><img src="images/edit.svg"> Submit</button>
        <a href="users.php" class="btn btn-secondary"><img src="images/cross.svg"> Cancel</a>
    </div>
</form>
</body>
</html>