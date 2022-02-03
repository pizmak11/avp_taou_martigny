<?php
/*
Plugin Name: AVP control
Description: Atelier Vert Pomme's plugin with main structures, emails storage, facade interactive defaults etc.
Author: Atelier Vert Pomme
Author URI: https://atelier-vert-pomme.com
Version: 1.0
*/

/*********************************************/
//add shortcodes
/*********************************************/

function avp_prix_table() {
    include("defaults.php");

    global $wpdb;
    $table = $wpdb->prefix . "avp_prix";
    $table_d = $wpdb->prefix . "avp_prix_display";

    $res1 = $wpdb->get_results("SELECT * FROM $table");
    $res2 = $wpdb->get_results("SELECT * FROM $table_d");

    foreach ($res2 as $r) {
        $display = $r->display;
    }

    $display = explode(',', $display);

    echo "<table class='avp-table avp-prix'><thead><tr>";
    for($x=0; $x<sizeof($prix_cols); $x++) {
        if(in_array("$x", $display)) {
            echo "<th class='column-$x' onclick='sortTable($x)'>".$prix_cols[$x]."</th>";
            if($prix_cols[$x] == "Disponibilités") {
                $dis = $x;
            }
        }
    }
    echo "</tr></thead><tbody>";

    $r = 1;
    $parity = true; // true = odd, false = even
    foreach ($res1 as $row) {
        $c = json_decode(json_encode($row), true);
        $c = array_values($c);
        $l = $c[2];
        $s = $c[$dis];

        if($parity) { $p = "odd";
        } else { $p = "even"; }
        $parity = !$parity;
        
        echo "<tr class='row-$r lot-$l $s $p'>";
        for($x=1; $x<sizeof($prix_cols); $x++) {
            $v = $c[$x];
            if(in_array($x, $display)) {
                if($x==$dis) { //disponibilite
                    if($s=="v") { $d = "Vendu"; }
                    else if($s=="r") { $d = "Réservé"; }
                    else { $d = "Disponible"; }
                    echo "<td class='column-$x'><i></i><span>$d</span></td>";
                } else {
                    echo "<td class='column-$x'>$v</td>";
                }
            }
        }
        echo "</tr>";
        $r++;
    }
    echo "</tbody></table>";
}
add_shortcode('avp_prix_table', 'avp_prix_table');

function avp_lot_data() {
    include("defaults.php");

    global $wpdb;
    $table = $wpdb->prefix . "avp_prix";
    $table_d = $wpdb->prefix . "avp_prix_display";

    $res1 = $wpdb->get_results("SELECT * FROM $table");
    $res2 = $wpdb->get_results("SELECT * FROM $table_d");

    foreach ($res2 as $r) { $display = $r->display; }
    $display = explode(',', $display);

    echo "<table class='avp-table avp-lot-data'>";
    for($x=1; $x<sizeof($prix_cols); $x++) {
            if(in_array($x, $display)) {
                echo "<tr><th class='column-$x'>$prix_cols[$x]</th><td class='column-$x'></td></tr>";
            }
    }
    echo "</table>";
}
add_shortcode('avp_lot_data', 'avp_lot_data');

/*********************************************/
//add menu positions
/*********************************************/

function avp_control_menu() {
    //instructions
    add_menu_page(
        'Instructions', 
        'Instructions', 
        'edit_pages', 
        'avp_instructions_page', 
        'avp_instructions_page',
        'dashicons-info-outline',
        1
    );
    //prix
    add_menu_page(
        'Prix', 
        'Prix', 
        'edit_pages', 
        'avp_prix_page', 
        'avp_prix_page',
        'dashicons-admin-multisite',
        2
    );
    add_submenu_page(
        'avp_prix_page', 
        'Paramètres', 
        'Paramètres', 
        'manage_options', 
        'avp_prix_settings',
        'avp_prix_settings'
    );
    //emails
    add_menu_page(
        'E-mails', 
        'E-mails', 
        'edit_pages', 
        'avp_emails_page', 
        'avp_emails_page',
        'dashicons-email-alt',
        3
    );
    add_submenu_page(
        'avp_emails_page', 
        'Formulaire', 
        'Formulaire', 
        'edit_pages', 
        'avp_emails_form',
        'avp_emails_form'
    );
    add_submenu_page(
        'avp_emails_page', 
        'Paramètres', 
        'Paramètres', 
        'manage_options', 
        'avp_emails_settings',
        'avp_emails_settings'
    );
}
add_action('admin_menu', 'avp_control_menu');

/*********************************************/
//create database
/*********************************************/

global $avp_control_version;
$avp_control_version = '1.0';
function avp_control_install() {
    include("defaults.php");
    global $wpdb;
    global $avp_control_version;

    add_option('avp_control_version', $avp_control_version);
    $charset_collate = $wpdb->get_charset_collate();

    /*******************************/

    $table_emails = $wpdb->prefix . "avp_emails"; 
    $cols1 = "";
    for($x=1; $x<=sizeof($email_cols); $x++) {
        $cols1 .= "c$x varchar(255),";
    }

    $sql_emails = "CREATE TABLE $table_emails (
            id int NOT NULL, $cols1 PRIMARY KEY (id)
        ) $charset_collate;";

    /*******************************/

    $table_emails_display = $wpdb->prefix . "avp_emails_display"; 

    $sql_emails_display = "CREATE TABLE $table_emails_display (
            id int NOT NULL, display varchar(255), PRIMARY KEY (id)
        ) $charset_collate;";

    /*******************************/

    $table_prix = $wpdb->prefix . "avp_prix"; 
    $cols2 = "";
    for($x=1; $x<sizeof($prix_cols); $x++) {
        $cols2 .= "c$x varchar(255),";
    }

    $sql_prix = "CREATE TABLE $table_prix (
            id int NOT NULL, $cols2 PRIMARY KEY (id)
        ) $charset_collate;";

    /*******************************/

    $table_prix_display = $wpdb->prefix . "avp_prix_display"; 

    $sql_prix_display = "CREATE TABLE $table_prix_display (
            id int NOT NULL, display varchar(255), PRIMARY KEY (id)
        ) $charset_collate;";

    /*******************************/

    $table_form = $wpdb->prefix . "avp_form"; 
    $sql_form = "CREATE TABLE $table_form (
            id int NOT NULL,
            sender varchar(255),
            protocol varchar(255),
            host varchar(255),
            port varchar(255),
            pass varchar(255),
            title varchar(255),
            color1 varchar(255),
            color2 varchar(255),
            color3 varchar(255),
            rec1 varchar(255),
            rec2 varchar(255),
            rec3 varchar(255),
            rec1t varchar(255),
            rec2t varchar(255),
            rec3t varchar(255),
            recSwitch varchar(255),
            recCurr varchar(255),
            testActive varchar(255),
            recTest varchar(255),
            PRIMARY KEY (id)
        ) $charset_collate;";

    /*******************************/

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql_prix);
    dbDelta($sql_prix_display);
    dbDelta($sql_emails);
    dbDelta($sql_emails_display);
    dbDelta($sql_form);

    /*******************************/

    $wpdb->insert($table_emails_display, array(
        'id' => '1', 'display' => '2,3,4,5,7,8,9',
    ));

    $wpdb->insert($table_prix_display, array(
        'id' => '1', 'display' => '1,2,3,4,5,9,20,21',
    ));

    $wpdb->insert($table_form, array(
        'id' => '1',
        'recSwitch' => false,
        'testActive' => false,
        'recTest' => 'admin@atelier-vert-pomme.com',
        'protocol' => 'tls',
        'host' => 'mail.infomaniak.com',
        'port' => '587',
    ));
}
register_activation_hook(__FILE__, 'avp_control_install');

/*********************************************/
//remove user roles
/*********************************************/

remove_role('contributor');
remove_role('subscriber');
remove_role('author');

/*********************************************/
//main page
/*********************************************/

include 'functions/instructions/main-page.php';
include 'functions/prix/main-page.php';
include 'functions/emails/main-page.php';
//add_action('admin_footer', 'avp_emails_page');

/*********************************************/
//settings page
/*********************************************/

include 'functions/emails/form-page.php';
include 'functions/emails/settings-page.php';
include 'functions/prix/settings-page.php';
//add_action('admin_footer', 'avp_emails_settings');

/*********************************************/
//CSS style
/*********************************************/

wp_register_style('namespace', '/wp-content/plugins/avp-control/style.css');
wp_enqueue_style('namespace');