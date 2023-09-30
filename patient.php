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

        h2 {
            text-align: center;
            background-color: #1abc9c;
            width: 100%;
            border-radius: 5px;
            padding: 15px;
            font-size: 22px;
            color: #fff;
        }

        .add-button {
            float: left;
            margin-right: 15px;
            margin-left: 15px;
            margin-top: 15px;
            text-decoration: none;
            background-color: #122529;
            padding: 5px 10px;
            border-radius: 3px;
            color: #fff;
        }

        .table-container {
            margin: auto;
            width: 80%;
            padding: 20px;
        }

        .table-container table {
            background-color: #2c3e50;
            border-radius: 5px;
            color: #fff;
        }

        th, td {
            text-align: center;
        }
        
        .edit-button, .delete-button {
            padding: 5px 10px;
			background-color: #122529;
			border: none;
			border-radius: 3px;
			color: #fff;
			text-decoration: none;
		}

        .add-button:hover {
			background-color: #1167b1;
            text-decoration: none;
            color: #fff;
		}

		.edit-button:hover {
			background-color: #2E8B57;
		}
		
		.delete-button:hover {
			background-color: #D21312;
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
							<a class="nav-link active" href="dashboard.php"><img src="images/house.svg"> Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php"><img src="images/users-group.svg"> Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="patient.php"><img src="images/inpatient.svg"> Patient</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="images/employee-group-solid.svg"> Employee</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="images/medication.svg"> Medications</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="images/prescription.svg"> Prescriptions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="images/inventory.svg"> Inventory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><img src="images/dispensing.svg"> Dispensing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php"><img src="images/logout.svg"> Logout</a>
                        </li>
                    </ul>
                </div>

                <div class="col-md-10 offset-md-2">
                    <div class="table-container">
                        <a class="add-button" href="add_patient.php"><img src="images/add-circle.svg"> Add Patient </a>
                        <h2><img src="images/inpatient.svg"> Patient</h2>

                        <?php

                        include('db_config.php');
                        $result = mysqli_query($db, "SELECT * FROM patient");
                        
                        if(mysqli_num_rows($result) > 0) {
                            echo "<table class='table table-striped'>";
                            echo "<thead><tr><th>Patient ID</th><th>Patient Name</th><th>Patient Address</th><th>Patient Contact</th><th>Actions</th></tr></thead>";
                            echo "<tbody>";
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr><td>".$row['patient_id']."</td><td>".$row['patient_name']."</td><td>".$row['patient_address']."</td><td>".$row['patient_contact']."<td><a href='edit_patient.php?id=".$row['patient_id']."'><i class='edit-button fas fa-edit'></i></a> | <a href='delete_function.php?id=".$row['patient_id']."'><i class='delete-button fas fa-trash'></i></a></td></tr>";
                            }
                            
                            echo "</tbody>";
                            echo "</table>";

                        } else {
                            echo "<div class='alert alert-warning' role='alert' style='text-align: center;'>No patient found.</div>";
                        }
                        
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>