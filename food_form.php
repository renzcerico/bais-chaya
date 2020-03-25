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
	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="sign_assets/jquery.signaturepad.css" rel="stylesheet">
</head>
<body>
<style type="text/css">

</style>
<div class="navbar navbar-expand-lg navbar-dark bg-dark ">
	<div class="container">
		<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
	      <span class="navbar-toggler-icon"></span>
	    </button>
	    <div class="justify-content-md-start">
	    	<a class="h3 text-white font-weight-bold text-spacing-3">BAIS<span class="text-info">CHAYA</span> ACADEMY</a>
	    </div>
	    <div class="navbar-collapse justify-content-md-end collapse" id="navbarsExample10" style="">
	      <ul class="navbar-nav">
	        <li class="nav-item mr-3">
	          <a class="nav-link font-weight-bold" href="logout.php">LOGOUT</a>
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
									<input type="text" name="" class="form-control benefits_name">
								</div>
								
								<span class="small col-sm-12 col-md-2 col-lg-2 col-xl-2">PROGRAM NAME:</span>
								<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
									<input type="text" name="" class="form-control benefits_program_name">
								</div>

								<span class="col-sm-12 col-md-2 col-lg-2 col-xl-2 small">CASE NUMBER: (NOT EBT CARD NUMBER)</span>
								<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<input type="text" name="" class="form-control benefits_card_number">
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
										<input type="text" name="" class="form-control adult_name">
									</div>

									<span class="col-sm-12 col-md-1 col-lg-1 col-xl-1 small">Date</span>
									<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<input type="text" name="" class="form-control adult_date">
									</div>
								</div>

								<div class="form-group row mt-4">	
									<span class="small col-sm-12 col-md-1 col-lg-1 col-xl-1">Address:</span>
									<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
										<input type="text" name="" class="form-control adult_address">
									</div>
									
									<span class="small col-sm-12 col-md-2 col-lg-2 col-xl-2">Phone Number:</span>
									<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<input type="text" name="" class="form-control adult_phone_number"></span>
									</div>
								</div>

								<div class="form-group row mt-4">	
									<span class="small col-sm-12 col-md-1 col-lg-1 col-xl-1">Email:</span>
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="text" name="" class="form-control adult_email">
									</div>
									
									<span class="small col-sm-12 col-md-1 col-lg-1 col-xl-1">City:</span>
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="text" name="" class="form-control adult_city">
									</div>

									<span class="col-sm-12 col-md-1 col-lg-1 col-xl-1 small">State</span>
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="text" name="" class="form-control adult_state">
									</div>

									<span class="col-sm-12 col-md-1 col-lg-1 col-xl-1 small">Zip Code</span>
									<div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
										<input type="text" name="" class="form-control adult_zip">
									</div>
								</div>

								<div class="form-group row mt-4">
									<span class="col-sm-12 col-md-3 col-lg-3 col-xl-3 small">Last four digits of Social Security Number:</span>
									<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
										<input type="text" name="" class="form-control adult_social_security">
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
								<span>Hispanic/Latino <input type="radio" name="ethnicity" class="ethnicity"></span> <br />
								<span>Not Hispanic/Latino <input type="radio" name="ethnicity" class="ethnicity"></span>
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
				
				<a href="#" class="btn btn-success form-control font-weight-bold" id="submit_application">SUBMIT</a>
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
        <a href="#" id="resendVerification" class="text-secondary small">Didn't received confirmation code? Click here to resend.</a>
		<br />
        <span id="verification_result" class="h6 text-danger"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary font-weight-bold" id="btn_verify">Verify</button>
        <button type="button" class="btn btn-secondary font-weight-bold" id="btn_cancel">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="sign_assets/numeric-1.2.6.min.js"></script>
<script src="sign_assets/bezier.js"></script>
<script src="sign_assets/jquery.signaturepad.js"></script>
<script src="sign_assets/json2.min.js"></script>
<script type="text/javascript">
	$(function(){
	  	$('#smoothed').signaturePad({
		    drawOnly:true, 
		    drawBezierCurves:true, 
		    lineTop:200
	  	});

	  	const url = window.location.href;
        const urlString = new URL(url);
        const child_id = urlString.searchParams.get('id');

        let child_array = {child_id :child_id }

		const allHouseHoldMembers = () => {

			let set = '<tr class="text-center tr_household">'+
							'<td>'+
								'<input type="text" name="" class="form-control household_name ">'+
							'</td>'+
							'<td contenteditable="true" class="student_id "></td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_foster borderless"><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_homeless borderless"><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_migrant borderless"><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_runaway borderless"><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_headstart borderless"><span></span>'+
							'</td>'+
							'<td>'+
								'<input type="checkbox" name="" class="form-control household_no_income borderless"><span></span>'+
							'</td>'+
						'</tr>';

			for (let x = 0; x <= 12; x++) {
				$('#tbl_form_application>tbody .part-benefits').before(set);
			}
		}

		allHouseHoldMembers();

		const totalHouseHoldIncome = () => {
			let set = '<tr class="tr_total_household">'+
					      '<td><input type="text" class="form-control total_household_name"></td>'+
					      '<td><input type="text" class="form-control total_deductions"></td>'+
					      '<td><input type="checkbox" class="form-control total_deductions_weekly borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_deductions_2_weeks borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_deductions_twice_monthly borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_deductions_monthly borderless"><span></span></td>'+
					      '<td><input type="text" class="form-control total_walfare"></td>'+
					      '<td><input type="checkbox" class="form-control total_walfare_weekly borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_walfare_2_weeks borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_walfare_twice_monthly borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_walfare_monthly borderless"><span></span></td>'+
					      '<td><input type="text" class="form-control total_social"></td>'+
					      '<td><input type="checkbox" class="form-control total_social_weekly borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_social_2_weeks borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_social_twice_monthly borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_social_monthly borderless"><span></span></td>'+
					      '<td><input type="text" class="form-control total_other"></td>'+
					      '<td><input type="checkbox" class="form-control total_other_weekly borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_other_2_weeks borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_other_twice_monthly borderless"><span></span></td>'+
					      '<td><input type="checkbox" class="form-control total_other_monthly borderless"><span></span></td>'+
					  '</tr>';
			for (let x = 0; x <= 3; x++) {
				$('#tbl_form_income>tbody .signation_social_security').before(set);
			}
		}

		totalHouseHoldIncome();

		$('.rotate').css('height', $('.rotate').width());

		$(document).on('click', '#submit_application', () => {
			const household_json_array = [];
			$('#tbl_form_application>tbody .tr_household').each(function(){	
				let tr = $(this).closest('tr');
				let name = tr.find('td:nth-child(1)').children('input').val();
				let student_id = tr.find('.student_id').text()
				let household_foster = tr.find('.household_foster').is(':checked');
				let household_homeless = tr.find('.household_homeless').is(':checked');
				let household_migrant = tr.find('.household_migrant').is(':checked');
				let household_runaway = tr.find('.household_runaway').is(':checked');
				let household_headstart = tr.find('.household_headstart').is(':checked');
				let household_no_income = tr.find('.household_no_income').is(':checked');

				let household_json = {
					name: name,
					student_id: student_id,
					household_foster: household_foster,
					household_homeless: household_homeless,
					household_migrant: household_migrant,
					household_runaway: household_runaway,
					household_headstart: household_headstart,
					household_no_income: household_no_income
				};

				name ? household_json_array.push(household_json) : false;
			});

			const benefits_json_array = [];

			let benefits_name = $('.benefits_name').val();
			let benefits_program_name = $('.benefits_program_name').val();
			let benefits_card_number = $('.benefits_card_number').val();

			let benefits_json = {
				benefits_name: benefits_name,
				benefits_program_name: benefits_program_name,
				benefits_card_number: benefits_card_number
			};

			benefits_name ? benefits_json_array.push(benefits_json) : false;

			const total_json_array = [];

			$('#tbl_form_income>tbody .tr_total_household').each(function(){
				let tr = $(this).closest('tr');
				let total_name = tr.find('td:nth-child(1)').children('input').val();
				let total_deductions = tr.find('td:nth-child(2)').children('input').val();
				let total_deductions_weekly = tr.find('.total_deductions_weekly').is(':checked');
				let total_deductions_2_weeks = tr.find('.total_deductions_2_weeks').is(':checked');
				let total_deductions_twice_monthly = tr.find('.total_deductions_twice_monthly').is(':checked');
				let total_deductions_monthly = tr.find('.total_deductions_monthly').is(':checked');

				let total_walfare = tr.find('.total_walfare').children('input').val();
				let total_walfare_weekly = tr.find('.total_walfare_weekly').is(':checked');
				let total_walfare_2_weeks = tr.find('.total_walfare_2_weeks').is(':checked');
				let total_walfare_twice_monthly = tr.find('.total_walfare_twice_monthly').is(':checked');
				let total_walfare_monthly = tr.find('.total_walfare_monthly').is(':checked');

				let total_social = tr.find('.total_social').children('input').val();
				let total_social_weekly = tr.find('.total_social_weekly').is(':checked');
				let total_social_2_weeks = tr.find('.total_social_2_weeks').is(':checked');
				let total_social_twice_monthly = tr.find('.total_social_twice_monthly').is(':checked');
				let total_social_monthly = tr.find('.total_social_monthly').is(':checked');

				let total_other = tr.find('.total_other').children('input').val();
				let total_other_weekly = tr.find('.total_other_weekly').is(':checked');
				let total_other_2_weeks = tr.find('.total_other_2_weeks').is(':checked');
				let total_other_twice_monthly = tr.find('.total_other_twice_monthly').is(':checked');
				let total_other_monthly = tr.find('.total_other_monthly').is(':checked');

				let total_json = {
					total_name: total_name, 
					total_deductions: total_deductions, 
					total_deductions_weekly: total_deductions_weekly, 
					total_deductions_2_weeks: total_deductions_2_weeks, 
					total_deductions_twice_monthly: total_deductions_twice_monthly, 
					total_deductions_monthly: total_deductions_monthly, 
					total_walfare: total_walfare, 
					total_walfare_weekly: total_walfare_weekly, 
					total_walfare_2_weeks: total_walfare_2_weeks, 
					total_walfare_twice_monthly: total_walfare_twice_monthly, 
					total_walfare_monthly: total_walfare_monthly, 
					total_social: total_social, 
					total_social_weekly: total_social_weekly, 
					total_social_2_weeks: total_social_2_weeks, 
					total_social_twice_monthly: total_social_twice_monthly, 
					total_social_monthly: total_social_monthly, 
					total_other: total_other, 
					total_other_weekly: total_other_weekly, 
					total_other_2_weeks: total_other_2_weeks, 
					total_other_twice_monthly: total_other_twice_monthly, 
					total_other_monthly: total_other_monthly
				};

				total_name ? total_json_array.push(total_json) : false;
			});

			const adult_json_array = [];

			let adult_signature = $('.adult_signature').val();
			let adult_name = $('.adult_name').val();
			let adult_date = $('.adult_date').val();
			let adult_address = $('.adult_address').val();
			let adult_phone_number = $('.adult_phone_number').val();
			let adult_email = $('.adult_email').val();
			let adult_city = $('.adult_city').val();
			let adult_state = $('.adult_state').val();
			let adult_zip = $('.adult_zip').val();
			let adult_social_security = $('.adult_social_security').val();
			let adult_no_social_security = $('.adult_no_social_security').is(':checked');

			let share_information_yes = $('.share_information_yes').is(':checked');
			let share_information_no = $('.share_information_no').is(':checked');
			let share_information;
			share_information_yes == true ? share_information = 'yes' : share_information = 'no';

			let ethnicity_hispanic = $('.ethnicity_hispanic').is(':checked');
			let ethnicity_not_hispanic = $('.ethnicity_not_hispanic').is(':checked');
			let ethnicity;
			ethnicity_hispanic == true ? ethnicity = 'yes' : ethnicity = 'no';

			let ethnicity_asian = $('.ethnicity_asian').is(':checked');
			let ethnicity_indian = $('.ethnicity_indian').is(':checked');
			let ethnicity_african = $('.ethnicity_african').is(':checked');
			let ethnicity_white = $('.ethnicity_white').is(':checked');
			let ethnicity_hawaiian = $('.ethnicity_hawaiian').is(':checked');

			let json_adult = {
				adult_signature: adult_signature,
				adult_name: adult_name,
				adult_date: adult_date,
				adult_address: adult_address,
				adult_phone_number: adult_phone_number,
				adult_email: adult_email,
				adult_city: adult_city,
				adult_state: adult_state,
				adult_zip: adult_zip,
				adult_social_security: adult_social_security,
				adult_no_social_security: adult_no_social_security,
				share_information: share_information,
				ethnicity: ethnicity,
				ethnicity_asian: ethnicity_asian,
				ethnicity_indian: ethnicity_indian,
				ethnicity_african: ethnicity_african,
				ethnicity_white: ethnicity_white,
				ethnicity_hawaiian: ethnicity_hawaiian
			};

			adult_json_array.push(json_adult);

			const to_array = [];

			to_array.push(household_json_array);
			to_array.push(benefits_json_array);
			to_array.push(total_json_array);
			to_array.push(adult_json_array);
			to_array.push(child_array);
			// console.log(household_json_array);
			// console.log(benefits_json_array);
			// console.log(total_json_array);
			// console.log(adult_json_array);
			console.log(to_array);

			$.ajax({
				url: 'php/insert_family_application.php',
				method: 'POST',
				data: { to_array },
				success: (res) => {
					console.log(res);
					window.location.replace("forms.php");

				}
			})
		});
	
		const status = () => {
			$.ajax({
				method: 'GET',
				url: 'php/status.php',
				success: (res ) => {
					res != 'verified' ? $('#modal_verification').modal({ backdrop: 'static', keyboard: false }) : false;
				}
			});
		};

		status();

		$('#btn_cancel').click( () => {
			window.location.href = 'forms.php';
		});

		$(document).on('click', '#btn_verify', () => {
			let code = $('#verification_code').val();
			
			$.ajax({
				method: 'POST',
				url: 'php/verify.php',
				data: { code:code },
				success: (res) => {
					
					if (res == 200) {
						$('#modal_verification').modal('hide');
					} else {
						let verification = $('#verification_result');
						verification.html('Invalid verification code.');

						setTimeout(function(){
							verification.html('');
						}, 3000);
					}
				}
			});
		});

		const resendVerification = () => {
			$.ajax({
				method: 'GET',
				url: 'php/resendVerification.php',
				success: (res) => {
					if (res === '200') {
						let verification = $('#verification_result');
						verification.html('A new verification code sent to your email.');

						setTimeout(function(){
							verification.html('');
						}, 3000);
					}
				}
			});
		};

		$(document).on('click', '#resendVerification', () => resendVerification());

	});
</script>
</body>
</html>