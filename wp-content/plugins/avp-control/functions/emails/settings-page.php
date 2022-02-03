<?php
function avp_emails_settings() { ?>

<h2>Paramètres</h2>

<?php
    include("../wp-content/plugins/avp-control/defaults.php");

    global $wpdb;
    $table = $wpdb->prefix . "avp_emails_display";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit-update'])) {
            foreach($_POST['data'] as $key => $d) {
                $display .=$d.",";
            }
            $res1 = $wpdb->query(
                $wpdb->prepare("UPDATE $table SET display='$display' WHERE id=1"));
            echo "<div class='avp-status'>Table columns updated.</div>";
        }
    }
?>

<section class="avp-control">
    <form action="" method="POST">
        <h3>Sélectionnez les entrées:</h3>
        <div class="avp-inputs">
            <?php

    $res2 = $wpdb->get_results("SELECT display FROM $table WHERE id=1");

    foreach($res2 as $r) {
        $checked .= $r->display;
    }
    $checked = explode(",", $checked);

    for($x=1; $x<sizeof($email_cols); $x++) {
        $name = $email_cols[$x];
        (in_array($x, $checked)) ? $c = " checked='checked'" : $c = "";

        echo "<div>
            <input type='checkbox' id='data-$x' name='data[]' value='$x'$c>
            <label for='data-$x'>$name</label>
        </div>";
    }

            ?>
        </div>
        <hr>
        <button type="submit" name="submit-update">Update table</button>
    </form>
</section>

<?php } ?>