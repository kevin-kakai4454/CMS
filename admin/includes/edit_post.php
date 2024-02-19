<?php
if (isset($_GET['p_id'])) {
    $the_post_id = $_GET['p_id'];

    $query = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";
    $select_post_by_id = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($select_post_by_id)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_tag = $row['post_tags'];
        $post_content = $row['post_content'];
        $post_comment_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }
    if (isset($_POST['update_post'])) {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];
        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['create_post'];
        $post_date = date('d-m-y');

        move_uploaded_file($post_image_temp, "../images/$post_image");
        if (empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
            $select_image = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_image)) {
                $post_image = $row['post_image'];
            }
        }
        $query = "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_category_id = '{$post_category_id}',";
        $query .= "post_date = now(),";
        $query .= "post_author = '{$post_author}',";
        $query .= "post_status = '{$post_status}',";
        $query .= "post_tags = '{$post_tags}',";
        $query .= "post_content = '{$post_content}',";
        $query .= "post_image = '{$post_image}' ";
        $query .= "WHERE post_id = {$the_post_id} ";
        $update_Post = mysqli_query($connection, $query);
        if (!$update_Post) {
            die("QUERY FAILED......" . mysqli_error($connection));
        }

        echo "<p class='bg-success' >post updated successfully" . " " . "<a href='../post.php?p_id=$the_post_id'>View post </a> Or <a href='posts.php' > Edit other posts </a></p>";
    }
}
?>


<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="post_category">Post Category</label><br>
        <select name="post_category" id="">

            <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection, $query);
            if (!$select_categories) {
                die("QUERY FAILED 3" . mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_categories)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>$cat_title</option>";
            }
            ?>
        </select>
    </div>
    <!--<div class=" form-group">
        <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="author">
    </div>-->

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

    <div class=" form-group">
        <label for="post_status">Post Status</label><br>
        <select name="post_status" id="">
            <option value='<?php echo $post_status; ?>'> <?php echo $post_status; ?></option>
            <?php
            if ($post_status == 'Published') {
                echo "<option value='Draft'>Draft</option>";
            } else {
                echo "<option value='Published'>Published</option>";
            }
            ?>
        </select>
    </div>





    <!-- <div class=" form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>-->
    <div class=" form-group">
        <img width="100" src="../images/<?php echo $post_image ?>" alt="">
        <label for="image">Post Image</label>
        <input value="<?php echo $post_image; ?>" type="file" class="form-control" name="image">
    </div>
    <div class=" form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tag; ?>" type="text" class="form-control" name="post_tags">
    </div>
    <div class=" form-group">
        <label for="create_post">Post Content</label>
        <textarea type="text" class="form-control" name="create_post" id="" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>
    <div class=" form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update">
    </div>
</form>
<?php //} 
?>