<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bais Chaya Academy - Register</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style type="text/css">
	html, body {
	    height: 100%;
	}

	.form-border {
		border: 1px solid #cfcfcf;
	}

	.font-weight-500 {
		font-weight: 500;
	}
</style>
<body class="d-flex align-items-center">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark  p-4 fixed-top">
        <a class="h3 text-white font-weight-bold text-spacing-3">BAIS<span class="text-info">CHAYA</span> ACADEMY</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-">
				<form class="form-border shadow p-5" method="post" action="php/login.php">
				  <div class="form-group row">
				    <label for="email" class="col-sm-4 col-form-label h6">Email</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" name="email_address" id="email_address">
				    </div>
				  </div>
				  <div class="form-group row">
				    <label for="password" class="col-sm-4 col-form-label h6">Password</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" name="password" id="password" placeholder="">
				    </div>
				  </div>
				  <div class="text-center">
			 	  	<button type="submit" class="btn btn-primary font-weight-bold mb-3 mt-3 form-control">Login</button>
					<a href="register.php" class="text-center text-decoration-none font-weight-500">Don't have an account? Sign up</a>  <br />
					<a href="forgot.php" class="d-block text-center text-decoration-none font-weight-500 mt-2">Forgot Password</a>
				  </div>
				</form>
			</div>
			<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
			</div>
		</div>
	</div>
	<?php
    	include 'footer.php';
  	?>
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>