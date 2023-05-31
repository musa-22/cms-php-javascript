<?php include_once "includes/header.php"; ?>


<?php include_once "includes/navigation.php"; ?>



<div class="container-fluid">
    <hr>
    <div class="row">
        <div class="col-lg-6">



            <div class="mb-3">
                <label for="addcategory" class="form-label">Add - Category</label>
                <input type="text" class="form-control" id="addcategory">

                <button type="button" class="btn btn-primary  my-2" onclick="addCategory()">Add-Category</button>
            </div>



        </div>


        <div class="col-lg-6 my-2">
            <br>
            <div class="card spur-card">


                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Category</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody id="displaytabledata">



                    </tbody>
                </table>

            </div>


        </div>
    </div>


</div>




<?php include_once "includes/footer.php"; ?>



<script>
    $(document).ready(function() {

        display();


    })

    // display category

    function display() {
        var displaydata = "true";
        $.ajax({

            url: 'categorytabledisplay.php',
            type: 'post',
            data: {

                displayTableInfo: displaydata

            },
            success: function(data, status) {
                $('#displaytabledata').html(data);
            }


        });
    }

    // add category
    function addCategory() {
        var categorya = $('#addcategory').val();

        // using trim to remove whitespace 
        if (categorya.trim() === '') {
            alert('Please enter a category.');
            // return;
        }


        $.ajax({
            url: "insertcategories.php",
            method: "POST",
            data: {

                sendCategories: categorya

            },
            success: function(data, status) {

                display();
                // $("#addcategory")[0].reset();

                // test button 
                //  console.log(status);

                $('#addcategory').val('');

            }


        });

    }


    // delete function 

    function DeleteCategory(delete_category_id) {
        $.ajax({

            url: "deletecategory.php",
            type: "post",
            data: {
                id: delete_category_id
            },
            success: function(data, status) {
                alert("Are you sure you want to delete this data")
                display();
            }

        })

    }
</script>