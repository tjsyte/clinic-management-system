<?php
session_start();
if(!isset($_SESSION['username'])) {
  header("Location: index.php"); 
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to the Pharmaceutical Inventory System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
		body {
			background-color: #2c3e50;
		}
        
        .container {
            margin-top: 50px;
        }
        
        h1 {
            color: #1abc9c;
		    font-weight: bold;
		    font-size: 2em;
		    margin-bottom: 50px;
            text-shadow: rgba(0, 0, 0, 0.05) 0 54px 55px,
            rgba(0, 0, 0, 0.05) 0 -12px 30px,
            rgba(0, 0, 0, 0.05) 0 4px 6px,
            rgba(0, 0, 0, 0.05) 0 12px 3px,
            rgba(0, 0, 0, 0.05) 0 -3px 5px;
        }
        
        p {
		    font-size: 1.5em;
		    margin-bottom: 20px;
            color: #fff;
            text-shadow: rgba(0, 0, 0, 0.05) 0 54px 55px,
            rgba(0, 0, 0, 0.05) 0 -12px 30px,
            rgba(0, 0, 0, 0.05) 0 4px 6px,
            rgba(0, 0, 0, 0.05) 0 12px 3px,
            rgba(0, 0, 0, 0.05) 0 -3px 5px;
        }
            
        .btn-primary {
		    background-color: #1abc9c;
		    border-color: #1abc9c;
            font-size: 1.2em;
		    font-weight: bold;
		    padding: 15px 30px;
		    margin-top: 60px;
            box-shadow: rgba(0, 0, 0, 0.05) 0 54px 55px,
            rgba(0, 0, 0, 0.05) 0 -12px 30px,
            rgba(0, 0, 0, 0.05) 0 4px 6px,
            rgba(0, 0, 0, 0.05) 0 12px 3px,
            rgba(0, 0, 0, 0.05) 0 -3px 5px;
        }
        
        .btn-primary:hover {
            background-color: #122529;
            border-color: #122529;
        }
        
        img {
            width: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <center>
	<div class="container">
		<h1>Welcome <span style="color: white;"><?php echo $_SESSION['username']; ?></span> to the Pharmaceutical Inventory System</h1>
		<p>This system is designed to help you manage inventory in your pharmacy, including prescription tracking, medication dispensing, and inventory management.</p>
		<a href="dashboard.php" class="btn btn-primary"><img src="images/debug-start.svg"> Get Started</a>
	</div>
    </center>
</body>
</html>