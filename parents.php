<?php
include 'php/session.php';
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
	tr:hover {
		color: white;
		background: tomato;
	}
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
	    	<a class="h3 text-white font-weight-bold text-spacing-3">BAIS<span class="text-info">CHAYA</span> ACADEMY</a>
	    </div>
	    <div class="navbar-collapse justify-content-md-end collapse" id="navbarsExample10">
	      <ul class="navbar-nav">
	        <li class="nav-item mr-3">
	          <a class="nav-link font-weight-bold" href="logout.php">LOGOUT</a>
	        </li>
	      </ul>
	    </div>
	</div>
</div>

<div class="container mt-5">
	<table class="table table-bordered text-center table-sm" id="tbl_parents">
		<thead class="thead-dark">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Status</th>
				<th>Created At</th>
			</tr>
		</thead>
		<tbody>
		</tbody>
	</table>
</div>

<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="sign_assets/jquery.signaturepad.js"></script>
<script src="sign_assets/json2.min.js"></script>
<script>
	$(() => {
		const parents = () => {
			const url = 'php/getAllParents.php';

			$.ajax({
				url: url,
				method: 'GET',
				success: (res) => {
					const data = JSON.parse(res);
					for(let i = 0; i < data.length; i++) {
						set = '<tr p-id="'+data[i]['id']+'" class="tr-parent">'+
								'<td>'+data[i]['parent_name']+'</td>'+
								'<td>'+data[i]['email_address']+'</td>'+
								'<td>'+data[i]['status']+'</td>'+
								'<td>'+data[i]['created_at']+'</td>'+
							'</tr>';
						$('#tbl_parents').append(set);
					}
				}
			});
		};

		parents();

		$(document).on('click', '.tr-parent', (e) => parentClick(e));

		const parentClick = (e) => {
			const id = e.currentTarget.getAttribute('p-id');

			window.location.href = 'application.php?id=' + id;
		}
	});
</script>
</body>
</html>