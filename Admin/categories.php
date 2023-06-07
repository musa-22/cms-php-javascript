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

            <div class="mb-3" id="hiddenData">
                <label for="addcategory" class="form-label">Edit - Category</label>
                <input type="text" class="form-control" id="updatecat">

                <button type="button" class="btn btn-primary  my-2" onclick="updatedetails()">Edit-Category</button>
                <input type="hidden" id="hi">

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
    // here help to display data of data and make it fix in the page 
    $(document).ready(function() {

        display();

    })

    $(document).ready(function() {

        display();

        $('#hiddenData').hide(); // Hide the field initially
        $('#hiddenData button').click(function() {
            $('#hiddenData').show(); // Show the field
            $(this).hide(); // Hide the button
        });

    })

    // display category

    function display() {
        var displaydata = "true";
        $.ajax({

            url: 'includes/categorytabledisplay.php',
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
            return;
        }


        $.ajax({
            url: "includes/insertcategories.php",
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

            url: "includes/deletecategory.php",
            type: "post",
            data: {
                id: delete_category_id
            },
            success: function(data, status) {
                // alert("Are you sure you want to delete this data")
                display();
            }

        });

    }

    // get category data to update...
    function GetCategory(update_id) {
        // hiddenData
        var up_id = $('#hiddenData').val(update_id);

        //  up_id.is(':visible') ? up_id.hide() : up_id.show();
        if (up_id.is(':visible')) {
            up_id.hide();
        } else {
            up_id.show();
        }
        $.post("includes/categoryupdate.php", {
                up_id: update_id,
            },
            function(data, status) {

                var resp = JSON.parse(data);
                $('#updatecat').val(resp.categories);
            });
    }

    /// update the data  
    function updatedetails() {
        var updatecat = $('#updatecat').val();

        var hidden = $('#hiddenData').val();

        $.ajax({

            url: "includes/categoryupdate.php",
            type: "post",
            data: {
                updatecat: updatecat,
                hidden: hidden
            },
            success: function(data, status) {
                alert("Are you sure you want to change it");
                location.reload();
            }

        });

    }
</script>