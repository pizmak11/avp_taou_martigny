<?php
function avp_prix_page() {
    include("../wp-content/plugins/avp-control/defaults.php");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<h2>Prix</h2>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit-prix'])) {
            if($_POST['data']) {
                global $wpdb;
                $tablePrix = $wpdb->prefix . "avp_prix";
                $wpdb->query($wpdb->prepare("DELETE FROM ".$tablePrix));
                $cntRow = 1;


                foreach($_POST['data'] as $row) {
                    $sql = "INSERT INTO $tablePrix VALUES ($cntRow, ";

                    for($x=1; $x<sizeOf($prix_cols); $x++) {
                        $sql .= "'$row[$x]', ";
                    }

                    $sql = substr($sql, 0, -2);
                    $sql .= ");";
                    $wpdb->query($wpdb->prepare($sql));
                    $cntRow++;
                }
            }
            echo "<div class='avp-status'>Le tableau a été mis à jour.</div>";
        }
    }
?>

<section class="avp-control">
    <?php

    global $wpdb;
    $table = $wpdb->prefix . "avp_prix";
    $table_d = $wpdb->prefix . "avp_prix_display";

    $res1 = $wpdb->get_results("SELECT * FROM $table");
    $res2 = $wpdb->get_results("SELECT * FROM $table_d WHERE id=1");

    foreach ($res2 as $r) { $display = $r->display; }
    $display = explode(',', $display);
    ?>

    <form action="" method="POST">
        <table class="table-prix">
            <thead>
                <tr>
                    <?php
    for($x=0; $x<sizeof($prix_cols); $x++) {
        if(in_array("$x", $display)) {
            echo "<th class='c-$x'>".$prix_cols[$x]."</th>";
            if($prix_cols[$x] == "Disponibilités") {
                $dis = $x;
            }
        }
    }
                    ?>
                    <th class="c-action"></th>
                </tr>
            </thead>
            <tbody>
                <?php
    $r = 1;
    foreach ($res1 as $row) {
        $c = json_decode(json_encode($row), true);
        $c = array_values($c);

        echo "<tr class='r-$r'>";
        for($x=1; $x<sizeof($prix_cols); $x++) {
            $v = $c[$x];
            if(in_array($x, $display)) {
                if($x==$dis) { //disponibilite

                    $ch=["", "", ""];
                    if($v=="v") { $ch[0] = " checked"; $d = "Vendu"; }
                    else if($v=="r") { $ch[1] = " checked"; $d = "Réservé"; }
                    else { $ch[2] = " checked"; $d = "Disponible"; }

                    echo "
                    <td class='c-$x'>
                        <div>
                            <input type='radio' class='st st-".$r."' id='st-".$r."v' name='data[".$r."][".$dis."]' value='v'".$ch[0].">
                            <label for='st-".$r."v'></label>
                            <input type='radio' class='st st-".$r."' id='st-".$r."r' name='data[".$r."][".$dis."]' value='r'".$ch[1].">
                            <label for='st-".$r."r'></label>
                            <input type='radio' class='st st-".$r."' id='st-".$r."d' name='data[".$r."][".$dis."]' value='d'".$ch[2].">
                            <label for='st-".$r."d'></label>
                        </div>
                        <span class='status-text $v'>$d</span>
                    </td>";
                } else {
                    echo "
                <td class='c-$x'>
                    <input type='text' name='data[$r][$x]' value='$v'>
                </td>";
                }
            }
        }

        echo "<td class='c-action'>
                <button type='button' onclick='removeRow($r)'>&times;</button>
            </td>
        </tr>";

        $r++;
    } ?>
            </tbody>
        </table>

        <button type="button" class="add-row" onclick="addRow()">+</button>
        <button type="submit" name="submit-prix" id="submit-prix" style="margin-top: 20px;">Sauvegarder</button>
    </form>
</section>

<script>
    <?php echo "var dis = $dis;\n"; ?>
    var r = $("tbody tr").length+1;
    function addRow() {
        var cols = $("thead th");
        var text = "<tr class='r-"+r+"'>";
        for(var x=0; x<cols.length-1; x++) {
            var id = cols[x].className.substring(2);
            if(id == dis) { //status column
                text += "<td class='c-"+id+"'><div>";
                text += "<input type='radio' class='st st-"+r+"' id='st-"+r+"v' name='data["+r+"]["+dis+"]' value='v'>";
                text += "<label for='st-"+r+"v'></label>";
                text += "<input type='radio' class='st st-"+r+"' id='st-"+r+"r' name='data["+r+"]["+dis+"]' value='r'>";
                text += "<label for='st-"+r+"r'></label>";
                text += "<input type='radio' class='st st-"+r+"' id='st-"+r+"d' name='data["+r+"]["+dis+"]' value='d' checked>";
                text += "<label for='st-"+r+"d'></label>";
                text += "</div><span class='status-text d'>Disponible</span>";
                text += "</td>";
            } else {
                text += "<td class='c-"+id+"'>";
                text += "<input type='text' name='data["+r+"]["+id+"]'>";
                text += "</td>";
            }
        }
        text += "<td class='c-action'>";
        text += "<button type='button' onclick='removeRow("+r+")'>&times;</button>";
        text += "</td>";
        text += "</tr>";

        $("table tbody").append(text);
        r++;
    }

    function removeRow(thisRow) {
        var conf = confirm("Êtes-vous sûr?");
        if(conf == true) {
            $(".r-" + thisRow).remove();
            var rows = $(".table-prix tbody tr");
            var rowList = [];
            rows.each(function() {
                rowList.push(parseInt($(this)[0].classList[0].substring(2)));
            });
            if(rowList.length > 0) {
                var lastId = Math.max.apply(Math, rowList);
                r = lastId+1;
            } else {
                r = 0;
            }
        }
    }

    $(document).on("change", ".st", function() {
        var thisRow = $(this)[0].classList[1].substr(3);
        var status = $(".r-" + thisRow + " .status-text");
        status.removeClass("v r d");

        if($(this).val() == "v") {
            status.text("Vendu");
            status.addClass("v");
        }
        if($(this).val() == "r") {
            status.text("Réservé");
            status.addClass("r");
        }
        if($(this).val() == "d") {
            status.text("Disponible");
            status.addClass("d");
        }
    });
</script>

<?php } ?>