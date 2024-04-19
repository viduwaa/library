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
                    <h4 for="reg_no">Uer Registration Number :</h4>
                    <input type="text" name="reg_no" id="reg_no">
                </div>

                <div>
                    <h4 for="bk_id">Book ID :</h4>
                    <input type="text" name="reg_no" id="bk_id">
                </div>

                <div>
                    <input type="submit" value="Lend">
                </div>
            </form>
        </div>
    </div>

</section>

</html>