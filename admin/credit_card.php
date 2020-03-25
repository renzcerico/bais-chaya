<?php
require '../php/session.php';
include 'stylesheet.php';
include 'script.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChabadFoodFund</title>
</head>
<body>
  <nav class=" navbar-expand-lg navbar-dark bg-yellow p-4 fixed-top">
      <div class="container-fluid">
          <div class="row">
             <div class="col-sm-6 col-6 col-md-6 col-lg-6">
                <a class="h2 font-weight-bold text-uppercase text-white text-decoration-none" href="../index#" id="nav-title">Chabad<span class="text-dark">FoodFund</span></a>
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
        <h1 class="h4 pt-3 pb-3 text-center">Authorize.net API </h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <div class="container-fluid justify-content-center d-flex">
        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
           <div class="card card_api">
                <div class="card-body p-5">
                    <form id="api_form">
                        <div class="form-group">
                            <label for="">Login ID</label>
                            <input type="text" class="form-control" id="login_id" placeholder="Enter Login ID">
                        </div>
                        <div class="form-group">
                            <label for="">Transaction Key</label>
                            <input type="text" class="form-control" id="trans_key" placeholder="Enter Transaction Key">
                        </div>
                        <span id="api_result"></span>
                        <a href="#" class="btn btn-warning btn-block mt-4 font-weight-bold" id="btn_api_update">Save</a>
                    </form>
                </div>
            </div>
        </div>
      </div>
        
    </div>

  </div>

<script type="text/javascript">
  $(function(){
    $("a[href='#Payment']").click();
    $("a[href='credit_card.php']").addClass('toActive');
  });

  $(() => {
      const updateAPI = () => {
          let login_id = $('#login_id').val(); // 37M2JhjV
          let trans_key = $('#trans_key').val(); // 7E23aWeq2rP6U4k2

          if (login_id  != '' && trans_key  != '') {
              let json = {
                  login_id: login_id,
                  trans_key: trans_key
              };

              $.ajax({
                  url: '../php/authorize_update.php',
                  method: 'POST',
                  data: json,
                  success: (res) => {
                      apiResult(true);
                      $('#api_form').trigger('reset');
                  }
              });
          } else {
              apiResult(false);
          }
      };

      const apiResult = (status) => {
          $('#api_result').removeClass('text-success text-danger').html('');
          
          if (status == true) {
              $('#api_result').addClass('text-success').html('API successfully updated.');
          } else {
              $('#api_result').addClass('text-danger').html('Please complete the form.');
          }

          setTimeout(() => {
              $('#api_result').removeClass('text-success text-danger').html('');
          }, 3000);
      };

      $(document).on('click', '#btn_api_update', () => {
          updateAPI();
      });
    });
</script>
</body>
</html>