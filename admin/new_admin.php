<?php
require '../php/session1.php';
include 'stylesheet.php';
include 'script.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>BaisChayaAcademy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
        <h1 class="h4 pt-3 pb-3 text-center">Add Administrator Account</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="card p-5">
          <div class="row pb-5">
            <div class="col-lg-1 col-md-1 col-sm-12 col-12">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
              <div class="form-row justify-content-center mb-2">
                <div class="col-md-3">
                  <label class="h6 text-primary">First Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="firstname" id="firstname" placeholder="First Name" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="form-row justify-content-center mb-2">
                <div class="col-md-3">
                  <label class="h6 text-primary">Middle Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="middlename" id="middlename" placeholder="Middle Name" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="form-row justify-content-center mb-2">
                <div class="col-md-3">
                  <label class="h6 text-primary">Last Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="form-row justify-content-center mb-2">
                <div class="col-md-3">
                  <label class="h6 text-primary">Email</label>
                </div>
                <div class="col-md-9">
                  <input type="email" name="email" id="email" placeholder="Email" class="form-control form-control-sm email" required>
                </div>
              </div>
              <div class="form-row justify-content-center mb-2">
                <div class="col-md-3">
                  <label class="h6 text-primary">Password</label>
                </div>
                <div class="col-md-9">
                  <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-sm" required>
                </div>
              </div>

              <div class="btn-toolbar mb-2 pt-4 mb-md-0 d-flex justify-content-end">
                <div class="btn-group mr-2 ">
                  <a class="btn btn-primary" href="#" id="btnSaveProfile"><span class="fas fa-save"></span>&nbsp Save Account</a>
                </div>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-12">
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

    $("a[href='#settings']").click();
    $("a[href='administrator.php']").addClass('toActive');

    const addAdministrator = () => {
        const email = $('.email').val();
        const password = $('#password').val();
        const firstname = $('#firstname').val();
        const middlename = $('#middlename').val();
        const lastname = $('#lastname').val();
        const userLevel = 'admin';

        const json = {
            email,
            password,
            firstname,
            middlename,
            lastname,
            userLevel
        };
        console.log(json);
        alert(email);
        $.ajax({
            url: '../php/addAdministrator.php',
            method: 'POST',
            data: json,
            success: (res) => {
                console.log(res);
            }
        });
    };

    $(document).on('click', '#btnSaveProfile', () => addAdministrator());
})
</script>
</body>
</html>