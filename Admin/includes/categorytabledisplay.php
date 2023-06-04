<?php include_once "../database/db.php";
?>
<?php
//diplay categories table 

//extract($_POST);
if (isset($_POST['displayTableInfo'])) {
      global $con;

      $table = "";
      $number = 1;
      $Sql = "SELECT * FROM category";
      $result = mysqli_query($con, $Sql);
      while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $icate = $row['categories'];

            $table .= ' <tr>
            <th scope="row">' . $number++ . '</th>
            <td>' . $icate . '</td>
            
            <td> <a class="btn btn-danger" onclick="DeleteCategory(' . $id . ')">Delete</a></td>
            <td><a  onclick="GetCategory(' . $id . ')" >Update</a></td>
        </tr>';
      }
      echo $table;
}




?>


<!--
         <td> <a  href="categories.php?=' . $id . '" onclick="DeleteCategory(' . $id . ')">Delete</a></td>
-->