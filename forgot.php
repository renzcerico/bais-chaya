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
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
		</div>
		<div class="col-sm-12 col-md-4 col-lg-4 col-xl-">
			<form class="form-border shadow p-5">
            <!-- DIV FOR ENTERING EMAIL -->
			  <div class="form-group row find">
			    <label for="email" class="col-sm-4 col-form-label h6">Email</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="email_address" id="email_address">
			    </div>
			  </div>

              <div class="form-group row security" hidden>
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
			  <div class="form-group row security" hidden>
			    <label for="sec_ans" class="col-sm-4 col-form-label h6">Security Answer</label>
			    <div class="col-sm-8">
					<input type="text" name="sec_ans" id="sec_ans" class="form-control" required />
			    </div>
			  </div>

			  <div class="text-center">
		 	  	<button class="btn btn-primary font-weight-bold mb-3 mt-3 form-control find" id="btnFind">Find</button>
                <button class="btn btn-primary font-weight-bold mb-3 mt-3 form-control security" id="btnSubmit" hidden>Submit</button>
				<a href="index.php" class="d-block text-right text-decoration-none font-weight-500 mt-2">back to login</a>
				<div class="alert alert-danger invalid-email" role="alert" hidden>
					<strong>Invalid</strong>, No email found.
				</div>
			  </div>
			</form>
		</div>
		<div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
		</div>
	</div>
</div>
<script
src="https://code.jquery.com/jquery-3.4.1.min.js"
integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    $(() => {
        $(document).on('click', '#btnFind', (e) => {
            const email = $('#email_address').val();

            $.ajax({
                url: 'php/email.php',
                method: 'POST',
                data: { email: email },
                success: (res) => {
                    if (parseInt(res) === 1) {
                        $('.find').hide();
                        $('.security').removeAttr('hidden');
                    } else {
						$('.invalid-email').removeAttr('hidden');
						setTimeout(() => {
							$('.invalid-email').attr('hidden', true);
						}, 2000);
					}
                }
            });

            e.preventDefault();
        });

        $(document).on('click', '#btnSubmit', (e) => {
            const email = $('#email_address').val();
            const sec_ques = $('#sec_ques').val();
            const sec_ans = $('#sec_ans').val();

            const json = {
                email: email,
                sec_ques: sec_ques,
                sec_ans: sec_ans 
            };

            $.ajax({
                url: 'php/forgot.php',
                method: 'POST',
                data: json,
                success: (res) => {
                    if (parseInt(res) === 1) {
                        alert('Password was successfully reset. Please check your new password sent to your email.');
                    } else {
                        alert('Invalid security question/answer');
                    }
                }
            });

            e.preventDefault();
        });
    });
</script>
</body>
</html>