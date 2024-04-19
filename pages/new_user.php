<?php
include('header.php');
?>

<section class="content">
    <div class="container">
        <h2>User Management</h2>
        <div>
            <h3>Register a New User : </h3>
            <form action="new_user.php" method="post" class="new-user">
                <div>
                    <h4>Name : </h4>
                    <input type="text" name="name">
                </div>

                <div>
                    <h4>Registration Number : </h4>
                    <input type="text" name="reg_no">
                </div>

                <input type="submit" value="Register" name="register" class="register-btn">
            </form>

            <?php
            if ($_POST) {
                $username = $_POST["name"];
                $reg_no = $_POST["reg_no"];


                if (empty($username) || empty($reg_no)) {
                    echo "<h3>Please enter valid username and registration number</h3>";
                } else {
                    $sql = "INSERT INTO users (username,reg_num) VALUES ('$username','$reg_no')";
                    try {
                        mysqli_query($conn, $sql);
                        echo "<h3>User registered</h3>";
                    } catch (mysqli_sql_exception) {
                        echo "<h3>Registration failed (Registration number already exists)</h3>";
                    }
                    
                    
                }
            }

            mysqli_close($conn);
            ?>

        </div>
    </div>
</section>