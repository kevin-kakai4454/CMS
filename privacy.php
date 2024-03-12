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
                    Privacy Policy
                </h2>

                <hr>
                <p>
                    This Privacy Policy governs the manner in which TECHISH or tech-ish.com collects, uses, maintains, and discloses information collected from users (each, a “User”) of the TECHISH website (the “Site”).<br> This Privacy Policy applies to the Site and <br>all products and services offered by TECHISH or tech-ish.com.<br>

                <h4>1. Personal Identification Information</h4><br>
                We may collect personal identification information from Users in a variety of ways, including but not limited to when Users visit our Site, Register on the Site, subscribe to the newsletter, and in connection with other activities, services, features, or resources we make available on the Site. Users may be asked for their name, email address, and other relevant information as appropriate. Users may, however, visit our Site anonymously. We will collect personal identification information from Users only if they voluntarily submit such information to us. Users can always refuse to supply personal identification information, except that it may prevent them from engaging in certain Site-related activities.<br>

                <b>2. Non-Personal Identification Information</b>
                We may collect non-personal identification information about Users whenever they interact with our Site. Non-personal identification information may include the browser name, the type of computer, and technical information about Users’ means of connection to our Site, such as the operating system and the Internet service providers utilized and other similar information.<br>

                <b>3. Web Browser Cookies</b><br>
                Our Site may use “cookies” to enhance User experience. User’s web browser places cookies on their hard drive for record-keeping purposes and sometimes to track information about them. Users may choose to set their web browser to refuse cookies or to alert them when cookies are being sent. If they do so, note that some parts of the Site may not function properly.<br>

                <b>4. How We Use Collected Information</b><br>
                To personalize user experience: We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our Site.
                To improve our Site: We continually strive to improve our website offerings based on the information and feedback we receive from Users.
                To send periodic emails: We may use the email address to send User information and updates pertaining to their subscription or any other related information.
                5. How We Protect Your Information
                We adopt appropriate data collection, storage, and processing practices and security measures to protect against unauthorized access, alteration, disclosure, or destruction of your personal information, username, password, transaction information, and data stored on our Site.<br>

                <b>6. Sharing Your Personal Information</b><br>
                We do not sell, trade, or rent Users’ personal identification information to others. We may share generic aggregated demographic information not linked to any personal identification information regarding visitors and users with our business partners, trusted affiliates, and advertisers for the purposes outlined above.
                <br>
                <b>7. Compliance with GDPR</b><br>
                We are committed to complying with the General Data Protection Regulation (GDPR) and ensuring the protection of our users’ personal information. In compliance with the GDPR, we will:

                Obtain and process personal information only for specified and lawful purposes.
                Maintain data accuracy and ensure the right to rectification.
                Limit the storage of personal information to the necessary period.
                Implement appropriate technical and organizational measures to ensure the security of personal information.
                8. Third-Party Websites
                Users may find advertising or other content on our Site that link to the sites and services of our partners, suppliers, advertisers, sponsors, licensors, and other third parties. We do not control the content or links that appear on these sites and are not responsible for the practices employed by websites linked to or from our Site. In addition, these sites or services, including their content and links, may be constantly changing. These sites and services may have their own privacy policies and customer service policies. Browsing and interaction on any other website, including websites that have a link to our Site, is subject to that website’s own terms and policies.


                9. Changes to This Privacy Policy
                We have the discretion to update this Privacy Policy at any time. When we do, we will revise the updated date at the bottom of this page. We encourage Users to frequently check this page for any changes to stay informed about how we are helping to protect the personal information we collect. You acknowledge and agree that it is your responsibility to review this Privacy Policy periodically and become aware of modifications.

                10. Your Acceptance of These Terms
                By using this Site, you signify your acceptance of this Privacy Policy. If you do not agree to this Privacy Policy, please do not use our Site. Your continued use of the Site following the posting of changes to this Privacy Policy will be deemed your acceptance of those changes.

                11. Contacting Us
                If you have any questions about this Privacy Policy, the practices of this Site, or your dealings with this Site, please contact us at mail@tech-ish.com
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