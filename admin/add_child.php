<?php
include '../class/Database.php';
include '../class/Customer.php';
require '../php/session1.php';
include 'stylesheet.php';
include 'script.php';

$db = new Database();
$db = $db->connection();

$parents = new Customer($db);

$parents = $parents->getAllParents();

$parents = $parents->fetchAll(PDO::FETCH_ASSOC);

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
        <h1 class="h4 pt-3 pb-3 text-center">Children Profile</h1>
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
              <form>
                <div class="form-row justify-content-center mb-2">
                  <div class="col-md-3">
                    <label class="h6 text-primary">Parent</label>
                  </div>
                  <div class="col-md-9">
                    <select name="parent" class="form-control" id="parent">
                        <?php
                          $x = 0;
                          while ($x < count($parents)) {
                            ?>
                                <option value="<?=$parents[$x]['id'] ;?>"><?php echo $parents[$x]['parent_name']; ?></option>
                            <?php
                            $x++;
                          }
                        ?>
                    </select>
                    <!-- <input type="text" name="parent_email" id="parent_email" placeholder="Parent" class="form-control form-control mb-5" required> -->
                  </div>
                </div>
                <div class="form-row justify-content-center mb-2">
                  <div class="col-md-3">
                    <label class="h6 text-primary">Child's First Name</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="firstname" id="firstname" placeholder="Child's First Name" class="form-control form-control" required>
                  </div>
                </div>
                <div class="form-row justify-content-center mb-2">
                  <div class="col-md-3">
                    <label class="h6 text-primary">Child's Last Name</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="lastname" id="lastname" placeholder="Child's Last Name" class="form-control form-control" required>
                  </div>
                </div>
                <div class="form-row justify-content-center mb-2">
                  <div class="col-md-3">
                    <label class="h6 text-primary">Child's Middle Name</label>
                  </div>
                  <div class="col-md-9">
                    <input type="text" name="middlename" id="middlename" placeholder="Child's Middle Name" class="form-control form-control" required>
                  </div>
                </div>
              </form>
              <div class="btn-toolbar mb-2 pt-4 mb-md-0 d-flex justify-content-end">
                <div class="btn-group mr-2 ">
                  <a class="btn btn-primary" href="#" id="btnAdd"><span class="fas fa-save"></span>&nbsp Add Profile</a>
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
<script type="text/javascript">
  $(function(){
      $("a[href='#students']").click();
      $("a[href='add_child.php']").addClass('toActive');

      const addChild = () => {
          const lastName = $('#lastname').val();
          const firstName = $('#firstname').val();
          const middleName = $('#middlename').val();
          const parent_id = $('#parent').val();

          // console.log(parent_name);
          const json = {
              last_name: lastName,
              first_name: firstName,
              middle_name: middleName,
              parent_id:parent_id
          };

          $.ajax({
              url: '../php/admin_addChild.php',
              method: 'POST',
              data: json,
              success: (res) => {
                alert('Successfully added a child');
                $('form').trigger('reset');
              }
          });
      };

      $(document).on('click', '#btnAdd', () => addChild());
  });
</script>
</body>
</html>