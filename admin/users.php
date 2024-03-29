<?php include "includes/header.php" ?>

<?php

if (!is_admin($_SESSION['user_name'])) {
    header("Location:index.php");
}

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
                        <small>Author</small>
                    </h1>
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                        switch ($source) {
                            case "add_user":
                                include "includes/add_user.php";
                                break;
                            case "edit_user":
                                include "includes/edit_user.php";
                                break;

                            case "view_allusers":
                                include "includes/view_allusers.php";
                                break;
                            default;
                                //include "includes/view_allusers.php";
                                // include "includes/add_user.php";
                                break;
                        }
                    } else {
                        include "includes/view_allusers.php";
                        //echo "NO MATCH";
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