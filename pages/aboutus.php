<?php  
    include('header.php');
?>

<section>
    <div class="container">
        <h2>Our Team</h2>
        <div style="display:flex;flex-wrap: wrap;justify-content: center;gap: 10px;margin-top: 10px;">
            <?php 
                for ($i=1; $i <=7 ; $i++) { 
                    echo "<div style=\"border:1px solid black\">";
                    echo "<img src=\"/library/assets/logo_placeholder.png\" alt=\"img\" style=\"width:250px\">";
                    echo "<h2 style=\"border-top:1px solid black; text-align:center\">Member {$i}</h2>";
                    echo "</div>";
                }
            
            ?>
        </div>
    </div>
</section>