<!DOCTYPE html>
<html>
<head>
    <title>Edit Patient</title>
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
    $patient_id = mysqli_real_escape_string($db, $_POST['patient_id']);
    $patient_name = mysqli_real_escape_string($db, $_POST['patient_name']);
    $patient_address = mysqli_real_escape_string($db, $_POST['patient_address']);
    $patient_contact = mysqli_real_escape_string($db, $_POST['patient_contact']);

    $result = mysqli_query($db, "UPDATE patient SET patient_name='$patient_name',patient_address='$patient_address',patient_contact='$patient_contact' WHERE patient_id=$patient_id");
    header("Location: patient.php");
}else{
    $patient_id = $_GET['id'];
    $result = mysqli_query($db, "SELECT * FROM patient WHERE patient_id=$patient_id");

    while($res = mysqli_fetch_array($result)) {
        $patient_name = $res['patient_name'];
        $patient_address = $res['patient_address'];
        $patient_contact = $res['patient_contact'];
    }
}
?>

<form name="form1" method="post">
    <h2>Patient User</h2>
    <div class="form-group">
        <input type="hidden" name="patient_id" value="<?php echo $_GET['id'];?>">
        <label>Patient name</label>
        <input type="text" name="patient_name" class="form-control" value="<?php echo $patient_name;?>">
    </div>
    <div class="form-group">
        <label>Patient Address</label>
        <input type="text" name="patient_address" class="form-control" value="<?php echo $patient_address;?>">
    </div>
    <div class="form-group">
        <label>Patient Contact</label>
        <input type="text" name="patient_contact" class="form-control" value="<?php echo $patient_contact;?>">
    </div>
    
    <div class="form-group">
        <button type="submit" name="update" class="btn btn-primary"><img src="images/edit.svg"> Submit</button>
        <a href="patient.php" class="btn btn-secondary"><img src="images/cross.svg"> Cancel</a>
    </div>
</form>
</body>
</html>