<div class="col-md-4">


    <?php
    // include "includes/search.php";
    ?>
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Blog Search</h4>
        <form action="search1.php" method="post">
            <div class="input-group">
                <input name="search" type="text" class="form-control">
                <span class="input-group-btn">
                    <button name="submit" class="btn btn-default" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form> <!--search form-->
        <!-- /.input-group -->
    </div>

    <!-- Blog Login form -->

    <div class="well">
        <?php if (isset($_SESSION['user_role'])) : ?>
            <h4>Loged in as <?php echo $_SESSION['user_name']  ?> </h4>
            <a href="includes/logout.php" class="btn btn-primary">Logout</a>

        <?php else : ?>
            <h4>Login </h4>
            <form action="includes/login.php" method="post">
                <div class="form-group">
                    <label for="username">Enter Username</label>
                    <input name="username" type="text" class="form-control" placeholder="username">
                </div>
                <div class="input-group">
                    <!--<label for="password">Enter Password</label>-->
                    <input name="password" type="password" class="form-control" placeholder="password">
                    <span class="input-group-btn">


                        <button class="btn btn-primary" name="login" type="submit">Login</button>
                    </span>
                </div>
            <?php endif; ?>
            </form> <!--search form-->

    </div>



    <!-- Blog Categories Well -->
    <div class="well">
        <?php
        $query = "SELECT * FROM categories";
        $select_categories = mysqli_query($connection, $query);
        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <?php
                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li><a href='category.php?category=$cat_id'> {$cat_title}</a></li>";
                    }
                    ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                    <li><a href="#">Category Name</a>
                    </li>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>