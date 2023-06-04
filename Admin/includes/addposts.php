<?php include_once "../database/db.php"; ?>
<?php ob_start() ?>
<?php
//1- create logic to post data to db and,
//2- prevent an empty vlaue to be stored in db,

//extract($_POST);

global $con;

$post_title = $_POST['post_title'];

// $post_category_id = $_POST['postTitle'];

$post_image_temp = $_FILES['post_image']['tmp_name'];
$post_image = $_FILES['post_image']['name'];
$post_content = $_POST['post_content'];

$imageCanBeMove =   move_uploaded_file($post_image_temp, "../Images/$post_image");
//echo "<h1> $post_title </h1>";

if (!empty($post_title) || !empty($post_image) || !empty($post_content)) {
}
if (isset($post_title) && isset($post_image) && isset($post_content)) {

    $sql = "INSERT INTO posts(posts_title,post_date,post_image,post_content)";

    $sql .= "VALUES('{$post_title}',now(),'{$post_image}','{$post_content}')";


    mysqli_query($con, $sql);
}


?>