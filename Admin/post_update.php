<?php include_once 'database/db.php' ?>

<?php
//1- create logic to post data to db and,
//2- prevent an empty vlaue to be stored in db,

//extract($_POST);
if (isset($_GET['p_id'])) {



    $Get_category = $_GET['p_id'];



    $sql = "SELECT * FROM posts WHERE post_id= $Get_category";
    $result = mysqli_query($con, $sql);


    while ($row = mysqli_fetch_array($result)) {

        // $id = $row['post_id '];

        $posts_title = $row['posts_title'];

        $post_author = $row['post_author'];

        $post_image = $row['post_image'];

        $post_content = $row['post_content'];
    }
    // header("Location: posts.php");
}


?>

<?php include_once "components/header.php" ?>


<?php include_once "components/navigation.php"; ?>



<main class="dash-content">


    <div class="container">
        <h5>Get in Touch</h5>


        <div class="form-group">
            <label for="post_title">Title</label>
            <input type="text" class="form-control" id="post_title" placeholder="<?php echo $posts_title ?>" vlaue="">
        </div>

        <!--check -->

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category">

            </select>
        </div>




        <div class="form-group">
            <label for="post_image">Upload Image</label>
            <input type="file" class="form-control-file" id="post_image">
            <br>
            <img src="Images/<?php echo $post_image ?>" class="mb-1" width=100>
        </div>

        <div class="form-group">
            <label for="post_content"></label>
            <textarea class="form-control" id="post_content" rows="4" placeholder="Enter your message"><?php echo $post_content ?></textarea>
        </div>



        <button type="submit" class=" btn btn-primary">Submit</button>

    </div>



    </div>





    <?php include_once "components/footer.php"; ?>