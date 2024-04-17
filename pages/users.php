<?php
include('header.php');
?>
<section class="content">
    <div class="container">
        <h2>User Management</h2>
        <div>
            <h3>Search for user : </h3>
            <form action="users.php" method="post">
                <input type="text" name="search" class="input-search" placeholder="Search for user">
                <input type="submit" value="Search" name="submit" class="search-btn">
            </form>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Registration Number</th>
                    <th>Books Borrowed</th>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>

            </table>
        </div>
    </div>
</section>
</body>

</html>