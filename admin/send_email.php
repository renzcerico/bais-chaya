
<?php
include 'stylesheet.php';
include 'script.php';
include '../class/Database.php';
include '../class/Email.php';
require '../php/session1.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$template = new Email($db);

$template = $template->getTemplates();

$template = $template->fetchAll(PDO::FETCH_ASSOC);


$parents = new Customer($db);

$parents = $parents->getAllParents();

$parents = $parents->fetchAll(PDO::FETCH_ASSOC);

?>
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
    <!-- Sidebar Holder -->
    <?php
      include 'nav.php';
    ?>
  <!-- Page Content Holder -->
    <div id="content" class="content1 container-fluid">
      <div class=" align-items-center pt-3 pb-2 mb-3 border-bottom flex-md-nowrapap flex-md-nowrap">
        <h1 class="h4 pt-3 pb-3 text-center">Email Template</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <div class="container-fluid">
        <div class="card p-5 ">
          <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-12 col-12">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
              <form>
                <div class="form-row justify-content-center mb-2">
                  <div class="col-md-2">
                    <label class="h6 text-primary">Recipient</label>

                  </div>
                  <div class="col-md-10">
                    <select name="parent" class="form-control" id="parent">

                      <option value="ALL">ALL</option>
                        <?php
                          $x = 0;
                          while ($x < count($parents)) {
                            ?>
                                <option value="<?=$parents[$x]['email_address'] ;?>"><?php echo $parents[$x]['parent_name']; ?></option>
                            <?php
                            $x++;
                          }
                        ?>
                    </select>
                  </div>
                </div>
                <div class="form-row justify-content-center mb-2">
                  <div class="col-md-2">
                    <label class="h6 text-primary">Subject</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="subject" id="subject" placeholder="Subject" class="form-control form-control-sm" required>
                  </div>
                </div>

                <div class="form-row justify-content-center mb-2">
                  <div class="col-md-2">
                    <label class="h6 text-primary">Body</label>
                  </div>
                  <div class="col-md-10">
                    <textarea rows="10" placeholder="Body" name="body" class="form-control form-control-sm summernote" required id="body"></textarea>
                  </div>
                </div>
              </form>
              <span id="result"></span>
              <div class="btn-toolbar mb-2 pt-4 mb-md-0 d-flex justify-content-end row">
                <div class="btn-group mr-2 ">
                  <a class="btn btn-primary" href="#" id="btnSend"><span class="fas fa-paper-plane"></span>&nbsp Send Email</a>
                </div>
              </div>
            </div>

            </form>
            <div class="col-lg-1 col-md-1 col-sm-12 col-12">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>  

<div class="modal" tabindex="-1" role="dialog" id="modal_new_email">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Send New Email</h5>
        </button>
      </div>
      <div class="modal-body justify-content-center d-flex">
        <!-- <p class="h6">Are you sure you want to delete this template?</p> -->
        <button type="button" class="btn btn-primary font-weight-bold mr-5" id="btn_template">Use Template</button>
        <button type="button" class="btn btn-primary font-weight-bold" id="btn_blank" data-dismiss="modal">Use Blank Page</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="modal_template">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Select Template</h5>
        </button>
      </div>
      <div class="modal-body justify-content-center d-flex pb-5 pt-5">
        <select name="template" class="form-control" id="template">
            <?php
              $x = 0;
              while ($x < count($template)) {
                ?>
                    <option value="<?=$template[$x]['id'] ;?>"><?php echo $template[$x]['template_title']; ?></option>
                <?php
                $x++;
              }
            ?>
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary font-weight-bold" id="btn_no" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary font-weight-bold" id="btn_yes">Use Template</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function(){

    $("a[href='#email']").click();
    $("a[href='send_email.php']").addClass('toActive');

    $('#modal_new_email').modal({ backdrop: 'static', keyboard: false });

    $(document).on('click', '#btn_template', () => {
      $('#modal_new_email').modal('toggle');;
       $('#modal_template').modal({ backdrop: 'static', keyboard: false });
      });

    $(document).on('click', '#btn_no', () => {
        $('#modal_new_email').modal({ backdrop: 'static', keyboard: false });
      });

    $(document).on('click', '#btn_yes', () => {
        $('#modal_template').modal('toggle');
       id = $('#template').val();
       $.ajax({
            url: '../php/getTemplateById.php',
            method: 'POST',
            data: { id:id},
            success: (res) => {
                const data = JSON.parse(res);
                $('#subject').val(data.email_subject);
                $('#body').summernote("code", data.email_body);      
                 }
        });
      });

    const sendEmail = () => {
      let parent = $('#parent').val();
      let subject = $('#subject').val();
      let body = $('#body').val();
      let json='';

      if (parent=="" || subject =="" || body =="") {
        resultSend(false);
      }
      else{
        json = {
          parent,
          subject,
          body
        };

        console.log(json);

        $.ajax({
          url:'../php/sendEmail.php',
          method: 'POST',
          data: json,
          success:(result) =>{
            resultSend(true);
            // alert(result);  
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

    $(document).on('click', '#btnSend', (e) => {
      sendEmail();
        e.preventDefault();
    });

  }); 
</script>
</body>
</html>