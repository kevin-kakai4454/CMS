<?php
//include "navigation.php";

if (isset($_GET['edit_user'])) {
    $the_user_id = $_GET['edit_user'];

    $query = "SELECT * FROM users WHERE user_id = $the_user_id";
    $user_update_query = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($user_update_query)) {
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $user_name = $row['user_name'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
    }
}

if (isset($_POST['edit_user'])) {

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    //$user_image = $_FILES['image']['name'];
    //$user_image_temp = $_FILES['image']['tmp_name'];
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $post_date = date('d-m-y');

    //move_uploaded_file($user_image_temp, "../images/$user_image");

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 10));

    $query = "UPDATE users SET ";
    $query .= "user_firstname='$user_firstname', user_lastname='$user_lastname', user_role='$user_role', user_name='$user_name',user_email='$user_email', user_password='$user_password'";
    $query .= "WHERE user_id = $the_user_id";
    $update_user_query = mysqli_query($connection, $query);
    if (!$update_user_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    echo "User Updated successfully " . "<a href='users.php'>View All users</a>";
}

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_firstname">
    </div>
    <div class=" form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname ?>" name="user_lastname">
    </div>
    <div>
        <label for="user_role">User Role</label><br>
        <select name="user_role" id="">

            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
            <?php
            if ($user_role == 'admin') {
                echo "<option value='subscriber'>Subscriber</option>";
            } else {
                echo " <option value='admin'>Admin</option>";
            }


            ?>


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
        <label for="post_tags">User Name</label>
        <input type="text" class="form-control" value="<?php echo $user_name ?>" name="user_name">
    </div>
    <div class=" form-group">
        <label for="post_tags">Email</label>
        <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email">
    </div>
    <div class=" form-group">
        <label for="create_post">User Password</label>
        <input type="password" class="form-control" name="user_password" value="<?php echo $user_password ?>" id=""></input>
    </div>
    <div class=" form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
    </div>
</form>