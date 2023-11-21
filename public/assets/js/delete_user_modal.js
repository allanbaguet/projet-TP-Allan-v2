// // Script pour déclencher la modal de confirmation
// document.addEventListener('DOMContentLoaded', function() {
//     //cible le bouton pour la suppression
//     var deleteButtons = document.querySelectorAll('.delete-button');

//     // Attache un gestionnaire d'événements au bouton de suppression
//     deleteButtons.forEach(function(button) {
//         button.addEventListener('click', function(event) {
//             //empêche le raffraichissement de la page
//             event.preventDefault();

//             // Récupère l'URL de suppression du lien
//             var deleteUrl = button.getAttribute('href');

//             // Configure le bouton de confirmation pour rediriger vers l'URL de suppression
//             document.getElementById('confirmDeleteButton').setAttribute('href', deleteUrl);

//             // Affiche la modal de confirmation
//             var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
//             confirmationModal.show();
//         });
//     });
// });