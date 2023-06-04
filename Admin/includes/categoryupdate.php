<?php include_once "../database/db.php";
?>
<?php
//1- create logic to post data to db and,
//2- prevent an empty vlaue to be stored in db,

//extract($_POST);
if (isset($_POST['up_id'])) {

      $Get_category = $_POST['up_id'];



      $sql = "SELECT * FROM category WHERE id= $Get_category";
      $result = mysqli_query($con, $sql);

      $response = array();
      while ($row = mysqli_fetch_array($result)) {
            //
            $response = $row;
      }
      echo json_encode($response);
} else {
      $response['status'] = 200;

      $response['message'] = "Invalid or data not found";
}
if (isset($_POST['hidden'])) {

      $Update__id = $_POST['hidden'];
      $updatecat = $_POST['updatecat'];

      if (!empty($Update__id) && !empty($updatecat)) {


            $Sql = "UPDATE category SET categories='$updatecat' WHERE id=$Update__id";

            $result = mysqli_query($con, $Sql);

            die($response);
      }   //
}
?>