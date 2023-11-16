<div class="container-fluid">
    <a href="/controllers/dashboard/commentaries/commentaries_dash_controller.php">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left-square-fill arrow-left m-4" viewBox="0 0 16 16">
            <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z" />
        </svg>
    </a>
    <h1 class="text-center mb-4 ">Commentaires à confirmer</h1>
    <!-- condition permettant d'afficher le message seulement si une action a été réalisé -->
    <!-- <?php if (isset($confirm) || isset($delete)) : ?>
        <div class="d-flex justify-content-center h-50">
            <p class="text-center text-white fs-5 fw-bold alert alert-dismissible bg-alert fade show" role="alert">
                <?php
                // Message informatif, variable $delete / $archive définie dans le contrôleur comm/users
                // Cible l'action dans le paramètre d'URL
                if ($delete === '1') {
                    echo 'Élément supprimé avec succès';
                } else if ($delete === '0') {
                    echo 'Erreur pendant la suppression de l\'élément';
                } else if ($confirm === '1') {
                    echo 'Élément validé avec succès';
                } else if ($confirm === '0') {
                    echo 'Erreur pendant la validation de l\'élément';
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
                    foreach ($getToConfirmCommentarie as $toConfirmCommentarie) { ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo $toConfirmCommentarie->id_users ?></th>
                            <td><?php echo $toConfirmCommentarie->username ?></td>
                            <td><?php echo $toConfirmCommentarie->text ?></td>
                            <!-- permet d'afficher une croix au lieu de l'id en question pour savoir à quoi il est relié -->
                            <td><?php echo isset($toConfirmCommentarie->id_dungeons) ? '✗' : ''; ?></td>
                            <td><?php echo isset($toConfirmCommentarie->id_guides) ? '✗' : ''; ?></td>
                            <td class="d-flex justify-content-evenly">
                                <a href="/controllers/dashboard/commentaries/toConfirm_commentaries_controller.php?action=confirm&id_comments=<?= $toConfirmCommentarie->id_comments ?>">
                                    <button class="btn btn-transparent" title="Valider l'élément">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>
                                    </button>
                                </a>
                                <a href="/controllers/dashboard/commentaries/toConfirm_commentaries_controller.php?action=delete&id_comments=<?= $toConfirmCommentarie->id_comments ?>">
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