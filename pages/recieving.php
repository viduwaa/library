<?php
include('header.php');
?>

<section class="content">
    <div class="container">
        <h2>Book Lending</h2>
        <div>
            <h3>Book Receiving: </h3>
            <form action="recieving.php" method="post" class="lending">
                <div>
                    <h4 for="reg_no">User Registration Number :</h4>
                    <input type="text" name="reg_no" id="reg_no">
                </div>

                <div>
                    <h4 for="bk_id">Book ID :</h4>
                    <input type="text" name="book_id" id="bk_id">
                </div>

                <div>
                    <input type="submit" value="Receive">
                </div>
            </form>
            <?php
            if ($_POST) {
                $regno = $_POST["reg_no"];
                $bookID = $_POST["book_id"];

                if (!empty($regno) && !empty($bookID)) {
                    $checkID = "SELECT * FROM user_books WHERE reg_num = '$regno' AND book_id = $bookID";
                    $checkResult = mysqli_fetch_assoc(mysqli_query($conn, $checkID));

                    if($checkResult){
                        $sql = "UPDATE user_books SET return_date = NOW() WHERE book_id = $bookID AND reg_num = '$regno'";
                        $sqlquantityBooks = "UPDATE books SET quantity = quantity + 1 WHERE books_id = $bookID";
                        $sqlquantityUser = "UPDATE user_books SET quantity = 0 WHERE book_id = $bookID AND reg_num = '$regno'";

                        $sqluser = "SELECT * FROM users WHERE reg_num = '$regno'";
                        $sqlbook = "SELECT * FROM books WHERE books_id = $bookID";
                        $sqluserbook = "SELECT * FROM user_books WHERE reg_num = '$regno' AND book_id = $bookID";

                        try {
                            mysqli_query($conn,$sql);
                            mysqli_query($conn,$sqlquantityBooks);
                            mysqli_query($conn,$sqlquantityUser);

                            $resultUser = mysqli_fetch_assoc(mysqli_query($conn, $sqluser));
                            $resultBook = mysqli_fetch_assoc(mysqli_query($conn, $sqlbook));
                            $resultUserBook = mysqli_fetch_assoc(mysqli_query($conn, $sqluserbook));

                            echo "<h2 style=\"color:green;margin-top:10px\">Book Successfully Received!</h2>";
                            echo "<div class=\"book-details\">";
                            echo "<h3>Book Received by :</h3>";
                            echo "<ul style=\"margin-left: 20px;\">";
                            echo "<li>Name : {$resultUser['username']}</li>";
                            echo "<li>Registration Number : {$resultUser['reg_num']}</li>";
                            echo "<li>Book Name : {$resultBook['name']}</li>";
                            echo "<li>Book Author : {$resultBook['author']}</li>";
                            echo "<li>Book ID : {$resultBook['books_id']}</li>";
                            echo "<li>Borrowed Date :{$resultUserBook['borrowing_date']} </li>";
                            echo "<li>Received Date :{$resultUserBook['return_date']} </li>";
                            echo "</ul>";
                            echo "</div>";
                        } catch (\Throwable $th) {
                            echo $th;
                        }
                    }else{
                        echo "<h2 style=\"color:red;margin-top:10px\">Wrong Information!</h2>";
                    }

                    
                }else{
                    echo "<h2 style=\"color:red;margin-top:10px\">Please Enter Proper Details!</h2>";
                }

            }
            

            mysqli_close($conn);
            ?>
        </div>
    </div>
</section>

</html>