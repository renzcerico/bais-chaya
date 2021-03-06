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
        <h1 class="h4 pt-3 pb-3 text-center">Student's Profile</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <div class="container-fluid justify-content-center d-flex">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
           <div class="card card_api">
              <div class="card-body pt-5 pl-3 pr-3 pb-5">
                <table class="table table-bordered text-center table-sm" id="tbl_child">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Parent's Name</th>
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
  </div>

  <!-- MODAL FOR CHILD DETAILS -->
  <div class="modal child-modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Child Details 
              <span class="small">
              <a href="#" class="consent-app">(View Consent)</a>
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
      $("a[href='#students']").click();
      $("a[href='forms.php']").addClass('toActive');

      const child = () => {
      const url = '../php/getAllChild.php';

      $.ajax({
        url: url,
        method: 'GET',
        success: (res) => {
          const data = JSON.parse(res);
          for(let i = 0; i < data.length; i++) {
            set = '<tr p-id="'+data[i]['id']+'" class="tr-parent">'+
                '<td>'+data[i]['child_name']+'</td>'+
                '<td>'+data[i]['parent_name']+'</td>'+
                // '<td>'+data[i]['status']+'</td>'+
                '<td>'+data[i]['created_at']+'</td>'+
              '</tr>';
            $('#tbl_child').append(set);
          }
        }
      });
    };

    child();
		// parents();

		$(document).on('click', '.tr-parent', (e) => parentClick(e));

		const parentClick = (e) => {
      $('.child-modal').modal('show');
      const id = e.currentTarget.getAttribute('p-id');
      const name = $(e.currentTarget).find('td:nth-child(1)').text().toUpperCase();

      const href = 'custodian.php?&id=' + id +'&name=' + name;
      $('.consent-app').attr('href', href);
      $('#btnResetPassword, #btnDelete, #btnUpdate').attr('data-id', id);

      const userLevel = 'parents';

      $.ajax({
          url: '../php/getChildProfile.php',
          method: 'POST',
          data: { id:id },
          success: (res) => {
            console.log(res)
              const data = JSON.parse(res);
              $('#first_name').val(data.first_name);
              $('#middle_name').val(data.middle_name);
              $('#last_name').val(data.last_name);
          }
      });
      return;
			// const id = e.currentTarget.getAttribute('p-id');

      // const name = $(e.currentTarget).find('td:nth-child(1)').text().toUpperCase();
      
			// window.location.href = 'custodian.php?&id=' + id +'&name=' + name;
		}

    const childDelete = () => {
      let confirmation = confirm('Do you want to delete the account of child?');

      if (confirmation) {
        const id = $('#btnDelete').attr('data-id');
        
        $.ajax({
          url: '../php/deleteChild.php',
          method: 'POST',
          data: { id: id },
          success: (res) => {
            alert('Account of the child was successfully deleted.');
            location.reload();
          }
        });
      }
    };

    $(document).on('click', '#btnDelete', () => childDelete());

    const childUpdate = () => {
        const id = $('#btnDelete').attr('data-id');
        const last_name = $('#last_name').val();
        const middle_name = $('#middle_name').val();
        const first_name = $('#first_name').val();
        
        $.ajax({
          url: '../php/updateChild.php',
          method: 'POST',
          data: { id: id,
                  last_name: last_name,
                  middle_name: middle_name,
                  first_name: first_name  
          },
          success: (res) => { 
            location.reload();
          }
        });
    };

    $(document).on('click', '#btnUpdate', () => childUpdate());
	});
</script>
  
</body>
</html>