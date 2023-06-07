<?php include_once "../database/db.php"; ?>
<?php include_once "../functions/function.php"; ?>
<?php
//1- create logic to post data to db and,
//2- prevent an empty vlaue to be stored in db,

//extract($_POST);
if (isset($_POST['sendCategories'])) {

      $sendCategories = escap($_POST['sendCategories']);

      if (!empty($sendCategories)) {

            $sql = ("INSERT INTO category(categories)");
            $sql .= "VALUE('$sendCategories')";

            $result = mysqli_query($con, $sql);
            // success message

      } else {

            // add warning message later 
      }
}


?>