<?php include "includes/header.php" ?>
<?php //session_start();
?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/navigation.php";
    ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        WELCOME TO THE ADMIN PAGE


                        <br> <small><?php echo $_SESSION['user_name']; ?></small>
                    </h1>

                    <?php
                    //include "includes/add_post.php"
                    ?>
                </div>
            </div>
            <!-- /.row -->


            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php
                                    $user = mysqli_real_escape_string($connection, $_SESSION['user_name']);
                                    if ($user == 'kevinKE') {
                                        $query = "SELECT * FROM posts";
                                    } else {
                                        $query = "SELECT * FROM posts WHERE post_author = '$user' ";
                                    }
                                    //$query = "SELECT * FROM posts";
                                    $select_all_posts = mysqli_query($connection, $query);
                                    $post_count = mysqli_num_rows($select_all_posts);
                                    echo "<div class='huge'>$post_count</div>";
                                    ?>



                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $user = mysqli_real_escape_string($connection, $_SESSION['user_name']);
                                    if ($user == "kevinKE") {
                                        $query1 = "SELECT * FROM posts";
                                    } else {
                                        $query1 = "SELECT * FROM posts WHERE post_author = '$user' ";
                                    }
                                    $select1 = mysqli_query($connection, $query1);
                                    while ($row1 = mysqli_fetch_assoc($select1)) {
                                        $postspecific = $row1['post_id'];

                                        $query = "SELECT * FROM comments  WHERE comment_post_id = $postspecific ";

                                        //$query = "SELECT * FROM comments";
                                        $select_all_comments = mysqli_query($connection, $query1);
                                        $comment_count = mysqli_num_rows($select_all_comments);
                                    }
                                    echo "<div class='huge'>$comment_count</div>";

                                    ?>

                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                if ($user == "kevinKE") {
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php
                                        $query = "SELECT * FROM users";
                                        $select_all_users = mysqli_query($connection, $query);
                                        $users_count = mysqli_num_rows($select_all_users);
                                        echo "<div class='huge'> $users_count</div>";
                                        ?>

                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php }
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php
                                    $query = "SELECT * FROM categories";
                                    $select_all_categories = mysqli_query($connection, $query);
                                    $category_count = mysqli_num_rows($select_all_categories);
                                    echo "<div class='huge'> $category_count</div>";
                                    ?>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">

                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Year', 'Sales', 'Expenses', 'Profit'],
                            ['2014', 1000, 400, 200],
                            ['2015', 1170, 460, 250],
                            ['2016', 660, 1120, 300],
                            ['2017', 1030, 540, 350]
                        ]);

                        var options = {
                            chart: {
                                title: 'Company Performance',
                                subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php
    include "includes/footer.php";
    ?>