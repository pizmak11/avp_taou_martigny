<?php 
session_start();
get_header();
?>

<main id="succes">
    <section>
        <div class="col">
            <?php
                if($_SESSION['is_sent'] == "yes") {
                    echo "
                        <div class='main-icon yes'></div>
                        <h2 class='center'>Nous vous remercions pour votre email&nbsp;!</h2>
                        <p>Nous vous contacterons dans les plus brefs délais.</p>
                    ";
                } else if($_SESSION['is_sent'] == "no") {
                    echo "
                        <div class='main-icon no'></div>
                        <h2 class='center'>Un&nbsp;problème est&nbsp;survenu lors de&nbsp;l'envoi de&nbsp;votre message.</h2>
                        <p>Nous vous contacterons dans les plus brefs délais.</p>
                    ";
                } else {
                    echo "<script>window.location.replace('".home_url()."/contact/');</script>";
                }
            ?>
        </div>
    </section>
</main>

<?php
session_destroy();
get_footer();