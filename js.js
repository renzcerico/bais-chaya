$(function(){
	//nav
	 $('#sidebarCollapse').on('click', function () {
	     $('#sidebar').toggleClass('active');
	     $('#content').removeClass('content1');
	     $('#content').addClass('content');
	     $('#sidebarCollapse').hide();
	     $('#sidebarCollapse1').show();
	     $('.nav-menu').hide();
	 });



	 $('#sidebarCollapse1').on('click', function () {
	     $('#sidebar').toggleClass('active');
	     $('#content').removeClass('content');
	     $('#content').addClass('content1');
	     $('#sidebarCollapse').show();
	     $('#sidebarCollapse1').hide();
	     $('.nav-menu').show();
	 });



	// Sign Out
	$('.sign_out').click(function(){
		location.href = 'php/logout.php';
	});



});