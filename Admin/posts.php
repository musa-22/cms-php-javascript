<?php include_once "components/header.php"; ?>


<?php include_once "components/navigation.php"; ?>



<div class="col-lg-12 my-1">
    <br>
    <div class="card spur-card">


        <table class="table  table-bordered table-in-card">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th class='d-none d-sm-table-cell' scope="col">Post_Category</th>
                    <th class='d-none d-sm-table-cell' scope="col">Image</th>
                    <th class='d-none d-sm-table-cell' scope="col">Date</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody id="displayPostTable">

            </tbody>
        </table>
    </div>
</div>


</div>



<?php include_once "components/footer.php"; ?>

<script>
// here help to display data of data and make it fix in the page 
$(document).ready(function() {

    display();

})

// display post in table 

function display() {
    var displaydata = "true";
    $.ajax({

        url: 'includes/post_diaplay.php',
        type: 'post',
        data: {

            displayPostTable: displaydata

        },
        success: function(data, status) {
            $('#displayPostTable').html(data);
        }


    });
}






// delete function 

function DeletePost(psot_id) {

    $.ajax({

        url: "includes/post_delete.php",
        type: "post",
        data: {
            id: psot_id
        },
        success: function(data, status) {
            // alert("Are you sure you want to delete this data")

            location.reload();
        }

    });

}
</script>