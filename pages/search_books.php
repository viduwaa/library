<?php
include('header.php');
?>

<section class="content">
    <div class="container">
        <h2>Book Management</h2>
        <div>
            <h3>
                Search for a Book:
            </h3>
            <form action="search_books.php" method="post">
                <label for="search_by">Search by :</label>
                <select name="search-type" id="search_by">
                    <option value="book_name">Book Name</option>
                    <option value="auth_name">Author Name</option>
                </select>
                <input type="text" name="search" class="input-search" placeholder="Search for book">
                <input type="submit" value="Search" name="submit" class="search-btn">
            </form>

            <div class="error-msg">
                <?php
                if ($_POST) {
                    $search_type = $_POST["search-type"];
                    $search = $_POST["search"];

                    if (!empty($search)) {
                        if ($search_type == "book_name") {
                            $sql = "SELECT * FROM books WHERE name LIKE '%{$search}%'";
                        } elseif ($search_type == "auth_name") {
                            $sql = "SELECT * FROM books WHERE author LIKE '%{$search}%'";
                        }

                        $result = mysqli_query($conn, $sql);

                        if (!$result || mysqli_num_rows($result) == 0) {
                            echo "<h4>No books found !</h4>";
                        }
                    } else {
                        echo "<h4> Please enter a book name or author name !</h4>";
                    }
                }
                ?>
            </div>

            <table>
                <tr>
                    <th class="id-column">Book ID</th>
                    <th class="name-column">Book Name</th>
                    <th class="name-column">Author Name</th>
                    <th class="borrow-column">Books Quantity</th>
                </tr>
                <?php
                if (isset($result) && $result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['books_id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['author'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "</tr>";
                    }
                }

                mysqli_close($conn);
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>
        </div>
</section>

</html>