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
		padding: 10px;
	}

	.font-weight-500 {
		font-weight: 500;
	}
</style>
<body class="d-flex align-items-center">
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
			<form class="form-border shadow p-5" method="post" action="php/register.php">
  			  <div class="form-group row">
			    <label for="first_name" class="col-sm-4 col-form-label h6">First Name</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="first_name" id="first_name" autofocus required>
			    </div>
			  </div>
  			  <div class="form-group row">
			    <label for="first_name" class="col-sm-4 col-form-label h6">Middle Name</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="middle_name" id="middle_name">
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="first_name" class="col-sm-4 col-form-label h6">Last Name</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="last_name" id="last_name" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="email" class="col-sm-4 col-form-label h6">Email</label>
			    <div class="col-sm-8">
			      <input type="email" class="form-control" name="email_address" id="email_address" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="password" class="col-sm-4 col-form-label h6">Password</label>
			    <div class="col-sm-8">
			      <input type="password" class="form-control" name="password" id="password" required>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="sec_ques" class="col-sm-4 col-form-label h6">Security Question</label>
			    <div class="col-sm-8">
					<select class="form-control" name="sec_ques" id="sec_ques" required>
						<option value="1">What primary school did you attend?</option>
						<option value="2">What is your spouses mother’s maiden name?</option>
						<option value="3">What is the middle name of your oldest child?</option>
						<option value="4">In what town or city was your first full time job?</option>
						<option value="5">In what town or city did your mother and father meet?</option>
						<option value="6">In what town or city did you meet your spouse/partner?</option>
						<option value="7">What is your grandmother’s (on your mother’s side) maiden name?</option>
						<option value="8">What was the house number and street name you lived in as a child?</option>
						<option value="9">What were the last four digits of your childhood telephone number?</option>
					</select>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label for="sec_ans" class="col-sm-4 col-form-label h6">Security Answer</label>
			    <div class="col-sm-8">
					<input type="text" name="sec_ans" id="sec_ans" class="form-control" required />
			    </div>
			  </div>
			  <div class="text-center">
			  	<button type="submit" class="btn btn-primary form-control font-weight-bold mb-3 mt-3" id="btn_register">Register</button>
			  	<a href="index.php" class="text-center text-decoration-none font-weight-500">Already have an account?</a>
			  </div>
			</form>
		</div>
		<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
		</div>
	</div>
</div>
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).on('click', '#btn_register', () => {
		let first_name = $('#last_name').val();
		let last_name = $('#first_name').val();
		let middle_name = $('#middle_name').val();
		let email_address = $('#email_address').val();
		let password = $('#password').val();
		let ques = $('#sec_ques').val();
		let ans = $('#sec_ans').val();

		if (first_name && last_name && email_address && password && ques && ans) {
			json = {
				first_name: first_name,
				last_name: last_name,
				middle_name: middle_name,
				email_address: email_address
			};

			$.ajax({
				url: 'php/sms.php',
				method: 'POST',
				data: json,
				success: (res) => {
					console.log(res);
				}
			});
		}
	});
</script>
</body>
</html>