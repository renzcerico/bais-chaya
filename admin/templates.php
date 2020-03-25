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
        <h1 class="h4 pt-3 pb-3 text-center">Templates</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
          </div>
        </div>
      </div>

      <div class="container-fluid justify-content-center d-flex">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
         <div class="card card_api">
            <div class="card-body pt-5 pl-3 pr-3 pb-5">
              <table class="table table-bordered text-center table-sm" id="tbl_templates">
                <thead class="thead-dark">
                    <tr>
                        <th scope="row" colspan="3">Template Title</th>
                        <th scope="row" colspan="2">Created At</th>
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
    
  <?php
    include '../footer.php';
  ?>
  <script>
	$(() => {
      $("a[href='#email']").click();
      $("a[href='templates.php']").addClass('toActive');
  		const parents = () => {
			const url = '../php/getTemplate.php';

			$.ajax({
				url: url,
				method: 'GET',
				success: (res) => {
					const data = JSON.parse(res);
					for(let i = 0; i < data.length; i++) {
						set = '<tr p-id="'+data[i]['id']+'" class="tr-template">'+
								'<td colspan="3">'+data[i]['template_title']+'</td>'+
								'<td colspan="2">'+data[i]['created_at']+'</td>'+
							'</tr>';
						$('#tbl_templates').append(set);
					}
				}
			});
		};

		parents();

		$(document).on('click', '.tr-template', (e) => parentClick(e));

		const parentClick = (e) => {
			const id = e.currentTarget.getAttribute('p-id');
      const status = $(e.currentTarget).find('td:nth-child(3)').text();
      
			window.location.href = 'view_template.php?id=' + id;
		}
	});
</script>
  
</body>
</html>