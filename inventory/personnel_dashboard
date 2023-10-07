<?php

include('db_config.php');

$userCount = mysqli_query($db, "SELECT COUNT(*) AS total FROM users");
$patientCount = mysqli_query($db, "SELECT COUNT(*) AS total FROM patient");
$employeeCount = mysqli_query($db, "SELECT COUNT(*) AS total FROM employee");
$medicationCount = mysqli_query($db, "SELECT COUNT(*) AS total FROM medication");
$prescriptionCount = mysqli_query($db, "SELECT COUNT(*) AS total FROM prescription");
$inventoryCount = mysqli_query($db, "SELECT COUNT(*) AS total FROM inventory");
$dispensingCount = mysqli_query($db, "SELECT COUNT(*) AS total FROM dispensing");

$userData = mysqli_fetch_assoc($userCount);
$patientData = mysqli_fetch_assoc($patientCount);
$employeeData = mysqli_fetch_assoc($employeeCount);
$medicationData = mysqli_fetch_assoc($medicationCount);
$prescriptionData = mysqli_fetch_assoc($prescriptionCount);
$inventoryData = mysqli_fetch_assoc($inventoryCount);
$dispensingData = mysqli_fetch_assoc($dispensingCount);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pharmaceutical Inventory System Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/f889e2aa12.js" crossorigin="anonymous"></script>
        <style>
            body {
                background-image: url('images/background.jpg');
            }

            .sidebar {
                background-color: #2c3e50;
                height: 100vh;
                position: fixed;
                top: 0;
                left: 0;
                width: 280px;
                padding-top: 70px;
                padding-left: 15px;
                box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            }
            
            .sidebar h4 {
                color: #ffffff;
            }
            
            .line {
                background-color: #1abc9c;
            }
            
            .nav-link.active {
                background-color: #1abc9c;
                color: #ffffff;
                border-radius: 5px;
            }
            
            .nav-link {
                color: #ffffff;
                margin-bottom: 5px;
                cursor: pointer;
            }
            
            .nav-link:hover {
                background-color: #122529;
                border-radius: 5px;
                color: #1abc9c;
            }
            
            .card {
                margin-top: 20px;
                background-color: #ffffff;
                box-shadow: rgba(0, 0, 0, 0.05) 0 54px 55px,
                rgba(0, 0, 0, 0.05) 0 -12px 30px,
                rgba(0, 0, 0, 0.05) 0 4px 6px,
                rgba(0, 0, 0, 0.05) 0 12px 3px,
                rgba(0, 0, 0, 0.05) 0 -3px 5px;
            }
            
            .card-title {
                color: #fff;
                padding: 10px;
                border-radius: 5px;
                background-color: #1abc9c;
            }
            
            .card-text {
                color: #2c3e50;
                font-size: 2em;
                font-weight: bold;
            }
            
            img {
                width: 20px;
                margin-right: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 sidebar">
                    <h4>Pharmaceutical Inventory System</h4>
                    <hr class="line">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="users.php"><img src="images/users-group.svg"> User Management </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="patient.php"><img src="images/inpatient.svg"> Patient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="clearance.php"><img src="images/employee-group-solid.svg"> Student and Employee Clearance Management </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="records.php"><img src="images/medication.svg"> Medical Records </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php"><img src="images/prescription.svg"> Treatment Services </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php"><img src="images/inventory.svg"> System Administration </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="reporting.php"><img src="images/dispensing.svg"> Reporting and Analytics </a>
                        </li>
			            <li class="nav-item">
                            <a class="nav-link" href="notifs"><img src="images/dispensing.svg"> Notification and Alerts </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><img src="images/logout.svg"> Logout</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-10 offset-md-2">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><img src="images/users-group.svg"> Total Users</h5>
                                    <p class="card-text"><?php echo $userData['total']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><img src="images/inpatient.svg"> Total Patient</h5>
                                    <p class="card-text"><?php echo $patientData['total']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><img src="images/employee-group-solid.svg"> Total Employee</h5>
                                    <p class="card-text"><?php echo $employeeData['total']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><img src="images/medication.svg"> Total Medications</h5>
                                    <p class="card-text"><?php echo $medicationData['total']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><img src="images/prescription.svg"> Total Prescriptions</h5>
                                    <p class="card-text"><?php echo $prescriptionData['total']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><img src="images/inventory.svg"> Total Inventory</h5>
                                    <p class="card-text"><?php echo $inventoryData['total']; ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><img src="images/dispensing.svg"> Total Dispensing</h5>
                                    <p class="card-text"><?php echo $dispensingData['total']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
