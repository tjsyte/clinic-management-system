<?php
include('db_config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($db, "DELETE FROM users WHERE user_id = $id");
    header('location: users.php');
}
?>

<?php
include('db_config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($db, "DELETE FROM patient WHERE patient_id = $id");
    header('location: patient.php');
}
?>