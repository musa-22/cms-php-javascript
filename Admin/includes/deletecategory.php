<?php include_once "../database/db.php";
?>
<?php
/
if (isset($_POST['id'])) {

      $delete_category = $_POST['id'];



      $sql = "DELETE FROM category WHERE id= $delete_category";

      $result = mysqli_query($con, $sql);
}


?>