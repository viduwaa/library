<?php
include('header.php');
?>
<section class="content">
    <div class="container">
        <h2>User Management</h2>
        <div>
            <h3>Search for user : </h3>
            <form action="search_user.php" method="post">
                <label for="search_by">Search by :</label>
                <select name="search-type" id="search_by">
                    <option value="name">Name</option>
                    <option value="reg_no">Registration Number</option>
                </select>
                <input type="text" name="search" class="input-search" placeholder="Search for user">
                <input type="submit" value="Search" name="submit" class="search-btn">
            </form>

            <div class="error-msg">
                <?php
                if ($_POST) {
                    $search_type = $_POST["search-type"];
                    $search = $_POST["search"];

                    if (!empty($search)) {
                        if ($search_type == "name") {
                            $sql = "SELECT * FROM users WHERE name LIKE '%{$search}%'";
                        } elseif ($search_type == "reg_no") {
                            $sql = "SELECT * FROM users WHERE reg_num LIKE '%{$search}%'";
                        }

                        $result = mysqli_query($conn, $sql);

                        if (!$result || mysqli_num_rows($result) == 0) {
                            echo "<h4>No users found !</h4>";
                        }
                    } else {
                        echo "<h4> Please enter a name or registration number !</h4>";
                    }
                }
                ?>
            </div>

            <table>
                <tr>
                    <th class="name-column">Name</th>
                    <th class="name-column">Registration Number</th>
                    <th class="borrow-column">Books Borrowed</th>
                </tr>
                <?php
                if (isset($result) && $result) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['reg_num'] . "</td>";
                        echo "</tr>";
                    }
                }

                mysqli_close($conn);
                ?>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                

            </table>
        </div>
    </div>


</section>
</body>

</html>