<?php
get_header();
$theme = get_template_directory_uri();
$url = home_url("/");
?>

<main id="accueil">
  <section class="h100">
    <div class="no-overflow">
      <div class="parallax center col" style="background-image: url(<?php echo $theme; ?>/imgs/vis/3.jpg);">

        <h1 class="h hidden">Taoù</h1>
        <p class="h hidden delay2">Martigny</p>
        <div class="h hidden delay4">
          <a href="<?php echo $url; ?>projet/" class="btn">Découvrir le&nbsp;projet</a>
        </div>
      </div>
    </div>
    <div class="scroll-icon"></div>
  </section>

  <section class="custom-1">
    <div class="col">
      <div class="row">
        <div>
          <h2 class="h hidden">Projet</h2>
          <p class="h hidden delay2">Harmonie. C’est le&nbsp;mot qui vous habite en&nbsp;ce matin printanier,
            alors que vous contemplez les&nbsp;arbres fruitiers en&nbsp;fleurs et &nbsp;la&nbsp;végétation luxuriante
            qui enrobe de&nbsp;douceur les&nbsp;trois jolis bâtiments de&nbsp;votre nouveau quartier.</p>
          <p class="h hidden delay4">Avide de&nbsp;découverte, votre fils gambade au&nbsp;milieu de&nbsp;cette nature
            si&nbsp;invitante, passant d’une aire de&nbsp;jeux à&nbsp;une&nbsp;autre, heureux de&nbsp;grimper, glisser
            et&nbsp;se balancer à&nbsp;sa&nbsp;guise. Bientôt, votre aîné rentrera d’une balade à&nbsp;vélo
            sur&nbsp;les&nbsp;rives de&nbsp;la&nbsp;Dranse, entouré de&nbsp;ses copains.</p>
          <p class="h hidden delay4">Vivre aux&nbsp;abords d’une&nbsp;rivière longée de&nbsp;pistes cyclables
            est&nbsp;un&nbsp;luxe inespéré, d’autant que&nbsp;cette proximité avec la&nbsp;nature ne&nbsp;vous demande
            pas&nbsp;de&nbsp;sacrifier la&nbsp;vie urbaine et&nbsp;culturelle qui&nbsp;vous plaît tant. Ce&nbsp;soir,
            d’ailleurs, vous sortez avec des&nbsp;amis. Théâtre et&nbsp;gastronomie sont au&nbsp;programme...
            à&nbsp;deux pas de&nbsp;chez vous. C’est&nbsp;indéniable, vous avez déniché ici une&nbsp;perle rare
            et&nbsp;un&nbsp;équilibre parfait.
            <br><br><b style="font-weight: bold; font-size: 1.2em;">Taoù
              le&nbsp;bonheur&nbsp;?<br>Ici,&nbsp;exactement.</b>
          </p>
        </div>
        <div class="img">
          <div style="background-image: url(<?php echo get_template_directory_uri(); ?>/imgs/vis/1.jpg);"></div>
        </div>
      </div>
      <div class="center h hidden">
        <a href="<?php echo $theme; ?>/files/Brochure_TAOU.pdf" class="btn" target="_blank">Télécharger la brochure</a>
      </div>
    </div>
  </section>

  <section class="custom-2">
    <div class="sec-contact col">
      <h3 class="h hidden">Contactez-nous pour obtenir plus <br>d’informations sur&nbsp;votre futur logement</h3>
      <div class="center h hidden delay2 w100">
        <form action="" class="home-form">
          <div class="row">
            <div>
              <input type="text" id="titre" name="titre" placeholder="Titre">
              <input type="text" id="nom" name="nom" placeholder="Nom*" required>
              <input type="text" id="prenom" name="prenom" placeholder="Prénom*" required>
              <input type="email" id="email" name="email" placeholder="E-mail*" required>
              <input type="text" id="telephone" name="telephone" placeholder="Téléphone">
            </div>
            <div>
              <textarea name="message" id="message" placeholder="Message*" required></textarea>
            </div>
          </div>
          <button class="btn" type="submit" name="submit" id="submit">ENVOYER</button>
        </form>
      </div>
    </div>
  </section>
</main>

<script>
$("header").addClass("header-accueil");
</script>

<?php get_footer();