<?php ob_start()  ?>
<?php include "includes/db.php";
?>
<?php
include "includes/header.php";
?>
<?php //session_start() 
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

                if (isset($_POST['submit'])) {
                    $search = $_POST['search'];
                    $query = "SELECT * FROM posts WHERE  post_status = 'Published' AND post_tags LIKE '%$search%'  ";
                    //  $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    $search_query = mysqli_query($connection, $query);
                    if (!$search_query) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    $count = mysqli_num_rows($search_query);
                    if ($count == 0) {
                        echo "No Rsults";
                        //header("Location:index.php");
                    } else {



                        /* $post_count_query = "SELECT * FROM posts WHERE post_status = 'Published' AND post_tags LIKE '%$search%' ";
                $all_posts_query = mysqli_query($connection, $post_count_query);
                $count = mysqli_num_rows($all_posts_query);

                if ($count < 1) {
                    echo "<h1 style='text-center'>NO POSTS CURRENTLY</h1>";*/
                        while ($row = mysqli_fetch_assoc($search_query)) {
                            $post_id = $row['post_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            //}
                ?>


                            <h1 class="page-header">
                                Welcome to the Information world<br>
                                <small>Lets update the brain Content</small>
                            </h1>

                            <!-- First Blog Post -->
                            <h2>
                                <a href="post.php?p_id= <?php echo $post_id ?>"><?php echo $post_title ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="Author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?> "><?php echo $post_author ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                            <hr>
                            <a href="post.php?p_id= <?php echo $post_id ?>">
                                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                            </a>
                            <hr>
                            <p><?php echo $post_content ?></p>
                            <a class="btn btn-primary" href="post.php?p_id= <?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>


                <?php }
                    }
                } ?>


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

        <!--<ul class="pager">
            <?php
            for ($i = 1; $i <= $count; $i++) {
                if ($i == $page_number) {
                    echo  "<li><a class='active_link' href='index.php?page=$i'>$i</a></li>";
                } else {

                    echo  "<li><a href='index.php?page=$i'>$i</a></li>";
                }
            }
            ?>
        </ul>-->
        <?php
        include "includes/footer.php";
        ?>