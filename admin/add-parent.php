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
        <h1 class="h4 pt-3 pb-3 text-center">Add Parent</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <div class="container-fluid justify-content-center d-flex">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="card card_api">
            <div class="card-body pt-5 pl-3 pr-3 pb-5">
                <form class="form-border p-5" method="post" action="../php/registerParent.php">
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
                <div class="text-center">
                    <button type="submit" class="btn btn-primary form-control font-weight-bold mb-3 mt-3" id="btn_register">Register</button>
                </div>
                </form>
            </div>
          </div>
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
      $("a[href='add-parent.php']").addClass('toActive');
	});
</script>
  
</body>
</html>