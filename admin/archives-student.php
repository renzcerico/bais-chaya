<?php
include 'stylesheet.php';
include 'script.php';

include '../class/Database.php';
require '../php/session1.php';
include '../class/Archives.php';

$db = new Database();
$db = $db->connection();

$getYear = new Archives($db);

$getYear = $getYear->getYearChild();


$getYear = $getYear->fetchAll(PDO::FETCH_ASSOC);
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
        <h1 class="h4 pt-3 pb-3 text-center">Students</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
          <div class="col-md-6 justify-content-center d-flex container-fluid mt-5 mb-3">
          <select name="year" class="form-control" id="year">
            <option value="ALL">ALL</option>
            <?php
              $x = 0;
              while ($x < count($getYear)) {
                ?>
                    <option value="<?=$getYear[$x]['year'] ;?>"><?php echo $getYear[$x]['year']; ?></option>
                <?php
                $x++;
              }
            ?>
        </select>
        </div>
        </div>
      </div>

      <div class="container-fluid justify-content-center d-flex">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
           <div class="card card_api">
              <div class="card-body pt-5 pl-3 pr-3 pb-5">
                <button id="archiveStudent" class="mb-2 btn btn-dark font-weight-500 pl-5 pr-5">Add</button>
                <table class="table table-bordered text-center table-sm" id="tbl_child">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Parent's Name</th>
                            <th scope="col">Year</th>
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

  <!-- MODAL STUDENTS -->
  <div class="modal fade modal-student" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Students</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <select id="schoolYear" class="form-control form-control-sm mb-2">
          <?php
            $dateNow = date('Y');
            $lastYear = $dateNow - 1;
          ?>
          <option value="<?=$dateNow;?>"><?=$dateNow;?></option>
          <option value="<?=$lastYear;?>"><?=$lastYear;?></option>
        </select>
        <table id="tblStudent" class="table table-bordered table-hover text-center table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm font-weight-500" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-sm font-weight-500" id="btnArchive">Archive</button>
      </div>
    </div>
  </div>
</div>

  <?php
    include '../footer.php';
  ?>
  <script>
    $(() => {
        $("a[href='#archives']").click();
        $("a[href='archives-student.php']").addClass('toActive');

        const child = () => {
            $(".tr-parent").remove();
            const url = '../php/getAllChildArchives.php';
            const year = $('#year').val();

            $.ajax({
                url: url,
                method: 'POST',
                data: {year:year},
                success: (res) => {
                const data = JSON.parse(res);
                for(let i = 0; i < data.length; i++) {
                    set = '<tr p-id="'+data[i]['id']+'" class="tr-parent">'+
                        '<td>'+data[i]['child_name']+'</td>'+
                        '<td>'+data[i]['parent_name']+'</td>'+
                        // '<td>'+data[i]['status']+'</td>'+
                        '<td>'+data[i]['year']+'</td>'+
                    '</tr>';
                    $('#tbl_child').append(set);
                }
                }
            });
       };
       

        
      child();

      $(document).on('click', '.tr-parent', (e) => parentClick(e));

        const parentClick = (e) => {
            const id = e.currentTarget.getAttribute('p-id');

            const name = $(e.currentTarget).find('td:nth-child(1)').text().toUpperCase();
            const year = $(e.currentTarget).find('td:nth-child(3)').text();
        
            window.location.href = 'custodian-archives.php?&id=' + id +'&name=' + name +'&year=' + year;
        }

        $(document).on('click', '#archiveStudent', () => {
            childAll();
            $('.modal-student').modal('show');
        });

        const childAll = () => {
            const url = '../php/getAllChild.php';
            $('#tblStudent>tbody tr').remove();

            $.ajax({
                url: url,
                method: 'GET',
                success: (res) => {
                const data = JSON.parse(res);
                for(let i = 0; i < data.length; i++) {
                    set = '<tr p-id="'+data[i]['id']+'" class="modal-tr-student">'+
                              '<td><input type="checkbox" class="float-left" />'+data[i]['child_name']+'</td>'+
                          '</tr>';
                    $('#tblStudent tbody').append(set);
                }
                }
            });
       };

       $(document).on('click', '.modal-tr-student', (e) => {
          const tr = e.currentTarget;
          const isChecked = $(tr).find('input').attr('checked');

          if(isChecked) {
            $(tr).find('input').attr('checked', false);
          } else {
            $(tr).find('input').attr('checked', true);
          }
       });

       const archive = () => {
          const checkbox = $('input[type=checkbox]');
          const year = $('#schoolYear').val();
          const array = [];

          checkbox.each(function() {
            const isCheck = $(this).is(':checked');

            if (isCheck) {
                const id = $(this).closest('tr').attr('p-id');
                array.push(id);
            }
          });

          $.ajax({
              url: '../php/archiveStudent.php',
              method: 'POST',
              data: { year: year, students: array },
              success: (res) => {
                  if (res == '200') {
                    location.reload();
                  }
              }
          });
       };



       $(document).on('click', '#btnArchive', () => archive());

       $(document).on('click', '#year', () => child());

	});
</script>
  
</body>
</html>