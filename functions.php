<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'book');

    class DB_con {

        function __construct() {
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;
            // สร้าง dbcon ไว้เรียกใช้งาน 
            
            if(mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : ". mysqli_connect_error();
            }
        }

        public function insert ($Isn,	$Name, $Image,	$Author, $Instock,	$Price) {
            $result = mysqli_query($this->dbcon, "INSERT INTO booking(isbn, name, image, author,in_stock,price)
                            VALUES('$Isn',	'$Name', ' $Image',	'$Author',	'$Instock',	'$Price')");
            return $result;
        }

        public function fetchdata () {
            $result = mysqli_query($this->dbcon, "SELECT * FROM booking");
            return $result;
        }
        
        public function fetchonerreord($user_id) {
            $result = mysqli_query($this->dbcon, "SELECT* FROM booking WHERE user_id = '$user_id' ");
            return $result;
        }

        public function update($Isn,	$Name, $Image, $Author, $Instock,	$Price, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE tblusers SET 
                Name = '$Name',
                Author = '$Author',
                in_stock = '$In_stock',
                Price = '$Price'
                WHERE id = '$userid'
                ");
                return $result;
        }

        public function delete ($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tblusers WHERE id= '$userid' ");
            return $deleterecord;
        }


    }

?>