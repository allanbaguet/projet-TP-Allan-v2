<div class="container-fluid">
    <a href="/controllers/dashboard/dashboard_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4 ">Commentaires</h1>
    <div class="d-flex justify-content-center">
        <a href="/controllers/dashboard/commentaries/toConfirm_commentaries_controller.php">
            <button type="button" class="btn mb-4" id="button-green">Commentaire à validé</button>
        </a>
    </div>
    <!-- condition permettant d'afficher le message seulement si une action a été réalisé -->
    <?php if (isset($delete) || isset($archive) || isset($unarchive)) : ?>
        <!-- <div class="d-flex justify-content-center h-50">
        <p class="text-center text-white fs-5 fw-bold alert alert-dismissible bg-alert fade show" role="alert">
            <?php
            //<!-- message informatif, variable $delete / $archive définie dans le controlleur comm/users -->
            //cible l'action dans le paramètre d'url
            if ($delete === '1') {
                echo 'Élément supprimée avec succès';
            } else if ($delete === '0') {
                echo 'Erreur pendant la suppression de l\'élément';
            } else if ($archive === '1') {
                echo 'Élément archivé avec succès';
            } else if ($archive === '0') {
                echo 'Erreur pendant l\'archivage de l\'élément';
            } else if ($unarchive === '1') {
                echo 'Élement désarchivé avec succès';
            } else if ($unarchive === '0') {
                echo 'Erreur pendant le désarchivage de l\'élément';
            }
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </p>
    </div>
<?php endif; ?> -->
        <div class="row">
            <div class="col d-flex justify-content-center h-50">
                <?php
                FlashMessage::display();
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col my-5">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center table-active">
                            <th scope="col">ID</th>
                            <th scope="col">Pseudo</th>
                            <th scope="col">Contenu</th>
                            <th scope="col">Donjon</th>
                            <th scope="col">Guide</th>
                            <th scope="col">Modification</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        foreach ($getCommentarieList as $commentarieList) { ?>
                            <tr class="text-center">
                                <th scope="row"><?php echo $commentarieList->id_users ?></th>
                                <td><?php echo $commentarieList->username ?></td>
                                <td><?php echo $commentarieList->text ?></td>
                                <!-- permet d'afficher une croix au lieu de l'id en question pour savoir à quoi il est relié -->
                                <td><?php echo isset($commentarieList->id_dungeons) ? '✗' : ''; ?></td>
                                <td><?php echo isset($commentarieList->id_guides) ? '✗' : ''; ?></td>
                                <td class="d-flex justify-content-evenly">
                                    <!-- <a href="/controllers/dashboard/commentaries/update_commentaries_controller.php?id_comments=<?= $commentarieList->id_comments ?>">
                                        <button class="btn btn-transparent" title="Modifier l'élément">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                            </svg>
                                        </button>
                                    </a> -->
                                    <a href="/controllers/dashboard/commentaries/delete_commentaries_controller.php?action=archive&id_comments=<?= $commentarieList->id_comments ?>">
                                        <button class="btn btn-transparent" title="Archiver l'élément">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box2" viewBox="0 0 16 16">
                                                <path d="M2.95.4a1 1 0 0 1 .8-.4h8.5a1 1 0 0 1 .8.4l2.85 3.8a.5.5 0 0 1 .1.3V15a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4.5a.5.5 0 0 1 .1-.3L2.95.4ZM7.5 1H3.75L1.5 4h6V1Zm1 0v3h6l-2.25-3H8.5ZM15 5H1v10h14V5Z" />
                                            </svg>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>

<!-- tableau archivage -->
<div class="container-fluid">
    <h1 class="text-center mb-4 ">Commentaires archivés</h1>
    <div class="row">
        <div class="col my-5">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center table-active">
                        <th scope="col">ID</th>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Donjon</th>
                        <th scope="col">Guide</th>
                        <th scope="col">Modification</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    foreach ($getCommentarieArchived as $commentarieArchived) { ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $commentarieArchived->id_users ?></th>
                            <td><?php echo $commentarieArchived->username ?></td>
                            <td><?php echo $commentarieArchived->text ?></td>
                            <!-- permet d'afficher une croix au lieu de l'id en question pour savoir à quoi il est relié -->
                            <td><?php echo isset($commentarieArchived->id_dungeons) ? '✗' : ''; ?></td>
                            <td><?php echo isset($commentarieArchived->id_guides) ? '✗' : ''; ?></td>
                            <td class="d-flex justify-content-evenly">
                                <a href="/controllers/dashboard/commentaries/delete_commentaries_controller.php?action=unarchive&id_comments=<?= $commentarieArchived->id_comments ?>">
                                    <button class="btn btn-transparent" title="Désarchiver l'élément">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6h-9.21z" />
                                        </svg>
                                    </button>
                                </a>
                                <a href="/controllers/dashboard/commentaries/delete_commentaries_controller.php?action=delete&id_comments=<?= $commentarieArchived->id_comments ?>">
                                    <button class="btn btn-transparent" title="Supprimer l'élément">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                        </svg>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>