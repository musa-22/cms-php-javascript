<?php include_once "../database/db.php";
?>
<?php

if (isset($_POST['id'])) {

      $delete_post = $_POST['id'];



      $sql = "DELETE FROM posts WHERE post_id= $delete_post";

      $result = mysqli_query($con, $sql);
}


?>