<table Class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
            <th>Date</th>

        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM users ";
        $select_users = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_users)) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
            //$user_date = $row['user_date'];

            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$user_name}</td>";
            echo "<td>{$user_firstname}</td>";
            echo "<td>{$user_lastname}</td>";

            /*$query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            $select_cat = mysqli_query($connection, $query);
            if (!$select_cat) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_cat)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<td>{$cat_title}</td>";
            }*/
            //echo "<td>gchdh{$post_category_id}</td>";
            echo "<td>{$user_email}</td>";
            echo "<td>{$user_image}</td>";
            echo "<td>{$user_role}</td>";
            //echo "<td>{$user_date}</td>";
            /*$query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $select_postid_query = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_postid_query)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
            }*/




            echo "<td><a href='users.php?admin={$user_id}'>To Admin</a></td>";
            echo "<td><a href='users.php?subscriber=$user_id'>TO Subscriber</a></td>";
            echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete This User?');\" href='users.php?source=view_allusers&delete=$user_id'>Delete</a></td>";
            echo "</tr>";
        }

        ?>
    </tbody>
</table>


<?php

if (isset($_GET['admin'])) {
    //echo "HELLO";
    $the_user_id = $_GET['admin'];
    $query = "UPDATE users SET user_role = 'Admin' WHERE user_id =$the_user_id ";
    $admin_query = mysqli_query($connection, $query);
    header("Location:users.php");
}

if (isset($_GET['subscriber'])) {
    $the_user_id = $_GET['subscriber'];
    $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id =$the_user_id ";
    $subscriber_query = mysqli_query($connection, $query);
    header("Location:users.php");
}



if (isset($_GET['delete'])) {

    if (isset($_SESSION['user_role'])) {
        if ($_SESSION['user_role'] == 'Admin') {
            $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']);

            $query = "DELETE FROM users WHERE user_id = $the_user_id ";
            $delete_user_query = mysqli_query($connection, $query);
            header("Location:users.php");
        }
    }
}


?>