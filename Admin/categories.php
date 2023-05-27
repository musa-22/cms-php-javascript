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
            <div class="card spur-card" id="displaytabledata">


                <table class="table table-hover table-in-card">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>

            </div>


        </div>
    </div>


</div>




<?php include_once "includes/footer.php"; ?>


<script>
    // add category
    function addCategory() {
        var categorya = $('#addcategory').val();


        $.ajax({
            url: "insertcategories.php",
            method: "POST",
            data: {

                sendCategories: categorya

            },
            success: function(data, status) {

                // test button 
                //  console.log(status);


            }

        });

    }

    // display category
</script>