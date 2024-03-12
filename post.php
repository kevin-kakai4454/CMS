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

                /*$query = "SELECT * FROM posts WHERE post_title ='son' ";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                ?>


                    <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>

                    <!-- First Blog Post -->
                    <h2>
                        <a href="#"><?php echo $post_title ?></a>
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


                <?php } */ ?>

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
                                if (isset($_GET['p_id'])) {
                                    $the_post_id = $_GET['p_id'];
                                    $view_query = "UPDATE posts SET post_views = post_views + 1 WHERE post_id = $the_post_id";
                                    $post_view_query = mysqli_query($connection, $view_query);
                                    // $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";

                                    //if (!$result1) {
                                    //  die("cennnnnn" . mysqli_error($connection));
                                    //}


                                    if (isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'Admin') {
                                        $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
                                        $result1 = mysqli_query($connection, $query);
                                    } else {
                                        $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'Published' ";
                                    }
                                    $result1 = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($result1)) {
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];
                                        $post_author = $row['post_author'];
                                        $post_date = $row['post_date'];
                                        $post_image = $row['post_image'];
                                        $post_content = $row['post_content'];
                                        $post_tags = $row['post_tags'];
                                        //}
                                ?>


                                        <h1 class="page-header">
                                            Page Heading
                                            <small>Secondary Text</small>
                                        </h1>

                                        <!-- First Blog Post -->
                                        <h2>
                                            <a href="#"><?php echo $post_title ?></a>
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


                                        <hr>


                                    <?php
                                    }


                                    ?>


                                    <!-- Blog Comments -->
                                    <?php
                                    if (isset($_POST['create_comment'])) {

                                        $the_post_comment_id = $_GET['p_id'];

                                        $comment_author = $_POST['comment_author'];
                                        $comment_email = $_POST['comment_email'];
                                        $comment = $_POST['comment_content'];

                                        $query = "INSERT INTO comments(comment_post_id, comment_author, comment_email,comment_content,comment_status, comment_date) ";
                                        $query .= "VALUES ($the_post_comment_id, '$comment_author', '$comment_email', '$comment', 'Unapproved', now())";
                                        $create_comment_query = mysqli_query($connection, $query);
                                        if (!$create_comment_query) {
                                            die("MYSQL ERROR" . mysqli_error($connection));
                                        }

                                        //$query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                                        //$query .= "WHERE post_id = $the_post_comment_id";
                                        //$update_comment_query = mysqli_query($connection, $query);
                                    }
                                    ?>
                                    <!-- Comments Form -->
                                    <div class="well">
                                        <h4>Leave a Comment:</h4>
                                        <P>Your email will not be published</P>
                                        <form role="form" action="" method="post">
                                            <div class="form-group">
                                                <label for="comment_author">Author</label>
                                                <input type="text" class="form-control" name="comment_author">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" name="comment_email">
                                            </div>
                                            <div class="form-group">
                                                <label for="comment_content">Commment</label>
                                                <textarea name="comment_content" class="form-control" rows="3"></textarea>
                                            </div>
                                            <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>

                                    <hr>

                                    <!-- Posted Comments -->
                                    <?php
                                    $query = "SELECT * FROM comments WHERE comment_post_id = $the_post_id ";
                                    $query .= "AND comment_status = 'approved' ";
                                    $query .= "ORDER BY comment_id DESC ";
                                    $select_comment_query = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($select_comment_query)) {
                                        $comment_date = $row['comment_date'];
                                        $comment_content = $row['comment_content'];
                                        $comment_author = $row['comment_author'];
                                    ?>


                                        <!-- Comment -->
                                        <div class="media">
                                            <a class="pull-left" href="#">
                                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><?php echo $comment_author . "<br>" ?>
                                                    <small><?php echo $comment_date ?></small>
                                                </h4>
                                                <?php echo $comment_content ?>
                                            </div>
                                        </div>
                                <?php
                                    }
                                } else {
                                    header("Locatio:index.php");
                                } ?>
                                <br>
                                <div class="well">
                                    <h3>YOU MAY ALSO LIKE</h3>
                                    <?php
                                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$post_tags%' ";
                                    $select_popular = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($select_popular)) {
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];

                                        echo "<h5><a href='post.php?p_id=$post_id'> $post_title </a></h5>";
                                        echo "<hr style='border-color: blue;''>";
                                    }
                                    ?>
                                </div>
                                <div class="well">
                                    <h3>More From <?php echo $post_author ?></h3>
                                    <?php
                                    $query = "SELECT * FROM posts WHERE post_author LIKE '%$post_author%' ";
                                    $select_popular = mysqli_query($connection, $query);
                                    while ($row = mysqli_fetch_assoc($select_popular)) {
                                        $post_id = $row['post_id'];
                                        $post_title = $row['post_title'];

                                        echo "<h5><a href='post.php?p_id=$post_id'> $post_title </a></h5>";
                                        echo "<hr style='border-color: blue;''>";
                                    }
                                    ?>
                                </div>

                            </div>

                            <!-- Comment -->

                            <!-- Second Blog Post -->


                            <!-- Third Blog Post -->


                            <!-- Pager -->
                            <div class="sid-bar">
                                <!-- Blog Sidebar Widgets Column -->
                                <?php include "includes/sidebar.php";
                                //include "includes/search.php";
                                ?>
                            </div>
                            <!--<ul class="pager">
                                <li class="previous">
                                    <a href="#">&larr; Older55</a>
                                </li>
                                <li class="next">
                                    <a href="#">Newer &rarr;</a>
                                </li>
                            </ul>-->

                        </div>


                    </div>
                    <!-- /.row -->

                    <hr>
                    <?php
                    include "includes/footer.php";
                    ?>

                    <!-- Second Blog Post -->


                    <!-- Third Blog Post -->


                    <!-- Pager -->

                </body>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php // include "includes/sidebar.php";
            //include "includes/search.php";
            ?>

        </div>
        <!-- /.row -->

        <hr>