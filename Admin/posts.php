<?php include_once "includes/header.php"; ?>


<?php include_once "includes/navigation.php"; ?>



<main class="dash-content">


    <div class="container">
        <h5>Get in Touch</h5>


        <div class="form-group">
            <label for="post_title">Title</label>
            <input type="text" class="form-control" id="post_title" placeholder="">
        </div>

        <!--
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category">
                    <option value="">Select a category</option>
                    <option value="category1">Category 1</option>

                </select>
            </div>

-->

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





    <?php include_once "includes/footer.php"; ?>




    <script>
    // create function to add post
    function addPost(event) {
        event.preventDefault();

        var post_title = $('#post_title').val();
        var post_image = $('#post_image')[0].files[0]; // Get the images
        var post_content = $('#post_content').val();

        // input validations
        post_title === '' ? alert("Enter Title") : post_title;

        !post_image ? alert("UPLOAD IMAGE") : post_image;

        post_content === '' ? alert("Enter content") : post_content;

        // Create a FormData object
        var formData = new FormData();
        formData.append('post_title', post_title);
        formData.append('post_image', post_image);
        formData.append('post_content', post_content);

        $.ajax({
            url: "includes/addposts.php",
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