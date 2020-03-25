
<?php
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
    <!-- Sidebar Holder -->
    <?php
      include 'nav.php';
    ?>
  <!-- Page Content Holder -->
    <div id="content" class="content1 container-fluid">
      <div class=" align-items-center pt-3 pb-2 mb-3 border-bottom flex-md-nowrapap flex-md-nowrap">
        <h1 class="h4 pt-3 pb-3 text-center">New Email Template</h1>
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
                    <label class="h6 text-primary">Template Title</label>
                  </div>
                  <div class="col-md-10">
                    <input type="text" name="template_title" id="template_title" placeholder="Template Title" class="form-control form-control-sm" required>
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
              <div class="btn-toolbar mb-2 pt-4 mb-md-0 d-flex justify-content-end">
                <div class="btn-group mr-2 ">
                  <a class="btn btn-primary" href="#" id="btnAdd"><span class="fas fa-save"></span>&nbsp Add Template</a>
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

<script type="text/javascript">
  $(function(){

    $("a[href='#email']").click();
    $("a[href='new_template.php']").addClass('toActive');

    $('#body').summernote({
          height: 300,
          tabsize: 2,
          followingToolbar: true,
          toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
          ]
        });

    const addTemplate = () => {
          const template_title = $('#template_title').val();
          const subject = $('#subject').val();
          const body = $('#body').val();

          
          const json = {
              template_title: template_title,
              subject: subject,
              body: body,
          };

          console.log(json);

          $.ajax({
              url: '../php/addTemplate.php',
              method: 'POST',
              data: json,
              success: (res) => {
                alert('Successfully added a new template');
                $('form').trigger('reset');
              }
          });
      };

      $(document).on('click', '#btnAdd', () => addTemplate());

  }); 
</script>
</body>
</html>