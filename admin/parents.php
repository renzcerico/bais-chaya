<?php
include 'stylesheet.php';
include 'script.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BaisChayaAcademy</title>
    <style type="text/css">
            
      tr:hover {
        color: white;
        background: tomato;
      }
    </style>
</head>
<body>
  <nav class=" navbar-expand-lg navbar-dark bg-dark p-4 fixed-top">
      <div class="container-fluid">
          <div class="row">
             <div class="col-sm-6 col-6 col-md-6 col-lg-6">
             <a class="h3 text-white font-weight-bold text-spacing-3">BAIS<span class="text-info">CHAYA</span> ACADEMY</a>
              </div>
            <div class="col-sm-6 col-6 col-md-6 col-lg-6 justify-content-end d-flex">
                <button  id="sidebarCollapse" class="btn text-white navbar-btn">
                    <i class="fas fa-bars"></i>
                </button>
                <button  id="sidebarCollapse1" class="btn text-white navbar-btn">
                   <i class="fas fa-bars"></i>
                </button>
            </div>
          </div>
      </div>
  </nav>

  <div class="wrapper">
    <?php
      include 'nav.php';
    ?>

    <div id="content" class="content1 container-fluid">
      <div class=" align-items-center pt-3 pb-2 mb-3 border-bottom flex-md-nowrapap flex-md-nowrap">
        <h1 class="h4 pt-3 pb-3 text-center">Parent's Profile</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <div class="container-fluid justify-content-center d-flex">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="card card_api">
            <div class="card-body pt-5 pl-3 pr-3 pb-5">
              <table class="table table-bordered text-center table-sm" id="tbl_parents">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created At</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- MODAL FOR PARENT DETAILS -->
  <div class="modal parent-modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Parent Details 
              <span class="small">
              <a href="#" class="meal-app">(View Meal Application)</a>
              </span>
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="container-fluid">
          <label>Last Name</label>
          <input type="text" id="last_name" class="form-control mb-2" />
          <label>First Name</label>
          <input type="text" id="first_name" class="form-control mb-2" />
          <label>Middle Name</label>
          <input type="text" id="middle_name" class="form-control mb-2" />
          <label>Email address</label>
          <input type="email" id="email_address" class="form-control mb-2" />
        </div>
        <div class="container-fluid">
          <div class="mb-3 mt-3">
            <a href="#" id="btnResetPassword">Click here to reset password to "welcome"</a>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary mr-auto" data-dismiss="modal">Close</button> -->
          <button type="button" class="btn btn-danger" id="btnDelete">Delete</button>
          <button type="button" class="btn btn-primary" id="btnUpdate">Save</button>
        </div>
      </div>
    </div>
  </div>
    
  <?php
    include '../footer.php';
  ?>
  <script>
	$(() => {
      $("a[href='#accounts']").click();
      $("a[href='parents.php']").addClass('toActive');
  		const parents = () => {
			const url = '../php/getAllParents.php';

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
      $('.parent-modal').modal('show');
      const id = e.currentTarget.getAttribute('p-id');

      const href = 'application.php?&id=' + id +'&status=verified'; 
      $('.meal-app').attr('href', href);
      $('#btnResetPassword, #btnDelete, #btnUpdate').attr('data-id', id);

      const userLevel = 'parents';

      $.ajax({
          url: '../php/getProfile.php',
          method: 'POST',
          data: { id:id, user_level:userLevel },
          success: (res) => {
            console.log(res)
              const data = JSON.parse(res);
              $('#email_address').val(data.email_address);
              $('#first_name').val(data.first_name);
              $('#middle_name').val(data.middle_name);
              $('#last_name').val(data.last_name);
          }
      });
      return;
			// const id = e.currentTarget.getAttribute('p-id');
      // const status = $(e.currentTarget).find('td:nth-child(3)').text();
      
      // window.location.href = 'application.php?&id=' + id +'&status=verified';
			// window.location.href = 'application.php?id=' + id;
    }
    
    const resetPassword = () => {
        let confirmation = confirm('Do you want to reset the password?');

        if (confirmation) {
          const id = $('#btnResetPassword').attr('data-id');
          
          $.ajax({
            url: '../php/resetPassword.php',
            method: 'POST',
            data: { id: id },
            success: (res) => {
              alert('Password successfully set to "welcome".');
            }
          });
        }
    };

    $(document).on('click', '#btnResetPassword', () => resetPassword());

    const accountParentDelete = () => {
      let confirmation = confirm('Do you want to delete the account of parent?');

      if (confirmation) {
        const id = $('#btnDelete').attr('data-id');
        
        $.ajax({
          url: '../php/parentAccountDelete.php',
          method: 'POST',
          data: { id: id },
          success: (res) => {
            alert('Account of the parent was successfully deleted.');
            location.reload();
          }
        });
      }
    };

    $(document).on('click', '#btnDelete', () => accountParentDelete());

    const accountParentUpdate = () => {
        const id = $('#btnDelete').attr('data-id');
        const last_name = $('#last_name').val();
        const middle_name = $('#middle_name').val();
        const first_name = $('#first_name').val();
        const email_address = $('#email_address').val();
        
        $.ajax({
          url: '../php/parentAccountUpdate.php',
          method: 'POST',
          data: { id: id,
                  last_name: last_name,
                  middle_name: middle_name,
                  first_name: first_name,
                  email_address: email_address,    
          },
          success: (res) => { 
            location.reload();
          }
        });
    };

    $(document).on('click', '#btnUpdate', () => accountParentUpdate());
	});
</script>
  
</body>
</html>