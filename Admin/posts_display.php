<?php include_once "database/db.php"; ?>
<?php include_once "includes/header.php"; ?>


<?php include_once "includes/navigation.php"; ?>












<div class="col-lg-12 my-1">
    <br>
    <div class="card spur-card">


        <table class="table  table-bordered table-in-card">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Title</th>
                    <th class='d-none d-sm-table-cell' scope="col">Post_Category</th>
                    <th class='d-none d-sm-table-cell' scope="col">Image</th>
                    <th class='d-none d-sm-table-cell' scope="col">Date</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php


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

                        echo " <th scope='row'> $psot_id </th>";
                        echo "<th> $post_title</th>";
                        echo  " <th class='d-none d-sm-table-cell'>$cat_title </th>";
                        echo "<th class='d-none d-sm-table-cell'> <img src='./images/$post_image '  width= 100></th>";
                        echo  "<th class='d-none d-sm-table-cell'> $post_date </th>";
                        echo  "<th class='d-none d-sm-table-cell'> Update </th>";
                        echo  "<th  class='d-none d-sm-table-cell'><a href='posts_display.php?id=$psot_id'> Delete </a> </th>";

                        echo    "</tr>";
                    }
                }

                ?>




            </tbody>
        </table>
    </div>
</div>


</div>



<?php include_once "includes/footer.php"; ?>