<?php
function avp_emails_form() { ?>

<h2>Paramètres de formulaire</h2>

<?php
    global $wpdb;
    $table = $wpdb->prefix . "avp_form";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['submit-update'])) {
            $sender = filter_input(INPUT_POST, 'sender');
            $protocol = filter_input(INPUT_POST, 'protocol');
            $host = filter_input(INPUT_POST, 'host');
            $port = filter_input(INPUT_POST, 'port');
            $pass = filter_input(INPUT_POST, 'pass');
            $title = filter_input(INPUT_POST, 'title');
            $color1 = filter_input(INPUT_POST, 'color1');
            $color2 = filter_input(INPUT_POST, 'color2');
            $color3 = filter_input(INPUT_POST, 'color3');
            $rec1 = filter_input(INPUT_POST, 'rec1');
            $rec2 = filter_input(INPUT_POST, 'rec2');
            $rec3 = filter_input(INPUT_POST, 'rec3');
            $rec1t = filter_input(INPUT_POST, 'rec1t');
            $rec2t = filter_input(INPUT_POST, 'rec2t');
            $rec3t = filter_input(INPUT_POST, 'rec3t');
            $recSwitch = filter_input(INPUT_POST, 'recSwitch');
            $recCurr = filter_input(INPUT_POST, 'recCurr');
            $testActive = filter_input(INPUT_POST, 'testActive');
            $recTest = filter_input(INPUT_POST, 'recTest');

            $update = $wpdb->query(
                $wpdb->prepare("UPDATE $table SET
                    sender='$sender', 
                    protocol='$protocol', 
                    host='$host', 
                    port='$port', 
                    pass='$pass', 
                    title='$title', 
                    color1='$color1', 
                    color2='$color2', 
                    color3='$color3', 
                    rec1='$rec1', 
                    rec2='$rec2', 
                    rec3='$rec3', 
                    rec1t='$rec1t', 
                    rec2t='$rec2t', 
                    rec3t='$rec3t', 
                    recSwitch='$recSwitch', 
                    recCurr='$recCurr', 
                    testActive='$testActive', 
                    recTest='$recTest'
                    WHERE id=1"));
            echo "<div class='avp-status'>Settings have been updated.</div>";
        }
    }
?>

<section class="avp-control">
    <form action="" method="POST">
        <h3>Modifier les données du formulaire:</h3>
        <div class="avp-inputs">
            <?php
    $result = $wpdb->get_results("SELECT * FROM $table");
    foreach($result as $r) {
            ?>
            <p>E-mail design:</p>
            <div class='field'>
                <label class='txt-l' for='title'>E-mail title</label>
                <input type='text' id='title' name='title' value='<?php echo $r->title; ?>'>
            </div>
            <div class='field'>
                <input type='color' id='color1' name='color1' value='<?php echo $r->color1; ?>'>
                <label for='color1'>1st color</label>
            </div>
            <div class='field'>
                <input type='color' id='color2' name='color2' value='<?php echo $r->color2; ?>'>
                <label for='color2'>2nd color</label>
            </div>
            <div class='field'>
                <input type='color' id='color3' name='color3' value='<?php echo $r->color3; ?>'>
                <label for='color3'>3rd color</label>
            </div>
            <hr>
            <p>Sender data:</p>
            <div class='field'>
                <label class='txt-l' for='sender'>Sender</label>
                <input type='text' id='sender' name='sender' value='<?php echo $r->sender; ?>'>
            </div>
            <div class='field'>
                <label class='txt-l' for='pass'>Password</label>
                <input type='password' id='pass' name='pass' value='<?php echo $r->pass; ?>'>
            </div>
            <div class='field'>
                <label class='txt-l' for='pass'>Host</label>
                <input type='text' id='host' name='host' value='<?php echo $r->host; ?>'>
            </div>
            <div class='field'>
                <label class='txt-l' for='pass'>Protocol</label>
                <input type='text' id='protocol' name='protocol' value='<?php echo $r->protocol; ?>'>
            </div>
            <div class='field'>
                <label class='txt-l' for='pass'>Port</label>
                <input type='text' id='port' name='port' value='<?php echo $r->port; ?>'>
            </div>
            <hr>

            <p>Recivers data:</p>
            <div class='field'>
                <span>
                    <label class='txt-l' for='rec1'>Reciver 1</label><input type='text' id='rec1' name='rec1' value='<?php echo $r->rec1; ?>'>
                </span>
                <span>
                    <label class='txt-ls' for='rec1t'>Type</label>
                    <select id='rec1t' name='rec1t'>
                        <?php
        $t=["", "", ""];
        if($r->rec1t == "AddAddress") {$t[0] = " selected"; }
        if($r->rec1t == "AddCC") {$t[1] = " selected"; }
        if($r->rec1t == "AddBCC") {$t[2] = " selected"; }
                        ?>
                        <option value='AddAddress'<?php echo $t[0]; ?>>Direct</option>
                        <option value='AddCC'<?php echo $t[1]; ?>>Copy</option>
                        <option value='AddBCC'<?php echo $t[2]; ?>>Hidden copy</option>
                    </select>
                </span>
            </div>
            <div class='field'>
                <label class='txt-l' for='rec2'>Reciver 2</label><input type='text' id='rec2' name='rec2' value='<?php echo $r->rec2; ?>'>
                <label class='txt-ls' for='rec2t'>Type</label>
                <select id='rec2t' name='rec2t'>
                    <?php
        $t=["", "", ""];
        if($r->rec2t == "AddAddress") {$t[0] = " selected"; }
        if($r->rec2t == "AddCC") {$t[1] = " selected"; }
        if($r->rec2t == "AddBCC") {$t[2] = " selected"; }
                    ?>
                    <option value='AddAddress'<?php echo $t[0]; ?>>Direct</option>
                    <option value='AddCC'<?php echo $t[1]; ?>>Copy</option>
                    <option value='AddBCC'<?php echo $t[2]; ?>>Hidden copy</option>
                </select>
            </div>
            <div class='field'>
                <label class='txt-l' for='rec3'>Reciver 3</label><input type='text' id='rec3' name='rec3' value='<?php echo $r->rec3; ?>'>
                <label class='txt-ls' for='rec3t'>Type</label>
                <select id='rec3t' name='rec3t'>
                    <?php
        $t=["", "", ""];
        if($r->rec3t == "AddAddress") {$t[0] = " selected"; }
        if($r->rec3t == "AddCC") {$t[1] = " selected"; }
        if($r->rec3t == "AddBCC") {$t[2] = " selected"; }
                    ?>
                    <option value='AddAddress'<?php echo $t[0]; ?>>Direct</option>
                    <option value='AddCC'<?php echo $t[1]; ?>>Copy</option>
                    <option value='AddBCC'<?php echo $t[2]; ?>>Hidden copy</option>
                </select>
            </div>
            <hr>

            <p>E-mail switching:</p>
            <div>
                <?php if($r->recSwitch == true) { $ch1 = " checked"; } ?>
                <input type='checkbox' id='recSwitch' name='recSwitch' value='true'<?php echo $ch1; ?>>
                <label for='recSwitch'>E-mail switcher</label>
                <p><b>Enabled</b> - every time email will be sent to another reciver from list.<br>
                    <b>Disabled</b> - email will be sent to every reciver in parallel.</p>
            </div>
            <hr>

            <p>Testing:</p>
            <div>
                <?php if($r->testActive == true) { $ch2 = " checked"; } ?>
                <input type='checkbox' id='testActive' name='testActive' value='true'<?php echo $ch2; ?>>
                <label for='testActive'>Active testing</label>
                <p><b>Enabled</b> - e-mails will be sent to "Test e-mail" only.<br>
                    <b>Disabled</b> - e-mails will be sent normally to active recivers.</p>
            </div>
            <div class='field'>
                <label class='txt-l' for='recTest'>Test e-mail</label>
                <input type='text' id='recTest' name='recTest' value='<?php echo $r->recTest; ?>'>
            </div>
            <?php } ?>
        </div>
        <button type="submit" name="submit-update">Update table</button>
    </form>
</section>

<?php } ?>