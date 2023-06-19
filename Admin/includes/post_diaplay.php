<?php include_once "../database/db.php"; ?>

<?php

if (isset($_GET['displayPostTable'])) {

      global $con;
}


$count = 0;


$sql = "SELECT * FROM posts";


$myresult = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($myresult)) {

      $psot_id = $row['post_id'];
      $post_category_id = $row['post_category_id'];
      $post_title = $row['posts_title'];
      $post_date = $row['post_date'];
      $post_image = $row['post_image'];

?>

<?php

      $sql = "Select * FROM category WHERE id = $post_category_id ";

      $category = mysqli_query($con, $sql);

      while ($row = mysqli_fetch_assoc($category)) {

            // print category title 
            $cat_title = $row['categories'];


            echo  " <tr >";

            //echo " <th scope='row'> " . $count++ . " </th>"; its worked but for now just leave like this rn

            echo " <th scope='row'> $psot_id </th>";
            echo "<th> $post_title</th>";
            echo  " <th class='d-none d-sm-table-cell'>$cat_title </th>";
            echo "<th class='d-none d-sm-table-cell'> <img src='./images/$post_image ' height= 60 width= 100></th>";
            echo  "<th class='d-none d-sm-table-cell'> $post_date </th>";
            //     echo  "<th class='d-none d-sm-table-cell'><a href='post_update.php?=$psot_id'> Update </a> </th>";
            echo "<th class='d-none d-sm-table-cell'><a href='post_update.php?p_id=$psot_id'> Update </a></th>";

            echo  "<th  class='d-none d-sm-table-cell'> <a class='btn btn-danger' onclick='DeletePost( $psot_id)'> Delete</a></th>";

            echo    "</tr>";
      }
}

?>