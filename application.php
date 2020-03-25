<?php
include 'php/session1.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Bais Chaya Academy</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="sign_assets/jquery.signaturepad.css" rel="stylesheet">
</head>
<body>
<style type="text/css">
	#tbl_form_application th, 
	#tbl_form_application td {
		padding: 3px !important;
		border: 2px solid gray;
	}

	#tbl_form_income th,
	#tbl_form_income td {
		padding: 3px !important;
		border: 2px solid gray;	
		vertical-align: middle !important;
	} 

	.rotate {
	  /* FF3.5+ */
	  -moz-transform: rotate(-90.0deg);
	  /* Opera 10.5 */
	  -o-transform: rotate(-90.0deg);
	  /* Saf3.1+, Chrome */
	  -webkit-transform: rotate(-90.0deg);
	  /* IE6,IE7 */
	  filter: progid: DXImageTransform.Microsoft.BasicImage(rotation=0.083);
	  /* IE8 */
	  -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0.083)";
	  /* Standard */
	  transform: rotate(-90.0deg);
	  white-space: nowrap;  
	  height: auto !important;
	  text-align: center;
	}
	
	input[type=number]::-webkit-inner-spin-button, 
	input[type=number]::-webkit-outer-spin-button { 
	    -webkit-appearance: none;
	    -moz-appearance: none;
	    appearance: none;
	    margin: 0; 
	}

	.text-spacing-3 {
		letter-spacing: 3px;
	}

	@media print { 
		 /* All your print styles go here */
		 body {
		  -webkit-print-color-adjust: exact !important;
		 }
		 .top {
		 	margin: 0px;
		 }
		 #submit_application {
		 	display: none;
		 }

		 .rotate {
		  /*transform: rotate(360.0deg);*/
		 }

		 #tbl_form_application {
		 	page-break-after: always;
		 }

		.borderless + span,
		.borderless + span::before {
		    display: inline-block;
		    vertical-align: middle;
		}

		.borderless {
		    opacity: 0;
		    position: absolute;
		}

		.borderless + span {
		    font: normal 11px/14px Arial, Sans-serif;
		    color: #333;
		}

		.borderless + span::before {
		    content: "";
		    border: none;
		    text-align: center;
		    
		}

		.borderless:checked + span::before {
		    color: #666;
		}

		.borderless + span::before {
		    -moz-border-radius: 2px;
		    -webkit-border-radius: 2px;
		    border-radius: 2px;
		}

		.borderless:checked + span::before {
		    content: "\2714";
		    font-size: 25px; 
		}

		.clearButton {
			display: none;
		}
	}

</style>
<div class="navbar navbar-expand-lg navbar-dark bg-dark ">
	<div class="container">
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="justify-content-md-start">
	    	<a class="h3 text-white font-weight-bold text-spacing-3" href="forms.php">BAIS<span class="text-info">CHAYA</span> ACADEMY</a>
	    </div>
	    <div class="navbar-collapse justify-content-md-end collapse" id="navbarsExample10" style="">
	      <ul class="navbar-nav">
	        <li class="nav-item mr-3">
	          <a class="nav-link font-weight-bold" href="forms.php">Home</a>
	        </li>
	      </ul>
	    </div>
	</div>
</div>
<div class="container-fluid" id="element-to-print">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5">
			<h3 class="mt-5  text-center top">B"H</h3>
			<h3 class="  text-center"> 
				<?php 
					$this_year = date("Y");
					$next_year = $this_year + 1;
					echo $this_year."-".$next_year;
				?>
			</h3>
			<h5 class="text-center"><u>FREE AND REDUCED-PRICE SCHOOL MEALS FAMILY APPLICATION</u></h5>			
			<table class="table table-bordered table-hover mt-4" id="tbl_form_application">
				<thead>
					<tr>
						<th colspan="8">PART 1. <span class="font-weight-light">ALL HOUSEHOLD MEMBERS</span></th>
					</tr>
					<tr>
						<th class="h6 align-middle text-center" rowspan="2">
							Names of <u>all</u> household members <br /> 
							<small>(First, Middle Initial, Last)</small>
						</th>
						<th class="h6 align-middle text-center" rowspan="2">
							Student ID
						</th>
						<th class="font-italic h6 align-middle text-center" colspan="5">
							Place a check in the box below if child is a foster, homess, migrant, runaway, <br />
							or Head Start child. If each child attending school is a foster, homeless, <br />
							runaway, migrant or in Head Start, skip to part 4 sign this form.
						</th>
						<th class="h6 align-top text-center" rowspan="2">
							Place a check in the <br /> box if NO income
						</th>
					</tr>
					<tr class="text-center">
						<th class="h6 align-middle">Foster</th>
						<th class="h6 align-middle">Homeless</th>
						<th class="h6 align-middle">Migrant</th>
						<th class="h6 align-middle">
							Ru <br />
							na <br />
							wa <br />
							y <br />
						</th>
						<th class="h6 align-middle">Head Start</th>
					</tr>
				</thead>
				<tbody>
					<tr class="part-benefits">
						<td colspan="8">
							<span class=" font-weight-bold h6 text-danger">PART 2.</span> BENEFITS <br />
							IF ANY MEMBER OF YOUR HOUSEHOLD RECEIVES <span class="text-danger font-weight-bold">[State SNAP], [FDPIR] OR [STATE TANF Assistance]</span>. PROVIDE THE NAME AND CASE NUMBER FOR THE <br />
							PERSON WHO RECEIVES BENEFITS AND <span class="font-weight-bold">SKIP TO PART 4. IF NO ONE RECEIVES THESE BENEFITS, SKIP TO PART 3.</span>
							<br />

							<div class="form-group row mt-4">	
								<span class="small col-sm-12 col-md-1 col-lg-1 col-xl-1">NAME:</span>
								<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<input type="text" name="" class="form-control benefits_name" disabled="">
								</div>
								
								<span class="small col-sm-12 col-md-2 col-lg-2 col-xl-2">PROGRAM NAME:</span>
								<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<input type="text" name="" class="form-control benefits_program_name" disabled="">
								</div>

								<span class="col-sm-12 col-md-2 col-lg-2 col-xl-2 small">CASE NUMBER: (NOT EBT CARD NUMBER)</span>
								<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<input type="text" name="" class="form-control benefits_card_number" disabled="">
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="8" class="p-5" height="180px">
							
						</td>
					</tr>
				</tbody>
			</table>
			
			<div class="text-right font-weight-light" id="page2el">
				<span>Page 1 of 2</span>
			</div>

			<!-- <div class="table-responsive"> -->

				<table class="table table-bordered table-hover mt-4 mb-5" id="tbl_form_income">
					<thead>
						<tr>
							<th colspan="21">
								PART 3. <span class="font-weight-light">TOTAL HOUSEHOLD GROSS INCOME (BEFORE DEDUCTIONS). List all income on the same line as the persone who 	receives it. Check the <br />
								box for how often it is received. RECORD EACH INCOME ONLY ONCE.
								</span>
							</th>
						</tr>
						<tr>
							<th class="align-top h6" rowspan="2">
								1. Name <br />
								<span class="small">(LIST <b>ONLY</b> <br />
								 HOUSEHOLD <br />
								 MEMBERS WITH <br />
								 INCOME
								)</span>
							</th>
							<th colspan="20" class="align-middle h6">
								2. GROSS INCOME <span class="font-weight-light">AND HOW OFTEN IT WAS RECEIVED</span>
							</th>
						</tr>
						<tr>
							<th class="font-weight-light small text-center">
								Earnings <br />
								from <br />
								work <br />
								before <br />
								deductio <br />
	 							ns.
							</th>
							<th><div class="font-weight-light rotate small">Weekly</div></th>
							<th><div class="font-weight-light rotate small">Every 2 Weeks</div></th>
							<th><div class="font-weight-light rotate small">Twice Monthly</div></th>
							<th><div class="font-weight-light rotate small">Monthly</div></th>
							<th><div class="font-weight-light rotate small">
								Welfare, child, <br /> 
								support, <br /> 
								alimony
								</div>
							</th>
							<th><div class="font-weight-light rotate small">Weekly</div></th>
							<th><div class="font-weight-light rotate small">Every 2 Weeks</div></th>
							<th><div class="font-weight-light rotate small">Twice Monthly</div></th>
							<th><div class="font-weight-light rotate small">Monthly</div></th>
							<th><div class="font-weight-light rotate small">
								Social Security, <br />
								SSI, VA, <br /> 
								retirement <br /> 
								benefits
							</th>
							<th><div class="font-weight-light rotate small">Weekly</div></th>
							<th><div class="font-weight-light rotate small">Every 2 Weeks</div></th>
							<th><div class="font-weight-light rotate small">Twice Monthly</div></th>
							<th><div class="font-weight-light rotate small">Monthly</div></th>
							<th><div class="font-weight-light rotate small">
								All other income <br /> 
								(such as <br /> 
								Unemployment <br /> 
								benefits)
							</th>
							<th><div class="font-weight-light rotate small">Weekly</div></th>
							<th><div class="font-weight-light rotate small">Every 2 Weeks</div></th>
							<th><div class="font-weight-light rotate small">Twice Monthly</div></th>
							<th><div class="font-weight-light rotate small">Monthly</div></th>
						</tr>
						<tr>
							<th class="h6 font-italic">
								(Example) <br />
								Jane Smith
							</th>
							<th class="h6 align-middle text-center">$200</th>
							<th class="h6 align-middle text-center">X</th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center">$150</th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center">X</th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center">$0</th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center">$0</th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center"></th>
							<th class="h6 align-middle text-center"></th>
						</tr>
					</thead>
					<tbody>
						<tr class="signation_social_security">
							<td colspan="21" class="h6">
								<span class="font-weight-bold">PART 4.</span> <span class="font-weight-light">SIGNATURE AND LAST FOUR DIGITS OF SOCIAL SECURITY NUMBER (ADULT MUST SIGN)</span>
							</td>
						</tr>
						<tr>
							<td colspan="21" class="h6">
								<span class="font-weight-light">An adult household member must sign the application.</span> If Part 3 is completed, the adult signing the form also must list the last four digits of his or her Social <br />
								Security Number or make the "I do not have a Social Security Number" box. <span class="font-weight-light">(See Statement on the back of this page.)</span> 
								<br />
								<br />
								<span class="font-weight-light font-italic">I certify (promise) that all information on this application is true and that all income is reported. I understand that the scholl will get Federal funds based <br />
								on the information I give. I undestand that school officials may verify (check) the information. I understand that if I purposely give false information, my <br />
								children may lose meal benefits, and I may be prosecuted. I understand my child's eligibility status may be shared as allowed by law.</span>
								<br />
								<br />

								<div class="form-group row mt-4">	
									<span class="small col-sm-12 col-md-1 col-lg-1 col-xl-1">
										Signature:
									</span>
									<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<!-- <input type="text" name="" class="form-control adult_signature"> -->
										<div class="sigPad " id="smoothed" >
											<div class="typed"></div>
											<canvas class="pad border" height="100"></canvas>
											<input type="hidden" name="output" class="output">
											<a href="#clear" class="clearButton btn btn-secondary text-white btn-sm mt-1">Clear</a>
										</div>
									</div>
									
									<span class="small col-sm-12 col-md-2 col-lg-2 col-xl-2">Printed name:</span>
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="text" name="" class="form-control adult_name" disabled="">
									</div>

									<span class="col-sm-12 col-md-1 col-lg-1 col-xl-1 small">Date</span>
									<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<input type="text" name="" class="form-control adult_date" disabled="">
									</div>
								</div>

								<div class="form-group row mt-4">	
									<span class="small col-sm-12 col-md-1 col-lg-1 col-xl-1">Address:</span>
									<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<input type="text" name="" class="form-control adult_address" disabled="">
									</div>
									
									<span class="small col-sm-12 col-md-2 col-lg-2 col-xl-2">Phone Number:</span>
									<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<input type="text" name="" class="form-control adult_phone_number" disabled=""></span>
									</div>
								</div>

								<div class="form-group row mt-4">	
									<span class="small col-sm-12 col-md-1 col-lg-1 col-xl-1">Email:</span>
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="text" name="" class="form-control adult_email" disabled="">
									</div>
									
									<span class="small col-sm-12 col-md-1 col-lg-1 col-xl-1">City:</span>
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="text" name="" class="form-control adult_city" disabled="">
									</div>

									<span class="col-sm-12 col-md-1 col-lg-1 col-xl-1 small">State</span>
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="text" name="" class="form-control adult_state" disabled="">
									</div>

									<span class="col-sm-12 col-md-1 col-lg-1 col-xl-1 small">Zip Code</span>
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="text" name="" class="form-control adult_zip" disabled="">
									</div>
								</div>

								<div class="form-group row mt-4">
									<span class="col-sm-12 col-md-3 col-lg-3 col-xl-3 small">Last four digits of Social Security Number:</span>
									<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<input type="text" name="" class="form-control adult_social_security" disabled="">
									</div>

									<span class="col-sm-12 col-md-4 col-lg-4 col-xl-4 small">I do not have a Social Security Number:
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="checkbox" name="" class="form-control adult_no_social_security"></span>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td colspan="21" class="text-center">
								<span class="small">
									The information contained within this application may be shared with other Federal/Local health programs for which your child(ren) may qualify, however your <br />
									permission is required. This will not affect your eligibility for school meals. May school officials share the information within this application with other programs?
								</span> <br />
								<div class="form-group row">
									<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-right">
										<span>No <input type="radio" name="share_information" class="share_information_no"></span> &nbsp; &nbsp; &nbsp;
									</div>
									<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 text-left">
										<span>Yes <input type="radio" name="share_information" class="share_information_yes"></span>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td class="h6" colspan="21">PART 5. <span class="font-weight-light">CHILDREN'S ETHNIC AND RACIAL IDENTITIES (OPTIONAL)<span></td>
						</tr>
						<tr>
							<td colspan="3" class="text-center">
								<span class="font-italic small">Choose one ethnicity:</span> <br /><br />
								<span>Hispanic/Latino <input type="radio" name="ethnicity" class="ethnicity_yes"></span> <br />
								<span>Not Hispanic/Latino <input type="radio" name="ethnicity" class="ethnicity_no"></span>
							</td>
							<td colspan="18" class="align-middle">
								&nbsp; &nbsp; &nbsp;<span class="font-italic small">Choose one or more (regardless of  ethnicity):</span> <br />
								&nbsp; &nbsp; &nbsp;<span><input type="checkbox" name="ethnicity_checkbox" class="ethnicity_asian"> Asian </span> &nbsp; &nbsp; &nbsp;
								&nbsp; &nbsp; &nbsp;<span><input type="checkbox" name="ethnicity_checkbox" class="ethnicity_indian"> American Indian or Alaska Native </span> &nbsp; &nbsp; &nbsp;
								&nbsp; &nbsp; &nbsp;<span><input type="checkbox" name="ethnicity_checkbox" class="ethnicity_african"> Black or African American </span> <br />
								&nbsp; &nbsp; &nbsp;<span><input type="checkbox" name="ethnicity_checkbox" class="ethnicity_white"> White</span> &nbsp; &nbsp; 
								&nbsp; &nbsp; &nbsp;<span><input type="checkbox" name="ethnicity_checkbox" class="ethnicity_hawaiian"> Native Hawaiian or other Pacific Islander </span>
							</td>
						</tr>
					</tbody>
				</table>
			<!-- </div> -->
		</div>
	</div>
</div>

<!-- MODAL VERIFY -->
<div class="modal" tabindex="-1" role="dialog" id="modal_verification">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Email verification</h5>
        </button>
      </div>
      <div class="modal-body">
        <p class="h6">Please enter the verification code.</p>
        <input type="number" name="verification_code" id="verification_code" class="form-control">
        <span id="verification_result" class="h6 text-danger"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary font-weight-bold" id="btn_verify">Verify</button>
        <button type="button" class="btn btn-secondary font-weight-bold" id="btn_logout">Logout</button>
      </div>
    </div>
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="sign_assets/jquery.signaturepad.js"></script>
<script src="sign_assets/json2.min.js"></script>
<script type="text/javascript">
	$(function(){
	  	$('#smoothed').signaturePad({
		    drawOnly:true, 
		    drawBezierCurves:true, 
		    lineTop:200
	  	});

		

		// const totalHouseHoldIncome = () => {
		// 	let set = '<tr class="tr_total_household">'+
		// 			      '<td><input type="text" class="form-control total_household_name"></td>'+
		// 			      '<td><input type="text" class="form-control total_deductions"></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_deductions_weekly borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_deductions_2_weeks borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_deductions_twice_monthly borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_deductions_monthly borderless"><span></span></td>'+
		// 			      '<td><input type="text" class="form-control total_walfare"></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_walfare_weekly borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_walfare_2_weeks borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_walfare_twice_monthly borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_walfare_monthly borderless"><span></span></td>'+
		// 			      '<td><input type="text" class="form-control total_social"></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_social_weekly borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_social_2_weeks borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_social_twice_monthly borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_social_monthly borderless"><span></span></td>'+
		// 			      '<td><input type="text" class="form-control total_other"></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_other_weekly borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_other_2_weeks borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_other_twice_monthly borderless"><span></span></td>'+
		// 			      '<td><input type="checkbox" class="form-control total_other_monthly borderless"><span></span></td>'+
		// 			  '</tr>';
		// 	for (let x = 0; x <= 3; x++) {
		// 		$('#tbl_form_income>tbody .signation_social_security').before(set);
		// 	}
		// }

		// totalHouseHoldIncome();

		// $('.rotate').css('height', $('.rotate').width());
	
		// const status = () => {
		// 	$.ajax({
		// 		method: 'GET',
		// 		url: 'php/status.php',
		// 		success: (res ) => {
		// 			res != 'verified' ? $('#modal_verification').modal({ backdrop: 'static', keyboard: false }) : false;
		// 		}
		// 	});
		// };

		// status();

		$('#btn_logout').click( () => {
			window.location.href = 'php/logout.php';
		});

		// $(document).on('click', '#btn_verify', () => {
		// 	let code = $('#verification_code').val();
			
		// 	$.ajax({
		// 		method: 'POST',
		// 		url: 'php/verify.php',
		// 		data: { code:code },
		// 		success: (res) => {
					
		// 			if (res == 200) {
		// 				$('#modal_verification').modal('hide');
		// 			} else {
		// 				let verification = $('#verification_result');
		// 				verification.html('Invalid verification code.');

		// 				setTimeout(function(){
		// 					verification.html('');
		// 				}, 3000);
		// 			}
		// 		}
		// 	});
		// });


		// const allHouseHoldMembers = () => {;
			

			

		// 	let set = '<tr class="text-center tr_household">'+
		// 					'<td>'+
		// 						'<input type="text" name="" class="form-control household_name ">'+
		// 					'</td>'+
		// 					'<td contenteditable="true" class="student_id "></td>'+
		// 					'<td>'+
		// 						'<input type="checkbox" name="chk" class="form-control household_foster borderless"><span></span>'+
		// 					'</td>'+
		// 					'<td>'+
		// 						'<input type="checkbox" name="chk" class="form-control household_homeless borderless"><span></span>'+
		// 					'</td>'+
		// 					'<td>'+
		// 						'<input type="checkbox" name="chk" class="form-control household_migrant borderless"><span></span>'+
		// 					'</td>'+
		// 					'<td>'+
		// 						'<input type="checkbox" name="chk" class="form-control household_runaway borderless"><span></span>'+
		// 					'</td>'+
		// 					'<td>'+
		// 						'<input type="checkbox" name="chk" class="form-control household_headstart borderless"><span></span>'+
		// 					'</td>'+
		// 					'<td>'+
		// 						'<input type="checkbox" name="chk" class="form-control household_no_income borderless"><span></span>'+
		// 					'</td>'+
		// 				'</tr>';

		// 	for (let x = 0; x <= 12; x++) {
		// 		$('#tbl_form_application>tbody .part-benefits').before(set);
		// 	}
		// }
		// 	 allHouseHoldMembers();

        const getApplication = () => {
            // const url = window.location.href;
            // const urlString = new URL(url);
            // const id = urlString.searchParams.get('id');
            $.ajax({
                url: 'php/getApplication.php',
                method: 'GET',
                success: (res) => {
                    const data = JSON.parse(res);

					console.log(data)
					// const parent = JSON.parse(data['parents']);
					// const household = JSON.parse(data['household']);
					// const adult = JSON.parse(data['adult']);
					// const benefits = JSON.parse(data['benefits']);
					// const income = JSON.parse(data['income']);

					// const parent = (data['parents']);
					const household = (data['household']);
					const adult = (data['adult']);
					const benefits = (data['benefits']);
					const income = (data['income']);

					if(adult == false){
						window.location.replace("food_form.php");
					} else {
					
					
					// const parent_name = parent.parent_name;
					// const email_address = parent.email_address;

					const benefits_id = benefits.id;
					const benefits_name = benefits.name;
					const benefits_card_number = benefits.card_number;
					const benefits_program_name = benefits.program_name;

					const adult_name = adult.name;
					const adult_date = adult.date_applicant; 
					const adult_address = adult.address;
					const adult_phone_number = adult.phone_number;
					const adult_email = adult.email_address;
					const adult_city = adult.city;
					const adult_state = adult.state;
					const adult_zip = adult.zip_code;
					const adult_social_security = adult.sss;
					const adult_no_social_security = adult.sss_none; 
					const adult_share_info = adult.share_info;
					const adult_ethnicity = adult.ethnicity;
					const adult_ethnicity_asian = adult.ethnicity_asian;
					const adult_ethnicity_white = adult.ethnicity_white;
					const adult_ethnicity_american = adult.ethnicity_american;
					const adult_ethnicity_native = adult.ethnicity_native;
					const adult_ethnicity_black = adult.ethnicity_black;

					const householdRow = household.length;
					const incomeRow = income.length;
					// console.log(row);
				
				for(let y = 0; y < householdRow; y++) {
					const household_id = household[y].id;
					const household_name = household[y].name;
					const household_student_id = household[y].student_id;
					const household_foster = household[y].foster;
					const household_homeless = household[y].homeless;
					const household_migrant = household[y].migrant;
					const household_runaway = household[y].runaway;
					const household_headstart = household[y].headstart;
					const household_no_income = household[y].no_income;
					let xxxx = '';
					// if(household_foster == "true"){
					// 		// $(".household_foster").prop('checked', true);
					// 		xxxx = 'checked="true"';
					// 	} else{
					// 		// $(".household_foster").prop('checked', false);
					// 	}

					let set = '<tr class="text-center tr_household" household='+household_id+'>'+
							'<td>'+
								'<input type="text" name="" class="form-control household_name" disabled>'+
							'</td>'+
							'<td><input type="text" name="" class="form-control student_id " disabled></td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_foster borderless" disabled><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_homeless borderless" disabled><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_migrant borderless" disabled><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_runaway borderless" disabled><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_headstart borderless" disabled><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_no_income borderless" disabled><span></span>'+
							'</td>'+
						'</tr>';

						// console.log(household_name);
						$('#tbl_form_application>tbody .part-benefits').before(set);
						$('tr[household='+household_id+'] .household_name').val(household_name);
						$('tr[household='+household_id+'] .student_id').val(household_student_id);

						if(household_foster == 'true'){
							$('tr[household='+household_id+'] .household_foster').prop('checked', true);
							// xxxx = 'checked="true"';
						} else{
							$('tr[household='+household_id+'] .household_foster').prop('checked', false);
						}

						if(household_homeless == 'true'){
							$('tr[household='+household_id+'] .household_homeless').prop('checked', true);
						} else{
							$('tr[household='+household_id+'] .household_homeless').prop('checked', false);
						}

						if(household_migrant == 'true'){
							$('tr[household='+household_id+'] .household_migrant').prop('checked', true);
						} else{
							$('tr[household='+household_id+'] .household_migrant').prop('checked', false);
						}

						if(household_runaway == 'true'){
							$('tr[household='+household_id+'] .household_runaway').prop('checked', true);
						} else{
							$('tr[household='+household_id+'] .household_runaway').prop('checked', false);
						}

						if(household_headstart == 'true'){
							$('tr[household='+household_id+'] .household_headstart').prop('checked', true);
						} else{
							$('tr[household='+household_id+'] .household_headstart').prop('checked', false);
						}

						if(household_no_income == 'true'){
							$('tr[household='+household_id+'] .household_no_income').prop('checked', true);
						} else{
							$('tr[household='+household_id+'] .household_no_income').prop('checked', false);
						}
				}

				// END OF HOUSEHOULD LOOPING

					$(".benefits_name").val(benefits_name);
					$(".benefits_program_name").val(benefits_program_name);
					$(".benefits_card_number").val(benefits_card_number);
                    // res.ethnicity_asian ? $('.ethnicity_asiana').prlp('checked', true) : false;


                
				for (let x = 0; x < incomeRow; x++) {

					const income_id = income[x].id;
					const income_name = income[x].name;
					const income_earnings = income[x].earnings;
					const income_weekly_earnings = income[x].weekly_earnings;
					const income_two_weeks_earnings = income[x].two_weeks_earnings;
					const income_twice_monthly_earnings = income[x].twice_monthly_earnings;
					const income_monthly_earnings =  income[x].monthly_earnings;
					const income_welfare = income[x].welfare;
					const income_weekly_welfare = income[x].weekly_welfare;
					const income_two_weeks_welfare = income[x].two_weeks_welfare
					const income_twice_monthly_welfare =  income[x].twice_monthly_welfare;
					const income_monthly_welfare = income[x].monthly_welfare;
					const income_sss = income[x].sss;
					const income_weekly_sss = income[x].weekly_sss;
					const income_two_weeks_sss =  income[x].two_weeks_sss;
					const income_twice_monthly_sss = income[x].twice_monthly_sss;
					const income_monthly_sss = income[x].monthly_sss
					const income_other = income[x].other;
					const income_weekly_other =  income[x].weekly_other;
					const income_two_weeks_other = income[x].two_weeks_other;
					const income_twice_monthly_other = income[x].twice_monthly_other;
					const income_monthly_other = income[x].monthly_other;

					let set1 = '<tr class="tr_total_household" income='+income_id+'>'+
							'<td><input type="text" class="form-control total_household_name" disabled></td>'+
							'<td><input type="text" class="form-control total_deductions" disabled></td>'+
							'<td><input type="checkbox" class="form-control total_deductions_weekly borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_deductions_2_weeks borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_deductions_twice_monthly borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_deductions_monthly borderless" disabled><span></span></td>'+
							'<td><input type="text" class="form-control total_walfare" disabled></td>'+
							'<td><input type="checkbox" class="form-control total_walfare_weekly borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_walfare_2_weeks borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_walfare_twice_monthly borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_walfare_monthly borderless" disabled><span></span></td>'+
							'<td><input type="text" class="form-control total_social" disabled></td>'+
							'<td><input type="checkbox" class="form-control total_social_weekly borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_social_2_weeks borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_social_twice_monthly borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_social_monthly borderless" disabled><span></span></td>'+
							'<td><input type="text" class="form-control total_other" disabled></td>'+
							'<td><input type="checkbox" class="form-control total_other_weekly borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_other_2_weeks borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_other_twice_monthly borderless" disabled><span></span></td>'+
							'<td><input type="checkbox" class="form-control total_other_monthly borderless" disabled><span></span></td>'+
						'</tr>1';

					$('#tbl_form_income>tbody .signation_social_security').before(set1);

					$('tr[income='+income_id+'] .total_household_name').val(income_name);
					$('.total_deductions').val(income_earnings);

					if(income_weekly_earnings=="true"){
						$('tr[income='+income_id+'] .total_deductions_weekly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_deductions_weekly').prop('checked', false);
					}

					if(income_two_weeks_earnings=="true"){
						$('tr[income='+income_id+'] .total_deductions_2_weeks').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_deductions_2_weeks').prop('checked', false);
					}

					if(income_twice_monthly_earnings=="true"){
						$('tr[income='+income_id+'] .total_deductions_twice_monthly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_deductions_twice_monthly').prop('checked', false);
					}

					if(income_monthly_earnings=="true"){
						$('tr[income='+income_id+'] .total_deductions_monthly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_deductions_monthly').prop('checked', false);
					}

					$('.total_walfare').val(income_welfare);

					if(income_weekly_welfare=="true"){
						$('tr[income='+income_id+'] .total_walfare_weekly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_walfare_weekly').prop('checked', false);
					}

					if(income_two_weeks_welfare=="true"){
						$('tr[income='+income_id+'] .total_walfare_2_weeks').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_walfare_2_weeks').prop('checked', false);
					}

					if(income_twice_monthly_welfare=="true"){
						$('tr[income='+income_id+'] .total_walfare_twice_monthly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_walfare_twice_monthly').prop('checked', false);
					}

					if(income_monthly_welfare=="true"){
						$('tr[income='+income_id+'] .total_walfare_monthly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_walfare_monthly').prop('checked', false);
					}

					$('.total_social').val(income_sss);

					if(income_weekly_sss=="true"){
						$('tr[income='+income_id+'] .total_social_weekly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_social_weekly').prop('checked', false);
					}

					if(income_two_weeks_sss=="true"){
						$('tr[income='+income_id+'] .total_social_2_weeks').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_social_2_weeks').prop('checked', false);
					}

					if(income_twice_monthly_sss=="true"){
						$('tr[income='+income_id+'] .total_social_twice_monthly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_social_twice_monthly').prop('checked', false);
					}

					if(income_monthly_sss=="true"){
						$('tr[income='+income_id+'] .total_social_monthly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_social_monthly').prop('checked', false);
					}
					
					$('.total_other').val(income_other);
					
					if(income_weekly_other=="true"){
						$('tr[income='+income_id+'] .total_other_weekly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_other_weekly').prop('checked', false);
					}

					if(income_two_weeks_other=="true"){
						$('tr[income='+income_id+'] .total_other_2_weeks').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_other_2_weeks').prop('checked', false);
					}

					if(income_twice_monthly_other=="true"){
						$('tr[income='+income_id+'] .total_other_twice_monthly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_other_twice_monthly').prop('checked', false);
					}

					if(income_monthly_other=="true"){
						$('tr[income='+income_id+'] .total_other_monthly').prop('checked', true);
					} else{
						$('tr[income='+income_id+'] .total_other_monthly').prop('checked', false);
					}

					$('.adult_name').val(adult_name);
					$('.adult_date').val(adult_date);
					$('.adult_address').val(adult_address);
					$('.adult_phone_number').val(adult_phone_number);
					$('.adult_email').val(adult_email);
					$('.adult_city').val(adult_city);
					$('.adult_state').val(adult_state);
					$('.adult_zip').val(adult_zip);
					$('.adult_social_security').val(adult_social_security);

					if(adult_no_social_security=="true"){
						$(".adult_no_social_security").prop('checked', true);
					} else{
						$(".adult_no_social_security").prop('checked', false);
					}

					if(adult_share_info=="yes"){
						$(".share_information_yes").prop('checked', true);
					} else{
						$(".share_information_no").prop('checked', true);
					}
					
					if(adult_ethnicity=="yes"){
						$(".ethnicity_yes").prop('checked', true);
					} else{
						$(".ethnicity_no").prop('checked', true);
					}

					if(adult_ethnicity_asian=="true"){
						$(".ethnicity_asian").prop('checked', true);
					} else{
						$(".ethnicity_asian").prop('checked', false);
					}

					if(adult_ethnicity_white=="true"){
						$(".ethnicity_white").prop('checked', true);
					} else{
						$(".ethnicity_white").prop('checked', false);
					}

					if(adult_ethnicity_american=="true"){
						$(".ethnicity_indian").prop('checked', true);
					} else{
						$(".ethnicity_indian").prop('checked', false);
					}

					if(adult_ethnicity_native=="true"){
						$(".ethnicity_hawaiian").prop('checked', true);
					} else{
						$(".ethnicity_hawaiian").prop('checked', false);
					}

					if(adult_ethnicity_black=="true"){
						$(".ethnicity_african").prop('checked', true);
					} else{
						$(".ethnicity_african").prop('checked', false);
					}


					}
			
				}
			}


				
            });
        };


		
		
        getApplication();

	});
</script>
</body>
</html>