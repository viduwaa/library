<?php
include('header.php');
?>

<section class="content">
    <div class="container">
        <h2>Book Management</h2>
        <div>
            <h3>Register a New Book : </h3>
            <form action="new_book.php" method="post" class="new-book" enctype="multipart/form-data">
                <div>
                    <h4>Book Name : </h4>
                    <input type="text" name="book_name">
                </div>

                <div>
                    <h4>Author Name : </h4>
                    <input type="text" name="auth_name">
                </div>

                <div>
                    <h4>ISBN (If have) : </h4>
                    <input type="text" name="isbn_no">
                </div>

                <div>
                    <h4>Quantity : </h4>
                    <input type="number" name="quantity" max="10">
                </div>

                <div>
                    <h4>Image : </h4>
                    <input type="file" name="book_img" accept="image/*">
                </div>

                <div>
                    <input type="submit" value="Register" name="register" class="register-btn">
                </div>
            </form>
        </div>
        <div>
            <?php
            if ($_POST && isset($_FILES["book_img"])) {
                $book_name = $_POST["book_name"];
                $auth_name = $_POST["auth_name"];
                $isbn_no = $_POST["isbn_no"];
                $quantity = $_POST["quantity"];
                $target_dir = "../database/book_img/";

                $target_file = $target_dir . basename($_FILES["book_img"]["name"]);

                if(!empty($book_name) && !empty($auth_name)){
                    $sql = "INSERT INTO books (name,author,quantity,isbn_no) VALUES ('$book_name','$auth_name','$quantity','$isbn_no')";
                    try {
                        mysqli_query($conn, $sql);
                        move_uploaded_file($_FILES["book_img"]["tmp_name"], $target_file);
                        echo "<h3>Book registered</h3>";
                    } catch (mysqli_sql_exception) {
                        echo "<h3>Registration failed</h3>";
                    }

                }else{
                    echo "<h3>Please enter a book name and author</h3>";
                }
                
                
            }

            mysqli_close($conn);
            ?>

        </div>
    </div>
</section>

</html>