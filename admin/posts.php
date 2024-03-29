<?php include "includes/header.php" ?>

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
                        <small>Author</small>
                    </h1>
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                        switch ($source) {
                            case 'add_post':
                                include "includes/add_post.php";
                                break;
                            case 'edit_post':
                                include "includes/edit_post.php";
                                break;

                            case 'view_allposts':
                                include "includes/view_allposts.php";
                                break;
                            case 'view_allcomments':
                                include "includes/view_allcomments.php";
                                break;
                            default;
                                include "includes/view_allposts.php";
                                break;
                        }
                    } else {
                        include "includes/view_allposts.php";
                    }

                    ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php
    include "includes/footer.php";
    ?>