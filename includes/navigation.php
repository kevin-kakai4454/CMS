<?php include "db.php"; ?>
<?php session_start();
?>

<nav style="background-color:cadetblue" class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div style="background-color:cadetblue" class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a style="color: blue;" class="navbar-brand" href="index.php">Home</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <?php
                $query = "SELECT * FROM categories";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];

                    $category_class = '';
                    $registration_class = '';
                    $pagename = basename($_SERVER['PHP_SELF']);
                    $registration = 'registration.php';
                    if (isset($_GET['category']) && $_GET['category'] == $cat_id) {

                        $category_class = 'active';
                    } else if ($pagename == $registration) {
                        $registration_class = 'active';
                    }
                    echo "<li class='$category_class'><a style='color: blue;'  href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                }
                if (isset($_SESSION['user_role'])) {
                    $username = mysqli_real_escape_string($connection, $_SESSION['user_name']);
                    $query = "SELECT user_role FROM users WHERE user_name = '$username' ";
                    $result = mysqli_query($connection, $query);
                    if (!$result) {
                        die("errrr" . mysqli_error($connection));
                    }
                    $row = mysqli_fetch_assoc($result);
                    if ($row['user_role'] == 'Admin') {
                        echo "<li><a style='color: blue;' href='admin'>Admin</a></li>";
                    }
                }
                ?>
                <?php

                if (isset($_SESSION['user_role'])) {
                    $username = mysqli_real_escape_string($connection, $_SESSION['user_name']);
                    $query = "SELECT user_role FROM users WHERE user_name = '$username' ";
                    $result = mysqli_query($connection, $query);
                    if (!$result) {
                        die("errrr" . mysqli_error($connection));
                    }
                    $row = mysqli_fetch_assoc($result);
                    if ($row['user_role'] == 'Admin') {

                        //echo "Hello";
                        if (isset($_GET['p_id'])) {
                            $the_postid = $_GET['p_id'];
                            echo "<li><a style='color: blue;' href='admin/posts.php?source=edit_post&p_id=$the_postid'>Edit post</a></li>";
                        }
                    }
                }
                ?>

                <li class="<?php echo $registration_class ?>">
                    <a style="color: blue;" href="./registration.php">Register</a>
                </li>
                <li>
                    <a style="color: blue;" href="contact.php">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>