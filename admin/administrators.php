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
              <table class="table table-bordered text-center table-sm" id="tbl_admin">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
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
  <div class="modal admin-modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Administrator Details </h5>
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
          </div>
        </div>
        <div class="modal-footer">
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
      $("a[href='#settings']").click();
      $("a[href='administrators.php']").addClass('toActive');
  		const admin = () => {
			const url = '../php/getAllAdmin.php';

			$.ajax({
				url: url,
				method: 'GET',
				success: (res) => {
					const data = JSON.parse(res);
					for(let i = 0; i < data.length; i++) {
						set = '<tr p-id="'+data[i]['id']+'" class="tr-admin">'+
								'<td>'+data[i]['admin_name'] +'</td>'+
								'<td>'+data[i]['email_address']+'</td>'+
                '<td>'+data[i]['created_at']+'</td>'+
							'</tr>';
						$('#tbl_admin').append(set);
					}
				}
			});
		};

		admin();

		$(document).on('click', '.tr-admin', (e) => parentClick(e));

		const parentClick = (e) => {
      $('.admin-modal').modal('show');
      const id = e.currentTarget.getAttribute('p-id');

      $(' #btnUpdate').attr('data-id', id);

      $.ajax({
          url: '../php/getAdminById.php',
          method: 'POST',
          data: { id:id},
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
    }

    const adminUpdate = () => {
        const id = $('#btnUpdate').attr('data-id');
        const last_name = $('#last_name').val();
        const middle_name = $('#middle_name').val();
        const first_name = $('#first_name').val();
        const email_address = $('#email_address').val();
        
        const json = {
            id,
            last_name,
            middle_name,
            first_name,
            email_address
        };
        console.log(json);

        $.ajax({
          url: '../php/adminAccountUpdate.php',
          method: 'POST',
          data: json,
          success: (res) => { 
            // location.reload();
          }
        });
    };

    $(document).on('click', '#btnUpdate', () => adminUpdate());
	});
</script>
  
</body>
</html>