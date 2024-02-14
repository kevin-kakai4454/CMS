<?php

function users_online()
{

    if (isset($_GET['onlineusers'])) {
        global $connection;
        if (!$connection) {
            session_start();
            include("../includes/db.php");

            $session = session_id();
            $time = time();
            $timeout_inseconds = 05;
            $time_out = $time - $timeout_inseconds;

            $query = "SELECT * FROM users_online WHERE session = '$session' ";
            $send_query = mysqli_query($connection, $query);
            $count_users = mysqli_num_rows($send_query);

            if ($count_users == NULL) {
                mysqli_query($connection, "INSERT INTO users_online (session, time, time_out) VALUES ('$session','$time' )");
            } else {
                mysqli_query($connection, "UPDATE users_online SET time= '$time' WHERE session ='$session'");
            }
            $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE  time > '$time_out' ");
            echo $count_users = mysqli_num_rows($users_online_query);
        }
    } //get request isset 
}
function redirect($location)
{
    return header("Location:" . $location);
}
users_online();
function insert_categories()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "The category does not exist";
        } else {

            $stmt = mysqli_prepare("INSERT INTO categories(cat_title) VALUES (?)");
            mysqli_stmt_bind_param($stmt, "s", $cat_title);
            mysqli_stmt_execute($stmt);
            if (!$stmt) {
                die("Note connected" . mysqli_error($connection));
            }
        }
    }
}
function escape($string)
{
    global $connection;
    return mysqli_escape_string($connection, trim($string));
}

function findcategory()
{
    global $connection;
    $query = "SELECT * FROM categories ";
    $select_cat = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_cat)) {
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function deletecategory()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];
        $query = "DELETE  FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function is_admin($username)
{
    global $connection;
    $query = "SELECT user_role FROM users WHERE user_name = '$username' ";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("errrr" . mysqli_error($connection));
    }
    $row = mysqli_fetch_assoc($result);
    if ($row['user_role'] == 'Admin') {
        return true;
    } else {
        return false;
    }
}
function username_exists($username)
{
    global $connection;
    $query = "SELECT user_name FROM users WHERE user_name = '$username' ";
    $result2 = mysqli_query($connection, $query);
    if (!$result2) {
        die("errrr" . mysqli_error($connection));
    }
    if (mysqli_num_rows($result2) > 0) {
        return true;
    } else {
        return false;
    }
}
function email_exists($email)
{
    global $connection;
    $query = "SELECT user_email FROM users WHERE user_email = '$email' ";
    $result2 = mysqli_query($connection, $query);
    if (!$result2) {
        die("errrr" . mysqli_error($connection));
    }
    if (mysqli_num_rows($result2) > 0) {
        return true;
    } else {
        return false;
    }
}

function Register_user($username, $email, $password)
{
    global $connection;
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $username = mysqli_real_escape_string($connection,  $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);

    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));


    $query = "INSERT INTO users (user_name, user_email, user_password, user_role)";
    $query .= "VALUES ('$username','$email', '$password', 'Subscriber') ";
    $register_userquery = mysqli_query($connection, $query);
    if (!$register_userquery) {
        die("ERRR" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
    }
}
function login_user($username, $password)
{
    global $connection;
    $username = trim($username);
    $password = trim($password);
    $user_name = mysqli_real_escape_string($connection, $username);
    $user_password = mysqli_real_escape_string($connection, $password);


    $query = "SELECT * FROM users WHERE user_name = '{$user_name}' ";
    $select_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_array($select_query)) {
        $dbuser_id = $row['user_id'];
        $dbuser_name = $row['user_name'];
        $dbuser_password = $row['user_password'];
        $dbuser_firstname = $row['user_firstname'];
        $dbuser_lastname = $row['user_lastname'];
        $dbuser_role = $row['user_role'];

        //$user_password = crypt ($user_password, $dbuser_password);

    }
    //$verify = password_verify($user_password, $dbuser_password);
    //if ($verify) {
    if ($user_password == $dbuser_password) {
        $_SESSION['user_name'] = $dbuser_name;
        $_SESSION['firstname'] = $dbuser_firstname;
        $_SESSION['lastname'] = $dbuser_lastname;
        $_SESSION['user_role'] = $dbuser_role;
        // $_SESSION['user_password'] = $dbuser_password;
        if (is_admin($username)) {
            header("Location:../admin");
        } else {
            header("Location:../index.php");
        }
    } else {

        header("Location:../index.php");
    }
}
