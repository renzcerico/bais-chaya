<?php
session_start();

if (isset($_SESSION['login'])) {	
	session_destroy();
	// header('location: login.php');
	?>
	<script>
		window.location = '../index.php';
	</script>
	<?php
}

?>