<?php
require 'php/session1.php';
include 'stylesheet.php';
include 'script.php';

$json = json_decode($_SESSION['login'], true);
$firstName = $json['first_name'];
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

      .bg-mute-primary {
        background: #0419ff!important;
        color:white;
      }
      .bg-mute-primary:hover{
        background: #0443ff!important;
        /*color:#212529;*/
        color: white;
      }
      .decoration-none:hover{
        text-decoration: none !important;
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
                <a href="#" class="my-auto" id="btnNotification">
                    <i class="fas fa-bell mr-5 text-white">
                        <span class="small font-weight-500 counter"></span>
                    </i>
                </a>
                <span class="text-white font-weight-500 mr-5 my-auto">Hello, <?=$firstName;?>!</span>
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
        <h1 class="h4 pt-3 pb-3 text-center">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 p-5">
            <a href="application.php" class="decoration-none">
              <div class="card p-5 mt-5 mb-5 bg-mute-primary">
                <h3 class="text-center pt-5 pb-5"> 
                 
                  <?php 
                    $this_year = date("Y");
                    echo 'Lunch Form <br>'.$this_year
                  ?>
                </h3>
              </div>
            </a>
          </div>
          <div class="col-md-6 p-5">
            <a href="forms.php" class="decoration-none">
              <div class="card p-5 mt-5 mb-5 bg-mute-primary">
                <h3 class="text-center pt-5 pb-5"> 
                 
                  <?php 
                    $this_year = date("Y");
                    echo "Consent Form <br>".$this_year
                  ?>
                </h3>
              </div>
            </a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php
    include 'footer.php';
  ?>
  <script type="text/javascript">
    $(()=>{
        $("a[href='#Settings']").click();
        $("a[href='dashboard.php']").addClass('toActive');
      
        const notification = (id) => {
            $.ajax({
                url: 'php/notificationCount.php',
                method: 'POST',
                data: { id: id },
                success: (res) => {
                    const data = JSON.parse(res);

                    const total_child = parseInt(data.total_child);
                    const total_custodian = parseInt(data.total_custodian);
                    const application = parseInt(data.family_application);

                    if (total_child > total_custodian || application === 0) {
                      const isSubmitted = application > 0 ? 0 : 1;
                      const notification = (total_child - total_custodian) + isSubmitted;
                      
                      $('.counter').text(notification);
                    }
                }
            });
        };

        const session = () => {
                        $.ajax({
                            url: 'php/session.php',
                            method: 'GET',
                            success: (res) => {
                                const data = JSON.parse(res);
                                const id = data.id;
                                notification(id);
                            }
                        });
        };

        session();

        $(document).on('click', '#btnNotification', () => {
            const counter = $('.counter').text();
            alert('You have '+ counter + ' form(s) not yet submitted.');
        });
    });
  </script>
  
</body>
</html>