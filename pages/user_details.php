<?php
include('header.php');
if ($_GET) {
    $regNo = $_GET['reg_num'];
}

?>

<section class="content">

    <div class="container">
        <h2>User Management</h2>
        <div>
            <h3>Search for user details: </h3>
            <form action="user_details.php" method="post" id="searchForm"">
                <label for=" search_by">Search by :</label>
                <select name="search-type" id="search_by">
                    <option value="reg_no">Registration Number</option>
                </select>
                <input id="search" type="text" name="search" class="input-search" placeholder="Search for user">
                <input type="submit" value="Search" class="search-btn">
            </form>

            <div class="user-details">
                <h3>User Details</h3>
                <?php
                if ($_POST) {
                    $search_type = $_POST["search-type"];
                    $search = $_POST["search"];

                    if (!empty($search)) {
                        $sql = "SELECT * FROM users WHERE reg_num ='$search'";

                        $result = mysqli_query($conn, $sql);

                        if (!$result || mysqli_num_rows($result) == 0) {
                            echo "<h4>No users found !</h4>";
                        } else {
                            $details = mysqli_fetch_assoc($result);
                            $regNo = $details['reg_num'];

                            $sqlUserBook = "SELECT * FROM user_books WHERE reg_num = '$regNo'";
                            $userBookresult = mysqli_query($conn, $sqlUserBook);

                            echo "<ul>";
                            echo "<h3>";
                            echo "<li>Name :{$details['username']}</li>";
                            echo "<li>Registration Number :{$details['reg_num']}</li>";
                            echo "<li>Registration Date :{$details['reg_date']}</li>";
                            echo " <li>Book Details :</li>";
                            echo "</h3>";
                            echo "</ul>";

                            if (!$userBookresult || mysqli_num_rows($userBookresult) == 0) {
                                echo "<h4>User has not borrowed any books yet</h4>";
                            } else {
                                while ($row = mysqli_fetch_assoc($userBookresult)) {
                                    $booksql = "SELECT * FROM books WHERE books_id = {$row['book_id']}";
                                    $bookdetails = mysqli_fetch_assoc(mysqli_query($conn, $booksql));
                                    echo "<div>";
                                    echo "<ul>";
                                    echo "<li>Book ID :{$row['book_id']}</li>";
                                    echo "<li>Book Name :{$bookdetails['name']}</li>";
                                    echo "<li>Book Author :{$bookdetails['author']}</li>";
                                    echo "<li>Book Borrowed Date :{$row['borrowing_date']}</li>";
                                    echo "<li>Book Returned Date: " . ($row['return_date'] === NULL ? 'Not returned' : $row['return_date']) . "</li>";
                                    echo "</ul>";
                                    echo "<hr>";
                                    echo "</div>";
                                }
                            }
                        }
                    } else {
                        echo "<h4> Please enter registration number !</h4>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        function autoSearch() {
            const regNum = getQueryParam("reg_num");
            if (regNum) {
                document.getElementById("search").value = regNum;
                document.getElementById("searchForm").submit();
            }
        }

        autoSearch();
    });
</script>


</html>