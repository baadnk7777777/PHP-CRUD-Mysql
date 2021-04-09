<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
</head>

<body>

    <div class="container">
        <h5> List of Books</h5>
        <button class="btn btn-success" data-toggle="modal" data-target="#modalbook">Add New Book</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ISBN</th>
                    <th scope="col">Name</th>
                    <th scope="col">Author</th>
                    <th scope="col">In Stock</th>
                    <th scope="col">Price</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    include_once('functions.php');
                    $fetchdata = new DB_con();

                    $sql = $fetchdata->fetchdata();
                    
                    while($row = mysqli_fetch_array($sql))
                    {

                    
                ?>
                    <tr>
                        <td><?php echo $row['isbn']; ?> </td>
                        <td><?php echo $row['name']; ?> </td>
                        <td><?php echo $row['author']; ?> </td>
                        <td><?php echo $row['in_stock']; ?> </td>
                        <td><?php echo $row['price']; ?> </td>
                        <td><button  data-toggle="modal" data-target="#modalbookdetail"  class="btn btn-success detail " id="<?php  echo $row['user_id']?>" >Detail</button name ="btn-detail"> <button class="btn btn-success edit" data-toggle="modal" data-target="#modalbookedit"  id="<?php  echo $row['user_id']?>"  >Edit</button>  <button class="btn btn-success">Delete</button></td>
                    </tr>
                <?php
                    }
                ?>

            </tbody>
        </table>
    </div>


    <!-- Modal Books  -->
    <div class="modal fade" id="modalbook" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form method="post" id="frmbook" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Books</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bookmodalbody">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtisbn" placeholder="ISBN" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtnamebook" placeholder="Book Name"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="file" id="uploadimage" name="image">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtatname" placeholder="Author Name"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtnis" placeholder="Number in Stock"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtprice" placeholder="Price" require>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="bookmodalfooter">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" value="Upload">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     <!-- Modal Books edit -->
     <div class="modal fade" id="modalbookedit" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form method="post" id="frmbookedit" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Book </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="bookeditmodalbody">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtisbn" placeholder="ISBN" require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtnamebook" placeholder="Book Name"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="file" id="uploadimage" name="image">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtatname" placeholder="Author Name"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtnis" placeholder="Number in Stock"
                                    require>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtprice" placeholder="Price" require>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="bookeditmodalfooter">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" value="Upload">Add</button>
                        <input type="text" class=""  id="user_id" value='' >
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Books detail -->
    <div class="modal fade" id="modalbookdetail" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <form method="post" id="frmbookdetail" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Book </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  
                    <div class="modal-body" id="bookdetailmodalbody">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtisbn" placeholder="ISBN" value="" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtnamebook" placeholder="Book Name" value=""
                                    readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="file" id="uploadimage" name="image" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtatname" placeholder="Author Name" value=""
                                readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtnis" placeholder="Number in Stock" value=""
                                readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" name="txtprice" placeholder="Price" value="" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="bookdetailmodalfooter">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" value="Upload">Add</button>
                        <input type="text" class=""  id="userdetail_id" name="id_detail" value="" >
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

    <script>
    $(document).ready(function(e) {
        $('#frmbook').on('submit', function(e) {
            console.log("onClick");
            e.preventDefault();
            $.ajax({
                url: "insert.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $("#bookdetailmodalbody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#bookmodalfooter").html(btnClose);
                },
                error: function(e) {
                    console.log(error);
                }
            });
        });

        $('.edit').click(function(e) {
            e.preventDefault();
            console.log("tes");
            $key = $(this).attr('id');
            $('#user_id').val($key);
            

        });

        $('.detail').click(function(e) {
            e.preventDefault();
            console.log("detail");
            $key = $(this).attr('id');
            $('#userdetail_id').val($key);
        });

            $('#frmbookdetail').on('submit', function(e) {
            console.log("onClick");
            e.preventDefault();
            $.ajax({
                url: "detail.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $("#bookmodalbody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#bookdetailmodalfooter").html(btnClose);
                },
                error: function(e) {
                    console.log(error);
                }
            });
        });
            

        

        

    });

        
    </script>
</body>

</html>