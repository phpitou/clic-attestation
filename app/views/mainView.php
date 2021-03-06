<?php

use PitouFW\Core\Request;

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $TITLE ?></title>
        <link href="<?= ASSETS ?>css/styles.css" rel="stylesheet" />
        <link href="<?= CSS ?>custom.css?v=2" rel="stylesheet" />
        <link href="<?= CSS ?>odometer.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="<?= ASSETS ?>img/favicon.png" />
        <link rel="apple-touch-icon" type="image/x-icon" href="<?= ASSETS ?>img/favicon.png" />
        <script data-search-pseudo-elements defer src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php if (Request::get()->getArg(0) !== 'generate'): ?>
        <div class="my-cookies" id="cookies_prompt">
            <aside class="actions">
                <button onclick="setCookiesChoice(true)" class="btn btn-primary">Accepter</button>
                <button onclick="setCookiesChoice(false)" class="btn btn-primary ml-2">Refuser</button>
            </aside>
            <p>
                Ce site utilise des cookies à des fins de statistiques de visites, en interne uniquement et grâce au
                logiciel auto-hébergé <a href="https://fr.matomo.org/why-matomo/" target="_blank">Matomo</a>, sans
                aucune utilisation de tracker externe. Pour nous autoriser à inclure votre visite de notre site dans nos
                statistiques, cliquez sur "Accepter". Sinon, cliquez sur "Refuser".
            </p>
        </div>
        <?php endif ?>
        <div id="layoutDefault">
            <div id="layoutDefault_content">
                <main>
                    <section class="notice bg-success text-white py-2 position-relative" id="alert-jam">
                        <span class="alert-close mt-1 mr-1" onclick="closeNotice('alert-jam')" title="Ne plus afficher ce message">&times;</span>
                        <div class="container">
                            <div class="row align-items-center justify-content-center text-center">
                                <div class="col-md-6 mb-3 mb-md-0">
                                    Vous avez aimé la manière dont <strong><?= NAME ?></strong> se rappelle de vos informations  tout en
                                    respectant votre vie privée ? Alors vous allez adorer <strong>JustAuthMe</strong>, notre application qui
                                    ringardise les formulaires et les mots de passe.
                                </div>
                                <div class="col-md-6 mb-2 mb-md-0">
                                    <a href="https://justauth.me" class="btn rounded-pill btn-white">
                                        Découvrir JustAuthMe
                                    </a>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php require_once @$appView; ?>
                </main>
            </div>
            <div id="layoutDefault_footer">
                <footer class="footer pt-10 pb-5 mt-auto bg-white footer-light">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="footer-brand"><?= NAME ?></div>
                                <div class="mb-3">Générez des attestations<br />en un clic !</div>
                                <div class="icon-list-social">
                                    <a title="Contactez-nous" class="icon-list-social-link" href="mailto:<?= CONTACT_EMAIL ?>"><i class="fas fa-envelope"></i></a>
                                    <a title="Twitter" class="icon-list-social-link" href="<?= SOCIAL_TWITTER ?>"><i class="fab fa-twitter"></i></a>
                                    <a title="Instagram" class="icon-list-social-link" href="<?= SOCIAL_INSTAGRAM ?>"><i class="fab fa-instagram"></i></a>
                                    <a title="Github" class="icon-list-social-link" href="<?= SOCIAL_GITHUB ?>"><i class="fab fa-github"></i></a>
                                </div>
                                <form action="https://www.paypal.com/donate" method="post" target="_top" class="mt-2 mb-5">
                                    <input type="hidden" name="hosted_button_id" value="XGV4DEC6WVFYL"/>
                                    <input type="image" class="img-fluid"
                                           src="<?= IMG ?>paypal_btn.png" border="0"
                                           name="submit" title="PayPal - The safer, easier way to pay online!"
                                           alt="Donate with PayPal button"/>
                                </form>
                            </div>
                        </div>
                        <hr class="my-5" />
                        <div class="row align-items-center">
                            <div class="col-md-6 small">Fait avec ❤ par <a href="https://peter.cauty.fr" style="text-decoration:underline">Peter Cauty</a> en Novembre 2020</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="<?= GITHUB ?>">Voir sur Github</a>
                                &middot;
                                <a href="<?= WEBROOT ?>terms">Mentions légales</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script type="text/javascript">
            const WEBROOT = '<?= WEBROOT ?>';
        </script>
        <script type="text/javascript">
            const closeNotice = (id) => {
                document.getElementById(id).style.display = 'none';
                localStorage.setItem(id + '-closed', '1');
            };

            const notices = document.getElementsByClassName('notice');
            for (let i in notices) {
                if (localStorage.getItem(notices[i].id + '-closed') !== null) {
                    notices[i].style.display = 'none';
                }
            }
        </script>
        <?php if (Request::get()->getArg(0) !== 'generate'): ?>
            <script src="<?= JS ?>mtm.js"></script>
        <?php endif ?>
    </body>
</html>
