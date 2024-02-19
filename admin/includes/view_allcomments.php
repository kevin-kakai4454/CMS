<h1> comments</h1>
<table Class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Auther</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response TO</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Daelete</th>
        </tr>
    </thead>
    <tbody>

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
            $select_comment = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_array($select_comment)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_email = $row['comment_email'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];

                echo "<tr>";
                echo "<td>{$comment_id}</td>";
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_content}</td>";
                echo "<td>{$comment_email}</td>";
                echo "<td>{$comment_status}</td>";

                $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                $select_postid_query = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_postid_query)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
                }



                echo "<td> $comment_date</td>";
                echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>";
                echo "<td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
                echo "<td><a href='comments.php?source=view_allcomments.php&delete={$comment_id}'>Delete</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>


<?php

if (isset($_GET['approve'])) {
    //echo "HELLO";
    $the_comment_id = mysqli_real_escape_string($connection, $_GET['approve']);
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id =$the_comment_id ";
    $approve_comment_query = mysqli_query($connection, $query);
    header("Location:comments.php");
}

if (isset($_GET['unapprove'])) {
    $the_comment_id = mysqli_real_escape_string($connection, $_GET['unapprove']);
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id =$the_comment_id ";
    $unapprove_comment_query = mysqli_query($connection, $query);
    header("Location:comments.php");
}



if (isset($_GET['delete'])) {

    $the_comment_id = mysqli_real_escape_string($connection, $_GET['delete']);

    $query = "DELETE FROM comments WHERE comment_id = $the_comment_id ";
    $delete_query = mysqli_query($connection, $query);
    header("Location:comments.php");
}


?>