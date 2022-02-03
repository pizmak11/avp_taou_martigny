<?php
get_header();
function t() { echo get_template_directory_uri(); }
?>

<main id="commune">
    <!--
<section class="h100">
<div class="no-overflow">
<div class="parallax center col" style="background-image: url(<?php echo get_template_directory_uri(); ?>/imgs/photos/montagne.jpg);">
<h1 class="h hidden">Taoù</h1>
<p class="h hidden delay2">Martigny</p>
<div class="h hidden delay4">
<a href="" class="btn">Découvrir le projet</a>
</div>
</div>
</div>
<div class="scroll-icon"></div>
</section>
-->

    <section class="commune-1">
        <div class="col pr0">
            <!--<h2 class="show-1024">Martigny – Le bonheur est dans la ville</h2>-->
            <div class="row">
                <div class="w40">
                    <!--<h2 class="hide-1024">Martigny – Le bonheur est dans la ville</h2>-->
                    <h2>Martigny – Le bonheur est dans la ville</h2>
                    <p class="h hidden">Martigny est une cité où&nbsp;il&nbsp;fait bon&nbsp;vivre. Une grande ville à&nbsp;taille humaine et&nbsp;aux&nbsp;mille richesses&nbsp;: la&nbsp;proximité d’un vaste éventail de&nbsp;produits et&nbsp;services, une vie culturelle et&nbsp;artistique d’une extrême vivacité, un&nbsp;patrimoine nourri d’une longue histoire, une stratégie environnementale forte, des&nbsp;transports publics efficaces, une&nbsp;nature accueillante et&nbsp;des&nbsp;loisirs à&nbsp;profusion.</p>
                    <p class="h hidden">En&nbsp;30&nbsp;minutes, vous vous trouvez sur les&nbsp;rives du&nbsp;Léman. En&nbsp;une&nbsp;heure, vous êtes au&nbsp;cœur des&nbsp;plus belles stations de&nbsp;ski d’Europe&nbsp;: Verbier, Zermatt, Chamonix ou&nbsp;Crans-Montana. Le&nbsp;col du&nbsp;Grand-Saint-Bernard vous ouvre la&nbsp;voie vers l’Italie, le&nbsp;massif du&nbsp;Mont-Blanc est&nbsp;à&nbsp;portée de&nbsp;main. De&nbsp;la&nbsp;gare de&nbsp;Martigny ou&nbsp;de&nbsp;l’aéroport de&nbsp;Sion, les plus grandes villes européennes vous tendent les&nbsp;bras.</p>
                    <p class="h hidden">Et que dire de&nbsp;la&nbsp;proximité du&nbsp;Rhône, ce&nbsp;fleuve mythique. Saviez-vous que ses&nbsp;berges – véritable sanctuaire de&nbsp;la&nbsp;biodiversité –&nbsp;sont en&nbsp;ce&nbsp;moment au&nbsp;cœur d’un vaste projet européen de&nbsp;réaménagement&nbsp;? Martigny peut définitivement s’enorgueillir d’être une&nbsp;petite perle.</p>
                </div>
                <div class="img w60">
                    <div style="background-image: url(<?php t(); ?>/imgs/photos/new/1024/le_bonheur_est_dans_la_ville.jpg);"></div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="col pl0">
            <div class="row">
                <div class="img w60">
                    <div style="background-image: url(<?php t(); ?>/imgs/photos/new/1024/lcite_de_lenergie.jpg);"></div>
                </div>
                <div class="w40">
                    <h2>La Cité de l’énergie</h2>
                    <p class="h hidden">Dans les années&nbsp;60, alors que les&nbsp;préoccupations environnementales étaient loin de&nbsp;faire la&nbsp;manchette, Martigny se&nbsp;positionnait déjà parmi les&nbsp;leaders avant-gardistes en&nbsp;matière de&nbsp;développement durable. Celle que l’on nomme la&nbsp;Cité de&nbsp;l’énergie peut se&nbsp;vanter d’avoir vu&nbsp;juste. Aujourd’hui, 20%&nbsp;de&nbsp;l’électricité consommée dans la&nbsp;ville provient de&nbsp;ses quatre centrales hydroélectriques et&nbsp;la&nbsp;piscine publique est alimentée en eau chaude, l’hiver, grâce à&nbsp;200&nbsp;m<sup>2</sup> de&nbsp;panneaux solaires thermiques. Vous verrez aussi d’élégantes éoliennes tourner au&nbsp;gré du&nbsp;vent.</p>
                    <p class="h hidden">La&nbsp;Commune développe depuis de&nbsp;nombreuses années une&nbsp;politique énergétique ambitieuse, centrée sur&nbsp;le&nbsp;développement des&nbsp;énergies renouvelables, l’efficacité énergétique et&nbsp;la&nbsp;sensibilisation des&nbsp;citoyens à&nbsp;la&nbsp;problématique du&nbsp;développement durable.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<!--
<script>
$("header").removeClass("active");

$(window).scroll(function() {
var scroll = $(window).scrollTop();
if(scroll >= (hh/4) - hhh) {
$("header").addClass("active");
} else {
$("header").removeClass("active");
}

//PARALLAX EFFECT
p1.css("transform", "translateY(" + (scroll / 3) + "px)");
});

</script>
-->

<?php get_footer();