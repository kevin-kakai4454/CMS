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
                    <div class="col-xs-6">

                        <?php
                        if (isset($_POST['submit'])) {
                            $cat_title = $_POST['cat_title'];

                            if ($cat_title == "" || empty($cat_title)) {
                                echo "The category does not exist";
                            } else {

                                $query = "INSERT INTO categories(cat_title)";
                                $query .= "VALUES ('{$cat_title}')";

                                $create_category = mysqli_query($connection, $query);
                                if (!$create_category) {
                                    die("Note connected" . mysqli_error($connection));
                                }
                            }
                        }



                        ?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                            </div>
                        </form>

                        <?php
                        if (isset($_GET['edit'])) {
                            $cat_id = $_GET['edit'];
                            include "includes/update_categories.php";
                        }
                        ?>

                    </div><!--Add category form-->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php //FIND ALL CATEGORIES QUERY
                                $query = "SELECT * FROM categories";
                                $select_cat = mysqli_query($connection, $query);
                                while ($row = mysqli_fetch_assoc($select_cat)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                    echo "<tr>";
                                    echo "<td>{$cat_id}</td>";
                                    echo "<td>{$cat_title}</td>";
                                    echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
                                    echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
                                    echo "</tr>";
                                }
                                ?>

                                <?php //DELETE QUERY
                                if (isset($_GET['delete'])) {
                                    $the_cat_id = $_GET['delete'];
                                    $query = "DELETE  FROM categories WHERE cat_id = {$the_cat_id} ";
                                    $delete_query = mysqli_query($connection, $query);
                                    header("Location: categories.php");
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
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