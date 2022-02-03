<?php
get_header();
function t() { echo get_template_directory_uri(); }
?>

<main id="contact">
    <section>
        <div class="col">
            <h2 class="center">N'hésitez pas à&nbsp;nous joindre par&nbsp;téléphone ou&nbsp;par&nbsp;email.<br>Nous nous ferons un&nbsp;plaisir de&nbsp;vous renseigner.</h2>
            <div class="row center contact-container">
                <div>
                    <form action="<?php t(); ?>/mail.php" method="POST">
                        <div>
                            <input type="text" placeholder="Titre" name="titre">
                            <input type="text" placeholder="Nom*" required name="nom">
                            <input type="text" placeholder="Prénom*" required name="prenom">
                            <input type="email" placeholder="Email*" required name="email">
                            <input type="text" placeholder="Téléphone" name="telephone">
                            <textarea placeholder="Message*" name="message" id="message" required></textarea>
                        </div>
                        <div class="center">
                            <button type="submit" name="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
                <div class="contact-tels">
                    <div class="blocks">
                        <p style='font-size: 16px'>Domicim Martigny</p>
                        <div>
                            <a class="h hidden" href="tel: 00 41 79 425 11 63">
                                <span>Joana&nbsp;Da&nbsp;Ponte</span>
                                <span>+41&nbsp;79&nbsp;425&nbsp;11&nbsp;63</span>
                            </a>
                        </div>
                        <div>
                            <a class="h hidden" href="tel: 00 41 79 779 49 41">
                                <span>Bernard&nbsp;Juillard</span>
                                <span>+41&nbsp;79&nbsp;779&nbsp;49&nbsp;41</span>
                            </a>
                        </div>
                        <br/><br/>
                        <p style='font-size: 16px'>Domicim Lausanne</p>
                        <div>
                            <a class="h hidden" href="tel: 00 41 79 779 49 41">
                                <span style='background: #577373'>Anne-Claude&nbsp;Poulard</span>
                                <span style='color: #577373'>+41&nbsp;79&nbsp;236&nbsp;32&nbsp;14</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <h3>LES ACTEURS</h3>
                <div class="col">
                    <div class="creators col">
                        <div class="row center">
                            <a href="https://www.domicim.ch/" target="_blank" id="domicim2">
                                <img src="<?php t(); ?>/imgs/logos/domicim-dbs.png" alt="Domicim | DBS Group" title="Domicim | DBS Group">
                            </a>
                            <a href="https://www.ferrari-architectes.ch/" target="_blank" id="ferrari">
                                <img src="<?php t(); ?>/imgs/logos/ferrari-architectes.webp" alt="Ferrari Architectes" title="Ferrari Architectes">
                            </a>
                        </div>
                        <div class="row center">
                            <a href="https://www.credit-suisse.com/ch/fr.html" target="_blank" id="credit-suisse">
                                <img src="<?php t(); ?>/imgs/logos/credit-suisse.svg" alt="Credit Suisse" title="Credit Suisse">
                            </a>
                            <a href="https://paysagestion.ch/" target="_blank" id="paysagestion">
                                <img src="<?php t(); ?>/imgs/logos/paysagestion.svg" alt="paysagestion" title="paysagestion">
                            </a>
                            <a href="http://www.git4.ch/equipe.php" target="_blank" id="git4">
                                <img src="<?php t(); ?>/imgs/logos/git4.png" alt="GIT4" title="GIT4">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer();