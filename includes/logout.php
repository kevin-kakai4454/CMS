<?php ob_start() ?>
<?php session_start();

$_SESSION['user_name'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_role'] = null;
$_SESSION['user_password'] = null;

header("Location:../index.php");
?>