<?php
function avp_emails_page() { ?>

<h2>Stockage des e-mails</h2>

<section class="avp-control">
    <?php
    include("../wp-content/plugins/avp-control/defaults.php");

    global $wpdb;
    $table = $wpdb->prefix . "avp_emails";
    $table_d = $wpdb->prefix . "avp_emails_display";

    $res1 = $wpdb->get_results("SELECT * FROM $table");
    $res2 = $wpdb->get_results("SELECT * FROM $table_d WHERE id=1");

    foreach ($res2 as $r) { $display = $r->display; }

    $display = explode(',', $display);

    echo "<table><thead><tr>";
    for($x=0; $x<sizeof($email_cols); $x++) {
        if(in_array("$x", $display)) {
            echo "<th>".$email_cols[$x]."</th>";
        }
    }
    echo "</tr></thead><tbody>";

    foreach ($res1 as $r) {
        echo "<tr>";
        if(in_array("1", $display)) { echo "<td>$r->1</td>"; }
        if(in_array("2", $display)) { echo "<td>$r->2</td>"; }
        if(in_array("3", $display)) { echo "<td>$r->3</td>"; }
        if(in_array("4", $display)) { echo "<td>$r->4</td>"; }
        if(in_array("5", $display)) { echo "<td>$r->5</td>"; }
        if(in_array("6", $display)) { echo "<td>$r->6</td>"; }
        if(in_array("7", $display)) { echo "<td>$r->7</td>"; }
        if(in_array("8", $display)) { echo "<td>$r->8</td>"; }
        echo "</tr>";
    }

    echo "</tbody></table>";
    ?>
</section>

<?php } ?>