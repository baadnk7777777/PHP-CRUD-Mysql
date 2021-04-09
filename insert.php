<?php 

    include_once('functions.php');

    $insertdata = new DB_con();

    $output = "";

    if(isset($_POST['txtisbn'])) {
       // var_dump ($_POST['txtisbn']);
       $isbn = $_POST['txtisbn'];
       $name = $_POST['txtnamebook'];
        $img = $_FILES['image']['name'];
       $author = $_POST['txtatname'];
       $instock = $_POST['txtnis'];
       $price = $_POST['txtprice'];

       $sql = $insertdata->insert($isbn, $name, $img, $author, $instock, $price);

       if($sql) {
           $output.= "Record inserted Successfully!";

       }else {
        $output.= "Fail";
       }
    }

?>