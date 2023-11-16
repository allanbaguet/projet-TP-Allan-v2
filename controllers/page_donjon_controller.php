<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/init.php';
require_once __DIR__ . '/../models/Commentarie.php';
require_once __DIR__ . '/../models/Dungeon.php';

try {
    if ($_SESSION['role'] != 1 && $_SESSION['role'] != 2) {
        header('location: /accueil');
        die;
    }
    $title = 'DofusUniverse - Donjon';
    $id_dungeons = intval(filter_input(INPUT_GET, 'id_dungeons', FILTER_SANITIZE_NUMBER_INT));
    $id_comments = intval(filter_input(INPUT_GET, 'id_comments', FILTER_SANITIZE_NUMBER_INT));
    $getDungeonList = Dungeon::get($id_dungeons);
    $getDungeonCommentarie = Commentarie::getDungeonComments($id_dungeons);
    $getDateCommentarie = Commentarie::get_all();
    // $getCommentarieId = Commentarie::get($id_comments);

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        // Récupération et validation de la textarea 
        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($text)) {
            if (strlen($text) > 255) {
                $errors['text'] = 'Le nombre de caractères a été dépassé';
            }
        } else {
            // Le champ de texte est vide
            $errors['text'] = 'Le champ de commentaire ne peut pas être vide';
        }
    
        if (empty($errors)) {
            $newCommentarie = new Commentarie();
            // Nouvelle instance de l'objet issu de la classe Commentarie
            // On hydrate l'objet avec toutes les propriétés
            $newCommentarie->setText($text);
            // $newCommentarie->setId_guides($id_guides);
            $newCommentarie->setId_dungeons($id_dungeons);
            $newCommentarie->setId_users($id_users);
            // On hydrate l'objet avec toutes les propriétés
            $saved = $newCommentarie->insertDungeon();
            // $saved -> réponse de la méthode en question -> ici retourne un booléen
    
            if ($saved) {
                // Commentaire inséré avec succès
                FlashMessage::set("Commentaire bien envoyé, en attente de confirmation d'un administrateur", SUCCESS);
            } else {
                // Une erreur s'est produite lors de l'insertion du commentaire
                FlashMessage::set("Une erreur s'est produite lors de la création du commentaire", ERROR);
            }
        }
    }

} catch (\Throwable $th) {
    $error = $th->getMessage();
    include __DIR__ . '/../views/templates/header.php';
    include __DIR__ . '/../views/templates/error.php';
    include __DIR__ . '/../views/templates/footer.php';
    die;
}



include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/page_donjon.php';
include __DIR__ . '/../views/templates/footer.php';
