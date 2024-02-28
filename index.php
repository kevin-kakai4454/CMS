<?php ob_start()  ?>
<?php include "includes/db.php";
?>
<?php
include "includes/header.php";
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
                if ($_SESSION['user_role']) {
                ?>
                    <div class="well" style="background-color:cadetblue">
                        <h1 class="page-header">
                            Welcome to the Information world<br>
                            <small>Lets update the brain Content</small>
                        </h1>
                    </div>
                <?php
                }

                ?>
                <?php

                if (isset($_GET['page'])) {
                    $page_number = $_GET['page'];
                } else {
                    $page_number = "";
                }
                if ($page_number == "" || $page_number == 1) {
                    $page_number_1 = 0;
                } else {
                    $page_number_1 = ($page_number * 5) - 5;
                }

                $post_count_query = "SELECT * FROM posts WHERE post_status = 'Published' ";
                $all_posts_query = mysqli_query($connection, $post_count_query);
                $count = mysqli_num_rows($all_posts_query);

                if ($count < 1) {
                    echo "<h1 style='text-center'>NO POSTS CURRENTLY</h1>";
                } else {

                    $count = ceil($count / 5);
                    $query = "SELECT * FROM posts WHERE post_status = 'published' LIMIT $page_number_1, 5 ";
                    $result = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $post_id = $row['post_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = substr($row['post_content'], 0, 100);
                        //}
                ?>


                        <!-- First Blog Post -->
                        <h3>
                            <a href="post.php?p_id= <?php echo $post_id ?>"><?php echo $post_title ?></a>
                        </h3>
                        <h4>
                            by <a class="lead" href="Author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?> "><?php echo $post_author  ?></a>
                            on <?php echo "  " . $post_date ?>
                        </h4>
                        <!--<p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>-->
                        <hr>
                        <a href="post.php?p_id= <?php echo $post_id ?>">
                            <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                        </a>
                        <hr>
                        <p><?php echo $post_content ?></p>
                        <a class="btn btn-primary" href="post.php?p_id= <?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr style="border-color: blue;">


                <?php }
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

        <ul class="pager">
            <?php
            for ($i = 1; $i <= $count; $i++) {
                if ($i == $page_number) {
                    echo  "<li><a class='active_link' href='index.php?page=$i'>$i</a></li>";
                } else {

                    echo  "<li><a href='index.php?page=$i'>$i</a></li>";
                }
            }
            ?>
        </ul>
        <?php
        include "includes/footer.php";
        ?>