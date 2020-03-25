<?php
session_start();
include '../class/Database.php';
include '../class/Customer.php';

$db = new Database();
$db = $db->connection();

$login = new Customer($db);

$login = $login->login($_POST);

if ($login) {
	$_SESSION['login'] = $login;
	header('location: ../dashboard.php');
} else {	
	?>
	<script>
		alert('Invalid username/password.');
		window.location = '../index.php';
	</script>
	<?php
	// header('location: ../login.php');
}

?>