<?php
include('header.php');
?>

<section class="content">
    <div class="container">
        <h2>Book Lending</h2>
        <div>
            <h3>Book Borrowing: </h3>
            <form action="borrowing.php" method="post" class="lending">
                <div>
                    <h4 for="reg_no">User Registration Number :</h4>
                    <input type="text" name="reg_no" id="reg_no">
                </div>

                <div>
                    <h4 for="bk_id">Book ID :</h4>
                    <input type="text" name="book_id" id="bk_id">
                </div>

                <div>
                    <input type="submit" value="Lend">
                </div>
            </form>
            <?php
            if ($_POST) {
                $regno = $_POST["reg_no"];
                $bookID = $_POST["book_id"];

                if (!empty($regno) && !empty($bookID)) {

                    /* check for same book */
                    $checkID = "SELECT * FROM user_books WHERE reg_num = '$regno' AND book_id = $bookID";
                    $checkResult = mysqli_fetch_assoc(mysqli_query($conn, $checkID));

                    if ($checkResult) {
                        echo "<div style=\"margin-top:10px\">";
                        echo "<h2 style=\"color:red\">User already borrowed this book!</h2>";
                        echo "<h3>Borrowed date & time : {$checkResult['borrowing_date']}";
                        echo "</div>";
                    } else {
                        $sqllending = "INSERT INTO user_books (book_id,reg_num,quantity) VALUES ('$bookID','$regno',1)";
                        $sqlquantity = "UPDATE books SET quantity = quantity - 1 WHERE books_id = $bookID";

                        $sqluser = "SELECT * FROM users WHERE reg_num = '$regno'";
                        $sqlbook = "SELECT * FROM books WHERE books_id = $bookID";
                        try {
                            mysqli_query($conn, $sqllending);
                            mysqli_query($conn, $sqlquantity);
                            $resultUser = mysqli_fetch_assoc(mysqli_query($conn, $sqluser));
                            $resultBook = mysqli_fetch_assoc(mysqli_query($conn, $sqlbook));
                            echo "<h2 style=\"color:green\">Book lending successful.";
                            echo "<div class=\"book-details\">";
                            echo "<h3>Book Lend to :</h3>";
                            echo "<ul style=\"margin-left: 20px;\">";
                            echo "<li>Name : {$resultUser['username']}</li>";
                            echo "<li>Registration Number : {$resultUser['reg_num']}</li>";
                            echo "<li>Book Name : {$resultBook['name']}</li>";
                            echo "<li>Book Author : {$resultBook['author']}</li>";
                            echo "<li>Book ID : {$resultBook['books_id']}</li>";
                            echo "</ul>";
                            echo "</div>";
                        } catch (mysqli_sql_exception $e) {
                            echo "<h2 style=\"color:red\">User not found !</h2>";
                        }
                    }
                } else {
                    echo "<h2 style=\"padding-top:10px; color:red \">Plase enter proper details !</h2>";
                }
            }

            mysqli_close($conn);
            ?>


        </div>
    </div>


</section>

</html>