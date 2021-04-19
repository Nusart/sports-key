<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
include_once 'process.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Key Entry Page</title>
        
        <!-- Library -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>

		<link href="css/entry.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navbar navbar-expand-md navtop">
			<div>
				<h1>Sports Key Issue Portal</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="container content">
			<h2>Key Entry Page</h2>
			
            <br>
                <div class="container"> <!-- Container -->
                    
                        <h5 class="text-center text-success" id="message"><?= $success ;?></h5>
                        <br>
                        <form class="form mt33" action="entry.php" method="post"><!--form -->

                        <!-- roll -->
                        <div class="form-group row">
                            <label for="description" class="control-label col-sm-3">Roll No. *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="roll" name="roll" placeholder="Enter roll no" required>
                            </div>
                        </div>

                        <!-- name -->
                        <div class="form-group row">
                            <label for="description" class="control-label col-sm-3">Name *</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                            </div>
                        </div>
                            
                            <!-- mobile -->
                              <div class="form-group row">
                                <label for="description" class="control-label col-sm-3">Mobile No. *</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter mobile number" required>
                                </div>
                            </div>

                              <!-- court -->
                              <div class="form-group row">
                                <label for="exampleFormControlSelect1" class="control-label col-sm-3">Court *</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" id="court" name="court" aria-label="city_name" required>
                                        <option value="">Please select a court</option>
                                        <option value="Badminton">Badminton</option>
                                        <option value="Practice Court">Lawn Tennis Practice Court</option>
                                        <option value="Volleyball">Volleyball</option>
                                        <option value="Lawn Tennis">Lawn Tennis</option>
                                        <option value="Basketball (near H1)">Basketball (near H1)</option>
                                        <option value="Basketball">Basketball</option>
                                    </select>
                                  </div>
                            </div>
                            
                            <!-- Show Message -->
                            <div class="text-success text-center d-none" id="msg_div">
                                <h4 id="res_message">Insertion has been successful.</h4>
                            </div>

                            <!-- btn insert data -->
                            <div class="form-group row">
                                <div class="offset-sm-3 col-sm-9 pull-right">
                                    <button type="submit" id="save" name="save" class="btn btn-primary">Issue</button>
                                </div>
                            </div>
                        </form><!--end form -->
                    </div><!--end container -->

                <script>
                    $(document).ready(function()
                    {
                        setTimeout(function()
                        {
                            $('#message').hide();
                        },3000);
                    });
                </script>
            
		</div>
	</body>
</html>