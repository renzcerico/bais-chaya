<?php
include '../php/session1.php';
include 'stylesheet.php';
include 'script.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bais Chaya Academy</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link href="sign_assets/jquery.signaturepad.css" rel="stylesheet"> -->
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

	.width-500 {
		width: 500px !important;
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
</head>
<body>
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
				<a class="nav-link font-weight-bold" href="dashboard.php">HOME</a>
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
				<span id="archivesYear"></span>
			</h3>
			<h5 class="text-center"><u>APPOINTMENT FOR CUSTODIAN FOR MINOR CHILD(REN) AND DURABLE HEALTHCARE POWER OF ATTORNEY</u></h5>
			<table class="table table-bordered table-hover mt-4" id="">
			<tbody>
					<tr class="part-benefits">
						<td colspan="2">
							I/We <input type="text" name="" id="parentName" class="width-500">, and <input type="text" name="" id="parentSecondName" class="width-500"> 
							constituting the sole or all of the custodial parent(s) of the child(ren) named below, 
							and residing at 2059-2065 NW 92<sup>nd</sup> Ave. Coral Springs, FL 336065 hereby appoint Rabbi Moshe Rabin
							<input type="text" name="" id="rabbiName" class="width-500 mt-1">, residing at 2059-2065 NW 92nd Ave. Coral Springs, FL 336065 to 
							serve as the Legal Custodian(s) over, the following minor child(ren):
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group row">
								<label class="col-sm-12 col-md-3 col-lg-3 col-xl-3">Full name: </label>
								<div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
									<input type="text" class="form-control" id="childrenFullName" disabled/>
								</div>
							</div>
						</td>
						<td>
						<div class="form-group row">
								<label class="col-sm-12 col-md-3 col-lg-3 col-xl-3">DOB: </label>
								<div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
									<input type="text" class="form-control" id="dateOfBirth" />
								</div>
							</div>
						</td>
					</tr>
					<!-- <tr>
						<td>
							<div class="form-group row">
								<label class="col-sm-12 col-md-3 col-lg-3 col-xl-3">Full name: </label>
								<div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
									<input type="text" class="form-control" disabled/>
								</div>
							</div>
						</td>
						<td>
						<div class="form-group row">
								<label class="col-sm-12 col-md-3 col-lg-3 col-xl-3">DOB: </label>
								<div class="col-sm-12 col-md-9 col-lg-9 col-xl-9">
									<input type="text" class="form-control" disabled/>
								</div>
							</div>
						</td>
					</tr> -->
					<tr>
						<td colspan="2">
							Which will become effective on August 26, 2019, and will terminate upon the earlier to occur of 
							(a) the revocation in writing of any parent/gaurdian, 
							(b) as required by applicable law or 
							(c) on the 18<sup>th</sup> day of June, 2020. <br />

							It is my/our intention that the Legal Custodian(s) named above shall have the authority to make cecisiors 
							regarding the day to day care, education and domicle of the minor child(ren) listed herein while she is attending 
							the Rohr Bais Chaya Academy in Tamarac and Coral Springs, Florida. <br />

							It is my/our intention that this document also qualify as a careg ver authorization on afficavit under applicable
							law unless I/we have also attached or simultaneously executed such a document(s) in which case that/those
							documents(s) shall instead control with regard to caregiver authorization, issues the documents shall be read 
							together as a hamonius whole wherever possible. To make all emergency and non-emergency healthcare decisions and 
							execute all related documents including insurance and waiver claims and forms, including the right to approve or 
							decline medical, dental, eye care, or asychatric treatment, ciagnostic tests, hospitalizaton, healthcare, and 
							personal care, in any situation in which as the result of illness, disease, absence, injury, or death such decision 
							with regard to my/our child(ren)s medical or dental care, provided that such decisions are made following 
							consultation which one or more licensed physicians or other licensed medical practitioners. Live further delefate 
							the power to our short-term gaurdian(s) to select, employ, and discharge health care personnel, including dentists 
							and eye care professionals for our children(s) benefit and to contract in my/our name and on my/our behalf for all 
							health care services, including emergency and non-emergency medical, dental vision, and psychiatric care services 
							and related goods. The short-term gaurdian(s) should refer to any additional information we have attached to this 
							document or left with the gaurdian(s).
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<div class="form-group row">
								<label class="col-sm-12 col-md-1 col-lg-1 col-xl-1">Date: </label>
								<div class="col-sm-12 col-md-3 col-lg-3 col-xl-3">
									<input type="text" class="form-control" id="dateFilled" />
								</div>
							</div>
						</td>
					</tr>
					<tr>
						<td colspan="2">
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
									<!-- <a href="#clear" class="clearButton btn btn-secondary text-white btn-sm mt-1">Clear</a> -->
									<!-- <a class="btn btn-primary text-white btn-sm mt-1" id="btnSave">Save</a> -->
								</div>
							</div>
						</div>
						</td>
					</tr>
			</tbody>
			</table>
<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="sign_assets/numeric-1.2.6.min.js"></script>
<script src="sign_assets/bezier.js"></script>
<script src="sign_assets/jquery.signaturepad.js"></script>
<script src="sign_assets/json2.min.js"></script> -->
<script type="text/javascript">
	$(function(){
	  	$('#smoothed').signaturePad({
		    drawOnly:true, 
		    drawBezierCurves:true, 
		    lineTop:200
        });
        
        $('input').attr('disabled', true);


		const setName = () => {
			const url = window.location.href;
			const params = new URLSearchParams(url);
			const name = params.get('name');
            const id = params.get('id');
            const year = params.get('year');
            const addYear = parseInt(year) + 1;
            const archivesYear = year + ' - ' + addYear;

            $('#archivesYear').text(archivesYear);

			$.ajax({
				url: '../php/custodianGetById.php',
				method: 'POST',
				data: { id: id },
				success: (res) => {
					const data = JSON.parse(res);
					console.log(data)
					if (parseInt(data.id) > 0) {
						$('#parentName').val(data.parent_one);
						$('#parentSecondName').val(data.parent_two);
						$('#rabbiName').val(data.rabbi_name);
						$('#dateFilled').val(data.date);
						$('#dateOfBirth').val(data.child_dob);
						$('#btnSave').attr('data-id', data.id);
					}
				}
			});
			$('#childrenFullName').val(name);
		};

		setName();

		const save = () => {
			let canvas = $('.pad');
			canvas = canvas[0].toDataURL('image/png'); // DO NOT REMOVE "IMG FROM SIGNATURE"

			const url = window.location.href;
			const params = new URLSearchParams(url);

			const childID 		= params.get('id');
			const parentOne 	= $('#parentName').val();
			const parentSecond 	= $('#parentSecondName').val();
			const rabbi 		= $('#rabbiName').val();
			const dateFilled	= $('#dateFilled').val();
			const dob			= $('#dateOfBirth').val();
			const id			= $('#btnSave').attr('data-id') || 0;

			const json = {
				id 				: id,
				child_id		: childID,
				parent_one		: parentOne,
				parent_two		: parentSecond,
				rabbi			: rabbi,
				date_filled		: dateFilled,
				dob				: dob
			};

			$.ajax({
				url: '../php/custodianSave.php',
				method: 'POST',
				data: json,
				success: (res) => {
					console.log(res);
					if (res == 200) {
						alert('Saved!');
					}
				}
			});

		};

		$(document).on('click', '#btnSave', () => save());

	});
</script>
</body>
</html>