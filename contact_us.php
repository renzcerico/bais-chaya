<?php
require 'php/session1.php';
include 'stylesheet.php';
include 'script.php';
?>

<!DOCTYPE html>
<html>
<head>
  <title>BAIS CHAYA ACADEMY</title>
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
        <h1 class="h4 pt-3 pb-3 text-center">Contact Us</h1>
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
                  <label class="h6 text-primary">Name</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="name" id="name" placeholder="Name" class="form-control form-control-sm" required>
                </div>
              </div>
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
                  <label class="h6 text-primary">Phone Number</label>
                </div>
                <div class="col-md-9">
                  <input type="text" name="phone" id="phone" placeholder="Phone Number" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="form-row justify-content-center mb-2">
                <div class="col-md-3">
                  <label class="h6 text-primary">Message</label>
                </div>
                <div class="col-md-9">
                  <textarea name="" class="form-control mb-1" rows="5" placeholder="Message" id="message"></textarea>
                </div>
              </div>

              <div class="btn-toolbar mb-2 pt-4 mb-md-0 d-flex justify-content-end">
                <div class="btn-group mr-2 ">
                  <a class="btn btn-primary" href="#" id="send"><span class="fas fa-paper-plane"></span>&nbsp Send Message</a>
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
      include 'footer.php';
    ?>

<script type="text/javascript">
  $(function(){
      $("a[href='#Settings']").click();
      $("a[href='contact_us.php']").addClass('toActive');

      const sendEmail = () => {
      let name = $('#name').val();
      let email = $('#email').val();
      let message = $('#message').val();
      let phone = $('#phone').val();
      let json='';

      if (name=="" || email =="" || phone =="" || message=="") {
        resultSend(false);
      }
      else{
        json = {
          name,
          email,
          phone,
          message
        };

        // console.log(json);

        $.ajax({
          url:'php/contactUs.php',
          method: 'POST',
          data: json,
          success:(result) =>{
            resultSend(true);
          }
        });
      }

    };

    const resultSend = (result) =>{
      if (result==true) {
        $('#result').addClass('text-white').html('Email Successfully Sent!');
      }
      else {
        $('#result').addClass('text-danger').html('Please complete the form!');
      }

      setTimeout(() => {
        $('#result').removeClass('text-danger text-white').html('');
      }, 3000);
    };

    $(document).on('click', '#send', (e) => {
      sendEmail();
        e.preventDefault();
    });
  });
</script>
</body>
</html>