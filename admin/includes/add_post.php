<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        tinymce.init({
            selector: '#myTextarea',
            plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent | numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: '30s',
            autosave_prefix: '{path}{query}-{id}-',
            autosave_restore_when_empty: false,
            autosave_retention: '2m',
            image_advtab: true,
            link_list: [{
                    title: 'My page 1',
                    value: 'https://www.codexworld.com'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.codexqa.com'
                }
            ],
            image_list: [{
                    title: 'My page 1',
                    value: 'https://www.codexworld.com'
                },
                {
                    title: 'My page 2',
                    value: 'http://www.codexqa.com'
                }
            ],
            image_class_list: [{
                    title: 'None',
                    value: ''
                },
                {
                    title: 'Some class',
                    value: 'class-name'
                }
            ],
            importcss_append: true,
            file_picker_callback: (callback, value, meta) => {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {
                        text: 'My text'
                    });
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {
                        alt: 'My alt text'
                    });
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {
                        source2: 'alt.ogg',
                        poster: 'https://www.google.com/logos/google.jpg'
                    });
                }
            },
            templates: [{
                    title: 'New Table',
                    description: 'creates a new table',
                    content: '<div class="mceTmpl"> < table width = "98%%" border = "0" cellspacing = "0" cellpadding = "0" > <tr > <th scope = "col" > < /th> <th scope = "col" > < /th> </tr> <tr > <td > < /td> <td > < /td> </tr> </table> </div>'
                },
                {
                    title: 'Starting my story',
                    description: 'A cure for writers block',
                    content: 'Once upon a time...'
                },
                {
                    title: 'New list with dates',
                    description: 'New List with dates',
                    content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span> <h2 > My List < /h2> <ul > <li > < /li> <li > < /li> </ul> </div>'
                }
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 400,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_class: 'mceNonEditable',
            toolbar_mode: 'sliding',
            contextmenu: 'link image table',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
        });
    </script>
</head>

<body>

    <?php
    //include "navigation.php";

    if (isset($_POST['create_post'])) {
        $post_title = escape($_POST['title']);
        $post_author = escape($_POST['author']);
        // $post_user = $_POST['post_user'];
        $post_category_id = escape($_POST['post_category']);
        $post_status = escape($_POST['post_status']);
        $post_image = escape($_FILES['image']['name']);
        $post_image_temp = escape($_FILES['image']['tmp_name']);
        $post_tags = escape($_POST['post_tags']);
        $post_content = escape($_POST['post_content']);
        $post_date = escape(date('d-m-y'));

        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
        $query .= "VALUES ($post_category_id, '$post_title', '$post_author', now(), '$post_image', '$post_content','$post_tags', '$post_status') ";
        $create_post_query = mysqli_query($connection, $query);
        if (!$create_post_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
        $the_post_id = mysqli_insert_id($connection);
        echo "<p class='bg-success' >post updated successfully" . " " . "<a href='../post.php?p_id=$the_post_id'>View post </a> Or <a href='posts.php' > Edit other posts </a></p>";
    }

    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
            <label for="post_category">Post Category</label><br>
            <select name="post_category" id="">
                <?php
                $query = "SELECT * FROM categories ";
                $select_categories = mysqli_query($connection, $query);
                if (!$select_categories) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                while ($row = mysqli_fetch_assoc($select_categories)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<option value='$cat_id'>$cat_title</option>";
                }
                ?>
            </select>
        </div>
        <div class=" form-group">
            <label for="post_author">Post Author</label><br>
            <!--<input type="text" class="form-control" name="author">-->
            <select name="author" id="">
                <?php
                $query_user = "SELECT * FROM users ";
                $select_authors = mysqli_query($connection, $query_user);
                if (!$select_authors) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
                while ($row = mysqli_fetch_assoc($select_authors)) {
                    $user_id = $row['user_id'];
                    $user_name = $row['user_name'];
                    echo "<option value='$user_name'>$user_name</option>";
                }
                ?>
            </select>
        </div>
        <!--<div class="form-group">
        <label for="user">Post User</label>
        <input type="text" class="form-control" name="post_user">
    </div>-->
        <div class=" form-group">
            <label for="post_status">Post Status</label><br>
            <select name="post_status" id="">
                <option value="Draft">Select Options</option>
                <option value="Published">Published</option>
                <option value="Draft">Draft</option>
            </select>
        </div>
        <div class=" form-group">
            <label for="image">Post Image</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class=" form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags">
        </div>
        <div class=" form-group">
            <label for="create_post">Post Content</label>
            <textarea type="text" class="form-control" name="post_content" id="myTextarea" cols="30" rows="10"></textarea>
        </div>
        <div class=" form-group">
            <input type="submit" class="btn btn-primary" name="create_post" value="publish">
        </div>
    </form>

</body>

</html>