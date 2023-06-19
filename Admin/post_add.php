<?php include_once "components/header.php"; ?>


<?php include_once "components/navigation.php"; ?>



<main class="dash-content">


    <div class="container">
        <h5>Get in Touch</h5>


        <div class="form-group">
            <label for="post_title">Title</label>
            <input type="text" class="form-control" id="post_title" placeholder="">
        </div>

        <!--check -->

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category">
                <?php

                // retrieve category
                include_once "database/db.php";
                global $con;
                $query = "SELECT * FROM category";

                $result = mysqli_query($con, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    $cat_Id = $row['id'];
                    $cat_title = $row['categories'];

                    echo "<option  value=' {$cat_Id}' >{$cat_title}</option>";
                }
                //   header("location: posts.php")
                ?>
            </select>
        </div>




        <div class="form-group">
            <label for="post_image">Upload Image</label>
            <input type="file" class="form-control-file" id="post_image">
        </div>

        <div class="form-group">
            <label for="post_content">contents</label>
            <textarea class="form-control" id="post_content" rows="4" placeholder="Enter your message"></textarea>
        </div>



        <button type="submit" onclick="addPost(event)" class="btn btn-primary">Submit</button>

    </div>


    </div>





    <?php include_once "components/footer.php"; ?>




    <script>
        // create function to add post
        function addPost(event) {
            event.preventDefault();

            var post_title = $('#post_title').val();
            var category = $('#category').val();
            var post_image = $('#post_image')[0].files[0]; // Get the images
            var post_content = $('#post_content').val();

            // input validations
            post_title === '' ? alert("Enter Title") : post_title;

            !post_image ? alert("UPLOAD IMAGE") : post_image;

            post_content === '' ? alert("Enter content") : post_content;

            // Create a FormData objects
            var formData = new FormData();
            formData.append('post_title', post_title);
            formData.append('category', category);
            formData.append('post_image', post_image);
            formData.append('post_content', post_content);

            $.ajax({
                url: "includes/posts_post.php",
                type: "post",
                data: formData,
                processData: false, // Prevent jQuery from processing the data
                contentType: false, // Prevent jQuery from setting the content type
                success: function(data, status) {
                    // Handle success

                    $('#post_title').val(''); // Clear the title input field
                    $('#post_image').val(''); // Clear the image input field
                    $('#post_content').val(''); // Clear the content input field
                }

            });
            //alert("check the button");

        }
    </script>