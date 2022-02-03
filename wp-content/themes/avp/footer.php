<?php
$theme = get_template_directory_uri();
$url = home_url("/");
$title = get_bloginfo("name");
?>

<footer>
    <div class="row">
        <div class="row">
            <a href="https://www.domicim.ch/" target="_blank" id="domicim">
                <img src="<?php echo $theme; ?>/imgs/logos/domicim.png" alt="Domicim | DBS Group" title="Domicim | DBS Group">
            </a>
        </div>
        <div class='footer-domicim'>
            <div>
            <div class='footer-martigny'>
                <p>Domicim Martigny</p>
                <p>Rue du Collège 3</p>
                <p>1920 Martigny</p>
            </div>
            <div class='footer-lausanne'>
                <p>Domicim Lausanne</p>
                <p>Place Benjamin-Constant 2</p>
                <p>1003 Lausanne</p>
            </div>
            </div>
           
        
            <p><a href="https://www.domicim.ch/" target="_blank">www.domicim.ch</a></p>
        </div>
        
    </div>
</footer>

<style>
    .footer-domicim {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer-domicim > div {
        display: flex; 
        justify-content: space-between;
        align-items: center;
   
    }

    .footer-domicim > div > div {
        margin-left: 3em;
    }

    .footer-domicim p a {
        margin-top: 10px;
        text-align: center;
    }

    @media only screen and (max-width: 500px) {
        .footer-domicim > div {

        font-size: 13px;
    }

    .footer-domicim > div > div {
        margin-left: 2em;
    }

    .footer-domicim > div > div:first-child {
        margin-left: 0em;
    }
    }
    
</style>

<script>
    $("header").removeClass("active");
    $(window).scroll(function() {
        headerChange();
    });
</script>

</body>
</html>