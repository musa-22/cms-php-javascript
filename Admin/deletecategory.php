<?php include_once "database/db.php"
?>
<?php
//1- create logic to post data to db and,
//2- prevent an empty vlaue to be stored in db,

//extract($_POST);
if (isset($_POST['id'])) {

      $delete_category = $_POST['id'];



      $sql = "DELETE FROM category WHERE id= $delete_category";

      $result = mysqli_query($con, $sql);
}


?>