    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="text-uppercase text-center text-white pt-5 pb-5">bienvenue sur dofusuniverse !</h1>
                </div>
            </div>
        </div>
    </header>
    <!-- card histoire d'ankama -->
    <div class="container-fluid">
        <h2>Différents contenus du site</h2>
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 bg-color-body-card">
                    <a href="/studio-ankama">
                        <img src="/public/assets/img/studio_ankama.jpg" class="card-img-top img-fluid desktop-img" alt="studio-Ankama">
                    </a>
                    <div class="card-body p-0">
                        <h5 class="card-title p-3 title-card-white">L'histoire du studio Ankama</h5>
                        <p class="card-text p-3">Trouver ici l’histoire du studio d’Ankama</p>
                        <div class="d-flex justify-content-center card-footer p-2 bg-color-top-bottom-card">
                            <a href="/studio-ankama" class="btn button-green">Histoire d'Ankama</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card histoire de dofus -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 bg-color-body-card">
                    <a href="/histoire-dofus">
                        <img src="/public/assets/img/dofus.jpg" class="card-img-top img-fluid desktop-img" alt="histoire-de-dofus">
                    </a>
                    <div class="card-body p-0">
                        <h5 class="card-title p-3 title-card-white">L'histoire de Dofus</h5>
                        <p class="card-text p-3">Trouver ici l’histoire du jeu vidéo Dofus</p>
                        <div class="d-flex justify-content-center card-footer p-2 bg-color-top-bottom-card">
                            <a href="/histoire-dofus" class="btn button-green">Histoire Dofus</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card encyclopédie / seulement visible pour les utilisateurs  -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 <?= (isset($_SESSION['id_users']) == [] ? 'd-none' : 'd-block') ?> bg-color-body-card">
                    <a href="/encyclopédie">
                        <img src="/public/assets/img/encyclopedie-img.jpg" class="card-img-top img-fluid desktop-img" alt="encyclopedie-de-dofus">
                    </a>
                    <div class="card-body p-0">
                        <h5 class="card-title p-3 title-card-white">Encyclopédie</h5>
                        <p class="card-text p-3">Trouver ici divers guides du jeu</p>
                        <div class="d-flex justify-content-center card-footer p-2 bg-color-top-bottom-card">
                            <a href="/encyclopédie" class="btn button-green">Histoire Dofus</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- partie encyclopédie -> seulement visible par utilisateur/admin donc role 1/2 -->
            <!-- <?php
                    if ($role == 1 || 2) { ?>
                <?php } ?> -->
        </div>
    </div>


    <!-- partie réseau sociaux / ici forum -->
    <div class="container-fluid">
        <h2>Réseau sociaux de Dofus</h2>
        <div class="row py-4">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 bg-color-body-card">
                    <a href="https://www.dofus.com/fr/forum" target="_blank">
                        <img src="/public/assets/img/dofus_forum.jpg" class="card-img-top img-fluid desktop-img" alt="forum-de-dofus">
                    </a>
                    <div class="card-body p-0">
                        <h5 class="card-title p-3 title-card-white">Forum Dofus</h5>
                        <p class="card-text p-3">Trouver ici le forum du jeu vidéo Dofus</p>
                        <div class="d-flex justify-content-center card-footer p-2 bg-color-top-bottom-card">
                            <a href="https://www.dofus.com/fr/forum" class="btn button-green" target="_blank">Forum Dofus</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- partie réseau sociaux / ici twitter -->
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 bg-color-body-card">
                    <a href="https://twitter.com/DOFUSfr?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank">
                        <img src="/public/assets/img/img-twitter-dofus.png" class="card-img-top img-fluid desktop-img" alt="twitter">
                    </a>
                    <div class="card-body p-0">
                        <h5 class="card-title p-3 title-card-white">Twitter Dofus</h5>
                        <p class="card-text p-3">Trouver ici le twitter de Dofus</p>
                        <div class="d-flex justify-content-center card-footer p-2 bg-color-top-bottom-card">
                            <a href="https://twitter.com/DOFUSfr?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" class="btn button-green" target="_blank">Twitter Dofus</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- intégration du flux rss ici -->
    <div class="container-fluid">
        <h2>Découvrez les dernières news</h2>
        <div class="row py-4">
            <?php
            $rssUrl = "https://www.dofus.com/fr/rss/news.xml";
            $rss = simplexml_load_file($rssUrl);

            if ($rss) {
                $maxArticles = 3; // Nombre max d'articles à afficher
                $articleCount = 0; // Compteur d'articles affichés

                foreach ($rss->channel->item as $item) {
                    if ($articleCount < $maxArticles) {
                        $title = $item->title;
                        $link = $item->link;
                        $description = $item->description;

                        // Nettoyer la description en supprimant les balises HTML et les attributs de classe
                        $cleanedDescription = strip_tags($description);

                        // Tronquer la description pour n'afficher que 2 phrases
                        $descriptionSentences = explode(".", $cleanedDescription);
                        $truncatedDescription = implode(".", array_slice($descriptionSentences, 1, 1));

                        $pubDate = date("d/m/Y", strtotime($item->pubDate));
            ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100 bg-color-body-card">
                                <a href="<?= $link ?>" target="_blank">
                                    <img src="/public/assets/img/guide-img.jpg" class="card-img-top img-fluid desktop-img" alt="img-zaap-news">
                                </a>
                                <div class="card-body p-0">
                                    <h5 class="card-title p-3 title-card-white"><?= $title ?></h5>
                                    <p class="card-text p-3"><?= $truncatedDescription ?> ...</p>
                                </div>
                                <div class="d-flex justify-content-around card-footer p-2 bg-color-top-bottom-card">
                                    <p class="cardDate">Publié le <?= $pubDate ?></p>
                                    <a href="<?= $link ?>" class="btn button-green" target="_blank">Voir info</a>
                                </div>
                            </div>
                        </div>
            <?php
                        $articleCount++;
                    } else {
                        break; // Sortir de la boucle après avoir affiché le nombre maximum d'articles
                    }
                }
            } else {
                echo 'Impossible de charger le flux RSS.';
            }
            ?>
        </div>
    </div>