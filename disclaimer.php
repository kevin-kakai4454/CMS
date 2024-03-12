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
                <div class="well">
                    <h1 class="page-header">
                        Welcome to the Information world<br>
                        <small>Lets update the brain Content</small>
                    </h1>
                </div>

                <!-- First Blog Post -->
                <h2>
                    Disclaimer
                </h2>

                <hr>
                <p>
                <h4>Disclaimer:</h4> The information provided on this website is for general informational purposes only.<br>It does not constitute legal, financial, or professional advice.<br> While we strive to keep the information accurate and up-to-date, we make no representations or warranties of any kind, express or implied, about the completeness, accuracy, reliability, suitability, or availability with respect to the website or the information, products, services, or related graphics contained on the website for any purpose. Any reliance you place on such information is therefore strictly at your own risk.<br>

                In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.<br>

                Through this website, you can link to other websites that are not under our control. We have no control over the nature, content, and availability of those sites. The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.<br>

                Every effort is made to keep the website up and running smoothly. However, we take no responsibility for, and will not be liable for, the website being temporarily unavailable due to technical issues beyond our control.<br>

                Please customize this disclaimer to suit your specific needs and ensure that it complies with any legal requirements in your jurisdiction. If you have any doubts or need legal advice, consult a professional attorney.<br>

                </p>

                <hr>



                <!-- Second Blog Post -->


                <!-- Third Blog Post -->


                <!-- Pager -->
                <div class="well">
                    <h4>Most Read</h4>
                    <?php
                    $query = "SELECT * FROM posts WHERE post_views > 4 ";
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
    </div>
</body>