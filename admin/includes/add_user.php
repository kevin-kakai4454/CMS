<?php
//include "navigation.php";

if (isset($_POST['create_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    //$user_image = $_FILES['image']['name'];
    //$user_image_temp = $_FILES['image']['tmp_name'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //$post_date = date('d-m-y');

    //move_uploaded_file($user_image_temp, "../images/$user_image");
    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, user_name, user_email, user_password) ";
    $query .= "VALUES ('$user_firstname', '$user_lastname', '$user_role', '$user_name','$user_email', '$user_password') ";
    $create_user_query = mysqli_query($connection, $query);
    if (!$create_user_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    echo "User created successfully" . " " . "<a href='users.php'>View all users</a> ";
}

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <!--<div class="form-group">
        <label for="post_category">category</label><br>
        <select name="post_category" id="">
           <?php /*
            $query = "SELECT * FROM categories ";
            $select_categories = mysqli_query($connection, $query);
            if (!$select_categories) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>$cat_title</option>";
            }*/
            ?>
        </select>
    </div> -->
    <div class=" form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div>
        <label for="user_role">User Role</label><br>
        <select name="user_role" id="">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div><br>
    <!-- <div class=" form-group">
        <label for="username">User Role</label>
        <input type="text" class="form-control" name="user_role">
    </div>-->
    <div class=" form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="user_image">
    </div>
    <div class=" form-group">
        <label for="post_tags">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    <div class=" form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class=" form-group">
        <label for="create_post">Password</label>
        <input type="password" class="form-control" name="user_password" id=""></input>
    </div>
    <div class=" form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
</form>