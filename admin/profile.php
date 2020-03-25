<?php
require '../php/session1.php';
include 'stylesheet.php';
include 'script.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>Kirshy Media Admin</title>
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
        <h1 class="h4 pt-3 pb-3 text-center">View Profile</h1>
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
                  <label class="h6 text-primary">Email</label>
                </div>
                <div class="col-md-9">
                  <input type="email" name="email" id="email" placeholder="Email" class="form-control form-control-sm" required>
                </div>
              </div>
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

              <div class="btn-toolbar mb-2 pt-4 mb-md-0 d-flex justify-content-end">
                <div class="btn-group mr-2 ">
                  <a class="btn btn-primary" href="#" id="btnSaveProfile"><span class="fas fa-save"></span>&nbsp Save Profile</a>
                </div>
              </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-12 col-12">
            </div>
          </div>


          <h4 class="text-center pb-5"> Change Password</h4>
          <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-12 col-12">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
              <div class="form-row justify-content-center mb-2">
                <div class="col-md-3">
                  <label class="h6 text-primary">Password</label>
                </div>
                <div class="col-md-9">
                  <input type="password" name="password" id="password" placeholder="Password" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="form-row justify-content-center mb-2">
                <div class="col-md-3">
                  <label class="h6 text-primary">New Password</label>
                </div>
                <div class="col-md-9">
                  <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="form-row justify-content-center mb-2">
                <div class="col-md-3">
                  <label class="h6 text-primary">Confirm Password</label>
                </div>
                <div class="col-md-9">
                  <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" class="form-control form-control-sm" required>
                </div>
              </div>

              <div class="btn-toolbar mb-2 pt-4 mb-md-0 d-flex justify-content-end">
                <div class="btn-group mr-2 ">
                  <a class="btn btn-primary" href="#" id="btnChangePassword"><span class="fas fa-save"></span>&nbsp Save Password</a>
                </div>
              </div>
              <div class="alert alert-success success_PasswordChange" role="alert" hidden>
                <strong>Success</strong>, Password changed!
              </div>
              <div class="alert alert-danger failed_PasswordChange" role="alert" hidden>
                <strong>Failed</strong>, Current password is invalid.
              </div>
              <div class="alert alert-danger failed_PasswordMatch" role="alert" hidden>
                <strong>Failed</strong>, New password doesn't match.
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
    $("a[href='profile.php']").addClass('toActive');


    const profile = (id) => {
        const userLevel = 'admin';

        $.ajax({
            url: '../php/getProfile.php',
            method: 'POST',
            data: { id:id, user_level:userLevel },
            success: (res) => {
                const data = JSON.parse(res);
                $('#email').val(data.email_address  );
                $('#firstname').val(data.first_name);
                $('#middlename').val(data.middle_name);
                $('#lastname').val(data.last_name);
            }
        });
    }

    const session =  () => {
        $.ajax({
            url: '../php/session.php',
            method: 'GET',
            success: (res) => {
                const data = JSON.parse(res);
                const id = data.id;
                $('#btnSaveProfile').attr('data-id', data.id);
                profile(id);
            }
        });
    };

    session();

    const saveProfile = () => {
        const email = $('#email').val();
        const firstname = $('#firstname').val();
        const middlename = $('#middlename').val();
        const lastname = $('#lastname').val();
        const id = $('#btnSaveProfile').attr('data-id');
        const userLevel = 'admin';

        const json = {
            id,
            email,
            firstname,
            middlename,
            lastname,
            userLevel
        };

        $.ajax({
            url: '../php/saveProfile.php',
            method: 'POST',
            data: json,
            success: (res) => {
                console.log(res);
            }
        });
    };

    const changePassword = () => {
        const oldPassword = $('#password').val();
        const newPassword = $('#new_password').val();
        const password = $('#confirm_password').val();
        const id = $('#btnSaveProfile').attr('data-id');
        const userLevel = 'admin';

        const json = {
            id,
            password,
            userLevel
        };

        $.ajax({
            url: '../php/currentPassword.php',
            method: 'POST',
            data: { id: id, password: oldPassword, userLevel: userLevel },
            success: (res) => {
              if (res === '200') {
                  if (password === newPassword) {
                      $.ajax({
                          url: '../php/changePassword.php',
                          method: 'POST',
                          data: json,
                          success: (res) => {
                              console.log(res);
                              $('.success_PasswordChange').removeAttr('hidden');
                              setTimeout(() => {
                                  $('.success_PasswordChange').attr('hidden', true);
                              }, 2000);
                          }
                      });
                  }
              } else {
                  $('.failed_PasswordChange').removeAttr('hidden');
                  setTimeout(() => {
                    $('.failed_PasswordChange').attr('hidden', true);
                  }, 2000);
              }
            }
        });
    };

    $(document).on('click', '#btnSaveProfile', () => saveProfile());
    $(document).on('click', '#btnChangePassword', () => changePassword());
})
</script>
</body>
</html>