<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<!-- Navigation -->

<?php include "includes/navigation.php"; ?>




<?php
if (isset($_POST['submit'])) {
    $to = 'kevinkakai.kk@gmail.com';
    $subject = $_POST['subject'];
    $body = wordwrap($_POST['body'], 70);
    $header = $_POST['email'];
    mail($to, $subject, $body, $header);
}


?>

<!-- Page Content -->
<div class="container">

    <section id="submit">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Contact</h1>
                        <form role="form" action="" method="post" id="submit" autocomplete="off">
                            <!--<h6 class="text-center"><?php echo $message; ?></h6>-->

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email">
                            </div>
                            <label for="username">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject">
                    </div><br>
                    <div class="form-group">
                        <label for="body" class="">Body</label>
                        <textarea class="form-control" name="body" id="body" cols="50" rows="10"></textarea>
                    </div>

                    <input type="submit" name="submit" id="btn-submit" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>

                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
</div> <!-- /.container -->
</section>


<hr>



<?php include "includes/footer.php"; ?>