<?php session_start(); ?>
<?php include "db.php";
include "../admin/functions.php";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    //login_user($_POST['username'], $_POST['password']);
    login_user($username, $password);
}
