<?php include("delete_modal.php") ?>
<?php
if (isset($_POST['checkBoxArray'])) {

    foreach ($_POST['checkBoxArray'] as $postvalue_id) {
        $bulk_options = $_POST['bulk_options'];
        switch ($bulk_options) {
            case 'Published':
                $query = "UPDATE posts SET post_status = '$bulk_options'  WHERE post_id = $postvalue_id";
                $update_bulkotions = mysqli_query($connection, $query);
                break;
            case 'Draft':
                $query = "UPDATE posts SET post_status = '$bulk_options'  WHERE post_id = $postvalue_id";
                $update_bulkotions = mysqli_query($connection, $query);
                break;
            case 'delete':
                $query = "DELETE FROM posts WHERE post_id = $postvalue_id ";
                $update_bulkotions = mysqli_query($connection, $query);
                break;
            case 'Clone':
                $query = "SELECT * FROM posts WHERE post_id =$postvalue_id ";
                $clone_bulkotions = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($clone_bulkotions)) {
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_date = $row['post_date'];
                    $post_author = $row['post_author'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    //$post_image_temp = $row['image']['tmp_name'];
                    $post_tags = $row['post_tags'];
                    $post_content = $row['post_content'];
                    //} //move_uploaded_file($post_image_temp, "../images/$post_image");

                    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
                    $query .= "VALUES ($post_category_id, '$post_title', '$post_author', now(), '$post_image', '$post_content','$post_tags', '$post_status') ";
                    $copy_post_query = mysqli_query($connection, $query);
                    if (!$copy_post_query) {
                        die("ERRRR3" . mysqli_error($connection));
                    }
                }
                break;
            default:
                break;
        }
    }
}



?>


<form action="" method="post">
    <table Class="table table-bordered table-hover">
        <div id="bulkoptionscontainer" class="col-xs-4">

            <select class="form-control" name="bulk_options" id="">
                <option value="">Select Option</option>
                <option value="Published">Publish</option>
                <option value="Draft">Draft</option>
                <option value="delete">Delete</option>
                <Option value="Clone">Clone</Option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?source=add_post">Add New</a>
        </div>
        <thead>
            <tr>
                <th><input type="checkbox" id="selectallboxes"></th>
                <th>Id</th>
                <th>User</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>View</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>views</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $user = mysqli_real_escape_string($connection, $_SESSION['user_name']);
            if ($user == "kevinKE") {
                $query = "SELECT * FROM posts ORDER BY post_id DESC ";
            } else {
                $query = "SELECT * FROM posts WHERE post_author = '$user' ORDER BY post_id DESC ";
            }
            $select_post = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_post)) {
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tag = $row['post_tags'];
                $post_comment_count = $row['post_comment_count'];
                $post_date = $row['post_date'];
                $post_views = $row['post_views'];

                echo "<tr>";
            ?>
                <td><input class="checkBoxes" type="checkBox" id="selectallboxes" name="checkBoxArray[]" value="<?php echo $post_id  ?>"></td>

                <?php
                echo "<td>{$post_id}</td>";
                echo "<td>{$post_author}</td>";
                echo "<td>{$post_title}</td>";

                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
                $select_cat = mysqli_query($connection, $query);
                if (!$select_cat) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                while ($row = mysqli_fetch_assoc($select_cat)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    echo "<td>{$cat_title}</td>";
                }
                //echo "<td>gchdh{$post_category_id}</td>";
                echo "<td>{$post_status}</td>";
                echo "<td><img width='100' src = '../images/$post_image'></td>";
                echo "<td>{ $post_tag}</td>";

                $query = "SELECT * FROM comments WHERE comment_post_id = '$post_id' ";
                $send_comment_query = mysqli_query($connection, $query);

                //$row = mysqli_fetch_array($send_comment_query);
                //$comment_id = $row['comment_id'];
                $post_comment_count = mysqli_num_rows($send_comment_query);

                echo "<td><a href='posts_comments.php?id=$post_id'>{$post_comment_count}</a></td>";


                echo "<td>{$post_date}</td>";
                echo "<td><a href='../post.php?p_id=$post_id'>view</a></td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                //echo "<td><a rel='$post_id' href='' class='delete_link' >Delete</a></td>";

                ?>
                <!--<form action="" method="post">
                    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                    <?php
                    //echo "<td><input class='btn btn-danger' type='submit' value='Delete'></td>";
                    ?>
                </form>-->
            <?php
                echo "<td><a onclick=\"javascript: return confirm('Are you sure you want to delete This Post?');\" href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "<td><a href='posts.php?reset={$post_id}'>{$post_views}</a></td>";
                echo "</tr>";
            }

            ?>
        </tbody>
    </table>
</form>
<?php

if (isset($_GET['delete'])) {

    $the_post_id = $_GET['delete'];
    $query = "DELETE FROM posts WHERE post_id = $the_post_id";
    $delete_query = mysqli_query($connection, $query);
    header("Location:posts.php");
}

if (isset($_GET['reset'])) {
    // echo "HELLO";
    $the_post_id = $_GET['reset'];
    $query = "UPDATE  posts SET post_views = 0 WHERE post_id = " . mysqli_real_escape_string($connection, $_GET['reset']) . "";
    $postviews_query = mysqli_query($connection, $query);
    header("Location:posts.php");
}
?>
<!--<script>
    $(document).ready(function() {

        $(".delete_link").on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "posts.php?delete=" + id + "";
            $(".modal_delete_link").attr("href", delete_url);
            $("#myModal").modal('Show');
        });
    });
</script>-->