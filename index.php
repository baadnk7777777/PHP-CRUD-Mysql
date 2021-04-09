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
                        <td class="isbn"><?php echo $row['isbn']; ?> </td>
                        <td class="name" ><?php echo $row['name']; ?> </td>
                        <td class="image" style="display:none"><?php echo $row['image']; ?> </td>
                        <td class="author"><?php echo $row['author']; ?> </td>
                        <td class="stock"><?php echo $row['in_stock']; ?> </td>
                        <td class="price"><?php echo $row['price']; ?> </td>
                        <td><button  data-toggle="modal" data-target="#modalbookdetail"  class="btn btn-success detail " id="<?php  echo $row['user_id']?>" >Detail</button name ="btn-detail"> <button class="btn btn-success edit" data-toggle="modal" data-target="#modalbookedit"  id="<?php  echo $row['user_id']?>"  >Edit</button>  <button class="btn btn-success Del_ID" name="Del_ID" value="<?php echo $row['user_id']?>">Delete</button></td>
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
                                <input type="text" class="form-control " id="isbn" name="txtisbn" placeholder="ISBN" value="" readonly>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="name" name="txtnamebook" placeholder="Book Name"
                                    >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <input type="hidden" class="form-control" id="image" name="image" placeholder="image Name"
                                    >
                                    <p id="img-edit">asdasd</p>
                                <input type="file" id="uploadimage" name="image">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="author" name="txtatname" placeholder="Author Name"
                                    >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="stock" name="txtnis" placeholder="Number in Stock"
                                    >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="price" name="txtprice" placeholder="Price" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" id="bookeditmodalfooter">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success" id="Edit_re" >Update</button>
                        <input type="hidden" class=""  id="user_id" value='' name="user_id" >
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Books detail -->
    <div class="modal fade" id="modalbookdetail" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Book </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  
                    <div class="modal-body" id="bookdetailmodalbody">
                      <p class="isbn-id"></p>
                      <p class="name-id"></p>
                      <p class="" id="img"></p>
                      <p class="author-id"></p>
                      <p class="stock-id"></p>
                      <p class="price-id"></p>
                    </div>
                    <div class="modal-footer" id="bookdetailmodalfooter">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <!-- <input type="text" class=""  id="userdetail_id" name="id_detail" value="" > -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- model delete  -->
    <div class="modal fade" id="modalbookdelete" tabindex="-1" role="dialog" aria-labelledby="modalLogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Book </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                  
                    <div class="modal-body" id="bookdeletemodalbody">
                      Are you sure ?? ?
                    </div>
                    <div class="modal-footer" id="bookdeletemodalfooter">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="delete_re" >Delete</button>
                        <!-- <input type="text" class=""  id="userdetail_id" name="id_detail" value="" > -->
                    </div>
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

        $('.Del_ID').click(function(e){
            e.preventDefault();
            console.log("DELTE");
            var Delete_ID = $(this).attr('value');
            console.log(Delete_ID);
            $('#modalbookdelete').modal('show');

            $('#delete_re').click(function(e){
                console.log("dddd");

                  $.ajax({
                url : 'delete.php',
                method: 'post',
                // การใส่ data แบบระบุตัวแปล $_POST['Del_ID']
                data : {Del_ID:Delete_ID},
                success: function(data)
                {
                    console.log(data);
                    $("#bookdeletemodalbody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#bookdeletemodalfooter").html(btnClose);
                }
            });
            });
          
        });

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
                    $("#bookmodalbody").html(data);
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
            // $key = $(this).attr('id');
            // $('#user_id').val($key);
            
            // ********************** set value ************************
            $ISBN = $(this).closest("tr").find('.isbn').text();
            $NAME = $(this).closest("tr").find('.name').text();
            $IMG = $(this).closest("tr").find('.image').text();
            $AUTHOR = $(this).closest("tr").find('.author').text();
            $IN_STOCK = $(this).closest("tr").find('.stock').text();
            $PRICE = $(this).closest("tr").find('.price').text();
            console.log($ISBN);
            console.log($NAME);
            console.log($IMG);
            console.log($AUTHOR);
            console.log($IN_STOCK);
            console.log($PRICE);

            $('#isbn').val($ISBN);
            $('#name').val($NAME);
            $('#image').val($IMG);
            $('#author').val($AUTHOR);
            $('#stock').val($IN_STOCK);
            $('#price').val($PRICE);
            
            $key =  $(this).attr('id');
            $('#user_id').val($key);

            var number = $IMG;
            $("#img-edit").html("<img class='img' src='uploads/"+$.trim(number)+"' width=50%' </img>");
            

        });

        $('#frmbookedit').on('submit', function(e) {
            console.log("onClick");
            e.preventDefault();
            $.ajax({
                url: "update.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(data);
                    $("#bookeditmodalbody").html(data);
                    var btnClose =
                        ' <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>'
                    $("#bookeditmodalfooter").html(btnClose);
                },
                error: function(e) {
                    console.log(error);
                }
            });
        });

        $('.detail').click(function(e) {
            e.preventDefault();
            console.log("detail");
            $key = $(this).attr('id');
            $('#userdetail_id').val($key);

            $ISBN = $(this).closest("tr").find('.isbn').text();
            $NAME = $(this).closest("tr").find('.name').text();
            $IMG = $(this).closest("tr").find('.image').text();
            $AUTHOR = $(this).closest("tr").find('.author').text();
            $IN_STOCK = $(this).closest("tr").find('.stock').text();
            $PRICE = $(this).closest("tr").find('.price').text();

            console.log($ISBN);
            console.log($NAME);
            console.log($IMG);
            console.log($AUTHOR);
            console.log($IN_STOCK);
            console.log($PRICE);

            // set attribute

            $('.isbn-id').text($ISBN);
            $('.name-id').text($NAME);
            $('.img-id').text($IMG);
            $('.author-id').text($AUTHOR);
            $('.stock-id').text($IN_STOCK);
            $('.price-id').text($PRICE);

            var number = $IMG;
            $("#img").html("<img class='img' src='uploads/"+$.trim(number)+"' width=50%' </img>");
        });

    });

        
    </script>
</body>

</html>