<?php
session_start();
include '../class/Database.php';
include '../class/Admin.php';

$db = new Database();
$db = $db->connection();

$login = new Admin($db);


$datetime = new DateTime();
$timezone = new DateTimeZone('Asia/Manila');
$datetime->setTimezone($timezone);

$currentDateTime = $datetime->format('Y-m-d H:i:s');

$array = json_decode($_SESSION['login'], true);
$id = $array['id'];

$login = $login->logout($id, $currentDateTime);

if (isset($_SESSION['login'])) {	
	session_destroy();
	// header('location: login.php');
	?>
	<script>
		window.location = '../admin/index.php';
	</script>
	<?php
}

?>