<?php include "includes/db.php";
?>
<?php
include "includes/header.php";
include "admin/functions.php"
?>

<body>

    <!-- Navigation -->
    <?php
    include "includes/navigation.php";
    ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php
                if (isset($_GET['category'])) {
                    $post_category_id = $_GET['category'];

                    if (is_admin($_SESSION['user_name'])) {

                        $statement1 = mysqli_prepare($connection, "SELECT post_id,post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ? ");
                    } else {
                        $statement2 = mysqli_prepare($connection, "SELECT post_id,post_title, post_author, post_date, post_image, post_content FROM posts WHERE post_category_id = ? AND post_status = ? ");
                        $published = 'Published';
                    }
                    if (isset($statement1)) {
                        mysqli_stmt_bind_param($statement1, "i", $post_category_id);
                        mysqli_stmt_execute($statement1);
                        mysqli_stmt_bind_result($statement1, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
                        $stmt = $statement1;
                    } else {
                        mysqli_stmt_bind_param($statement2, "is", $post_category_id, $published);
                        mysqli_stmt_execute($statement2);
                        mysqli_stmt_bind_result($statement2, $post_id, $post_title, $post_author, $post_date, $post_image, $post_content);
                        $stmt = $statement2;
                    }
                    $count_num = mysqli_stmt_num_rows($stmt);
                    if ($count_num < 1) {
                        echo "<h1 class='text_center'>OOOPS! POSTS MISSING!!</h1>";
                    } else {
                        echo "HELLO";
                    }


                    //$result = mysqli_query($connection, $query);
                    //$count_cat = mysqli_num_rows($result);
                    //if ($count_cat < 1) {
                    //echo "NO MATCHING POSTS";
                    //} //else {
                    while ($row = mysqli_stmt_fetch($stmt)) :
                        /* $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = substr($row['post_content'], 0, 100);
                                //}*/
                ?>


                        <h1 class="page-header">
                            Page Heading
                            <small>Secondary Text</small>
                        </h1>

                        <!-- First Blog Post -->
                        <h2>
                            <a href="post.php?p_id= <?php echo $post_id ?>"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>


                <?php endwhile;
                    mysqli_stmt_close($stmt);
                }



                // }
                /*else {
                        header("Location:index.php");
                    //}
                } else {
                    header("Location:index.php");
                }*/


                ?>


                <!-- Second Blog Post -->


                <!-- Third Blog Post -->


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";
            //include "includes/search.php";
            ?>

        </div>
        <!-- /.row -->

        <hr>
        <?php
        include "includes/footer.php";
        ?>