<?php
//include "navigation.php";

if (isset($_POST['create_post'])) {
    $post_title = escape($_POST['title']);
    $post_author = escape($_POST['author']);
    // $post_user = $_POST['post_user'];
    $post_category_id = escape($_POST['post_category']);
    $post_status = escape($_POST['post_status']);
    $post_image = escape($_FILES['image']['name']);
    $post_image_temp = escape($_FILES['image']['tmp_name']);
    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_date = escape(date('d-m-y'));

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES ($post_category_id, '$post_title', '$post_author', now(), '$post_image', '$post_content','$post_tags', '$post_status') ";
    $create_post_query = mysqli_query($connection, $query);
    if (!$create_post_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
    $the_post_id = mysqli_insert_id($connection);
    echo "<p class='bg-success' >post updated successfully" . " " . "<a href='../post.php?p_id=$the_post_id'>View post </a> Or <a href='posts.php' > Edit other posts </a></p>";
}

?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label><br>
        <select name="post_category" id="">
            <?php
            $query = "SELECT * FROM categories ";
            $select_categories = mysqli_query($connection, $query);
            if (!$select_categories) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>$cat_title</option>";
            }
            ?>
        </select>
    </div>
    <div class=" form-group">
        <label for="post_author">Post Author</label><br>
        <!--<input type="text" class="form-control" name="author">-->
        <select name="author" id="">
            <?php
            $query_user = "SELECT * FROM users ";
            $select_authors = mysqli_query($connection, $query_user);
            if (!$select_authors) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_authors)) {
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                echo "<option value='$user_name'>$user_name</option>";
            }
            ?>
        </select>
    </div>
    <!--<div class="form-group">
        <label for="user">Post User</label>
        <input type="text" class="form-control" name="post_user">
    </div>-->
    <div class=" form-group">
        <label for="post_status">Post Status</label><br>
        <select name="post_status" id="">
            <option value="Draft">Select Options</option>
            <option value="Published">Published</option>
            <option value="Draft">Draft</option>
        </select>
    </div>
    <div class=" form-group">
        <label for="image">Post Image</label>
        <input type="file" class="form-control" name="image">
    </div>
    <div class=" form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class=" form-group">
        <label for="create_post">Post Content</label>
        <textarea type="text" class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>
    <div class=" form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="publish">
    </div>
</form>